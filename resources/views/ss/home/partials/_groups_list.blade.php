<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Groups</h5>
            <div class="ibox-tools">
                <input type="checkbox" class="js-switch home-search-switch" checked />
            </div>
        </div>
        <div class="ibox-content">

            <div class="input-group">
                <input type="text" placeholder="Search" class="input-sm form-control">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-sm btn-primary"> Search</button>
                    </span>
            </div>
            <ul class="home-search-list">
                @for($i=1; $i<=6; $i++)
                    <li>
                        <a href="{{ url('group/') }}"><img class="home-search-pic col-md-4" src="{{ asset('/ss/img/p3.jpg') }}" alt="Group profile picture"></a>
                         <span class="home-search-item">
                             <a href="{{ url('group/') }}"><h5 class="home-search-title">Group search one class</h5></a>

                            <div class="home-search-follow-btn ">
                                <span class="pull-left home-search-description">
                                    Aliquid ex excepturi illum in tenetur! Et facere harum labore possimus recusandae vitae...
                                </span>
                                @if($i%2 != 0)
                                    @include('partials._follow_btn')
                                @else
                                    @include('partials._joined_leave_btn')
                                @endif
                            </div>
                        </span>

                    </li>
                    <div class="hr-line-dashed home-search-divider"></div>
                @endfor
            </ul>
        </div>
    </div>
</div>