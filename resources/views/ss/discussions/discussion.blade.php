@extends('layout')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
    <div>
        <a href="{{ url('/discussions') }}" class="btn btn-sm btn-primary nav-btn"><i class="fa fa-arrow-left"></i> Discussions</a>
    </div>
    <div class="ibox-content forum-post-container">
        <div class="forum-post-info">
            <h4><span class="text-navy"><i class="fa fa-comments-o"></i> What It a long established fact that a reader ?</span>
            <span class="pull-right">
                <span class="discussion-group-profile">
                    <a href="{{'/group' }}">
                        <span class="">
                                <img src="{{ asset('/ss/img/p2.jpg') }}"
                                     alt="Group profile picture"
                                     class="img-circle discussion-group-pic">
                        </span>
                        <small class="text-center muted"><b>IBM Cyber Security</b></small>
                    </a>

                </span>
            </span>
            </h4>
        </div>
        <div class="media">
            <a class="forum-avatar" href="forum_post.html#">
                <img src="{{ asset('ss/img/a1.jpg') }}" class="img-circle" alt="image">
                <div class="author-info">
                    <strong>On:</strong> April 11.2015<br>
                </div>
            </a>
            <div class="media-body">
                <h4 class="media-heading">What It a long established fact that a reader ?</h4>
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                <br><br>
                - Mike Smith
                CEO, Zender Inc.
            </div>
        </div>
        @for($i=1; $i<=10; $i++)
            <div class="media">
                <a class="forum-avatar" href="forum_post.html#">
                    <img src="{{asset('ss/img/a2.jpg')}}" class="img-circle" alt="image">
                    <div class="author-info">
                        <strong>On:</strong> Dec 11.201{{$i}}<br>
                    </div>
                </a>
                <div class="media-body">
                    Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures
                    <br><br>
                    - Alex Kunter
                    Designer, Kurtner Company
                </div>
            </div>
        @endfor
        <form action="" method="get">
            <textarea class="form-control message-input" name="message" placeholder="Enter message text"></textarea>
            <button type="submit" class="btn btn-block btn-primary">Post Contribution</button>
        </form>
    </div>
    </div>
@endsection