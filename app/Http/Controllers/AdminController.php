<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {
        $total = [
            'users'    => User::count(),
            'posts'    => Post::published()->count(),
            'comments' => Comment::count()
        ];
        return view('admin.index', compact('total'));
    }
}
