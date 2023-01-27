<?php

namespace App\Http\Controllers\credential;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view('Credential.login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password'=>'required',
        ]);
        $credentials = [
            'email' =>$request->email,
            'password'=>$request->password,
            'status'=> 0,
        ];
        if(Auth::attempt($credentials)){
            if(Auth::guard('web')->user()->rola==1){
                return redirect()->route('home');
            }
            if(Auth::guard('web')->user()->rola==2){
                return redirect()->route('admin.home');
            }
        }
    }
    public function registerSubmit(Request $request){
        $token = hash('sha256',time());

    }
}
