<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function demoPage()
    {
        $post = Post::with('comments')->inRandomOrder()->first();
        return view('demo-page',compact('post'));
    }
}
