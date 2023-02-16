@extends('user.layout.layout')
@section('title','Ustawienia konta')
@section('content')
    <form method="post" action="{{route('accountSettings.submit')}}">
        @csrf
        <input type="hidden" name="id"value="{{$person->id}}">
        <div class="containter-fluid" style="width:40%;margin-top:5%;margin-left:auto;margin-right: auto;">
            <label for="exampleFormControlEmail1" class="form-label">Adres email</label>
            <input type="text" name="email" class="form-control" id="exampleFormControlEmail1" value="{{$person->email}}" placeholder="{{$person->email}}">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="exampleFormControlName1" class="form-label">Imie</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlName1" value="{{$person->imie}}" placeholder="{{$person->imie}}">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="exampleFormControlSecondName1" class="form-label">Nazwisko</label>
            <input type="text" name="secondName" class="form-control" id="exampleFormControlSecondName1" value="{{$person->nazwisko}}" placeholder="{{$person->nazwisko}}">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="exampleFormControlPassword1" class="form-label">Obecne hasło</label>
            <input type="password"name="password" class="form-control" id="exampleFormControlPassword1" placeholder="Wpisz obecne hasło">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="exampleFormControlPassword2" class="form-label">Nowe hasło</label>
            <input type="password" name="newPassword" class="form-control" id="exampleFormControlPassword2" placeholder="Wpisz nowe hasło">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <input type="submit" class="btn btn-success" >
            <a href="{{route('accountSettings')}}" class="btn btn-danger">Restartuj zmiany</a>
        </div>


    </form>

@endsection
