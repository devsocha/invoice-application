<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class optionsController extends Controller
{
    public function usersSettings(){
        $users = User::all();
        return view('admin.usersOptions')->with([
            'users'=>$users,
        ]);
    }
    public function userSettingsEdit($id)
    {
        try {
            $user = User::where('id', $id)->first();
            return view('admin.userSettingsEdit')->with([
                'person'=>$user,
            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }
    public function userSettingsEditUpdate(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'secondName'=>'required',
                'email'=>'required',
            ]);
            $user = User::where('id',$request->id)->first();
            if($request->role!=$user->rola && $request->role!=0){
                User::where('id',$request->id)->update([
                   'imie'=>$request->name,
                   'nazwisko'=>$request->secondName,
                   'email'=>$request->email,
                   'rola'=>$request->role,
                ]);

            }else{
                User::where('id',$request->id)->update([
                    'imie'=>$request->name,
                    'nazwisko'=>$request->secondName,
                    'email'=>$request->email,
                ]);
            }
            return redirect()->back()->with([
                'success' => 'Użytkownik został zaktualizowany',
            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }
    public function userSettingsDelete($id){
        try{
            User::where('id',$id)->delete();
            return redirect()->route('usersSettings')->with('success','Usunięto użytkownika');
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }
}
