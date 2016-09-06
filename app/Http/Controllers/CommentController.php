<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;

use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = new Comment;
        $data = $request->only('title', 'content', 'email');
        $data['ip'] = $request->ip();
        $comment->fill($data);
        $comment->save();

        \Toastr::success('Comment posted.', 'Success');
        return redirect()->back();
    }
}
