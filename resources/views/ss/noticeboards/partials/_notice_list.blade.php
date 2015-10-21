<div class="col-lg-12">
    <div class="wrapper wrapper-content animated fadeInUp">
        <ul class="notes">
            <li dir-paginate="notice in allNotices | filter:search | itemsPerPage: pageSize">
                <div class="notice-card">
                    <small>@{{ notice.created_at }}</small>
                    <h4>@{{ notice.title }}</h4>

                    <p>@{{ notice.message }}</p>
                    <span class="pull-left">- @{{ notice.user.name }}</span>
                    <a data-toggle="modal"
                       data-target="#delete_notice"
                       ng-click="deleteNotice(notice)">
                        <i class="fa fa-trash-o pull-left"></i>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
<dir-pagination-controls boundary-links="true"
                         template-url="/ss/angular/vendor/pagination/dirPagination.tpl.html"></dir-pagination-controls>