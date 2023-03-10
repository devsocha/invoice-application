@extends('user.layout.layout')
@section('title','Dodawanie firmy')
@section('content')
    <form method="post" action="{{route('companyAddSubmit')}}">
        @csrf
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="name" class="form-label">Nazwa firmy</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Wpisz nazwę firmy">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="adress" class="form-label">Adres</label>
            <input type="text" name="adress" class="form-control" id="adress"  placeholder="Wpisz adres firmy ">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="zipCode" class="form-label">Kod pocztowy</label>
            <input type="text" name="zipCode" class="form-control" id="zipCode"  placeholder="Wpisz kod pocztowy ">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="city" class="form-label">Miasto</label>
            <input type="text" name="city" class="form-control" id="city"  placeholder="Wpisz miasto ">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="nip" class="form-label">Numer NIP</label>
            <input type="text" name="nip" class="form-control" id="nip" value="" placeholder="Wpisz numer NIP">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <input type="submit" value="Dodaj" class="btn btn-success" >
            <a href="{{route('company')}}" class="btn btn-danger">Cofnij</a>
        </div>
    </form>
@endsection
