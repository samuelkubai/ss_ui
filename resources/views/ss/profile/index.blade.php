@extends('layout')

@section('content')
    <div class="wrapper wrapper-content" style="padding-top: 2px;">
        <div class="row animated fadeInRight">
            <div class="col-md-8">
                @include('ss.profile.partials._profile_form')
            </div>

            <div class="col-md-4 user-profile">
                @include('ss.profile.partials._user_profile')
            </div>
        </div>
    </div>
@stop