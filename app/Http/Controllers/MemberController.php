<?php

namespace App\Http\Controllers;

use App\Repos\Group\GroupRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Kamaln7\Toastr\Facades\Toastr;

class MemberController extends Controller
{
    /**
     * @var GroupRepository
     */
    private $groupRepository;

    /**
     * Initialize the controller's variables.
     * @param GroupRepository $groupRepository
     */
    function __construct(GroupRepository $groupRepository)
    {

        $this->groupRepository = $groupRepository;
    }

    /**
     * Display a listing of the members.
     *
     * @param $groupUsername
     * @return \Illuminate\Http\Response
     */
    public function index($groupUsername)
    {
        $group = $this->groupRepository
            ->findGroupWithUsername($groupUsername);
        $members = $this->groupRepository
            ->membersOfGroup($group);

        $title = $group->name. "'s Members";

        return view('ss.groups.members', compact('title', 'group', 'members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * The user joins a specific group.
     *
     * @param $groupUsername
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($groupUsername)
    {
        $group = $this->groupRepository
            ->findGroupWithUsername($groupUsername);

        $this->groupRepository->joinGroup($group, Auth::user());

        Toastr::success('You have successfully joined '.$group->name);

        return redirect('/group/'.$group->username);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $groupUsername
     * @param  int $userId
     * @return \Illuminate\Http\Response
     */
    public function show($groupUsername, $userId)
    {
        $group = $this->groupRepository
            ->findGroupWithUsername($groupUsername);

        $title = 'Group  Member';
        return view('ss.groups.member', compact('title', 'group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * The user leaves a specific group.
     * @param $groupUsername
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($groupUsername)
    {
        $group = $this->groupRepository
            ->findGroupWithUsername($groupUsername);

        $this->groupRepository->leaveGroup($group, Auth::user());

        Toastr::success('You have successfully left '.$group->name);

        return redirect()->back();
    }
}
