@extends('layout')

@section('content')
    <div class="wrapper wrapper-content" style="padding-top: 2px;">
        <div class="row animated fadeInRight">
            <div class="col-md-1">
                @include('ss.groups.partials._menu_nav')
            </div>
            <div class="col-md-11">
               @include('ss.groups.partials._member_list')
            </div>

        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('.contact-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>
@stop