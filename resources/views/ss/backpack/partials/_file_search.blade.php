<div class="hr-line-dashed"></div>
<h5>Search</h5>
<div class="input-group">
    <input type="text"
           placeholder="Search by name, owner or topic"
           class="input-sm form-control"
           ng-model="search.$">
    <span class="input-group-btn">
        <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
    </span>
</div>
<div class="hr-line-dashed"></div>
<h5 class="tag-title">Topics</h5>
<ul class="tag-list" style="padding: 0">
    <li ng-click="filterWithTopic('', $index)"
        ng-class="{'active' : topicIndex == null}">
        <a href="">All</a>
    </li>
    <li ng-repeat="topic in allTopics"
        ng-click="filterWithTopic(topic.name, $index)"
        ng-class="{'active' : topicIndex == $index}">
        <a href="#">@{{ topic.name }}</a>
    </li>
</ul>