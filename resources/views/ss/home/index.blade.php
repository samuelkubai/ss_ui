@extends('layout')

@section('content')
	<header class="global-header">
		<img src="{{ asset('/img/covers/cover-1.jpg') }}" class="global-header__background">
		<h2 class="global-header__title">Home</h2>
	</header>

    <div class="activity" id="activity" role="tabpanel">
		<time class="activity__date">
			Monday, Feb 8, 2015
		</time>
		<div class="activity-switcher">
			<div class="activity-list">
				@include('ss.activity.activity')
			</div>
			<div class="activity-list">
				@include('ss.activity.files')
			</div>
		</div>
		<footer class="activity-footer">
			<a href="#" class="activity__cta">
				<i class="ion-plus-round activity__cta-icon"></i>
			</a>
		</footer>
	</div>
@stop