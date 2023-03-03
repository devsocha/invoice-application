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
    <div class="col-6">sss</div>
    <div class="col-3">sss</div>
</div>

@endsection
