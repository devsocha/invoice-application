@extends('pdf.layout')
@section('title','faktura')
@section('content')
    <div class="container-fluid">
        <div >
            <div style="margin-top:40px;width:45%; margin-right: 10%; float:left;">
                    <h1>{{$settings->firma}}</h1>
            </div>
            <div  style="width:45%; float:left;margin-top:40px">
                <div class="text-center" style="border:1px solid black;text-align:center;">Miejsce wystawienia</div>
                <div class="text-center">{{$settings->miasto}}</div>
                <div class="text-center" style="border:1px solid black;text-align:center;">Data wystawienia</div>
                <div class="text-center">@php echo date('d.m.Y',strtotime($faktura->created_at));/* Błąd pokazuje ale działa poprawnie */@endphp</div>
            </div>
        </div><br>
        <div style="clear:both;margin-left:auto; margin-right: auto;">
            <div style="width:43%; float:left;border:2px solid black;margin-right: 10%; margin-top: 40px;padding: 5px;">
                <b>{{$settings->firma}}</b> <br>
                {{$settings->adres}} <br>
                {{$settings->kodpocztowy}} {{$settings->miasto}} <br>
                NIP: {{$settings->nip}}<br>
            </div>
            <div  style="width:43%; float:left;border:2px solid black; margin-top: 40px;padding: 5px;">
                <b>{{$faktura->company->firma}}</b> <br>
                {{$faktura->company->adres}} <br>
                {{$faktura->company->kodpocztowy}} {{$faktura->company->miasto}} <br>
                NIP: {{$faktura->company->nip}} <br>
            </div>
        </div>
        <div style=" clear: both;">
            <div style="text-align: center; padding-top: 5%">
                <h1>{{$faktura->nazwa}} </h1>
            </div>
        </div>
        <div >
            <div >
                Przelew w ciągu {{$faktura->czas}} dni na numer konta: <b>{{$faktura->ourAccountNumbers->numerkonta}}</b>

            </div>
        </div>
        <table style="border:1px solid black; width:100%" >
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
                <th>{{$faktura->product}}</th>
                <td>{{$faktura->ile}}</td>
                <td>{{$faktura->kwotanetto}} zł</td>
                <td>{{$faktura->kwotanetto*$faktura->ile}} zł</td>
                <td>{{$faktura->kwotanetto*$faktura->ile*$faktura->procentvat-$faktura->kwotanetto*$faktura->ile}} zł</td>
                <td>{{$faktura->kwotabrutto*$faktura->ile}} zł</td>
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
