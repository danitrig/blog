<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


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
    public function index()
    {
        $prueba = Category::find(2);
        //dd($prueba->posts);
        return view('posts');
    }
    public function post()
    {
        return view('post');
    }
}
