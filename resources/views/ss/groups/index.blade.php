@extends('layout')

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content">
						<h2 class="group-search-tagline">
							{{ "All groups" }}
							<span class="pull-right"><a data-toggle="modal" href="#" data-target="#createGroup" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Create Group</a></span>
						</h2>
						<div class="search-form">
							<form action="{{ url('/groups/all') }}" method="get">

								<div class="input-group">
									<input type="search" placeholder="Search by group name or group institution..." name="value" class="form-control input-lg">
									<div class="input-group-btn">
										<button class="btn btn-lg btn-primary" type="submit">
											<i class="fa fa-search fa-lg"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
						<a href="#" class="file-control active">All</a>
						<a href="#" class="file-control">My institution's groups</a>
						<a href="#" class="file-control">My Groups</a>
						@for($i=1; $i<=10; $i++)
							<div class="hr-line-dashed group-search-divider"></div>
							<div class="search-result">
								<h3 class="group-search-title">
									<img src="{{ asset('/ss/img/profile_big.jpg') }}"
										 alt="Group's profile picture"
										 class="group-search-picture">
										Bsc. {{ $i }}st Class of 20{{ $i }}
								</h3>
								<span class="group-search-institution search-link"><i class="fa fa-university"></i> Jomo Kenyatta University</span>
								<p>
									Lorem Ipsum is simply dummy text of the printing and typesetting industry.
									Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
									Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).4
								</p>

								<span class="col-md-6 col-xs-12 group-search-statistics">
									<ul class="group-statistics-list">
										<li><i class="glyphicon glyphicon-pushpin"></i> 12</li>
										<li><i class="glyphicon glyphicon-file"></i> 20</li>
										<li><i class="fa fa-comments-o"></i> 13</li>
									</ul>
								</span>
								<span class="col-md-6 col-xs-12 group-search-actions">
									<ul class="group-actions-list">
										@if($i%3 != 0)
											<li>
												@include('partials._follow_btn')
											</li>
										@else
											<li>
												@include('partials._joined_leave_btn')
											</li>
										@endif
									</ul>
								</span>
							</div>


						@endfor
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('ss.groups.partials._create_group_modal')
@stop