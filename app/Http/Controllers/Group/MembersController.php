<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    // index
    public function index(Group $group)
    {
        // get all group members
        $members = $group->users()->get();
        // generate unique invitate link

        return view('group.member.index', compact('group', 'members'));
    }
    // show
    public function show(Group $group, User $user)
    {
        // get user active posts
        $posts = $user->posts()->where('group_id', $group->id)->where('status', 'active')->get();
        // return view group members show
        return view('group.member.show', compact('group', 'user', 'posts'));
    }
    // invite
    public function invite(Group $group, Request $request)
    {
        // validate
        //emal has to be existing in users
        $request->validate([
            'email' => 'required|exists:users,email'
        ]);
        // if user is already member of group
        if ($group->users()->where('email', $request->email)->exists()) {
            return redirect()->route('group.members', $group)->withErrors(['email' => 'Je hebt deze gebruiker al uitgenodigd.']);
        }
        //give user status awaiting
        $user = User::where('email', $request->email)->first();
        $group->users()->attach($user->id, ['role' => 'member', 'status' => 'awaiting']);
        // redirect
        return redirect()->route('group.members', $group);
    }
    // search
    public function search(Group $group, Request $request)
    {
        // search query

        $search = $request->search;
        $status = $request->status ?? false;
        // if no request return
        if (!$search && !$status) {
            return redirect()->route('group.members', $group);
        }
        // filter by username, email, name, and status from pivot group_user table // filter on group->user
        $members = $group->users()->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('username', 'LIKE', "%{$search}%");
        })->get();
        // now get all users filter by status pivot group_user
        if ($status) {
            $members = $members->filter(function ($member) use ($status) {
                return $member->pivot->status == $status;
            });
        }
        $searchQuery = ['query' => $search, 'status' => $status];
        // return
        return view('group.member.index', compact('group', 'members', 'searchQuery'));
    }
}
