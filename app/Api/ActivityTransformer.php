<?php namespace App\Api;


class ActivityTransformer extends BaseTransformer
{
    /**
     * Transforming the activity data to json.
     *
     * @param $activity
     * @return array
     */
    public function transform($activity)
    {
        if($activity->type == 'add_notice')
        {
            return [
                'created_at' => $activity->created_at->diffForHumans(),
                'type' => $activity->type,
                'user' => [
                    'id' => $activity->user->id,
                    'url' => asset('group/'.$activity->group->username.'/member/'.$activity->user->id),
                    'name' => $activity->user->first_name. ' '.$activity->user->last_name ,
                    'picture' => asset($activity->user->profilePictureSource()),
                ],
                'group' => [
                    'id' => $activity->group->id,
                    'url' => asset('group/'.$activity->group->username),
                    'username' => $activity->group->username,
                    'name' => $activity->group->name,
                ],
                'notice' => [
                    'id' => $activity->subject->id,
                    'title' => $activity->subject->title,
                    'message' => $activity->subject->message,
                    'created_at' => $activity->subject->created_at->format('jS \o\f F, Y g:i:s a'),
                ]
            ];
        } elseif($activity->type == 'add_file')
        {
            return [
                'created_at' => $activity->created_at->diffForHumans(),
                'type' => $activity->type,
                'user' => [
                    'id' => $activity->user->id,
                    'name' => $activity->user->first_name. ' '.$activity->user->last_name ,
                    'picture' => asset($activity->user->profilePictureSource()),
                ],
                'group' => [
                    'id' => $activity->group->id,
                    'url' => asset('group/'.$activity->group->username),
                    'username' => $activity->group->username,
                    'name' => $activity->group->name,
                ],
                'file' => [
                    'id' => $activity->subject->id,
                    'title' => $activity->subject->name,
                    'topic' => $activity->subject->topic->name,
                    'path' => asset($activity->subject->path),
                    'picture' => asset($activity->subject->picture()),
                    'created_at' => $activity->subject->created_at->format('jS \o\f F, Y g:i:s a'),
                ]
            ];
        } else {
            return [
                'type' => 'no_activity',

            ];
        }

    }
}