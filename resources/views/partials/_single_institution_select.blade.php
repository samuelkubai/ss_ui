@if(!isset($group))
    <div class="form-group">
        <label for="institution_id">Select your institution</label>
        <select name="institution_id" id="topic" class="single-institution-select" style="width: 100%" required>
            @foreach($institutions as $institution)
                <option value="{{ $institution->id }}">{{ $institution->name }}</option>
            @endforeach
        </select>
    </div>
@else
    <div class="form-group">
        <select name="institution_id" id="topic" class="single-institution-select" style="width: 100%" required>
           @foreach($institutions as $institution)
                <option value="{{ $institution->id }}"
                    @if($institution->id == $group->institution_id)
                        selected = "selected"
                    @endif>
                    {{ $institution->name }}</option>
            @endforeach
        </select>
    </div>
@endif