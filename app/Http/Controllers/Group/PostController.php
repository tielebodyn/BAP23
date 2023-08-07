<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\Post;

class PostController extends Controller
{
    // index
    public function index(Group $group)
    {
        // get all posts from group
        $activePosts = $group->posts->where('status', 'active')->all();

        return view('group.post.index', compact('group', 'activePosts'));
    }
    // show
    public function show(Group $group, Post $post)
    {
        return view('group.post.show', compact('group', 'post'));
    }
    // create
    public function create(Group $group)
    {
        $categories = Category::all();
        return view('group.post.create', compact('group', 'categories'));
    }
    // store

}
