@extends('admin.layout.layout')
@section('title','Ustawienia użytkowników')
@section('content')
    <form class="row g-3 m-1" method="post"action="{{route('usersSettings.submit')}}">
        @csrf
        <div class="col-auto">
            <label for="Email2" class="visually-hidden">Email</label>
            <input name="email"type="text" class="form-control" id="Email2" placeholder="Wpisz email">
        </div>
        <div class="col-auto">
            <label for="imie" class="visually-hidden">Imie</label>
            <input name="name" type="text" class="form-control" id="imie" placeholder="Wpisz imię">
        </div>
        <div class="col-auto">
            <label for="nazwisko" class="visually-hidden">Nazwisko</label>
            <input name="secondName" type="text" class="form-control" id="nazwisko" placeholder="Wpisz nazwisko">
        </div>
        <div class="col-auto">
            <select name="role"class="form-select" aria-label="Default select example">
                <option value="0"selected>Wybierz role</option>
                <option value="1">Użytkownik</option>
                <option value="2">Admin</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Dodaj usera</button>
        </div>
    </form>
    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Rola</th>
            <th scope="col">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$user->email}}</td>
                <td>{{$user->imie}}</td>
                <td>{{$user->nazwisko}}</td>
                <td>
                @if($user->rola==1)Użytkownik @elseif($user->rola==2)Admin @endif
                </td>
                <td>
                    <a href="{{route('userSettingsEdit',['id'=>$user->id])}}" class="btn btn-success">Edytuj</a>
                    <a href="{{route('userSettingsDelete',['id'=>$user->id])}}" class="btn btn-danger">Usuń</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
