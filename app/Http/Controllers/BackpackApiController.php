<?php

namespace App\Http\Controllers;

use App\Api\FileTransformer;
use App\Api\TopicTransformer;
use App\Http\Requests;
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
     * Initialize the controller variables.
     *
     * @param FileRepository $fileRepository
     * @param FileTransformer $transformer
     * @param TopicTransformer $topicTransformer
     */
    function __construct(FileRepository $fileRepository, FileTransformer $transformer, TopicTransformer $topicTransformer)
    {
        $this->transformer = $transformer;
        $this->fileRepository = $fileRepository;
        $this->topicTransformer = $topicTransformer;
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
}
