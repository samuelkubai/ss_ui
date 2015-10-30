<div class="ibox float-e-margins">
    <div class="ibox-title update-form">
        <h5>User Profile</h5>
        <span class="pull-right">
             <a href="#">
                 <img
                         src="{{ asset($user->profilePictureSource()) }}"
                         alt="Group class second 2013's picture"
                         class="activity-group-pic">
             </a>
         </span>
    </div>
    <div class="ibox-content">

        <form action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
            {!! csrf_field() !!}
            <div>
                <div class=" row form-group ">
                    <div class="col-md-12">
                        <label class="">Change Profile Picture:</label>
                        <input type="file" name="profile_picture" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <p class="form-control-static"><b>Email: </b> {{ $user->email }}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <input name="firstName" type="text" class="form-control" placeholder="First Name"
                               value="{{ $user->first_name }}"
                               required="required">
                    </div>
                    <div class="col-md-6">
                        <input name="lastName" type="text" class="form-control" placeholder="Last Name"
                               value="{{ $user->last_name }}"
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="institution" class="control-label">What institution do you belong to?</label>
                    <select
                            name="institution"
                            id="institution"
                            class="single-group-selector" style="width: 100%"
                            required="required">
                        <option value="">Please select your univeristy...</option>
                        @foreach($institutions as $institution)
                            <option value="{{ $institution->id }}"
                                    @if($user->institution->id == $institution->id)
                                    selected="selected"
                                    @endif>
                                {{ $institution->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="course" class="control-label">What course are you taking?</label>
                    <select
                            name="course"
                            id="course"
                            class="single-course-selector"
                            style="width: 100%;"
                            required>
                        <option value="">Please select your course...</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}"
                                    @if($user->course->id == $course->id)
                                    selected="selected"
                                    @endif>{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="year" class="control-label">What year did you join campus?</label>
                    <select
                            name="year"
                            id="year"
                            class="single-year-selector"
                            style="width: 100%;"
                            required="required">
                        <option value="">Please select the year of your intake...</option>
                        <option value="2009"
                                @if($user->year == 2009)
                                selected="selected"
                                @endif>2009
                        </option>
                        <option value="2010"
                                @if($user->year == 2010)
                                selected="selected"
                                @endif>2010
                        </option>
                        <option value="2011"
                                @if($user->year == 2011)
                                selected="selected"
                                @endif>2011
                        </option>
                        <option value="2012"
                                @if($user->year == 2012)
                                selected="selected"
                                @endif>2012
                        </option>
                        <option value="2013"
                                @if($user->year == 2013)
                                selected="selected"
                                @endif>2013
                        </option>
                        <option value="2014"
                                @if($user->year == 2014)
                                selected="selected"
                                @endif>2014
                        </option>
                        <option value="2015"
                                @if($user->year == 2015)
                                selected="selected"
                                @endif>2015
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="firstName" class="control-label">What month was your intake?</label>
                    <select
                            name="intake"
                            id="intake"
                            class="single-intake-selector"
                            style="width: 100%;"
                            required="required">
                        <option value="">Please select your intake...</option>
                        <option value="1st"
                                @if($user->intake == '1')
                                selected="selected"
                                @endif>January Intake
                        </option>
                        <option value="2nd"
                                @if($user->intake == '2')
                                selected="selected"
                                @endif>March Intake
                        </option>
                        <option value="3rd"
                                @if($user->intake == '3')
                                selected="selected"
                                @endif>September Intake
                        </option>
                    </select>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <input name="password" type="password" class="form-control" placeholder="New Password">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">New Notice Notification:</label>

                    <div class="col-sm-8">
                        <input type="checkbox"
                               name="notice_notification"
                               class="js-switch home-search-switch"
                               @if($user->notice_notification == 1)
                               checked
                                @endif/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>

    </div>
</div>
@include('partials._deactivate_profile_modal')
<div class="col-md-12">
    <button type="button"
            data-toggle="modal"
            data-target="#deactivate_profile"
            class="btn btn-danger btn-sm btn-block">
        <i class="fa fa-exclamation-circle"></i> Deactivate skoolspace profile
    </button>
</div>
