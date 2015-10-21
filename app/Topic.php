<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    /**
     * List of all mass-assignable fields.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id'];

    /**
     * Gets all the files related to te topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany('App\File');
    }

    /**
     * Gets the user that created the topic.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
