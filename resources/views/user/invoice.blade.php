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
            <th scope="col">Kwota netto</th>
            <th scope="col">Status</th>
            <th scope="col">Akcje</th>
        </tr>
        </thead>
        <tbody>
{{--        @foreach($invoices as $invoice)--}}
{{--            <tr>--}}
{{--                <th scope="row">{{$loop->iteration}}</th>--}}
{{--                <td>{{$invoice->nazwa}}</td>--}}
{{--                <td>{{$invoice->kwota netto}}</td>--}}
{{--                <td>--}}
{{--                    <a href="{{route('companyEdit',['id'=>$company->id])}}" class="btn btn-success">Edytuj</a>--}}
{{--                    <a href="{{route('companyDelete',['id'=>$company->id])}}" class="btn btn-danger">Usuń</a>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
    </table>
@endsection
