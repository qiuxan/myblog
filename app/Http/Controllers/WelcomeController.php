<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(){
        return view('Welcome')
            ->with('tags',Tag::all())
            ->with('posts',Post::all())
            ->with('categories',Category::all());
    }
}
