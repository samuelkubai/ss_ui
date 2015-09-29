<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    /**
     * The table the model is connected to.
     *
     * @var string
     */
    protected $table = 'follows';

    /**
     * Lists the attributes that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['group_id', 'user_id'];
}
