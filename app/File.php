<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * List the fields that can be mass assigned.
     * @var array
     */
    protected $fillable = ['name', 'path', 'type', 'mime', 'user_id'];

    /**
     * Links to the user that created the document.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all of the owning documentable models.
     */
    public function documentable()
    {
        return $this->morphTo();
    }

    /**
     * Returns the path to the file.
     *
     * @return mixed
     */
    public function path()
    {
        return $this->path;
    }

    /**
     * Returns the type(extension) of the file.
     *
     * @return mixed
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * Gets the name for the file.
     *
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * Gets the mime of the file.
     *
     * @return mixed
     */
    public function mime()
    {
        return $this->mime;
    }
}
