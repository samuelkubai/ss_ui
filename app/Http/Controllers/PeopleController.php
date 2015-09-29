<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    /**
     * Store a copy of a newly created person in both elasticsearch and mysql
     *
     * @return Response
     */
    public function store()
    {
        $person = new People;

        $person->create([

            'name' => 'James Mwangi',
            'age'  => '21',
            'sex' => 'Male',

        ]);
    }
}
