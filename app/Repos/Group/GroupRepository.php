<?php

namespace App\Repos\Group;


use App\User;
use App\Group;

class GroupRepository
{

     /** Creates a new group for the specified user.
     *
     * @param $name
     * @param $username
     * @param $description
     * @param $institutionId
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createGroup($name, $username, $description, $institution_id,User $user)
    {
        return $user->groups()->create([
            'name' => $name,
            'username' => $username,
            'description' => $description,
            'institution_id' => $institution_id
        ]);
    }

    /**
     * Updates a group with new details.
     *
     * @param $name
     * @param $username
     * @param $description
     * @param $institutionId
     * @param Group $group
     * @return Group
     */
    public function updateGroup($name, $username, $description, $institutionId, Group $group)
    {
        $group->fill([
            'name' => $name,
            'username' => $username,
            'description' => $description,
            'institution_id' => $institutionId
        ]);

        return $group;
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
     * Gets all the groups in the system.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function allGroups()
    {
        return Group::all();
    }

    /**
     * Gets all the groups in the system paginated.
     *
     * @param int $howMany
     * @return mixed
     */
    public function allGroupsPaginated($howMany = 10)
    {
        return Group::simplePaginate($howMany);
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
     * @param $group
     * @return mixed
     */
    public function membersOfGroup(Group $group)
    {
        return $group->followers()->orderBy('firstName')->get();
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
        return $group->followers()->orderBy('firstName')->paginate($howMany);
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
} 