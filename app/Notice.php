<?php

namespace App;

use App\Interfaces\PostableInterface;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model Implements PostableInterface
{
    /**
     * Lists the attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'title', 'message', 'group_id', 'user_id'];

    /**
     * Links to the object's activity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activity()
    {
        return $this->morphMany('App\Activity', 'subject');
    }

    /**
     * Links the notice to the group it belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    /**
     * Links the notice to the user it belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
