<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    // index
    public function index()
    {
        // pass group from session
        if (Session::get('currentGroup')) {
            Session::forget('currentGroup');
        };
        $newGroup = true;
        return view('group.create', compact('newGroup'));
    }

    public function store(CreateGroupRequest $request): RedirectResponse
    {
        // validate
        // create group
        $groupData = $request->validated();
        $groupData['slug'] = $groupData['name'];
        $group = Group::create($groupData);
        // make user admin
        $group->users()->attach($request->user()->id, ['role' => 'admin']);
        $group->users()->updateExistingPivot($request->user()->id, ['status' => 'accepted']);
        if ($request->file('logo')) {
            $image = $request->file('logo');
            $imageName = 'groupImage' . '.' . $image->extension();
            $relativePath = 'storage/images/groups/' . $group->id;
            $absolutePath = public_path('storage/images/groups/' . $group->id);
            $image->move($absolutePath, $imageName);
            $groupData['logo'] = $relativePath . '/' . $imageName;
            $group->update($groupData);
        }
        // redirect to group page
        Session::put('currentGroup', $group->id);
        return redirect()->route('group.dashboard', $group);
    }
    // accept
    public function accept(Group $group, Request $request)
    {
        // update group user status to accepted
        $group->users()->updateExistingPivot($request->user()->id, ['status' => 'accepted']);
        // redirect group dashboard
        return redirect()->route('group.dashboard', $group);
    }
    // decline
    public function decline(Group $group, Request $request)
    {
        // update group user status to declined
        $group->users()->updateExistingPivot($request->user()->id, ['status' => 'declined']);
        // redirect to home page
        // remove group from session
        Session::forget('currentGroup');
        return redirect()->back();
    }

    // edit
    public function edit(Group $group)
    {
        return view('group.admin.edit', compact('group'));
    }
    // update
    public function update(UpdateGroupRequest $request, Group $group)
    {
        // validate

        $groupData = $request->validated();
        // update group
        $group->update($groupData);
        // update logo
        if ($request->file('logo')) {
            $image = $request->file('logo');
            $imageName = 'groupImage' . '.' . $image->extension();
            $relativePath = 'storage/images/groups/' . $group->id;
            $absolutePath = public_path('storage/images/groups/' . $group->id);
            $image->move($absolutePath, $imageName);
            $groupData['logo'] = $relativePath . '/' . $imageName;
            $group->update($groupData);
        }
        // redirect to group page
        return redirect()->route('group.dashboard', $group);
    }
}
