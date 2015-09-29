<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    /**
     * Lists the attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'title', 'message', 'school_id', 'user_id'];

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
