<div class="form-group">
    <select id="group"
            name="group"
            style="width: 100%"
            ng-model="search.group.username"
            class="single-group-filter">
        <option value="">Select a group to share to...</option>
        @foreach(\Auth::user()->joinedGroups as $group)
            <option value="{{ $group->username }}">
                    {{ $group->name }}
            </option>
        @endforeach
    </select>
</div>