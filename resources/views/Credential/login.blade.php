@extends('Credential.layout')
@section('title','login - Aplikacja do wystawiania faktur')
@section('content')
    @include('alerts.error')
    @include('alerts.success')
    <div class="container-fluid" >
        <form style="width:400px; margin-left:auto;margin-right:auto;margin-top:100px" method="post" action="{{route('login.submit')}}" >
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Podaj email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Hasło</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Podaj hasło">
            </div>
            <button type="submit" class="btn btn-primary">Zaloguj</button>
        <a href="{{route('forget.password')}}" class="btn ">Zrestartuj hasło</a>
        </form>
    </div>


@endsection
