@extends('layout')

@section('content')

    <form method="POST" action="/auth/register">
        {!! csrf_field() !!}
        I am a....
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label class="radio-inline">
                <input type="radio" name="userCategory" id="lecturerRadio" value="1"> Lecturer
            </label>
            <label class="radio-inline">
                <input type="radio" name="userCategory" id="studentRadio" value="2"> Student
            </label>
        </div>
        {!! $errors->first('userCategory', '<span class="help-block">:message</span>' ) !!}

        <div>
            First Name
            <input class="form-control" type="text" name="firstName" value="{{ old('firstName') }}">
        </div>


        <div>
            Last Name
            <input class="form-control" type="text" name="lastName" value="{{ old('lastName') }}">
        </div>

        <div>
            Email
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
        </div>
            Phone Number
        <div class="form-group">
            <input class="form-control" id="registrationTelNumber" value="{{ old('telNumber') }}" type="text" required="" name="telNumber"/>
        </div>

        <div>
            Password
            <input class="form-control" type="password" name="password">
        </div>

        <div>
            Confirm Password
            <input class="form-control" type="password" name="password_confirmation">
        </div>

        <div>
            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>
        </div>
    </form>

@stop


