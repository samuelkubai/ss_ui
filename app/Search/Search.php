<?php

namespace App\Search;

use App\Forum;
use App\Group;
use App\Notice;

class Search
{
    /**
     * @param $search
     * @param $filter
     * @param $group
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function notices($search, $filter, $group)
    {
        if($filter)
        {
            if($group)
            {
                return Notice::with('user', 'group')
                    ->where(function($query) use($search)
                        {
                            $query->whereIn('group_id', \Auth::user()->joinedGroupIds())
                                ->where('title', 'LIKE', "%$search%")
                                ->orWhere('message', 'LIKE', "%$search%");
                        })
                    ->where('user_id', \Auth::user()->id)
                    ->where('group_id', $group)
                    ->latest()
                    ->simplePaginate();
            }

            return Notice::with('user', 'group')
                ->where(function($query) use($search)
                    {
                        $query->whereIn('group_id', \Auth::user()->joinedGroupIds())
                            ->where('title', 'LIKE', "%$search%")
                            ->orWhere('message', 'LIKE', "%$search%");
                    })
                ->where('user_id', \Auth::user()->id)
                ->latest()
                ->simplePaginate();
        }
        if($group)
        {
            return Notice::with('user', 'group')
                ->where(function($query) use($search)
                    {
                        $query->whereIn('group_id', \Auth::user()->joinedGroupIds())
                            ->where('title', 'LIKE', "%$search%")
                            ->orWhere('message', 'LIKE', "%$search%");
                    })
                ->where('group_id', $group)
                ->latest()
                ->simplePaginate();
        }
        return Notice::with('user', 'group')
            ->where(function($query) use($search)
                {
                    $query->whereIn('group_id', \Auth::user()->joinedGroupIds())
                        ->where('title', 'LIKE', "%$search%")
                        ->orWhere('message', 'LIKE', "%$search%");
                })
            ->get();
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

    /**
     * Searches for a specific group by the the name.
     *
     * @param $text
     * @param int $filter
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function groups($text, $filter = 0)
    {
        if($filter == 2)
        {
            return Group::with('user')
                ->whereIn('id', \Auth::user()->joinedGroupIds())
                ->where(function($query) use($text)
                {
                    $query->where('name', 'LIKE', "%$text%")
                        ->orWhere('description', 'LIKE', "%$text%")
                        ->orWhere('username', 'LIKE', "%$text%");
                })->simplePaginate();

        }elseif($filter == 1){
            return Group::with('user')
                ->where('institution_id', '1')
                ->where(function($query) use($text)
                {
                    $query->where('name', 'LIKE', "%$text%")
                        ->orWhere('description', 'LIKE', "%$text%")
                        ->orWhere('username', 'LIKE', "%$text%");
                })->simplePaginate();
        }else{
            return Group::with('user')
            ->where(function($query) use($text)
            {
                $query->where('name', 'LIKE', "%$text%")
                    ->orWhere('description', 'LIKE', "%$text%")
                    ->orWhere('username', 'LIKE', "%$text%");
            })->simplePaginate();
        }

    }

}