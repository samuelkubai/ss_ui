<?php namespace App\Traits;

use App\Group;
use App\Repos\Group\GroupRepository;
use App\Search\Search;
use Illuminate\Support\Facades\Input;


trait GroupSearchable
{
    /**
     * @var Search
     */
    private $search;
    /**
     * @var GroupRepository
     */
    private $groupRepository;

    /**
     * Initialize the variables to be used in the trait.
     *
     * @param Search $search
     * @param GroupRepository $groupRepository
     */
    function __construct(Search $search, GroupRepository $groupRepository)
    {

        $this->search = $search;
        $this->groupRepository = $groupRepository;
    }

    /**
     * Searches for the groups with the input values.
     * Plug-in to any controller.
     *
     * @return mixed
     */
    public function searchGroups()
    {
        if(Input::get('q') || Input::get('f'))
        {
            if(Input::get('q') && Input::get('f'))
            {
                return $this->search->groups(Input::get('q') , Input::get('f'));
            }
            else
            {
                return $this->search->groups(Input::get('q'));
            }
        }

        return Group::simplePaginate(8);
    }

}