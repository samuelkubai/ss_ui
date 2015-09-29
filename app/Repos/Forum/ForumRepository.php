<?php

namespace App\Repos\Forum;

use App\Forum;

class ForumRepository {

    /**
     * Create a new forum.
     *
     * @param $request
     * @param $group
     * @return mixed
     */
    public function createForum($request, $group)
    {
        $forum = $group->forums()->create([
            'title' => $request->name,
            'user_id' => \Auth::user()->id,
        ]);

        return $forum;
    }

    /**
     * Post to an already existing forum.
     *
     * @param $forum
     * @param $request
     * @return mixed
     */
    public function createForumPost($forum, $request)
    {
        $post = $forum->posts()->create([
            'user_id' => \Auth::user()->id,
            'message' => $request->message,
        ]);

        return $post;
    }

    /**
     * @param $forumId
     *
     * Close a forum
     */
    public function closeForum($forumId)
    {

        $forum = Forum::where('id', '=', $forumId)->first();

        $forum->fill([
            'forumStatus' => 1
        ])->save();
    }

} 