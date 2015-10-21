<span dir-paginate="group in allGroups | filter:search | itemsPerPage: pageSize">
    <div class="hr-line-dashed"></div>
    <div class="search-result">
        <h3 class="group-search-title"><a href="@{{ group.group.url }}">@{{ group.group.name }}</a></h3>
        <a href="search_results.html#" class="group-search-institution search-link">@{{ group.group.institution }}</a>
        <p>
            @{{ group.group.description}}
        </p>


        <span ng-show="group.group.administrator">
            <b>Administered by: @{{ group.group.administrator }}</b>
        </span>

        <span ng-show="!group.group.administrator">
            <b>No Members</b>
        </span>

        <ul class="group-actions-list">
         <span ng-show="group.group.joined">
             <li>
                 @include('partials._joined_leave_btn')
             </li>
         </span>
            <span ng-hide="group.group.joined">
                <li>
                    @include('partials._follow_btn')
                </li>
            </span>
        </ul>
    </div>
</span>
<div class="hr-line-dashed"></div>
<dir-pagination-controls boundary-links="true"
                         template-url="/ss/angular/vendor/pagination/longPagination.tpl.html"></dir-pagination-controls>

