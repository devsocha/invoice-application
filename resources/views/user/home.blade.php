@extends('user.layout.layout')
@section('title','DevSocha - Strona główna')
@section('content')
<div class="row">
    <div class="col-3" style="border:1px solid black; height: 270px;border-radius: 5%">
        <center>Ostatnio dodane firmy</center>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Miasto</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$company->firma}}</td>
                    <td>{{$company->miasto}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-6"style="border:1px solid black; height: 270px;border-radius: 5%">
        <center> Ostatnio wystawione faktury</center>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Wartość netto</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$invoice->nazwa}}</td>
                    <td>{{$invoice->kwotanetto*$invoice->ile}}</td>
                    <td>{{$invoice->status}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-3"style="border:1px solid black; height: 270px;border-radius: 5%">
        <center> Podsumowanie (ostatnie 30 dni)</center>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nazwa</th>
                <th scope="col">Ilość</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Wystawione faktury: </td>
                    <td>{{$invoiceLastMonth}}</td>
                </tr>
                <tr>
                    <td>Opłacone faktury: </td>
                    <td>{{$invoicePaidLastMonth}}</td>
                </tr>
                <tr>
                    <td>Faktury oczekujące na płatność: </td>
                    <td>{{$invoiceNoPaidLastMonth}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
