<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    /**
     * Lists the fields that can be mass assigned
     * @var array
     */
    protected $fillable = ['file_id'];

    /**
     * Gets the files that originate from this source.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany('App\File');
    }

}
