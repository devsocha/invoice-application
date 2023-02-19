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

    //TODO pobieranie danych do wyglądu oraz szablon wraz z całym backendem do tworzenia edycji i usuwania firm
}
