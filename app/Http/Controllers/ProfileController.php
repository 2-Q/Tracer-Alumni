<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Profession;
use App\Models\Achievement;
use App\Models\Pengalaman;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        // dd($user->Achievement);
        return view('profile.profile',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user=Auth::user();
        return view('profile.editProfile',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user=Siswa::where('user_id','=', Auth::user()->id)->first();
        // $user->melanjutkan=$request->melanjutkan;
        $user->deskripsi=$request->deskripsi;
        $user->link=$request->link;
        $user->save();

        $pekerjaan=Profession::where('user_id','=', Auth::user()->id)->first();
        if (!is_null($pekerjaan)) {
            $pekerjaan->delete();
        }
        $profession = new Profession;
        $profession->user_id=Auth::user()->id;
        $profession->profession=$request->profession;
        $profession->lokasi=$request->lokasi;
        $profession->save();

        return redirect(Route('profile'));
    }
    public function updatePassword(Request $request)
    {
        $checkOldPass= password_verify($request->oldPass, Auth::user()->password);
        if ($checkOldPass) {
            $user=user::find(Auth::user()->id);
            $user->password = \Hash::make($request->newPass);
            $user->save();
        }
        return $checkOldPass;
    }
    public function updateFoto(Request $request)
    {
        $name=date("Ymdhis").Auth::user()->id.'.'.$request->file('gambar')->getClientOriginalExtension(); //===tetap
        switch ($request->file('gambar')->getClientOriginalExtension()) {
            case 'jpg':
                $image=imagecreatefromjpeg($request->file('gambar'));
                break;
            case 'png':
                $image=imagecreatefrompng($request->file('gambar'));
                break;
            case 'gif':
                $image=imagecreatefromgif($request->file('gambar'));
                break;
            default:
                return redirect()->back();
                break;
        }
        $start=getimagesize($request->file('gambar'));
        $ukuran=min($start[0],$start[1]);
        $x=0;
        $y=0;
        if ($start[0]>$start[1]) {
            $x=(max($start[0],$start[1])-min($start[0],$start[1]))/2;
        }else{
            $y=(max($start[0],$start[1])-min($start[0],$start[1]))/2;
        }
        $crop=imagecrop($image,['x'=>$x, 'y'=>$y, 'width'=>$ukuran, 'height'=>$ukuran]);

        if ($crop !== FALSE) {
            imagejpeg($crop, 'images/'.$name);
        }
        $user=user::find(Auth::user()->id);
        $user->avatar=$name;
        $user->save();
        return redirect()->back();
    }
    public function prestasi(Request $request)
    {
        $prestasi= new Achievement;
        $prestasi->user_id = Auth::user()->id;
        $prestasi->title = $request->title;
        $prestasi->rank = $request->rank;
        $prestasi->tingkat = $request->tingkat;
        $prestasi->tahun = $request->tahun;
        $prestasi->save();
        return redirect()->back();
    }

    public function deletePrestasi(Request $request)
    {
        $me=Achievement::findOrFail($request->id);
        $me->delete();
        return redirect()->back();
    }

    public function pengalaman(Request $request)
    {
        // dd($request->all());
        $pengalaman= new Pengalaman;
        $pengalaman->user_id = Auth::user()->id;
        $pengalaman->title = $request->title;
        $pengalaman->sebagai = $request->sebagai;
        $pengalaman->penyelenggara = $request->penyelenggara;
        $pengalaman->tahun = $request->tahun;
        $pengalaman->keterangan = $request->keterangan;
        $pengalaman->save();
        return redirect()->back();
    }

    public function deletePengalaman(Request $request)
    {
        $me=Pengalaman::findOrFail($request->id);
        $me->delete();
        return redirect()->back();
    }
}
