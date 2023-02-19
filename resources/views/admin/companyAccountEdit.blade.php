@extends('user.layout.layout')
@section('title','Ustawienia konta')
@section('content')
    <form method="post" action="{{route('numberAccountSettingsEditSubmit')}}">
        @csrf
        <input type="hidden" name="id" value="{{$account->id}}">
        <div class="containter-fluid" style="width:40%;margin-top:5%;margin-left:auto;margin-right: auto;">
            <label for="name" class="form-label">Nazwa</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$account->nazwa}}" placeholder="Wpisz nazwę ">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="accountNumber" class="form-label">Numer konta</label>
            <input type="text" name="number" class="form-control" id="accountNumber" value="{{$account->numerkonta}}" placeholder="Wpisz numer konta">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <input type="submit" value="Edytuj" class="btn btn-success" >
            <a href="{{route('numberAccountSettingsEdit',['id'=>$account->id])}}" class="btn btn-danger">Resetuj wprowadzone zmiany</a>
            <a href="{{route('numberAccountSettings')}}" class="btn btn-danger">Cofnij</a>
        </div>
    </form>
@endsection
