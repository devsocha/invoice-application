@extends('user.layout.layout')
@section('title','Firmy')
@section('content')
    <div class="row g-3 m-1">
        <a href="#" class="col-auto btn btn-primary m-3">Dodaj nową firmę</a>
    </div>

        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa firmy</th>
                <th scope="col">NIP</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
{{--            @foreach($accounts as $account)--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{$loop->iteration}}</th>--}}
{{--                    <td>{{$account->nazwa}}</td>--}}
{{--                    <td>{{$account->numerkonta}}</td>--}}
{{--                    <td>--}}
{{--                        <a href="{{route('numberAccountSettingsEdit',['id'=>$account->id])}}" class="btn btn-success">Edytuj</a>--}}
{{--                        <a href="{{route('numberAccountSettingsDelete',['id'=>$account->id])}}" class="btn btn-danger">Usuń</a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
        </table>
@endsection
