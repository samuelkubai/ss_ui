<div class="col-lg-9 animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            @for($i=1; $i<21; $i++)
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="file-name">
                                Document_20{{ $i }}
                                <br>
                                <small>Added: Jan 11, 20{{ $i }}</small>
                                <br>
                                <small>Topic: Tag{{ $i }}</small>
                                <br>
                                <small>By </small>
                                <img src="{{ asset('ss/img/p1.jpg') }}"
                                     alt=""
                                     class="img-circle file-owner-pic">
                                @if($i%3 == 0)
                                    <small> <strong> You</strong></small>
                                    <span class="pull-right">
                                                <a href="{{ url('/share') }}" class="file-options-option pull-right">
                                                    <i class="glyphicon glyphicon-share"></i>
                                                </a>

                                                <a href="#" class="file-options-option pull-right">
                                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                                </a>
                                            </span>
                                @else
                                    <small> <strong> Samuel Kubai</strong></small>
                                    <span class="pull-right">
                                                <a href="{{ url('/share') }}" class="file-options-option pull-right">
                                                    <i class="glyphicon glyphicon-share"></i>
                                                </a>

                                            </span>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>