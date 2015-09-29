<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class FileParent extends Model
{
    /**
     * Links to the Main file the file belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file()
    {
        return $this->belongsTo('App\File');
    }
    /**
     * Gets the user that created the file.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->file()->first()->user();
    }

    /**
     * Returns the path to the file.
     *
     * @return mixed
     */
    public function path()
    {
        return $this->file()->path();
    }

    /**
     * Returns the type(extension) of the file.
     *
     * @return mixed
     */
    public function type()
    {
        return $this->file()->type();
    }
}