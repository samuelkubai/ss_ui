<?php

namespace App\Http\Controllers\Auth;

use App\Repos\Group\GroupRepository;
use App\Repos\User\UserRepository;
use App\Traits\UserMailerTrait;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins, UserMailerTrait;
    /**
     * @var GroupRepository
     */
    private $groupRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * Create a new authentication controller instance.
     *
     * @param GroupRepository $groupRepository
     * @param UserRepository $userRepository
     */
    public function __construct(GroupRepository $groupRepository, UserRepository $userRepository)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->groupRepository = $groupRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Gets the view for a not activated user.
     *
     * @param $userId
     * @return \Illuminate\View\View
     */
    public function getNotActivated($userId)
    {
        $title = "Activate account";
        $user = $this->userRepository->findUser($userId);
        $this->sendConfirmationMailTo($user, $user->code);
        return view('ss.auth.notActivated', compact('title', 'user'));
    }

    /**
     * Activate the user.
     * @param $userCode
     * @return \Illuminate\View\View
     */
    public function activate($userCode)
    {
        $user = $this->userRepository->findUserWithCode($userCode);
        $user = $this->userRepository->activateUser($user);
        \Auth::login($user);
        return redirect('/');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:5',
            'institution' => 'required',
            'course' => 'required',
            'year' => 'required',
            'intake' => 'required',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'institution_id' => $data['institution'],
            'course_id' => $data['course'],
            'year' => $data['year'],
            'intake' => $data['intake'],
            'code' => str_random(24),
            'active' => 0,
        ]);
    }

    /**
     * Assigns a user the group they belong to.
     *
     * @param User $user
     * @return User
     */
    protected function assignGroupTo(User $user)
    {
        return $this->groupRepository->assignGroupTo($user);
    }
}
