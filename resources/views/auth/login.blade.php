@extends('layout')

@section('content')

    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}

        <div>
            Email
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            Password
            <input class="form-control" type="password" name="password" id="password">
        </div>

        <div>
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
        </div>
    </form>


@stop


