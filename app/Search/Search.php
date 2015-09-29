<?php

namespace App\Search;

use App\Forum;
use App\Notice;

class Search
{
    /**
     * @param $search
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function notices($search)
    {
        return Notice::with('user', 'group')->where(function($query) use($search)
        {
            $query->whereIn('group_id', \Auth::user()->followedGroupIds())
                ->where('title', 'LIKE', "%$search%")
                ->orWhere('message', 'LIKE', "%$search%");
        })->get();
    }

    /**
     * Searches through the forums that pertain to the user.
     *
     * @param $search
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function forums($search)
    {
       return Forum::with('user', 'group')->where(function($query) use($search)
        {
            $query->whereIn('group_id', \Auth::user()->followedGroupIds())
                ->where('title', 'LIKE', "%$search%")
                ->orWhere('message', 'LIKE', "%$search%");
        })->get();
    }
}