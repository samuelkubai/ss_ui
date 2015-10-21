<?php namespace App\Repos;

use App\Group;
use App\User;
use App\Activity;

class ActivityRepository
{
    /**
     * Gets the user's relevant activities
     * @param User $user
     * @param int $howMany
     * @return mixed
     */
    public function getAllActivitiesFor(User $user, $howMany = 10)
    {
        return Activity::with('user', 'group', 'subject')
            ->whereIn('group_id', $user->joinedGroupIds())
            ->latest()
            ->simplePaginate($howMany);
    }

    /**
     * Gets the related activities for the specified group.
     *
     * @param Group $group
     * @param int $howMany
     * @return mixed
     */
    public function getGroupActivitiesFor(Group $group, $howMany = 5)
    {
        return Activity::with('user', 'group', 'subject')
            ->where('group_id', $group->id)
            ->latest()
            ->simplePaginate($howMany);
    }


}