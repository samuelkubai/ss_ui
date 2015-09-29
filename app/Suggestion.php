<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    /**
     * List of the table's fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['intake_year', 'intake_type', 'course_id', 'user_id'];

    /**
     * Returns the course the suggestion points to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne('App\Course');
    }

    /**
     * Returns the group the suggestion points to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

}
