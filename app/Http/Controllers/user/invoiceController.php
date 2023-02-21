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
}
