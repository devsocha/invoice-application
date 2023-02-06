<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(){
        //TODO 10 ostatnich faktur
        // obrót ostatnie 30 dni
        // zaległe faktury 10
        return view('user.home');
    }
}
