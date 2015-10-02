@extends('layout')

@section('content')
    <div class="wrapper wrapper-content" style="padding-top: 2px;">
        <div class="row animated fadeInRight">
            <div class="col-md-1">
                @include('ss.groups.partials._menu_nav')
            </div>
            <div class="col-md-11">
                @include('ss.backpack.partials._backpack_nav')
                @include('ss.backpack.partials._files_list')
            </div>
            @include('ss.backpack.partials._file_upload_modal')
        </div>
    </div>
@stop