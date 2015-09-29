@extends('layout')

@section('content')
	<header class="global-header">
		<img src="{{ asset('/img/covers/cover-1.jpg') }}" class="global-header__background">
		<h2 class="global-header__title">Noticeboards</h2>
	</header>

    <div class="activity" id="activity" role="tabpanel">
		<select class="activity__picker">
			<option selected>CT Class of 2010</option>
			<option>CT Class of 2010</option>
			<option>CT Class of 2010</option>
			<option>CT Class of 2010</option>
		</select>
		<time class="activity__date">
			Monday, Feb 8, 2015
		</time>
		<div class="activity-switcher">
			<div class="activity-list">
				@include('ss.activity.activity')
			</div>
			<div class="activity-list">
				@include('ss.activity.pins')
			</div>
		</div>
		<footer class="activity-footer">
			<a href="#" class="activity__cta">
				<i class="ion-plus-round activity__cta-icon"></i>
			</a>
		</footer>
	</div>
@stop