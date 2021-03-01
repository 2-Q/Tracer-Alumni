<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Profession;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tahun=$request->input('tahun',date('Y'));
        $jurusan=$request->input('jurusan','semua');

        $arrayJurusan=['OI','RPL','EI','BKP','DPIB','LAS','TPM'];
        if ($jurusan != 'semua' && !in_array($jurusan, $arrayJurusan)) {
             return redirect('/admin/index');
         } 

        $scrollTahun=$tahun;
        $profession=countProfesi($jurusan, $tahun);
        return view('admin.index', compact('scrollTahun','profession','jurusan'));
    }
    public function news()
    {
        return view('admin.news.index');
    }
    public function professions()
    {

        return view("admin.professions", [
            'professions' => Loker::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        return view('admin.edit', [
            'profession' => $profession

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profession $profession)
    {
        request()->validate([
            'name' => 'required',
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpeg,jpg,png,gif' : '',
            'company' => 'required',
            'owner' => 'required',
            'requirtmen' => 'required',
            'about' => 'required',
            'contactperson' => 'required',
            'statuse' => 'required',

        ]);
        // $post = time() . '.' . $request->file('thumbnail')->extension();
        // $request->file('thumbnail')->storeAs('public', $post);


        $profession->update([
            'name' => request('name'),
            'owner' => request('owner'),
            'user_id' => auth()->user()->id,
            'contactperson' => request('contactperson'),
            'company' => request('company'),
            'requirtmen' => request('requirtmen'),
            'statuse' => request('statuse'),
            'about' => request('about'),
            'slug' => Str::slug(request('name')),
            // 'thumbnail' => $thumbnail,
            // 'thumbnail' => request()->file('thumbnail')->store('public/storage/image/professions'),

        ]);
        $thumbnail = $request->file('thumbnail');
        if ($thumbnail) {
            $fileName = $thumbnail->getClientOriginalName();
            $data['thumbnail'] = $fileName;

            $proses = $thumbnail->move('public', $fileName);
        }



        return redirect('admin/professions')->with('success', 'Professions telah di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        if (auth()->user()->is($profession->author)) {
            $profession->delete();
            session()->flash("sukses", "The post was destroy");
            return redirect('admin/professions');
        } else {
            session()->flash("error", "It wasn't yout post");
            return redirect('admin/professions');
        }
    }
}
