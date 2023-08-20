<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    // index
    public function index(Group $group)
    {
        // check if user is admin (in group_user pivot table)
        $groupOwner = $group->users->where('pivot.role', 'admin')->first();
        $user = auth()->user();
        $isAdmin = $group->users()
            ->where('group_user.user_id', $user->id)
            ->where('group_user.role', 'admin')
            ->exists();



        return view('group.dashboard', compact('group', 'isAdmin', 'groupOwner'));
    }
}
