<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\invoice;
use Illuminate\Http\Request;

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
            return view('user.newInvoice');
        }catch(\Exception $e){
            return redirect()->back()->with([
                'error'=>'Wystąpił błąd',
            ]);
        }
    }
}
