<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
class pdfController extends Controller
{
    public function pdf(){
        Pdf::setOption(['dpi' => 96, 'defaultFont' => 'DejaVu Sans']);
        $pdf = Pdf::loadView('pdf.invoice')/*->save(public_path().'/generate/pdf/testowy.pdf')*/;

//        return $pdf ->download('testowy.pdf');
        return view('pdf.invoice');
    }
}
