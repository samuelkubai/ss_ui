<div class="col-lg-12">
    <div class="panel blank-panel">
        <div class="panel-body ">
            <input type="hidden"
                   id="group"
                   data-name="{{ $group->username }}">
            <nav class="text-center">
                <ul class="group-navigation">
                    @include('ss.groups.partials._menu_nav_icons')
                </ul>
            </nav>

            <nav class="text-center">
                <ul class="mobile-group-navigation tooltip-demo">
                    @include('ss.groups.partials._menu_nav_icons')
                </ul>
            </nav>
        </div>
    </div>
</div>