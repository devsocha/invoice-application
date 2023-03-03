<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(){
        $companies = company::take(5)->orderBy('created_at','desc')->get();
        return view('user.home')->with([
            'companies'=>$companies,
        ]);
    }
}
