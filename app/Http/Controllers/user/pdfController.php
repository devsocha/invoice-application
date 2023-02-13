<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
class pdfController extends Controller
{
    public function pdf(){
        $pdf = Pdf::loadView('pdf.layout')/*->save(public_path().'/generate/pdf/testowy.pdf')*/;
        return $pdf ->download('testowy.pdf');
    }
}
