<?php

namespace App\Http\Controllers\credential;

use App\Http\Controllers\Controller;
use App\Mail\registrationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class registerController extends Controller
{
    public function registerSubmit(Request $request){
        $token = hash('sha256',time());
        $request->validate([
            'name'=>'required',
            'secondName'=>'required',
            'email'=>'required|email',
            'role'=>'required'
        ]);
        try{
            if(User::where('email',$request->email)->exists()){
                return redirect()->back()->with(['error'=>'Konto już istnieje.']);
            }
            User::create([
                'imie'=>$request->name,
                'nazwisko'=>$request->secondName,
                'email'=>$request->email,
                'token'=>$token,
                'rola'=>$request->role,
                'status'=>0,
            ]);
            $link = url('password-confirm/'.$token.'/'.$request->email);
            $subject = 'Potwierdzenie rejestracji konta';
            $body = 'Cześć, <br><br> Potwierdz swoje konto klikając w link poniżej <br><br> <a href="'.$link.'">Link</a><br><br> Pozdrawia zespół DevSocha';
            Mail::to($request->email)->send(new registrationMail($subject,$body));
            return redirect()->back()->with('success','Poprawne zarejestrowanie konta, mail został wysłany.');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Wystąpił błąd spróbuj ponownie później'.$request->role);
        }
    }
    public function registerVerify($token,$email){
        if(!User::where('token',$token)->where('email',$email)->exists()){
            echo 'ERROR - Błędne dane';
        }else{
            return view('Credential.confirmPassword',compact('token','email'));
        }
    }
    public function registerVerifySubmit(Request $request){
        try{
            $request->validate([
               'token'=>'required',
               'email'=>'email|required',
               'password'=>'required',
                'reTypePassword'=>'required|same:password',
            ]);
            User::where('token',$request->token)->where('email',$request->email)->update([
                'token'=>'',
                'status'=>1,
                'password'=>Hash::make($request->password),
            ]);
            return redirect()->route('loginpage')->with([
                'success'=>'Wszystko przebiegło pomyślnie',
            ]);
        }catch (\Exception $e){
            return redirect()->back()->with([
                'error'=>'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }
}
