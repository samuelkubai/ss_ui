<?php

namespace App\Http\Controllers;

use App\Api\FileTransformer;
use App\Api\TopicTransformer;
use App\Http\Requests;
use App\Repos\Group\GroupRepository;
use Illuminate\Http\Request;
use App\Api\BackPackTransformer;
use App\Repos\File\FileRepository;
use App\Http\Controllers\Controller;

class BackpackApiController extends Controller
{
    /**
     * @var FileRepository
     */
    private $fileRepository;
    /**
     * @var BackPackTransformer
     */
    private $transformer;
    /**
     * @var TopicTransformer
     */
    private $topicTransformer;
    /**
     * @var GroupRepository
     */
    private $groupRepository;

    /**
     * Initialize the controller variables.
     *
     * @param FileRepository $fileRepository
     * @param FileTransformer $transformer
     * @param TopicTransformer $topicTransformer
     * @param GroupRepository $groupRepository
     */
    function __construct(FileRepository $fileRepository, FileTransformer $transformer,
                         TopicTransformer $topicTransformer, GroupRepository $groupRepository)
    {
        $this->transformer = $transformer;
        $this->fileRepository = $fileRepository;
        $this->topicTransformer = $topicTransformer;
        $this->groupRepository = $groupRepository;
    }
    /**
     * Display a listing of the backpack files for the authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function backpackFiles()
    {

        $user = \Auth::user();
        $files = $this->fileRepository->getBackpackFilesForUser($user);
        return response([
            'data' => $this->transformer->transformCollection($files->all()),
        ], 200, []);
    }

    /**
     * Display a listing of the backpack topics for the authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function backpackTopics()
    {
        $user = \Auth::user();
        $topics = $this->fileRepository->getBackpackTopicsForUser($user);
        return response([
            'data' => $this->topicTransformer->transformCollection($topics->all()),
        ], 200, []);
    }

    /**
     * Add a file to the user's backpack
     *
     * @param $fileId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function addToBackpack($fileId)
    {
        $file = $this->fileRepository->findFileById($fileId);
        $file = $this->fileRepository->addFileToBackpackForUser(\Auth::user(), $file);
        if($file)
        {
            return response('File successfully added', 200, []);
        } else {
            return response('File already in your backpack.', 400, []);
        }
    }

    /**
     * Share file to a group.
     *
     * @param $fileId
     * @param $groupId
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function shareFileToGroup($fileId, $groupId)
    {
        $group = $this->groupRepository->findGroupWith($groupId);
        $file = $this->fileRepository->findFileById($fileId);
        $file = $this->fileRepository->shareFileToGroup($group, $file, \Auth::user());
        if($file){
            return response('File successfully shared', 200, []);
        } else {
            return response('File is already in the group.', 400, []);
        }
    }
}
