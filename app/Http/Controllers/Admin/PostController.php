<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();

        return view('admin.posts.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
    public function store(Request $request)
    {
        $newPost = new Post();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'images/posts/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('image')->move($destinationPath, $filename);
            $newPost->image = $destinationPath . $filename;
        }

        $newPost->title = $request->title;
        $newPost->category_id = $request->category_id;
        $newPost->contenido = $request->contenido;
        $newPost->user_id = auth()->id();

        $newPost->save();
        return redirect()->back();
    }

    public function update(Request $request, $postId)
    {
        $post = Post::find($postId);

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->contenido = $request->contenido;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'images/posts/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('image')->move($destinationPath, $filename);
            $post->image = $destinationPath . $filename;
        }

        $post->save();

        return redirect()->back();
    }

    public function delete(Request $request, $postId)
    {
        $post = Post::find($postId);

        $post->delete();

        return redirect()->back();
    }
}
