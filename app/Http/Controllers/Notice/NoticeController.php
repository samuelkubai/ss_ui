<?php

namespace App\Http\Controllers\Notice;


use App\Http\Controllers;

use App\Notice;
use App\Repos\User\UserRepository;
use App\Repos\Notice\NoticeRepository;


class NoticeController extends Controller{

    protected $service;

    protected $repo;

    protected $client;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param NoticeService $service
     * @param NoticeRepository $repo
     * @param ClientRepository $client
     * @param UserRepository $userRepository
     */
    function __construct(NoticeService $service, NoticeRepository $repo, ClientRepository $client, UserRepository $userRepository)
    {
        $this->service = $service;
        $this->client = $client;
        $this->repo = $repo;
        $this->userRepository = $userRepository;
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNoticeRequest $request
     * @param $group
     * @return Response
     */
    public function store(CreateNoticeRequest $request, $group)
    {

        if($this->userRepository->isAMemberOf($group, \Auth::user()))
        {
            $this->dispatch(
            /* Returns a command for the Controller to dispatch */
                $this->service->storeNoticeCommand($request, $group)
            );
            $this->flash('You have successfully pined a new notice on your group notice board');
            return redirect()->back();
        }

        return redirect()->back()->withErrors('You are not a member of this groups, You can not Pin anything here.');

    }

    /**
     * Edit a pin that belongs to the logged in user
     */

    public function edit($noticeId)
    {

        $noticeDetail = $this->repo->getUserNotice($noticeId);

        return view('inspina.notice.edit_notice', compact('noticeDetail'));
    }

    /**
     * Update the details of a notice
     */

    public function update($noticeId, CreateNoticeRequest $request)
    {
        $this->repo->updateUserNotice($noticeId, $request);

        return redirect('/notices/edit/'.$noticeId);

    }


}