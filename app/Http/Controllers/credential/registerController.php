<?php

namespace App\Http\Controllers\credential;

use App\Http\Controllers\Controller;
use App\Mail\registrationMail;
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

    }
    public function registerVerifySubmit(Request $request){

    }
}
