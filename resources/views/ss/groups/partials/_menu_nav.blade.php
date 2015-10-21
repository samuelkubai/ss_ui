<div class="col-lg-12">
    <div class="panel blank-panel">
        <div class="panel-body ">
            <input type="hidden"
                   id="group"
                   data-name="{{ $group->username }}">
            <ul class="group-navigation">
                @include('ss.groups.partials._menu_nav_icons')
            </ul>

            <ul class="mobile-group-navigation">
                @include('ss.groups.partials._menu_nav_icons')
            </ul>
        </div>
    </div>
</div>