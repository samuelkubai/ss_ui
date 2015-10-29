<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserApiController extends Controller
{
    /**
     * Mark user as an old user.
     *
     * @return \Illuminate\Http\Response
     */
    public function markUserAsOld()
    {
        $user =\Auth::user();
        $user->new_user = 0;
        $user->save();
        return response('Welcome to skoolspace.', 200, []);
    }
}
