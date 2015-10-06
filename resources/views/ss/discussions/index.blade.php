@extends('layout')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="ibox-content m-b-sm border-bottom">
            <div class="text-center p-lg">
                <h2>If you don't find the answer to your question</h2>
                <a data-toggle="modal" href="#" data-target="#createDiscussion" title="Create new discussion" class="btn btn-primary btn-sm"><i class="fa fa-comments"></i> <span class="bold">Create Discussion</span></a>
            </div>
            <div class="search-form">
                <form action="{{ url('/groups/all') }}" method="get">
                    <div class="input-group">
                        <input type="search" placeholder="Search by question or group name..." name="value" class="form-control input-lg">
                        <div class="input-group-btn">
                            <button class="btn btn-lg btn-primary" type="submit">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @for($i=1; $i<=10; $i++)
            <div class="faq-item">
                <div class="row">
                    <div class="col-md-7">
                        <a data-toggle="collapse" href="faq.html#faq1" class="faq-question">What It a long established fact that a reader ?</a>
                        <small>Added by <strong>Alex Smith</strong> <i class="fa fa-clock-o"></i> Today 2:40 pm</small>
                    </div>
                    <div class="col-md-3 pull-left">
                        <div class="tag-list">
                            <span class="">
                                <img src="{{ asset('/ss/img/p2.jpg') }}"
                                     alt="Group profile picture"
                                     class="img-circle discussion-group-pic">
                            </span>
                            <small class="text-center muted"><b>Group Name one class of 2014</b></small>
                        </div>
                    </div>
                    <div class="col-md-2 text-right">
                        <span class="small font-bold"><a href="{{ url('discussion') }}" class="btn btn-sm btn-primary">Contribute</a></span><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="faq1" class="panel-collapse collapse faq-answer">
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    <!-- Create discussion Modal -->
    @include('ss.discussions.partial._create_discussion_modal')
    <!-- End Create Discussion Modal -->
@endsection
