<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reportsController extends Controller
{
    public function index(){
        return view('user.reports');
    }

    //TODO zaległe faktury
    //TODO Faktury oczekujące na płatność
    //TODO Faktury opłacone w okresie 7 dni
    //TODO Faktury opłacone w okresie 30 dni
}
