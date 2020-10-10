<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Session;

use function PHPSTORM_META\elementType;

class AuthController extends Controller{

    //function untuk menampilkan halaman register
    public function register(){
        return view('auth.register');
    }

    //function untuk mengakses registrasi
    public function registration(Request $request){
        $rules = [
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|min:8',
            'password' => 'required|min:8|confirmed',
            'role' => 'required'
        ];

        $message = [
            'email.email' => 'Email is not valid',
            'email.unique' => 'Email is already used',
            'username.min' => 'Username must be at least 8 characters',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => "Password and Confirmation doesn't match",
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }else{
            $user = User::create([
                'id_user' => $request->id_user,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => $request->role
                ]);

                if($user){
                    return redirect('/login');
                }else{
                return redirect()->back();
            }
        }
    }

    //function untuk menampilkan form login
    public function index(){
        return view('auth.login');
    }

    //function untuk login. menggunakan session
    public function login(Request $request ){
        $data = User:: where ('username', $request->username)->firstOrFail();
        if($data){
            if(Hash::check($request->password, $data->password)){
                if($data->role == 'admin'){
                    session(['login_role' => 'admin']); //session untuk admin
                    return redirect()->route('admin');
                }else if( $data->role == 'penerbit'){
                    session(['login_role' => 'penerbit']); //session untuk penerbit
                    return redirect()->route('penerbit');
                }
            }else{
                return redirect()->back()->with('error','Wrong Password!');
            }
        }else{
            return redirect()->back()->with('error','Wrong Username!');
        }
    }

    //function logout
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}
