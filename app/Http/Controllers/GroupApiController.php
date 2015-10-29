<?php namespace App\Http\Controllers;

use App\Api\ActivityTransformer;
use App\Api\BackPackTransformer;
use App\Api\FileTransformer;
use App\Api\GroupTransformer;
use App\Api\MemberTransformer;
use App\Api\TopicTransformer;
use App\Repos\File\FileRepository;
use App\Repos\Group\GroupRepository;
use App\Repos\User\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupApiController extends Controller
{
    /**
     * @var GroupRepository
     */
    private $groupRepository;
    /**
     * @var GroupTransformer
     */
    private $transformer;
    /**
     * @var FileRepository
     */
    private $fileRepository;
    /**
     * @var FileTransformer
     */
    private $fileTransformer;
    /**
     * @var TopicTransformer
     */
    private $topicTransformer;
    /**
     * @var MemberTransformer
     */
    private $memberTransformer;
    /**
     * @var ActivityTransformer
     */
    private $activityTransformer;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * Initializes all the controller variables.
     *
     * @param GroupRepository $groupRepository
     * @param GroupTransformer $transformer
     * @param FileRepository $fileRepository
     * @param FileTransformer $fileTransformer
     * @param ActivityTransformer $activityTransformer
     * @param UserRepository $userRepository
     * @param TopicTransformer $topicTransformer
     * @param MemberTransformer $memberTransformer
     */
    function __construct(GroupRepository $groupRepository, GroupTransformer $transformer,
                         FileRepository $fileRepository, FileTransformer $fileTransformer,
                         ActivityTransformer $activityTransformer,UserRepository $userRepository,
                         TopicTransformer $topicTransformer, MemberTransformer $memberTransformer)
    {
        $this->transformer = $transformer;
        $this->fileRepository = $fileRepository;
        $this->fileTransformer = $fileTransformer;
        $this->groupRepository = $groupRepository;
        $this->topicTransformer = $topicTransformer;
        $this->memberTransformer = $memberTransformer;
        $this->activityTransformer = $activityTransformer;
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $groups = $this->groupRepository
            ->allGroups();
        return response([
            'data' => $this->transformer->transformCollection($groups->all()),
        ], 200, []);
    }

    /**
     * Returns all the user's joined groups.
     *
     * @param $userId
     * @return \Illuminate\Http\Response
     */
    public function userGroups($userId)
    {
        $user = User::find($userId);

        $groups = $this->groupRepository
            ->allJoinedGroupsFor($user);

        return response([
            'data' => $this->transformer->transformCollection($groups->all()),
            'paginator' => [
                'current_page' => $groups->currentPage(),
                'has_more' => $groups->hasMorePages(),
                'limit' => $groups->perPage(),
            ]
        ], 200, []);
    }

    /**
     * Gets the files that belong to the group.
     *
     * @param $groupUsername
     * @return \Illuminate\Http\Response
     */
    public function groupFiles($groupUsername)
    {
        $group = $this->groupRepository->findGroupWithUsername($groupUsername);
        $files = $this->fileRepository->groupFilesForGroup($group);

        return response([
            'data' => $this->fileTransformer->transformCollection($files->all()),
        ], 200, []);

    }

    /**
     * Gets the files that belong to the group.
     *
     * @param $groupUsername
     * @return \Illuminate\Http\Response
     */
    public function groupTopics($groupUsername)
    {
        $group = $this->groupRepository->findGroupWithUsername($groupUsername);
        $topics = $this->fileRepository->getGroupTopicsForGroup($group);
        return response([
            'data' => $this->topicTransformer->transformCollection($topics->all()),
        ], 200, []);
    }

}
