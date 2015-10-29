<?php namespace App\Api;


class NoticeTransformer extends BaseTransformer
{

    /**
     * Transforming the single notice data to json.
     *
     * @param $notice
     * @return array
     */
    public function transform($notice)
    {
        return [
            'id' => $notice->id,
            'title' => $notice->title,
            'message' => $notice->message,
            'created_at' => $notice->created_at->diffForHumans(),
            'yourNotice' => (bool) ($notice->user->id == \Auth::user()->id),
            'user' => [
                'id' => $notice->user->id,
                'name' => $notice->user->first_name . ' ' . $notice->user->last_name,
            ],
            'group' => [
                'id' => $notice->group->id,
                'name' => $notice->group->name,
                'username' => $notice->group->username,
            ],
            'url' => [
                'delete' => url('noticeboard/'.$notice->id.'/delete'),
            ]
        ];
    }
}