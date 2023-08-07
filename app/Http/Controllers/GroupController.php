<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupRequest;
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

        if ($request->file('logo')) {
            $image = $request->file('logo');
            $imageName = 'groupImage' . '.' . $image->extension();
            $relativePath = 'storage/images/groups/' . $group->id;
            $absolutePath = public_path('storage/images/groups/' . $group->id);
            $image->move($absolutePath, $imageName);
            $groupData['logo'] = $relativePath . '/' . $imageName;
        }
        // redirect to group page
        Session::put('currentGroup', $group->id);
        return redirect()->route('group.dashboard', $group);
    }
}
