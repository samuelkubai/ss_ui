<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\UpdateUserRequest;
use App\Institution;
use App\Repos\User\UserRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * Initialize the controller variables
     * @param UserRepository $userRepository
     */
    function __construct(UserRepository $userRepository)
    {

        $this->userRepository = $userRepository;
    }

    /**
     * Show the form for editing the user's profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        $user = \Auth::user();
        $title = 'My Profile';
        $courses = Course::all();
        $institutions = Institution::all();
        return view('ss.profile.index', compact('title', 'user', 'courses', 'institutions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $user = \Auth::user();
        $this->userRepository->updateUser($request, $user);
        return redirect()->back();
    }

    /**
     * Deactivate the user's account.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function deactivate()
    {
        $this->userRepository->deactivateUser(\Auth::user());
        \Auth::logout();
        return redirect('/login');
    }
    */
}
