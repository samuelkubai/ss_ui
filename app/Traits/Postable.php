<?php namespace App\Traits;


use App\Interfaces\PostableInterface;

trait Postable
{
    public function post(PostableInterface $model, $type, $group, $user)
    {
        return $model->activity()->create([
            'type' => $type,
            'user_id'=> $user->id,
            'group_id'=> $group->id,
        ]);
    }
}