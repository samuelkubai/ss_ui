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
        'userCategory',
        'firstName',
        'lastName',
        'telNumber',
        'email',
        'password',
        'newUser'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Returns all the ids of the groups the user belongs to.
     *
     * @return mixed
     */
    public function followedGroupIds()
    {
        return $this->groups()->lists('id');
    }

    /**
     * Links to the user's profile picture.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    /**
     * Retrieves the path to the user's profile picture.
     *
     * @return string
     */
    public function profileSource()
    {

        $profile = $this->profile()->first();

        if($profile != null)
            return $profile->source;

        return 'uploads/images/default/avatar.png';
    }

    /**
     * Returns all the activities that are relevant to the user.
     *
     * @return mixed
     */
    public function getActivity()
    {
        return Activity::with('group', 'user', 'subject')
            ->whereIn('group_id', $this->followedGroupIds())
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
     * Links to the personal folders for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personalFolders()
    {
        return $this->hasMany('App\PersonalFolder');
    }

    /**
     * Links to the personal folders for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groupFolders()
    {
        return $this->hasMany('App\GroupFolder');
    }

    /**
     * Links to the actual files the user created.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function myFiles()
    {
        return $this->hasMany('App\File');
    }

    /**
     * Links to all of the user's files.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function files()
    {
        return $this->morphMany('App\File', 'documentable');
    }

    /**
     * Returns all the user's files.
     *
     * @return mixed
     */
    public function getMyFiles()
    {
        return $this->files;
    }

    /**
     * Gets all the files that pertain to groups the user is part of.
     *
     * @return mixed
     */
    public function getAllFiles()
    {
        return File::with('user')
            ->whereIn('documentable_id', $this->followedGroupIds())
            ->where('documentable_type', 'group')
            ->get();
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

