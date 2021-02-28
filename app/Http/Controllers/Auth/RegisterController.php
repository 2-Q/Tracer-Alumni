<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function showRegistrationForm()
    {
        return view('auth.register2');
    }

    // public function checkNISN(Request $request)
    // {

    //     $user=Siswa::where('nisn','=', $request->nisn)->first();
    //     if ($user != null) {

    //         if ($user->user_id == null) {
    //             $user->angkatan== $request->tahunLulus;
    //         }else{
    //             user telah punya akun
    //         }

    //     }else{
    //         siswa tidak ada
    //     }
    //         switch (true) {
    //             case !is_null($user):
    //                 return false;
    //                 break;
    //             case $request->tahunLulus>2015:
    //                 return view('auth.createPassword');
    //                 break;
    //             default:
    //                 return view('auth.introForm2');
    //                 break;
    //         }
    // }

        public function checkNISN(Request $request)
    {
        $user=Siswa::where([
            ['user_id','=', null],
            ['nisn','=', $request->nisn]
            ])->first();
        if (!is_null($user)) {
            Session::put('nisn', $request->nisn);
            return view('auth.createPassword');
        }else{
            return false;
        }
    }

    public function submit(Request $request)
    {
        $siswa=Siswa::where('nisn','=', Session::get('nisn'))->first();
        // if ($siswa->token == $request->token) {
            $user=User::create([
            // 'role' => "siswa",
            'email' => $siswa->nisn,
            'password' => Hash::make($request->password),
            ]);

            $siswa->user_id=$user->id;
            $siswa->save();
            auth()->loginUsingId($user->id);
            return true;
        // }
        // return false;
    }

    public function introForm()
    {
        return view('auth.introForm');
    }
    public function introPost(Request $request)
    {

        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        Siswa::create([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->tahunLulus-1955
        ]);
        return redirect('/register');
    }
}
