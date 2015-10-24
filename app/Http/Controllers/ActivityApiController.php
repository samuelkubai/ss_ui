<?php namespace App\Http\Controllers;

use App\Repos\Group\GroupRepository;
use App\Repos\User\UserRepository;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Api\ActivityTransformer;
use App\Repos\ActivityRepository;
use App\Http\Controllers\Controller;

class ActivityApiController extends Controller
{
    /**
     * @var ActivityRepository
     */
    private $activityRepository;
    /**
     * @var ActivityTransformer
     */
    private $transformer;
    /**
     * @var GroupRepository
     */
    private $groupRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * Initialize the variables for the controller.
     *
     * @param ActivityRepository $activityRepository
     * @param ActivityTransformer $transformer
     * @param GroupRepository $groupRepository
     * @param UserRepository $userRepository
     */
    public function __construct(ActivityRepository $activityRepository, ActivityTransformer $transformer,
                                GroupRepository $groupRepository, UserRepository $userRepository)
    {
        $this->transformer = $transformer;
        $this->userRepository = $userRepository;
        $this->groupRepository = $groupRepository;
        $this->activityRepository = $activityRepository;
    }

    /**
     * Returns a list of the user's activities.
     *
     * @param null $userId
     * @return \Illuminate\Http\Response
     */
    public function userActivities($userId = null)
    {
        $user = $this->userRepository->findUser($userId);
        $activities = $this->activityRepository->getAllActivitiesFor($user, 8);
        return response([
            'data' => $this->transformer->transformCollection($activities->all()),
            'paginator' => [
                'current_page' => $activities->currentPage(),
                'has_more' => $activities->hasMorePages(),
                'limit' => $activities->perPage(),
            ]
        ], 200, []);
    }

    /**
     * Returns the groups related to a specific group.
     * @param $groupUsername
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function groupActivities($groupUsername)
    {
        $group = $this->groupRepository->findGroupWithUsername($groupUsername);
        $activities = $this->activityRepository->getGroupActivitiesFor($group, 8);
        return response([
            'data' => $this->transformer->transformCollection($activities->all()),
            'paginator' => [
                'current_page' => $activities->currentPage(),
                'has_more' => $activities->hasMorePages(),
                'limit' => $activities->perPage(),
            ]
        ], 200, []);
    }

    /**
     * Gets the activities of a  member of a specific group.
     *
     * @param $groupUsername
     * @param $userId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function memberActivities($groupUsername, $userId)
    {
        $user = $this->userRepository->findUser($userId);
        $group = $this->groupRepository->findGroupWithUsername($groupUsername);
        $activities = $this->groupRepository
            ->activitiesForMember($user, $group, 8);

        return response([
            'data' => $this->transformer->transformCollection($activities->all()),
            'paginator' => [
                'current_page' => $activities->currentPage(),
                'has_more' => $activities->hasMorePages(),
                'limit' => $activities->perPage(),
            ]
        ], 200, []);
    }

}
