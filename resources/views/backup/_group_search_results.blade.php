@if($groups->count() != 0)
    @foreach($groups as $group)
        <div class="hr-line-dashed group-search-divider"></div>
        <div class="search-result" ng-repeat="group in groups track by $index">
        <span class="col-md-2 group-search-picture-container">
            <a href="{{ url('group/'.$group->username) }}">
                <img src="{{ asset($group->profilePictureSource()) }}"
                     alt="Group's profile picture"
                     class="group-search-picture">
            </a>
        </span>
        <span class="col-md-10 group-search-info-container">
            <a href="{{ url('group/'.$group->username) }}">
                <h3 class="group-search-title">
                    {{ $group->name }}
                </h3>
            </a>
            <span class="group-search-institution search-link">
                <i class="fa fa-university"></i> {{ $group->institution()->first()->name }}
            </span>

        <p>
            {{ $group->description }}
        </p>

            <span class="col-md-6 col-xs-12 group-search-statistics">
                <ul class="group-statistics-list">
                    <li><i class="glyphicon glyphicon-pushpin"></i> 12</li>
                    <li><i class="glyphicon glyphicon-file"></i> 23</li>
                    <li><i class="fa fa-comments-o"></i> 98</li>
                </ul>
            </span>
            <span class="col-md-6 col-xs-12 group-search-actions">
                <ul class="group-actions-list">
                    @if(!$group->isAMember(\Auth::user()))
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
        </span>

        </div>
    @endforeach
@else
    <div class="hr-line-dashed group-search-divider"></div>
    <div class="search-result" align="center">
        <h2 > No groups found,  <b>but you can create one. :)</b></h2>
    </div>
@endif