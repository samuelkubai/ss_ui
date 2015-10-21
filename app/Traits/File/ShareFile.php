<?php

namespace App\Traits\File;

use App\File;
use App\User;
use App\Group;

trait ShareFile{

    /**
     * Share the file to a group.
     *
     * @param Group $group
     * @param File $file
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function shareFileToGroup(Group $group, File $file)
    {
        return $group->files()->create([
            'name' => $file->name(),
            'type' => $file->type(),
            'path' => $file->path(),
            'mime' => $file->mime(),
            'topic_id' => $file->topic->id,
            'user_id' => $file->user->id
        ]);
    }

    /**
     * Stores the file to the user's bag pack.
     *
     * @param User $user
     * @param File $file
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addFileToBagPack(User $user, File $file)
    {
        return $user->files()->create([
            'name' => $file->name(),
            'type' => $file->type(),
            'path' => $file->path(),
            'mime' => $file->mime(),
            'user_id' => $file->user_id
        ]);
    }
} 