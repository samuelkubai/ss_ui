@extends('layout')

@section('content')
    <div class="wrapper wrapper-content" style="padding-top: 2px;">
        <div class="row animated fadeInRight">
            <div class="col-md-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title"
                         data-toggle="tooltip"
                         data-placement="bottom"
                         title="Compiled activities from all your groups.">
                        <h5 style="text-align: center">Activity Feed</h5>
                        <span class="pull-right mobile-nav">
                            <a href="{{ url('groups') }}" class="btn btn-xs btn-white"><i class="fa fa-group"></i></a>
                            <a href="{{ url('backpack') }}" class="btn btn-xs btn-info"><i class="fa fa-briefcase"></i></a>
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