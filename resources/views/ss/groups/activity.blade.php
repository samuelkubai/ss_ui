@extends('layout')

@section('content')
    <div class="wrapper wrapper-content" style="padding-top: 2px;" ng-controller="SingleGroupActivitiesController">

        <div class="row animated fadeInRight">
            <div class="col-md-1">
                @include('ss.groups.partials._menu_nav')
            </div>
            <div class="col-md-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title activity-group-title"
                         data-toggle="tooltip"
                         data-placement="bottom"
                         title="Compiled activities for {{ $group->name }}.">
                        <h5 style="text-align: center">{{ $group->name }}</h5>
                        <span class="pull-right">
                            <a href="#">
                                <img
                                        src="{{ asset($group->profilePictureSource()) }}"
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