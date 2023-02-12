@extends('Credential.layout')
@section('title','confirm password')
@section('content')
    @include('alerts.error')
    @include('alerts.success')
    <div class="container-fluid" >
        <form style="width:400px; margin-left:auto;margin-right:auto;margin-top:100px" method="post" action="{{route('login.submit')}}" >
            @csrf
            <input type="hidden" name="token" value="{{$token}}">
            <input type="hidden" name="email" value="{{$email}}">
            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Hasło</label>
                <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Podaj hasło">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Powtórz hasło</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="reTypePassword" placeholder="Podaj ponownie hasło">
            </div>
            <button type="submit" class="btn btn-primary">Potwierdź</button>
            @include('alerts.error')
            <a href="{{route('loginpage')}}" class="btn ">Wróć do logowania</a>
        </form>
    </div>
@endsection
