<a ng-show="sharingIndex != $index"
   ng-click="shareFile( group.group.id , $index)"
   class="btn btn-sm btn-primary pull-right">
    Share <i class="glyphicon glyphicon-share"></i>
</a>

<a ng-show="sharingIndex == $index"
   class="btn btn-sm btn-info pull-right">
    Sharing <i class="fa fa-spinner fa-spin"></i>
</a>