<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    /**
     * List of the table's fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    /**
     * Gets the courses of the institution.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

}
