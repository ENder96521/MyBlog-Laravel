<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::orderby('created_at', 'desc')->paginate(5);
        return view('backend.postList', ['posts' => $posts]);
    }

    public function create()
    {
        return view('backend.postCreate');
    }

    public function store(Request $request) 
    {
        Post::create([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
        ]);

        return redirect('/postList');
    }

    public function edit($id) 
    {
        $post = Post::find($id);
        return view('backend.postEdit', ['post' => $post]);
    }

    public function update(Request $request) 
    {
        $post = Post::find($request->id);
        $post->update([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
        ]);

        return redirect('/postList');
    }

    public function destroy($id) 
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/postList');
    }

    public function home()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();

        return view('index', ['posts' => $posts ]);
    }

    public function post($id) 
    {
        $post = Post::find($id);
        $post->content = Str::markdown($post->content);
        return view('post', ['post' => $post]);
    } 

    public function posts() 
    {
        $posts = Post::orderby('created_at', 'desc')->paginate(6);
        return view('postList', ['posts' => $posts]);
    }
}
