@extends('pdf.layout')
@section('title','faktura')
@section('content')
    <div class="container-fluid">
        <div >
            <div style="margin-top:40px;width:45%; margin-right: 10%; float:left;">
                <h1>LOGO FIRMY</h1>
            </div>
            <div  style="width:45%; float:left;margin-top:40px">
                <div class="text-center" style="border:1px solid black;text-align:center;">Miejsce wystawienia</div>
                <div class="text-center">Warszawa</div>
                <div class="text-center" style="border:1px solid black;text-align:center;">Data wystawienia</div>
                <div class="text-center">20/03/2023</div>
            </div>
        </div><br>
        <div style="clear:both;margin-left:auto; margin-right: auto;">
            <div style="width:43%; float:left;border:2px solid black;margin-right: 10%; margin-top: 40px;padding: 5px;">
                <b>Przykład Sp. z o.o.</b> <br>
                ul.Przykładowa 15 <br>
                05-102 Warszawa <br>
                NIP: 123456789<br>
            </div>
            <div  style="width:43%; float:left;border:2px solid black; margin-top: 40px;padding: 5px;">
                <b>Przykład Sp. z o.o.</b> <br>
                ul.Przykładowa 15 <br>
                05-102 Warszawa <br>
                NIP: 123456789 <br>
            </div>
        </div>
        <div style=" clear: both;">
            <div style="text-align: center; padding-top: 5%">
                <h1>Faktura VAT 12/3/2023 </h1>
            </div>
        </div>
        <div >
            <div >
                Przelew w ciągu 4 dni na numer konta: <b>1234 5678 9123 45</b>

            </div>
        </div>
        <table style="border:1px solid black" >
            <thead style="background-color: black; color:white;">
            <tr class="text-center">
                <th scope="col">Produkt</th>
                <th scope="col">Ilość</th>
                <th scope="col">Cena netto</th>
                <th scope="col">Wartość netto</th>
                <th scope="col">VAT</th>
                <th scope="col">Wartość brutto</th>
            </tr>
            </thead>
            <tbody>
            <tr class="text-center">
                <th>Licencja na oprogramowanie do wystawiania faktur</th>
                <td>1</td>
                <td>1000 zł</td>
                <td>1000 zł</td>
                <td>230 zł</td>
                <td>1230 zł</td>
            </tr>
            </tbody>
        </table>
        <div style="margin-top: 10%;">
            <div style="width:50%;float:left; text-align: center">
                Konrad Socha <br>
                ------------------<br>
                Wystawił
            </div>
            <div style="width:50%;float:left; text-align: center">
                <br>
                ------------------<br>
                Odebrał
            </div>
        </div>
    </div>

@endsection
