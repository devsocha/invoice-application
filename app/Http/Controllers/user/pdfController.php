<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\invoice;
use App\Models\ourCompanySettings;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
class pdfController extends Controller
{
    public function pdf($id){
        try{
            $faktura = invoice::where('id',$id)->first();
            $settings = ourCompanySettings::first();
            Pdf::setOption(['dpi' => 96, 'defaultFont' => 'DejaVu Sans']);
            $pdf = Pdf::loadView('pdf.invoice',compact('faktura','settings'));/*->save(public_path().'/generate/pdf/testowy.pdf')*/;

            return $pdf ->download($faktura->nazwa);
//            return redirect()->back()->with([
//                'success'=>'Poprawnie wygenerowano pdf',
//            ]);
        }catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Wystąpił błąd, spróbuj ponownie później',
            ]);
        }

    }
}
