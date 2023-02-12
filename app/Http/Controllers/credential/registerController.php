<?php

namespace App\Http\Controllers\credential;

use App\Http\Controllers\Controller;
use App\Mail\registrationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class registerController extends Controller
{
    public function registerSubmit(Request $request){
        $token = hash('sha256',time());
        $link = 'sss';
        $subject = 'Potwierdzenie rejestracji konta';
        $body = 'Cześć, <br><br> Potwierdz swoje konto klikając w link poniżej <br><br> <a href="'.$link.'">Link</a><br><br> Pozdrawia zespół DevSocha';
        Mail::to($request->email)->send(new registrationMail($subject,$body));
    }
    public function registerVerify($token,$email){
        if(!User::where('token',$token)->where('email',$email)->exists()){
            return view('Credential.confirmPassword')->with([
                'token'=>$token,
                'email'=>$email
            ]);
        }else{
            return view('Credential.confirmPassword');
        }
    }
    public function registerVerifySubmit(Request $request){

    }
}
