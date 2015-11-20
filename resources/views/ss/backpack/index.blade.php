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

@section('jquery_scripts')
    <script src="{{ asset('/js/backpack.js') }}"></script>
@endsection