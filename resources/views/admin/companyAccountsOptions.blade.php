@extends('admin.layout.layout')
@section('title','Ustawienia użytkowników')
@section('content')
    <form class="row g-3 m-1" method="post"action="{{route('numberAccountSettingsSubmit')}}">
        @csrf

        <div class="col-auto">
            <label for="nazwa" class="visually-hidden">Nazwa</label>
            <input name="name"type="text" class="form-control" id="nazwa" placeholder="Wpisz nazwe">
        </div>
        <div class="col-auto">
            <label for="number" class="visually-hidden">Numer konta</label>
            <input name="number" type="text" class="form-control" id="number" placeholder="Wpisz numer konta">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Dodaj konto</button>
        </div>
    </form>
    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Numer konta</th>
            <th scope="col">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$account->nazwa}}</td>
                <td>{{$account->numerkonta}}</td>
                <td>
                    <a href="{{route('numberAccountSettingsEdit',['id'=>$account->id])}}" class="btn btn-success">Edytuj</a>
                    <a href="{{route('numberAccountSettingsDelete',['id'=>$account->id])}}" class="btn btn-danger">Usuń</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
