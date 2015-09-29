<?php namespace App\Traits\Post;


trait Postable {

    Public function post($message, $group, $url)
    {
        return $group->posts()->create([
            'title' => $group->name,
            'message' => $message,
            'url' => $url,
            'user_id' => \Auth::user()->id,
        ]);
    }

}