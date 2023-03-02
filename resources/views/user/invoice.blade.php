@extends('user.layout.layout')
@section('title','Faktury')
@section('content')
    <div class="row g-3 m-1">
        <a href="{{route('newInvoice')}}" class="col-auto btn btn-primary m-3">Wystaw fakturę</a>
    </div>

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Numer faktury</th>
            <th scope="col">Wartość netto</th>
            <th scope="col">Status</th>
            <th scope="col">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invoices as $invoice)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$invoice->nazwa}}</td>
                <td>{{$invoice->kwotanetto*$invoice->ile}} zł</td>
                <td>{{$invoice->status}}</td>
                <td>
                    <a href="{{route('pdf.invoice',['id'=>$invoice->id])}}" class="btn btn-success">Pobierz</a>
                    @if($invoice->status=='Zapłacono')<a href="{{route('invoiceCreated',['id'=>$invoice->id])}}" class="btn btn-success">Zmień na wystawiona</a>@else<a href="{{route('invoicePaid',['id'=>$invoice->id])}}" class="btn btn-success">Zmień na zapłacone</a>@endif
                    <a href="#" class="btn btn-secondary">Edytuj</a>
                    <a href="{{route('invoiceRemove',['id'=>$invoice->id])}}" class="btn btn-danger">Usuń</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
