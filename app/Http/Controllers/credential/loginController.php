<?php

namespace App\Http\Controllers\credential;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function index(){
        try{
            if(User::exists()){
                return view('Credential.login');
            }
            User::create([
                'imie' => 'admin',
                'nazwisko'=>'admin',
                'email'=> 'admin@example.pl',
                'rola'=>2,
                'status'=>1,
                'password'=>Hash::make('admin')
            ]);
            return view('Credential.login');
        }catch(\Exception $e){
            return view('Credential.login')->with(['error'=>'Brak połączenia z bazą danych']);
        }

    }
    public function login(Request $request){
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required',
            ]);
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
                'status' => 1,
            ];

            if (Auth::attempt($credentials)) {
                return redirect()->route('user.home');
            }else{
                return redirect()->route('loginpage');
            }
        }catch (\Exception $e){
            return redirect()->route('loginpage');
        }
    }
    public function logout(){
         Auth::logout();
         return redirect()->route('loginpage');
    }
}
