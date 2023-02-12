@extends('Credential.layout')
@section('title','Forget password')

@section('content')
    @include('alerts.error')
    @include('alerts.success')
    <div class="container-fluid" >
        <form style="width:400px; margin-left:auto;margin-right:auto;margin-top:100px" method="post" action="{{route('login.submit')}}" >
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Podaj email">
            </div>
            <button type="submit" class="btn btn-primary">Resetuj</button>
            @include('alerts.error')
            <a href="{{route('loginpage')}}" class="btn ">Wróć do logowania</a>
        </form>
    </div>
@endsection
