<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    /**
     * Lists the fields that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['forum_id', 'user_id', 'message'];

    /**
     * Links to the forum that the posts belong to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function forum()
    {
        return $this->belongsTo('App\Forum');
    }

    /**
     * Links to the user the created the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
