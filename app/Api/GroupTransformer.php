<?php namespace App\Api;


class GroupTransformer extends BaseTransformer
{


    /**
     * Transforming the single Group data to json.
     *
     * @param $group
     * @return array
     */
    public function transform($group)
    {
        return [
          'group' => [
              'id' => $group->id,
              'url' => url('group/'.$group->username),
              'name' => $group->name,
              'institution' => $group->institution->name,
              'description' => $group->description,
              'administrator' => isset($group->user)?$group->user->first_name .' '. $group->user->last_name : null,
              'picture' => asset($group->profilePictureSource()),
              'leaving_url' => url('group/' . $group->username . '/leave'),
              'joining_url' => url('group/' . $group->username . '/join'),
              'joined' => (boolean) \Auth::user()->isAMemberOf($group),
          ]
        ];
    }
}