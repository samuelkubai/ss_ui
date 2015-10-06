@extends('layout')

@section('content')
    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}

        <div>
            First Name
            <input class="form-control" type="text" name="firstName">
        </div>

        <div>
            Last Name
            <input class="form-control" type="text" name="lastName" id="password">
        </div>

        <div>
            Email
            <input class="form-control" type="email" name="email" id="password">
        </div>
        <div>
            Password
            <input class="form-control" type="password" name="password" id="password">
        </div>
        <div>
            Password
            <input class="form-control" type="password" name="confirm_password" id="password">
        </div>



        <div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
        </div>
    </form>


@stop


