<?php namespace App\Repos\Group;

use App\Activity;
use App\Http\Requests\UpdateGroupRequest;
use App\Suggestion;
use App\User;
use App\Group;
use App\Traits\Profilable;
use App\Http\Requests\CreateGroupRequest;
use Kamaln7\Toastr\Facades\Toastr;

class GroupRepository
{
    use Profilable;

    /** Creates a new group for the specified user.
     *
     * @param $request
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createGroup(CreateGroupRequest $request,User $user)
    {
        $group =  $user->groups()->create([
            'name' => $request->name,
            'username' => $this->clean($request->username),
            'description' => $request->description,
            'institution_id' => $request->institution_id
        ]);

        $this->joinGroup($group, $user);

        return $group;
    }

    /**
     * Assigns a user to a specific group.
     *
     * @param User $user
     * @return User
     */
    public function assignGroupTo(User $user)
    {
        $assignment = Suggestion::where('intake', $user->intake)
            ->where('course_id', $user->course->id)
            ->where('institution_id', $user->institution->id)
            ->where('year', $user->year)
            ->first();

        if($assignment != null)
        {
            $this->joinGroup($assignment->group, $user);
            return $user;
        }

        $this->createGroupAssignmentFor($user);

        return $user;

    }
    /**
     * Updates a group with new details.
     *
     * @param $request
     * @param Group $group
     * @return Group
     */
    public function updateGroup(UpdateGroupRequest $request, Group $group)
    {
        $group->update([
            'name' => $request->name,
            'description' => $request->description,
            'institution_id' => $request->institution_id
        ]);

        if($request->hasFile('profilePicture'))
        {
            $this->saveProfilePicture($group, $request->file('profilePicture'));
        }

        return $group;
    }

    /**
     * Joins the user to a specific group
     *
     * @param User $user
     * @param Group $group
     * @return Group
     */
    public function joinGroup(Group $group, User $user)
    {
        if(!$group->isAMember(\Auth::user()))
        {
            if($group->members()->get()->count() < 1 || ($group->user->id == 0))
            {
                $group->update([
                   'user_id' => $user->id,
                ]);

                Toastr::info('You are the new group admin of the group '. $group->name);
            }
            $group->members()->attach(\Auth::user()->id);
            return true;
        }
        return false;
    }

    /**
     * The user leaves a specific group
     *
     * @param User $user
     * @param Group $group
     * @return Group
     */
    public function leaveGroup(Group $group, User $user)
    {
        if($group->isAMember(\Auth::user()))
        {
            if($group->user->id == $user->id)
            {
                $group->members()->detach(\Auth::user()->id);

                if($group->members()->get()->count() < 1)
                {
                    $group->update([
                        'user_id' => 0,
                    ]);

                } else {

                    $newAdmin = $group->members()->first();

                    $group->update([
                        'user_id' => $newAdmin->id,
                    ]);
                }

                return true;
            }

            $group->members()->detach(\Auth::user()->id);
        }

        return false;
    }

    /**
     * Delete a group
     *
     * @param Group $group
     * @throws \Exception
     */
    public function deleteGroup(Group $group)
    {
        $group->delete();
    }

    /**
     * Finds a group by the group ID.
     *
     * @param $groupId
     * @return mixed
     */
    public function findGroupWith($groupId)
    {
        return Group::find($groupId);
    }

    /**
     * Finds a group by the group username.
     *
     * @param $groupUsername
     * @return mixed
     */
    public function findGroupWithUsername($groupUsername)
    {
        return Group::where('username', $groupUsername)->first();
    }

    /**
     * Gets all the groups in the system.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function allGroups()
    {
        return Group::with('user','institution')
            ->orderBy('name')
            ->get();
    }

    /**
     * Returns a list of paginated lists.
     *
     * @param int $howMany
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function allGroupsPaginated($howMany = 10)
    {
        return Group::with('user','institution')->simplePaginate($howMany);
    }

    /**
     * Gets all the groups the user belongs to(has joined).
     *
     * @param User $user
     * @return mixed
     */
    public function allJoinedGroupsFor(User $user)
    {
        return Group::with('user','institution')
            ->whereIn('id', $user->joinedGroupIds())
            ->latest()
            ->get();
    }

    /**
     * Check if a user follows a particular group
     *
     * @param $group
     * @param $user
     * @return bool
     */
    public function isFollowerOf($group, $user)
    {
        $followerIds = $group->followers()->lists('user_id');

        foreach($followerIds as $follower)
        {
            if($user->id == $follower)
                return true;
        }

        return false;
    }

    /**
 * Gets all the members of a group ordered by their first name.
 *
 * @param Group $group
 * @param int $howMany
 * @return mixed
 */
    public function membersOfGroup(Group $group, $howMany = 10)
    {
        return $group->members()->with('institution', 'course')->orderBy('first_name')->paginate($howMany);
    }

    /**
     * Gets activities for a certain group member.
     *
     * @param User $user
     * @param Group $group
     * @param int $howMany
     * @return mixed
     */
    public function activitiesForMember(User $user, Group $group, $howMany = 9)
    {
        return Activity::with('user', 'group', 'subject')
            ->where('group_id', $group->id)
            ->where('user_id', $user->id)
            ->latest()
            ->simplePaginate($howMany);
    }

    /**
     * Gets all the members of the group ordered by their first name and paginated.
     *
     * @param $group
     * @param int $howMany
     * @return mixed
     */
    public function paginatedMembersOfGroup($group, $howMany = 9)
    {
        return $group->followers()->orderBy('first_name')->paginate($howMany);
    }


    /**
     * Gets the groups whose field matches the value provided.
     *
     * @param $value
     * @param string $field
     * @return mixed
     */
    public function searchGroupsFor($value, $field = 'name')
    {
        return Group::searchFor($field, $value)->get();
    }

    /**
     * Create group assignment for a user.
     *
     * @param User $user
     */
    protected function createGroupAssignmentFor(User $user)
    {
        $name = $user->institution->slug. ': '.
            $user->course->slug.' ('.
            $user->intake.
            ' Class of '.
            $user->year.')';
        $username = $user->institution->slug.
            $user->course->slug.
            $user->intake.
            $user->year.
            $user->intake;
        $description = 'This is the group for the '.$name;

        $group = $user->groups()->create([
            'name' => $name,
            'username' => $this->clean($username),
            'description' => $description,
            'institution_id' => $user->institution->id
        ]);

        $this->joinGroup($group, $user);

        $group->suggestion()->create([
            'intake' => $user->intake,
            'course_id' => $user->course->id,
            'institution_id' => $user->institution->id,
            'year' => $user->year,
        ]);
    }

    /**
     * Change the group's administrator.
     *
     * @param Group $group
     * @param $email
     * @return bool
     */
    public function updateAdministratorOf(Group $group, $email)
    {
        $user = User::where('email', $email)->first();

        if($user != null)
        {
            if($group->isAMember($user))
            {
                $group->update([
                    'user_id' => $user->id,
                ]);
                return true;
            }
        }

        Toastr::error('The user is not a member of the group.');
        return false;
    }

    /**
     * Clean the group username of special characters,
     * spaces and uppercase letters.
     * @param $string
     * @return mixed
     */
    protected function clean($string) {

        $string = strtolower($string); //Lower the capital letters
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }
} 