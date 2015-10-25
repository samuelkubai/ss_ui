<?php


namespace App\Repos\User;


use App\User;
use Kamaln7\Toastr\Facades\Toastr;


class UserRepository
{
    /**
     * Finds the user with the specified id.
     *
     * @param $userId
     * @return mixed
     */
    public function findUser($userId)
    {
        return User::find($userId);
    }
    /**
     * Set the user to a normal user.
     *
     * @return User
     */
    public function setUserAsOld()
    {
        $user = \Auth::user();

        $user->fill([
            'newUser' => 0
        ])->save();

        return $user;
    }

    /**
     * Checks if the user is member of the group.
     *
     * @param $group
     * @param $user
     * @return bool
     */
    public function isAMemberOf($group, $user)
    {
        foreach($user->followedGroups() as $followedGroups)
        {
            if($group->id == $followedGroups->id)
            {
                return true;
            }
        }

        return false;
    }


    /**
     * Returns all the groups the user has joined.
     *
     * @param $user
     * @param int $howMany
     * @return mixed
     */
    public function groupsForUser($user, $howMany = 10)
    {
        $groupIds = $user->follows()->lists('group_id');

        $groups = Group::whereIn('id', $groupIds)->simplePaginate($howMany);

        return $groups;
    }

    /**
     * @param $group
     * @param $user
     * @return mixed
     *
     * Joins a user to a specific group.
     */
    public function userJoin($group, $user)
    {
        if(!($group->isFollowedBy($user)))
        {
            $user->follows()->attach($group->id);
        }
        return $user;
    }


    /**
     * @param $group
     * @param $user
     *
     * Let the user leave a group
     */
    public function userLeave($group, $user)
    {
        $user->follows()->detach($group->id);
    }


    /**
     * @param $request
     * @param $user
     *
     * Update the details of a registered user who is logged in
     */
    public  function updateUser($request, $user)
    {
        return $user->fill([
            'password' => ($request->password)? bcrypt($request->password):$user->password,
            'firstName' =>$request->firstName,
            'lastName' => $request->lastName,
            'telNumber' => $request->telNumber,
            'pin_notification' => $request->pin_notification,
        ])->save();
    }


    /**
     * @param $user
     * @return mixed
     *
     * Deactivate a user account
     */
    public function deactivateUser($user)
    {
        $groups = $user->follows()->get();

        $adminGroups = $user->administrates()->get();

        foreach($adminGroups as $group)
        {
            $user->administrates()->detach($group->id);
        }

        foreach($groups as $group)
        {
            $user->follows()->detach($group->id);
        }


        $user->active = 0;
        $user->code = str_random(90);
        $user->save();
        return $user;
    }

    /**
     * Get a user with the following code.
     *
     * @param $userCode
     * @return mixed
     */
    public function findUserWithCode($userCode)
    {
        return User::where('code', $userCode)->first();
    }

    /**
     * Activate the user.
     *
     * @param User $user
     * @return User $user
     */
    public function activateUser(User $user)
    {
        if($user->active == 1)
        {
            Toastr::info('Your account is are already activated');
            return $user;
        }
        $user->update([
            'code' => '',
            'active' => '1'
        ]);

        return $user;
    }

}