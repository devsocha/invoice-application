<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\invoice;
use App\Models\ourAccountNumbers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class invoiceController extends Controller
{
    public function index(){
        $invoices = invoice::all();
        return view('user.invoice')->with([
            'invoices'=>$invoices,
        ]);
    }
    public function newInvoice(){
        try{
            $companies = company::all();
            $accounts = ourAccountNumbers::all();
            return view('user.newInvoice')->with([
                'companies'=>$companies,
                'accounts'=>$accounts,
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([
                'error'=>'Wystąpił błąd',
            ]);
        }
    }
    public function newInvoiceAdd(Request $request){
        try{
            $idCompany =1;
            $request->validate([
                'opcja'=>'required',
                'account'=>'required',
                'time'=>'required',
                'nameProduct'=>'required',
                'howMuch'=>'required',
                'netto'=>'required',
                'vat'=>'required',
            ]);
            if($request->opcja=='opcja1'){
                $request->validate(['company'=>'required']);
                $company = company::where('firma',$request->company)->first();
                $idCompany = $company->id;
            }elseif($request->opcja=='opcja2'){
                $request->validate([
                    'name'=>'required',
                    'adress'=>'required',
                    'zipCode'=>'required',
                    'city'=>'required',
                    'nip'=>'required',
                ]);
                if(company::where('nip',$request->nip)->where('firma',$request->name)->exists()){
                    return redirect()->back()->with([
                        'error'=>'Ta firma już istnieje, wybierz ją z listy firm',
                    ]);
                }else{
                    company::create([
                        'firma'=>$request->name,
                        'adres'=>$request->adress,
                        'kodpocztowy'=>$request->zipCode,
                        'miasto'=>$request->city,
                        'nip'=>$request->nip,
                    ]);
                    $company = company::where('nip',$request->nip)->where('firma',$request->name)->first();
                    $idCompany = $company->id;
                }
            }
            $nrInvoice = invoice::where('rok',date('Y'))->count();
            $nrInvoice += 1;
            $idUser = Auth::guard('web')->user()->id;
            $account = ourAccountNumbers::where('nazwa',$request->account)->first();
            $idAccount = $account->id;
            invoice::create([
                'nazwa'=>'Faktura nr '.$nrInvoice.'/'.date('m').'/'.date('Y'),
                'idFirmy'=>$idCompany,
                'idKonta'=>$idAccount,
                'czas'=>$request->time,
                'osoba'=>$idUser,
                'status'=>'Wystawiona',
                'product'=>$request->nameProduct,
                'kwotanetto'=>$request->netto,
                'procentvat'=>$request->vat,
                'ile'=>$request->howMuch,
                'kwotabrutto'=>$request->netto*$request->vat,
                'rok'=>date('Y'),
            ]);
            return redirect()->back()->with([
                'success'=>'Poprawnie wystawiono fakturę',
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([
                'error'=>'Wystąpił błąd',
            ]);
        }
    }
    public function deleteInvoice($id){
        try{
            invoice::where('id',$id)->delete();
            return redirect()->back()->with([
                'success'=>'Poprawnie usunięto fakturę',
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([
                'error'=>'Wystąpił błąd',
            ]);
        }
    }
    public function paidInvoice($id){
        try{
            invoice::where('id',$id)->update([
                'status'=>'Zapłacono'
            ]);
            return redirect()->back()->with([
                'success'=>'Zapłacono fakturę',
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([
                'error'=>'Wystąpił błąd',
            ]);
        }
    }
    public function createdInvoice($id){
        try{
            invoice::where('id',$id)->update([
                'status'=>'Wystawiona'
            ]);
            return redirect()->back()->with([
                'success'=>'Poprawnie cofnięto status faktury',
            ]);
        }catch(\Exception $e){
            return redirect()->back()->with([
                'error'=>'Wystąpił błąd',
            ]);
        }
    }
}
