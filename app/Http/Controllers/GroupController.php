<?php namespace App\Http\Controllers;

use App\Http\Requests\UpdateAdministratorRequest;
use App\Search\Search;
use App\Http\Requests;
use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Institution;
use App\Traits\GroupSearchable;
use Illuminate\Http\Request;
use App\Repos\Group\GroupRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Kamaln7\Toastr\Facades\Toastr;

class GroupController extends Controller
{
    use GroupSearchable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Input::get('q') == '')
        {
            $title = 'All Groups';

            $groups = $this->groupRepository->allGroupsPaginated();

        } else {


            $groups = $this->searchGroups();

            $title= $groups->count(). ' groups found for "'. Input::get('q') . '"';
        }

        $institutions = Institution::all();

        return view('ss.groups.index', compact('groups', 'institutions' ,'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateGroupRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGroupRequest $request)
    {
        $group = $this->groupRepository
            ->createGroup($request, \Auth::user());
        Toastr::success($group->name.' has been successfully created.');
        return redirect('/group/'.$group->username);
    }

    /**
     * Display the specified resource.
     *
     * @param $groupUsername
     * @return \Illuminate\Http\Response
     * @internal param $group
     * @internal param int $id
     */
    public function show($groupUsername)
    {
        $group = $this->groupRepository
            ->findGroupWithUsername($groupUsername);

        $title = $group->name;

        return view('ss.groups.activity', compact('group', 'groups','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $groupUsername
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($groupUsername)
    {
        $group = $this->groupRepository
            ->findGroupWithusername($groupUsername);

        $title = $group->name . ' Update';
        $institutions = Institution::all();

        return view('ss.groups.update', compact('group', 'title', 'institutions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateGroupRequest|UpdateGroupRequest|Request $request
     * @param $groupUsername
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, $groupUsername)
    {
        $targetGroup = $this->groupRepository
            ->findGroupWithUsername($groupUsername);

        $group = $this->groupRepository
            ->updateGroup($request, $targetGroup);

        Toastr::success($group->name. ' has been successfully updated');
        return redirect()->back();
    }

    /**
     * Update the group's administrator.
     *
     * @param $groupUsername
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateAdministrator($groupUsername)
    {
        if(Input::get('email') == '')
        {
            Toastr::error("Please fill in the email of the member you want to be administrator.");
            return redirect()->back();
        }
        $targetGroup = $this->groupRepository
            ->findGroupWithUsername($groupUsername);

        $response = $this->groupRepository
            ->updateAdministratorOf($targetGroup, Input::get('email'));

        if($response)
        {
            Toastr::success($targetGroup->name. "'administrator has been successfully changed.");
            return redirect('/group/'.$targetGroup->username);
        }
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $groupUsername
     * @return \Illuminate\Http\Response
     */
    public function destroy($groupUsername)
    {
        $targetGroup = $this->groupRepository
            ->findGroupWithUsername($groupUsername);
        $this->groupRepository
            ->deleteGroup($targetGroup);

        Toastr::success($targetGroup->name . ' successfully deleted.');
        return redirect('/');
    }


    public function files($groupUsername)
    {
        $group = $this->groupRepository
            ->findGroupWithUsername($groupUsername);

        $title = 'Group  File';
        return view('ss.groups.files', compact('title', 'group'));
    }
}
