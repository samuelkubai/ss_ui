@extends('layout')

@section('content')
    <div class="wrapper wrapper-content" style="padding-top: 2px;">
        <div class="row animated fadeInRight">
            <div class="col-md-8">
                @include('ss.home.partials._shortcut_activities')
                <br>

                <div class="ibox float-e-margins">
                    <div class="ibox-title"
                         data-toggle="tooltip"
                         data-placement="bottom"
                         title="Compiled activities from all your groups.">
                        <h5 style="text-align: center">Activity Feed</h5>
                    </div>
                    <div class="ibox-content" ng-controller="HomeController">
                        @include('ss.activity.statuses.index')
                    </div>
                </div>

            </div>

            <div class="col-md-4 user-profile">
                @include('ss.home.partials._groups_list')
            </div>
        </div>
    </div>
@stop

@section('jquery_scripts')
    <script src="{{ asset('ss/js/scripts/home.js') }}"></script>
@stop