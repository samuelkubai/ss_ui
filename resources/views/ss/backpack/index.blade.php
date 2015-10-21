@extends('layout')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row" ng-controller="BackpackController">
            @include('ss.backpack.partials._backpack_nav')
            @include('ss.backpack.partials._files_list')
            @include('partials._delete_file_modal')
            @include('partials._share_file_modal')
        </div>
    </div>
@endsection

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