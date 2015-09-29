<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Repos\User\UserRepository;



class DashboardController extends Controller
{

    /**
     * User Repository
     */

    protected $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository;
    }
    /**
     * The return lecturer dashboard method
     */

    public function getLecturerDashboard()
    {
        return 'lecturer';
    }

    /**
     * The return student dashboard method
     */

    public function getStudentDashboard()
    {
        return 'student';
    }

    /**
     * Get the view for student to join a group automatically
     */

    public function joinInitialGroup()
    {
        return view('groupSetup.joinInitial');
    }

    /**
     * Set user as old and redirect to dashboard
     */

    public function finishJoinGroup()
    {
        if((\Auth::user()->newUser) != 0)
        {
            $this->userRepo->setUserAsOld();
        }

        return redirect('/dashboard/student');
    }



}
