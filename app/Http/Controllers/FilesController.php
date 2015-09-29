<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;



class FilesController extends Controller
{


    /**
     * Store a copy of a newly created file in both elasticsearch  and in mysql-database
     *
     * @return Response
     */
    public function store()
    {
        $person = new File;

        $person->create([

            'name' => 'Artificial Intelligence',
            'path'  => '/artificial/intelligence',
            'type' => '.pdf',

        ]);
    }


}
