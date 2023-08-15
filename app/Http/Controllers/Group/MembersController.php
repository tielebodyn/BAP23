<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    // index
    public function index(Group $group)
    {
        // get all group members
        $members = $group->users()->get();
        return view('group.members', compact('group'));
    }
}
