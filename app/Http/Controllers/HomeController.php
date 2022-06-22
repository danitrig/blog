<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');  Comentamos para que nos deje ver la página con los posts
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index2()
    {
        $categories = Category::all();
        $posts = Post::orderBy('id', 'DESC')->paginate(3);
        $users = User::all();

        return view('posts', [
            'categories' => $categories,
            'users' => $users,
            'posts' => $posts
        ]);
    }

    public function index()
    {
        $categories = Category::all();
        $posts = Post::orderBy('id', 'DESC')->paginate(3);
        $users = User::all();

        return view('posts', [
            'categories' => $categories,
            'users' => $users,
            'posts' => $posts
        ]);
    }

    public function post(Request $request)
    {
        // Obtener post
        $post = Post::find($request->postId);
        return view('post', [
            'post' => $post,
        ]);
    }

    public function postsByCategory($category)
    {
        $categories = Category::all();
        $category = Category::where('name', '=', $category)->first();
        $posts = Post::where('category_id', '=', $category->id)->get();
        return view('posts', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }
}
