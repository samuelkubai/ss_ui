@extends('layout')

@section('content')
    <div class="wrapper wrapper-content" style="padding-top: 2px;" ng-controller="SingleGroupFilesController">
        <div class="row animated fadeInRight">
            <div class="col-md-1">
                @include('ss.groups.partials._menu_nav')
            </div>
            <div class="col-md-11">
                @include('ss.groups.partials._files_nav')
                @include('ss.groups.partials._files_list')
            </div>
            @include('partials._delete_file_modal')
        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('.file-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>
@endsection

@section('jquery_scripts')
    <script src="{{ asset('/ss/js/scripts/backpack.js') }}"></script>
@endsection