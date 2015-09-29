<?php

namespace App\Repos\Notice;

use App\Group;
use App\Notice;

class NoticeRepository
{
    /**
     * Creates a new notice(s).
     *
     * @param $title
     * @param $message
     * @param Array $groupIds
     * @return \Illuminate\Database\Eloquent\Model
     */

    public function storeNotices($title, $message, Array $groupIds)
    {
        $groups = Group::whereIn('id', $groupIds)->get();

        foreach($groups as $group)
        {
            $this->persistNotice($title, $message, $group);
        }
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
     * @param Notice $notice
     * @return bool
     * @throws \Exception
     */
    public function deleteNotice(Notice $notice)
    {
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
    public function persistNotice ($title, $message, Group $group)
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