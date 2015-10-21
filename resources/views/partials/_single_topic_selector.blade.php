<div class="form-group">
    <select name="topic" id="topic-selector" class="topic-selector" style="width: 100%;" required>
        <option value="">Select a topic for it..</option>
        @foreach($topics as $topic)
            <option value="{{ $topic->name }}"> {{ $topic->name }} </option>
        @endforeach
    </select>
</div>