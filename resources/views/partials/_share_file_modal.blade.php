<div class="modal inmodal fade" id="share_file" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header share-modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">
                        <i class="glyphicon glyphicon-remove-circle"></i>
                    </span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Share with your groups.</h4>
                <small class="font-bold">(Share the file with your groups)</small>
            </div>
            <div class="modal-body share-modal-body">
                <ul class="home-search-list">
                    <h2 ng-show="myGroups.length == 0">You have not joined any groups</h2>
                    <span dir-paginate="group in myGroups | filter:{'group': {'joined': true}} | itemsPerPage: noOfGroups"
                          pagination-id="myGroups">
                        <li >
                            <a href="@{{ group.group.url }}">
                                <img class="home-search-pic col-md-4"
                                     ng-src="@{{ group.group.picture }}"
                                     alt="@{{ group.group.name }}'s profile picture"></a>
                             <span class="home-search-item">
                                 <a href="@{{ group.group.url }}"><h5
                                             class="home-search-title">@{{ group.group.name }}</h5></a>
                                    <span class="text-navy home-search-institution"> @{{ group.group.institution }}</span>
                                <div class="home-search-follow-btn ">
                                    <span class="pull-left home-search-description">
                                        @{{ group.group.description +  '...' }}
                                    </span>
                                    @include('partials._share_btn')
                                </div>
                            </span>
                        </li>
                        <div class="hr-line-dashed home-search-divider"></div>
                    </span>
                    <dir-pagination-controls boundary-links="true"
                                             pagination-id="myGroups"
                                             template-url="/ss/angular/vendor/pagination/dirPagination.tpl.html">
                    </dir-pagination-controls>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>