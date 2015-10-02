@extends('layout')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div>
                        <a href="{{ url('/backpack') }}" class="btn btn-sm btn-primary nav-btn"><i class="fa fa-arrow-left"></i> Backpack</a>
                    </div>
                    <div class="ibox-content">
                        <h2>
                            {{ "My groups" }}
                        </h2>

                        <div class="search-form">
                            <form action="{{ url('/groups/all') }}" method="get">

                                <div class="input-group">
                                    <input type="search" placeholder="Search by group name or group institution..." name="value" class="form-control input-lg">
                                    <div class="input-group-btn">
                                        <button class="btn btn-lg btn-primary" type="submit">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                        <li>
                                            <a class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-share"></i> Share</a>
                                        </li>
                                    </ul>
								</span>
                            </div>


                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop