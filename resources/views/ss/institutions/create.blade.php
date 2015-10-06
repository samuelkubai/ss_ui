@extends('layout')

@section('content')

    <form method="POST" action="{{ url('/institution/create') }}">
        {!! csrf_field() !!}

        <div>
           Name
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            Slug
            <input class="form-control" type="text" name="slug" id="password">
        </div>
        <button type="submit" class="btn btn-sm btn-primary"> Create</button>
    </form>


@stop


