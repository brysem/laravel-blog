<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->paginate($this->settings->blog_pagination);

        return view('blog.index', compact('posts'));
    }
}
