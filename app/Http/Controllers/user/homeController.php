<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(){
        $companies = company::take(5)->orderBy('created_at','desc')->get();
        $data = date('d.m.Y',strtotime('-7day'));
        $dataMonth = date('d.m.Y',strtotime('-30day'));
        $invoiceLastMonth = invoice::where('created_at','>',$dataMonth)->count();
        $invoicePaidLastMonth = invoice::where('created_at','>',$dataMonth)->where('status','Zapłacono')->count();
        $invoiceNoPaidLastMonth = invoice::where('created_at','>',$dataMonth)->where('status','Wystawiona')->count();
        $invoices = invoice::where('created_at','>',$data)->take(5)->get();
        return view('user.home')->with([
            'companies'=>$companies,
            'invoices'=>$invoices,
            'invoiceLastMonth'=>$invoiceLastMonth,
            'invoicePaidLastMonth'=>$invoicePaidLastMonth,
            'invoiceNoPaidLastMonth'=>$invoiceNoPaidLastMonth,
        ]);
    }
}
