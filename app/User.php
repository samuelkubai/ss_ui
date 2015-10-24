<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'institution_id',
        'course_id',
        'year',
        'intake',
        'active',
        'code'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Returns the institution the user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    /**
     * Returns the course the user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    /**
     * Returns all the ids of the groups the user belongs to.
     *
     * @return mixed
     */
    public function joinedGroupIds()
    {
        return $this->joinedGroups()->lists('id');
    }

    /**
     * Links to all the groups the user is following
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function joinedGroups()
    {
        return $this->belongsToMany('App\Group');
    }

    /**
     * Checks if a user is a member of the group.
     *
     * @param Group $group
     * @return bool
     */
    public function isAMemberOf(Group $group)
    {
        $membersId = $group->members()->lists('user_id');

        foreach ($membersId as $memberId)
        {
            if($this->id == $memberId)
            {
                return true;
            }
        }
        return false;
    }

    /**
     * Links to the user's profile picture.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profilePicture()
    {
        return $this->morphMany('App\ProfilePicture', 'profilable');
    }

    /**
     * Retrieves the path to the user's profile picture.
     *
     * @return string
     */
    public function profilePictureSource()
    {

        $profile = $this->profilePicture()->first();

        if($profile != null)
            return $profile->source;

        return '/ss/img/a3.jpg';
    }

    /**
     * Returns all the activities that are relevant to the user.
     *
     * @return mixed
     */
    public function getActivity()
    {
        return Activity::with('group', 'user', 'subject')
            ->whereIn('group_id', $this->joinedGroupIds())
            ->get();
    }

    /**
     * Returns all the groups that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groups()
    {
        return $this->hasMany('App\Group');
    }

    /**
     * Links to all of the user's files.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function myFiles()
    {
        return $this->morphMany('App\File', 'documentable');
    }

    /**
     * Checks if the file is in the user's backpack.
     * @param File $file
     * @return bool
     */
    public function inMyBackPack(File $file)
    {
        $fileSources = $this->myFiles()->lists('source_id');

        foreach($fileSources as $fileSource)
        {

            if($file->source_id  == $fileSource && $file->source_id != null)
                return true;
        }
        return false;
    }

    /**
     * Checks if the file is the user's.
     *
     * @param File $file
     * @return bool
     */
    public function isMyFile(File $file)
    {
        if($file->user->id == $this->id)
            return true;
        return false;
    }

    /**
     * Links to the notices the user has created.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notices()
    {
        return $this->hasMany('App\Notice');
    }

    /**
     * Gets the notices that pertain to groups followed by the user.
     *
     * @return mixed
     */
    public function getAllNotices()
    {
        return Notice::with('user', 'group')
            ->whereIn('group_id', $this->followedGroupIds())
            ->get();
    }

    /**
     * Links to the forums the user has started.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forums()
    {
        return $this->hasMany('App\Forum');
    }

    /**
     * Gets the forums that pertain to groups followed by the user.
     *
     * @return mixed
     */
    public function getAllForums()
    {
        return Forum::with('user', 'group')
            ->whereIn('group_id', $this->followedGroupIds())
            ->get();
    }

    /**
     * Links to the user's forum posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function forumPosts()
    {
        return $this->hasMany('App\ForumPost');
    }

    /**
     * Links to the group's activities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

}

