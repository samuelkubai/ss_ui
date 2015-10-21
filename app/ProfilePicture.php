<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path'];

    /**
     * Get all of the owning profilable models.
     */
    public function profilable()
    {
        return $this->morphTo();
    }

    /**
     * Return the path to the profile picture.
     *
     * @return mixed
     */
    public function path()
    {
        return $this->path;
    }
}
