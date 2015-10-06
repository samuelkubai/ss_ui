<div class="notice-creation-section">
    <form action="{{ url('noticeboard/create') }}" method="post">
        {!! csrf_field() !!}
        <div class="hr-line-dashed"></div>

        <div class="form-group">
            <input type="text" placeholder="Notice title..." class="form-control">
        </div>

        <div class="form-group">
            <textarea name="message" id="message" cols="30" rows="3"
                      class="form-control">Write the notice's message...</textarea>
        </div>
        @include('partials._single_group_selector')
        <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="glyphicon glyphicon-pushpin"></i> Pin
        </button>
        <button type="button" class="btn btn-sm btn-white " ng-click="toggleCreationForm()" ><i class="fa fa-times-circle"></i> Close</button>
    </form>
</div>
