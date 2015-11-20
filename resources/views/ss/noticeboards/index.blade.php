@extends('layout')

@section('content')
	<div class="wrapper wrapper-content">
		<div class="row" ng-controller="NoticeController">
			<div class="col-lg-3">
				@include('ss.noticeboards.partials._notice_nav')
			</div>
			<div class="col-lg-9">
				@include('ss.noticeboards.partials._notice_list')
			</div>
			@include('partials._delete_notice_modal')
		</div>
	</div>
@endsection

@section('jquery_scripts')
	<script src="{{ asset('/js/noticeboard.js') }}"></script>
@endsection
