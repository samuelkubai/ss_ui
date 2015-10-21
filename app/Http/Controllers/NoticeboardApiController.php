<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Api\NoticeTransformer;
use App\Http\Controllers\Controller;
use App\Repos\Notice\NoticeRepository;


class NoticeboardApiController extends Controller
{
    /**
     * @var NoticeRepository
     */
    private $noticeRepository;
    /**
     * @var NoticeTransformer
     */
    private $transformer;

    /**
     * @param NoticeRepository $noticeRepository
     * @param NoticeTransformer $transformer
     */
    function __construct(NoticeRepository $noticeRepository, NoticeTransformer $transformer)
    {

        $this->noticeRepository = $noticeRepository;
        $this->transformer = $transformer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allNotices()
    {
        $user = \Auth::user();
        $notices = $this->noticeRepository
            ->getUserNotices($user);
        return response([
            'data' => $this->transformer->transformCollection($notices->all()),
        ], 200, []);
    }
}
