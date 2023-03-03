@extends('user.layout.layout')
@section('title','Nowa faktura')
@section('content')
    <form method="post" action="{{route('invoiceEditSubmit')}}">
        @csrf
        <input type="hidden" name="id" value="{{$invoice->id}}">
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="exampleDataList" class="form-label">Konto do przelewu</label>
            <input class="form-control" name="account" list="datalistOptions" id="exampleDataList" value="{{$invoice->ourAccountNumbers->nazwa}}" placeholder="Wybierz konto">
            <datalist name="account" id="datalistOptions">
                <option selected value="{{$invoice->ourAccountNumbers->nazwa}}">Numer: {{$invoice->ourAccountNumbers->numerkonta}}</option>
                @foreach($accounts as $account)<option value="{{$account->nazwa}}">Numer: {{$account->numerkonta}}</option>@endforeach
            </datalist>
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="time" class="form-label">Ile czasu do zapłaty</label>
            <input type="number" value="{{$invoice->czas}}" name="time" id="time">
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="nazwa" class="form-label">Nazwa produktu / usługi</label>
            <input type="text" value="{{$invoice->product}}"class="form-control" name="nameProduct" id="nazwa" >
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="ile" class="form-label">Ile sztuk</label>
            <input type="number" value="{{$invoice->ile}}"name="howMuch" id="ile" step="1" >
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <label for="netto" class="form-label">Kwota netto</label>
            <input type="number" name="netto" value="{{$invoice->kwotanetto}}"id="netto" step="0.01" >
        </div>
        <div class="containter-fluid" style="width:40%;margin-top:1%;margin-left:auto;margin-right: auto;">
            <input type="submit" value="Edytuj" class="btn btn-success" >
            <a href="{{route('invoice')}}" class="btn btn-danger">Cofnij</a>
        </div>
    </form>
@endsection
