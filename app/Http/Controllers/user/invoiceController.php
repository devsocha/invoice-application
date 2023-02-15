<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class invoiceController extends Controller
{
    public function index(){
        return view('user.invoice');
    }
}
