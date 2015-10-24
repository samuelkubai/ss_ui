<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * Lists the fields that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'username',
        'description',
        'institution_id',
    ];

    /**
     * Links to the administrator of the group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Links to the group's profile picture.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profilePicture()
    {
        return $this->morphMany('App\ProfilePicture', 'profilable');
    }

    /**
     * Retrieves the path to the group's profile picture.
     *
     * @return string
     */
    public function profilePictureSource()
    {

        $profile = $this->profilePicture()->first();

        if($profile != null)
            return $profile->path;

        return '/ss/img/profile_big.jpg';
    }

    /**
     * Links to the group's members.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    /**
     * Checks if a user is a member of the group.
     *
     * @param User $user
     * @return bool
     */
    public function isAMember(User $user)
    {
        $membersId = $this->members()->lists('id');

        foreach ($membersId as $memberId)
        {
            if($user->id == $memberId)
            {

                return true;
            }
        }
        return false;
    }
    /**
     * Gets the number of members of the group.
     *
     * @return int
     */
    public function followersCount()
    {
        return $this->followers()->get()->count();
    }


    /**
     * Checks if the user is the group's administrator.
     *
     * @param $user
     * @return bool
     */
    public function isAdministrator($user)
    {
        if($this->user()->first()->id == $user->id)
            return true;
        return false;
    }

    /**
     * Links to the institution that the group belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    /**
     * Links to the suggestion pointing to this group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function suggestion()
    {
        return $this->hasOne('App\Suggestion');
    }

    /**
     * Links to all of the group's files.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function files()
    {
        return $this->morphMany('App\File', 'documentable');
    }

    /**
     * Checks if the group has the file.
     *
     * @param File $file
     * @return bool
     */
    public function hasFile(File $file)
    {
        $fileSources = $this->files()->lists('source_id');

        foreach($fileSources as $fileSource)
        {
            if($file->source->id  == $fileSource)
                return true;
        }

        return false;
    }

    /**
     * Links to the group's notices.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notices()
    {
        return $this->hasMany('App\Notice');
    }

    /**
     * Gets the notices that belong to the group.
     *
     * @return mixed
     */
    public function getNotices()
    {
        return Notice::with('user')->where('group_id', $this->id)->get();
    }

    /**
     * Links to the forums that belong to the group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forums()
    {
        return $this->hasMany('App\Forums');
    }

    /**
     * Gets the forums that belong to the group.
     *
     * @return mixed
     */
    public function getForums()
    {
        return Forum::with('user')->where('group_id', $this->id)->get();
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

    /**
     * Returns all the activities that are relevant to the group.
     *
     * @return mixed
     */
    public function getActivity()
    {
        return Activity::with('group', 'user', 'subject')->where('group_id', $this->id)->get();
    }

    /**
     * Searches through all the groups by a specified field
      *
     * @param $query
     * @param $field
     * @param $value
     * @return mixed
     */
    public static function scopeSearchFor($query, $field, $value)
    {
        return $query->where($field, 'LIKE', "%$value%");
    }
}

