@extends('layout')

@section('content')
    <div class="wrapper wrapper-content" style="padding-top: 2px;">
        <div class="row animated fadeInRight">
            <div class="col-md-1">
                @include('ss.groups.partials._menu_nav')
            </div>
            <div class="col-md-7">
                @include('ss.groups.partials._update_group_form')
            </div>

            <div class="col-md-4 user-profile">
                @include('ss.groups.partials._group_profile')
            </div>

        </div>
    </div>
@stop