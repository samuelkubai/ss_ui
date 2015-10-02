@extends('layout')

@section('content')
    <div class="wrapper wrapper-content" style="padding-top: 2px;">
        <div class="row animated fadeInRight">
            <div class="col-md-1">
                @include('ss.groups.partials._menu_nav')
            </div>
            <div class="col-md-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title activity-group-title"
                         data-toggle="tooltip"
                         data-placement="bottom"
                         title="Compiled activities from all your groups.">
                        <h5 style="text-align: center">Group class second 2013</h5>
                        <span class="pull-right">
                            <a href="#">
                                <img
                                        src="{{ asset('ss/img/p2.jpg') }}"
                                        alt="Group class second 2013's picture"
                                        class="activity-group-pic">
                            </a>
                        </span>

                    </div>
                    <div class="ibox-content">
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