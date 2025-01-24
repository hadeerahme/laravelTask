<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $postsFromDB = Post::all();
        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);

        $imagePath = $request->file('image')->store('posts', 'public');

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'user_id' => $request->post_creator,
        ]);

        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    public function update(Request $request, $postId)
    {
    
        $post = Post::find($postId);

        $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);

        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        } else {
            $imagePath = $post->image; 
        }
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'user_id' => $request->post_creator,
        ]);

        return to_route('posts.show', $postId);
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);

        
        if ($post && $post->image) {
            Storage::delete('public/' . $post->image);
        }

        $post->delete();

        return to_route('posts.index');
    }
}
