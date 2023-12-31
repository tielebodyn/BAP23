<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Group;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Group $group)
    {
        $categories = Category::all();

        // get all active posts from group
        $activePosts = $group->posts->where('status', 'active')->sortByDesc('created_at')->all();

        return view('group.post.index', compact('group', 'activePosts', 'categories'));
    }

    public function show(Group $group, Post $post)
    {
        // comments
        $comments = $post->comments->sortByDesc('created_at')->all();
        return view('group.post.show', compact('group', 'post', 'comments'));
    }

    public function create(Group $group)
    {
        $categories = Category::all();
        return view('group.post.create', compact('group', 'categories'));
    }

    public function store(Group $group, PostRequest $request)
    {
        $user = auth()->user();
        $validatedRequest = $request->validated();
        $post = Post::create(
            [
                'title' => $validatedRequest['title'],
                'type' => $validatedRequest['type'],
                'description' => $validatedRequest['description'],
                'price' => $validatedRequest['price'],
                'long' => $validatedRequest['long'],
                'lat' => $validatedRequest['lat'],
                'place' => $validatedRequest['place'],
                'status' => 'active',
                'user_id' => $user->id,
                'group_id' => $group->id,
            ]
        );

        // save categories in category_post table
        if (isset($validatedRequest['categories'])) {
            foreach ($validatedRequest['categories'] as $category) {
                $post->categories()->attach($category);
            }
        }
        // save images
        if (isset($validatedRequest['images'])) {
            foreach ($validatedRequest['images'] as $key => $image) {
                $imageName = 'image_' . $key + 1 . '.' . $image->extension();
                $relativePath = 'storage/images/groups/' . $group->id . '/posts/' . $post->id;
                $absolutePath = public_path('storage/images/groups/' . $group->id . '/posts/' . $post->id);
                $image->move($absolutePath, $imageName);
                $post->images()->create(
                    [
                        'image_path' => $relativePath . '/' . $imageName,
                        'post_id' => $post->id,
                    ]
                );
            }
        }
        $post->save();
        return redirect()->route('group.post.index', $group);
    }

    public function search(Group $group, Request $request)
    {
        $searchQuery = $request->search;
        $type = $request->type;

        // filter by search query
        $allActivePosts = Post::where('title', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('place', 'LIKE', '%' . $searchQuery . '%')
            ->orWhereHas('categories', function ($query) use ($searchQuery) {
                $query->where('name', 'LIKE', '%' . $searchQuery . '%');
            })
            ->orWhereHas('user', function ($query) use ($searchQuery) {
                $query->where('name', 'LIKE', '%' . $searchQuery . '%');
            })
            ->get();

        $activePosts = $allActivePosts->where('group_id', $group->id)->sortByDesc('created_at')->all();
        // filter by type
        if ($type !== 'all') {
            $activePosts = $allActivePosts->where('type', $type)->where('group_id', $group->id)->sortByDesc('created_at')->all();
        }

        return view('group.post.index', compact('group', 'activePosts', 'searchQuery'));
    }
    // edit
    public function edit(Group $group, Post $post)
    {

        // check if user is owner of post
        if (auth()->user()->id !== $post->user_id) {
            abort(403);
        }
        $categories = Category::all();
        return view('group.post.edit', compact('group', 'post', 'categories'));
    }
    // update
    public function update(Group $group, Post $post, PostRequest $request)
    {
        // check if user is owner of post
        if (auth()->user()->id !== $post->user_id) {
            abort(403);
        }
        $validatedRequest = $request->validated();
        $post->update(
            [
                'title' => $validatedRequest['title'],
                'type' => $validatedRequest['type'],
                'description' => $validatedRequest['description'],
                'price' => $validatedRequest['price'],
                'long' => $validatedRequest['long'],
                'lat' => $validatedRequest['lat'],
                'place' => $validatedRequest['place'],
                'status' => $validatedRequest['status'],
            ]
        );

        // save categories in category_post table
        if (isset($validatedRequest['categories'])) {
            $post->categories()->detach();
            foreach ($validatedRequest['categories'] as $category) {
                $post->categories()->attach($category);
            }
        }
        // save images
        if (isset($validatedRequest['images'])) {
            foreach ($validatedRequest['images'] as $key => $image) {
                $imageName = 'image_' . $key + 1 . '.' . $image->extension();
                $relativePath = 'storage/images/groups/' . $group->id . '/posts/' . $post->id;
                $absolutePath = public_path('storage/images/groups/' . $group->id . '/posts/' . $post->id);
                $image->move($absolutePath, $imageName);
                $post->images()->create(
                    [
                        'image_path' => $relativePath . '/' . $imageName,
                        'post_id' => $post->id,
                    ]
                );
            }
        }
        $post->save();
        return redirect()->route('profile.show', $group);
    }
    // delete
    public function destroy(Group $group, Post $post)
    {
        // check if user is owner of post
        if (auth()->user()->id !== $post->user_id) {
            abort(403);
        }
        $post->delete();
        return redirect()->route('profile.show', $group);
    }
}
