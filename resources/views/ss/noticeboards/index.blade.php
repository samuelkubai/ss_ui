@extends('layout')

@section('content')
	<div class="wrapper wrapper-content" ng-controller="NoticeCtrl">
		<div class="row">
			<div class="col-lg-3">
				@include('ss.noticeboards.partials._notice_nav')
			</div>
			<div class="col-lg-9">
				@include('ss.noticeboards.partials._notice_list')
			</div>
		</div>
	</div>
@endsection

@section('jquery_scripts')
	<script src="{{ asset('ss/js/scripts/noticeboard.js') }}"></script>
@endsection
