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
        $groups = auth()->user()->groups;
        return view('home', compact('groups', 'group'));
    }
}
