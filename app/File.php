<?php

namespace App;

use App\Interfaces\PostableInterface;
use Illuminate\Database\Eloquent\Model;

class File extends Model Implements PostableInterface
{
    /**
     * List the fields that can be mass assigned.
     * @var array
     */
    protected $fillable = ['name', 'path', 'type', 'mime', 'topic_id','user_id'];

    /**
     * Return the appropriate picture
     *
     * @return string
     */
    public function picture()
    {
        return 'ss/icons/excel1.png';
    }
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
     * Gets the topic of the file.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo('App\Topic');
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
