<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // index
    public function index()
    {
        $group = null;
        if (Session::get('currentGroup')) {
            $group = Group::find(Session::get('currentGroup'));
        };
        // overview all groups where group user status is awaiting
        $invitedGroups = auth()->user()->groups->where('pivot.status', 'invited');
        $groups = auth()->user()->groups->where('pivot.status', 'accepted');
        return view('my-groups', compact('groups', 'group', 'invitedGroups'));
    }
}
