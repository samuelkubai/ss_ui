@for($i=1;$i<=8;$i++)
<div class="hr-line-dashed group-search-divider"></div>
<div class="search-result" ng-repeat="group in groups track by $index">
    <span class="col-md-2 group-search-picture-container">
        <a href="#">
            <img src="{{ asset('/ss/img/p1.jpg') }}"
                 alt="Group's profile picture"
                 class="group-search-picture">
        </a>
    </span>
    <span class="col-md-10 group-search-info-container">
        <a href="{{ url('group/'.$i) }}">
            <h3 class="group-search-title">

                Group Search One 2013
            </h3>
        </a>
        <span class="group-search-institution search-link">
            <i class="fa fa-university"></i> Jomo Kenyatta University of Agriculture and Technology
        </span>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores dolorum et officia sed ullam.
        Aspernatur assumenda aut, beatae cumque excepturi iste nihil nobis obcaecati pariatur, perferendis provident quae quasi sint!
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
                @if($i%3 == 0)
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
@endfor
<!--
    <div class="hr-line-dashed group-search-divider"></div>
    <div class="search-result" align="center">
      <h2 > No groups found,  <b>but you can create one. :)</b></h2>
    </div>
-->