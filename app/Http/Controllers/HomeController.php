<?php

namespace App\Http\Controllers;

use App\Repos\ActivityRepository;
use App\Repos\File\FileRepository;
use App\Repos\Group\GroupRepository;
use App\Search\Search;
use App\Topic;
use App\Traits\GroupSearchable;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    use GroupSearchable;
    /**
     * @var FileRepository
     */
    private $fileRepository;
    /**
     * @var ActivityRepository
     */
    private $activityRepository;

    /**
     * Initialize the variables for the controller.
     *
     * @param FileRepository $fileRepository
     * @param ActivityRepository $activityRepository
     */
    function __construct(FileRepository $fileRepository, ActivityRepository $activityRepository)
    {

        $this->fileRepository = $fileRepository;
        $this->activityRepository = $activityRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Home';
        $groups = $this->searchGroups();
        $topics = $this->fileRepository->getAllTopics();
        return view('ss.home.index', compact('title', 'groups', 'topics'));
    }

}
