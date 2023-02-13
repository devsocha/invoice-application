<?php

namespace App\Http\Controllers\credential;

use App\Http\Controllers\Controller;
use App\Mail\registrationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class forgetPasswordController extends Controller
{
    public function index(){
        return view('Credential.forgetPassword');
    }

    public function forgetPassword(Request $request){
        $request->validate([
            'email'=>'email|required',
        ]);
        $token = hash('sha256',time());
        try{
        $link = url('password-confirm/'.$token.'/'.$request->email);
        $subject = 'Potwierdzenie restartu hasła';
        $body = 'Cześć, <br><br> Zresetuj hasło klikając w link poniżej <br><br> <a href="'.$link.'">Link</a><br><br> Pozdrawia zespół DevSocha';
        Mail::to($request->email)->send(new registrationMail($subject,$body));
        return redirect()->route('loginpage')->with('success','Zresetowanie hasła, mail został wysłany.');
        }catch(\Exception $e){
        return redirect()->back()->with('error','Wystąpił błąd spróbuj ponownie później');
        }
    }
}
