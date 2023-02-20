<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\company;
use Illuminate\Http\Request;

class companyController extends Controller
{
    public function index(){
        $allCompanies = company::all();
        return view('user.company')->with([
            'companies'=>$allCompanies,
        ]);
    }
    public function companyDelete($id){
        try{
            company::where('id',$id)->delete();
            return redirect()->back()->with([
                'success'=>'Poprawnie usunięto firmę,'
            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }
    }
    public function companyAdd(){
        return view('user.companyAdd');
    }
    public function companyAddSubmit(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'adress'=>'required',
                'zipCode'=>'required',
                'city'=>'required',
                'nip'=>'required'
            ]);
            company::create([
                'firma'=>$request->name,
                'adres'=>$request->adress,
                'kodpocztowy'=>$request->zipCode,
                'miasto'=>$request->city,
                'nip'=>$request->nip,
            ]);
            return redirect()->back()->with([
                'success'=> 'Poprawnie dodano firmę',
            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później'.$e,
            ]);
        }
    }
    public function companyEdit($id){
        try{
            $company = company::where('id',$id)->first();
            return view('user.companyEdit')->with([
                'company'=>$company,
            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później'.$e,
            ]);
        }
    }
    public function companyEditSubmit(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'adress'=>'required',
                'zipCode'=>'required',
                'city'=>'required',
                'nip'=>'required'
            ]);
            company::where('id',$request->id)->update([
                'firma'=>$request->name,
                'adres'=>$request->adress,
                'kodpocztowy'=>$request->zipCode,
                'miasto'=>$request->city,
                'nip'=>$request->nip,
            ]);
            return redirect()->back()->with([
                'success'=>'Poprawnie poprawiono dane firmy',
            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później'.$e,
            ]);
        }
    }
    //TODO pobieranie danych do wyglądu oraz szablon wraz z całym backendem do tworzenia edycji i usuwania firm
}
