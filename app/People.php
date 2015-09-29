<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{

    /***
     * @var array
     * THIS MODEL IS USED TO TEST ELASTICSEARCH
     *
     * NB::
     *It will be removed later
     *
     *
     *
     *
     */
    protected $fillable = [

        'name',
        'age',
        'sex'

    ];

    protected $table = 'Persons';
}
