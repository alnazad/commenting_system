<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index()
    {
        // Get all posts
        $posts = Post::all();

        // Return the view with the posts
        return view('posts.index', compact('posts'));
    }
}
