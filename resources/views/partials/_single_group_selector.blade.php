<div class="form-group">
    <select name="group" id="group" class="single-group-selector" style="width: 100%" >
        @foreach(\Auth::user()->joinedGroups as $group)
            <option value=""> Select a group to share to...</option>
            <option value="{{ $group->username }}">
                <span>
                    {{ $group->name }}
                </span>
            </option>
        @endforeach
    </select>
</div>