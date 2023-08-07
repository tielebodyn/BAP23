<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class MapController extends Controller
{
    // index
    public function index(Group $group)
    {
        $activePosts = $group->posts->where('status', 'active')->all();
        return view('group.map.index', compact('group', 'activePosts'));
    }
}
