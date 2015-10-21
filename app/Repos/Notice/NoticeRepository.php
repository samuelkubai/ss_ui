<?php

namespace App\Repos\Notice;

use App\Group;
use App\Http\Requests\PinNoticeRequest;
use App\Notice;
use App\Repos\Group\GroupRepository;
use App\Search\Search;
use App\Traits\Postable;
use App\User;
use Illuminate\Support\Facades\Input;

class NoticeRepository
{
    use Postable;
    /**
     * @var GroupRepository
     */
    private $groupRepository;
    /**
     * @var Search
     */
    private $search;

    /**
     * Initialize variables for use in the repository.
     *
     * @param Search $search
     * @param GroupRepository $groupRepository
     */
    function __construct(GroupRepository $groupRepository, Search $search)
    {

        $this->groupRepository = $groupRepository;
        $this->search = $search;
    }

    /**
     * Creates a new notice(s).
     *
     * @param PinNoticeRequest $request
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Model
     */

    public function storeNotices(PinNoticeRequest $request, User $user)
    {
        // Gets the group the notice is to be pinned to.
        $group = $this->groupRepository->findGroupWithUsername($request->group);

        // Pin the notice.
        $notice = $this->persistNotice($request->get('title'), $request->get('message'), $group);

        $this->post($notice, 'add_notice', $group, $user);

        return $notice;

    }

    /**
     * Updates a notice.
     *
     * @param $noticeId
     * @param $title
     * @param $message
     */
    public function updateNotice($noticeId, $title, $message)
    {
        //get the pin to be updated
        $notice = Notice::find($noticeId);

        //update the pin title and message
        $notice->fill(
            [
                'title' => $title,
                'message' => $message,
            ]
        )->save();
    }

    /**
     * Gets the notices from the groups the user belongs to.
     *
     * @param User $user
     * @return mixed
     */
    public function getUserNotices(User $user)
    {
        if(!Input::get('q'))
        return Notice::whereIn('group_id', $user->joinedGroupIds())->latest()->simplePaginate();

        return $this->search->notices(Input::get('q'), Input::get('f'), Input::get('group'));
    }

    /**
     * Retrieve a single notice.
     *
     * @param $noticeId
     * @return mixed
     */
    public function getNotice($noticeId)
    {
        //return the detail of the pin to allow the detail to be updated
        return Notice::find($noticeId);
    }

    /**
     * Deletes a notice.
     *
     * @param int $noticeId
     * @return bool
     */
    public function deleteNotice($noticeId)
    {
        $notice = Notice::find($noticeId);
        $notice->activity()->delete();

        $notice->delete();

        return true;
    }

    /**
     * Store a notice to the database.
     *
     * @param $title
     * @param $message
     * @param Group $group
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function persistNotice ($title, $message, Group $group)
    {

        $notice = $group->notices()->create(
            [
                'title' => $title,
                'message' => $message,
                'user_id' => \Auth::user()->id,
            ]
        );

        return $notice;
    }



}