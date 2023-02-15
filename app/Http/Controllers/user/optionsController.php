<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class optionsController extends Controller
{
    public function accountSettings(){
        return view('user.accountOptions');
    }
}
