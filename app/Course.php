<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * List of the table's fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['slug', 'name', 'institution_id'];

    /**
     * Gets the institution that the course belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }
}
