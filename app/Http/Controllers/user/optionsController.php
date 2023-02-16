<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class optionsController extends Controller
{
    public function accountSettings(){
        $person = Auth::guard('web')->user();
        return view('user.accountOptions')->with([
            'person'=>$person,
        ]);
    }
    public function accountSettingsUpdate(Request $request){
        $hashPassword = Auth::guard('web')->user()->password;
        if(Hash::check($request->password , $hashPassword)){
            try{
                $request->validate([
                    'name'=>'required|',
                    'secondName'=>'required',
                    'email'=>'required|email',
                    'password'=>'required',
                    'newPassword'=>'required'
                ]);
                User::where('id',$request->id)->update([
                    'imie'=>$request->name,
                    'nazwisko'=>$request->secondName,
                    'email'=> $request->email,
                    'password'=>Hash::make($request->newPassword),
                ]);
                return redirect()->back()->with([
                    'success'=>'Poprawnie zaktualizowano dane',
                ]);
            }catch(\Exception $e){
                return redirect()->back()->with([
                    'error'=>'Wystąpił błąd',
                ]);
            }
        }else{
            try{
                $request->validate([
                    'name'=>'required',
                    'secondName'=>'required',
                    'email'=>'required|email'
                ]);
                User::where('id',$request->id)->update([
                    'imie'=>$request->name,
                    'nazwisko'=>$request->secondName,
                    'email'=> $request->email,
                ]);
                return redirect()->back()->with([
                    'success'=>'Poprawnie zaktualizowano dane',
                ]);
            }catch(\Exception $e){
                return redirect()->back()->with([
                    'error'=>'Wystąpił błąd',
                ]);
            }
        }

    }
}
