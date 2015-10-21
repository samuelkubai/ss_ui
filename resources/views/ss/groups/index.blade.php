@extends('layout')

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content" ng-controller="GroupController">
						@include('ss.groups.partials._group_search_section')
						@include('ss.groups.partials._group_search_results')
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('ss.groups.partials._create_group_modal')
@stop