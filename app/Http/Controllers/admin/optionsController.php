<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ourAccountNumbers;
use App\Models\ourCompanySettings;
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

    public function companySettings(){
        try{
            $company = ourCompanySettings::first();
            return view('admin.companySettings')->with([
                'company'=>$company,
            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później',
            ]);
            }
    }
    public function companySettingsEdit(Request $request){
        try{
            $request->validate([
                'company' =>'required',
                'adress'=>'required',
                'zipCode'=>'required',
                'city'=>'required',
                'nip'=>'required',
            ]);
            if(ourCompanySettings::exists()){
                ourCompanySettings::where('id',1)->update([
                    'firma'=>$request->company,
                    'adres'=>$request->adress,
                    'kodpocztowy'=>$request->zipCode,
                    'miasto'=>$request->city,
                    'nip'=>$request->nip,
                ]);
            }else{
                ourCompanySettings::create([
                    'firma'=>$request->company,
                    'adres'=>$request->adress,
                    'kodpocztowy'=>$request->zipCode,
                    'miasto'=>$request->city,
                    'nip'=>$request->nip,
                ]);
            }

            return redirect()->back()->with([
                'success' => 'Poprawnie zmieniono dane firmowe',
            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }
    public function numberAccountSettings(){
        $accounts = ourAccountNumbers::all();
        return view('admin.companyAccountsOptions')->with([
            'accounts'=>$accounts,
        ]);
    }
    public function numberAccountSettingsUpdate(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'number'=>'required'
            ]);
            if(ourAccountNumbers::where('nazwa',$request->name)->exists()){
                return redirect()->back()->with([
                    'error' => 'Konto o takiej nazwie już istnieje.',
                ]);
            }else{
                ourAccountNumbers::create([
                    'nazwa'=>$request->name,
                    'numerkonta'=>$request->number,
                ]);
                return redirect()->back()->with([
                    'success' => 'Konto zostało poprawnie dodane.',
                ]);
            }
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }
    public function numberAccountSettingsDelete($id){
        try{
            ourAccountNumbers::where('id',$id)->delete();
            return redirect()->back()->with([
                'success' => 'Poprawnie usunięto numer konta',
            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }
    public function numberAccountSettingsEdit($id){
        try{
            $account = ourAccountNumbers::where('id',$id)->first();
            return view('admin.companyAccountEdit')->with([
                'account'=>$account,
            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }
    public function numberAccountSettingsEditSubmit(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'number'=>'required',
                'id'=>'required',
            ]);
            ourAccountNumbers::where('id',$request->id)->update([
                'nazwa'=>$request->name,
                'numerkonta'=>$request->number,
            ]);
            return redirect()->back()->with([
                'success'=>'Poprawnie zapisano zmiany',
            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }
}
