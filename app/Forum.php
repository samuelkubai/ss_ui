<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    /**
     * Lists the fields that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['group_id', 'title', 'user_id', 'forumState'];

    /**
     * Links to the group the forum belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    /**
     * Links to the user that created the forums.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Links to the posts that belong to the forum.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function posts()
    {
        return $this->hasMany('App\ForumPost');
    }
}
