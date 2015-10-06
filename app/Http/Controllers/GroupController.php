<?php namespace App\Http\Controllers;

use App\Facade\Search;
use App\Http\Requests;
use App\Institution;
use Illuminate\Http\Request;
use App\Repos\Group\GroupRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class GroupController extends Controller
{
    /**
     * @var GroupRepository
     */
    private $groupRepository;

    /**
     * Initialize variables for the class.
     *
     * @param GroupRepository $groupRepository
     */
    function __construct(GroupRepository $groupRepository)
    {

        $this->groupRepository = $groupRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Input::get('q') == '')
        {
            $title = 'Groups';

            $groups = $this->groupRepository->allGroupsPaginated();

        } else {

            $title= 'Group Search Results';

            $groups = Search::groups(Input::get('q'));
        }

        $institutions = Institution::all();

        return view('ss.groups.index', compact('groups', 'institutions' ,'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = $this->groupRepository
            ->createGroup($request->name, $request->username, $request->description, $request->institution_id, \Auth::user());

        return redirect('/groups?q='.$group->name);
    }

    /**
     * Display the specified resource.
     *
     * @param $group
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($group)
    {
        $group = $this->groupRepository
            ->findGroupWith($group);

        $title = $group->name;

        return view('ss.groups.activity', compact('group', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $group
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($group)
    {
        $group = $this->groupRepository
            ->findGroupWith($group);

        $title = $group->name . ' Update';
        $institutions = Institution::all();

        return view('ss.groups.update', compact('group', 'title', 'institutions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
