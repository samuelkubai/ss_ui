<div>
    <div class="feed-activity-list">
        @for($i = 1; $i < 7; $i++)
            @if($i%2 == 0)
                @include('ss.activity.statuses.file')
            @endif

            @if($i%2 != 0)
                @include('ss.activity.statuses.notice')
            @endif

            @if($i%3 == 0)
                @include('ss.activity.statuses.forum')
            @endif
        @endfor
    </div>
    <button class="btn btn-primary btn-block m more-posts-btn"><i class="fa fa-arrow-down"></i> Show More</button>
</div>