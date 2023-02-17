@extends('user.layout.layout')
@section('title','Ustawienia konta')
@section('content')
<form method="post" action="{{route('userSettingsEditSubmit')}}">
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
        <label for="role" class="form-label">Rola</label>
        <select name="role"class="form-select" id="role"aria-label="Default select example">
            @if($person->rola == 1)
            <option value="0"selected>Użytkownik</option>
            <option value="2">Admin</option>
                @elseif($person->rola == 2)
                <option selected>Admin</option>
                <option value="1">Użytkownik</option>
            @endif
        </select>
    </div>
    <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
        <input type="submit" value="Edytuj" class="btn btn-success" >
        <a href="{{route('userSettingsEdit',['id'=>$person->id])}}" class="btn btn-danger">Resetuj wprowadzone zmiany</a>
        <a href="{{route('usersSettings')}}" class="btn btn-danger">Cofnij</a>
    </div>


</form>

@endsection
