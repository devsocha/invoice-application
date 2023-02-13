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
        $request->validate([
            'imie'=>'text|required|max:25',
            'nazwisko'=>'text|required|max:45',
            'email'=>'email|required|max:255',
        ]);
        try{
            if(User::where('email',$request->email)->exists()){
                return redirect()->back()->with(['error'=>'Konto już istnieje.']);
            }
            User::create([
                'imie'=>$request->imie,
                'nazwisko'=>$request->nazwisko,
                'email'=>$request->email,
                'token'=>$token,
                'rola'=>1,
                'status'=>0,
            ]);
            $link = url('password-confirm/'.$token.'/'.$request->email);
            $subject = 'Potwierdzenie rejestracji konta';
            $body = 'Cześć, <br><br> Potwierdz swoje konto klikając w link poniżej <br><br> <a href="'.$link.'">Link</a><br><br> Pozdrawia zespół DevSocha';
            Mail::to($request->email)->send(new registrationMail($subject,$body));
            return redirect()->back()->with('success','Poprawne zarejestrowanie konta, mail został wysłany.');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Wystąpił błąd spróbuj ponownie później');
        }
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
