@extends('user.layout.layout')
@section('title','Ustawienia konta')
@section('content')
    <form method="post" action="{{route('companySettingsSubmit')}}" enctype="multipart/form-data">
        @csrf
        <div class="containter-fluid" style="width:40%;margin-top:5%;margin-left:auto;margin-right: auto;" >
            <img src=""/>
            <label for="logo" class="visually-hidden">Logo</label>
            <input name="logo"type="file" class="form-control" id="logo">
        </div>
        <input type="hidden" name="id" value="">
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="nameCompany" class="form-label">Nazwa firmy</label>
            <input type="text" name="company" class="form-control" id="nameCompany" @if($company)value="{{$company->firma}}" @endif placeholder="Wpisz nazwę firmy">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="adress" class="form-label">Adres firmy</label>
            <input type="text" name="adress" class="form-control" id="adress" @if($company)value="{{$company->adres}}" @endif  placeholder="Wpisz adres firmy">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="zipCode" class="form-label">Kod pocztowy</label>
            <input type="text" name="zipCode" class="form-control" id="zipCode" @if($company)value="{{$company->kodpocztowy}}" @endif  placeholder="Wpisz kod pocztowy">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="city" class="form-label">Miasto</label>
            <input type="text" name="city" class="form-control" id="city" @if($company)value="{{$company->miasto}}" @endif  placeholder="Wpisz miasto">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="nip" class="form-label">NIP</label>
            <input type="number" name="nip" class="form-control" id="nip" @if($company)value="{{$company->nip}}" @endif  placeholder="Wpisz NIP">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <input type="submit" value="Edytuj" class="btn btn-success" >
            <a href="{{route('companySettings')}}" class="btn btn-danger">Resetuj wprowadzone zmiany</a>
        </div>
    </form>

@endsection
