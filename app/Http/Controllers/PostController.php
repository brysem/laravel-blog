<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;

use App\Http\Requests\PostRequest;
use App\Http\Requests\CommentRequest;

use Waran\Traits\Admin\MultiDeleteTrait;

class PostController extends Controller
{
    use MultiDeleteTrait;

    protected $primaryModel = Post::class;

    public function view(Post $post)
    {
      if($post->status == POST::STATUS_DRAFT) {
        throw new \Exception("This post has not been published yet.");
      }

      return view('blog.post', compact('post'));
    }

    public function comment(Post $post, CommentRequest $request)
    {
        $comment = new Comment;
        $data = $request->only('title', 'content', 'email');
        $data['post_id'] = $post->id;
        $data['ip'] = $request->ip();
        $comment->fill($data);
        $comment->save();

        \Toastr::success('Comment posted.', 'Success');
        return redirect()->back();
    }

    public function create()
    {
        $post = new Post;
        $status_list = $post->status_list;

        return view('admin.posts.create', compact('status_list'));
    }

    public function store(PostRequest $request)
    {
      $post = new Post;
      $post->fill($request->only('status', 'title', 'slug', 'content', 'cover_photo'));
      $post->fill(['user_id' => \Auth::user()->id]);
      $post->save();

      \Toastr::success('Post created.', 'Success');
      return redirect()->route('admin::post.index');
    }

    public function edit(Post $post)
    {
        $status_list = $post->status_list;

        return view('admin.posts.edit', compact('post', 'status_list'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->fill($request->only('status', 'title', 'slug', 'content'));
        if(isset($request->cover_photo) || !empty($request->cover_photo)) $post->cover_photo = $request->cover_photo;
        $post->save();

        \Toastr::success('Post updated.', 'Success');
        return redirect()->route('admin::post.index');
    }

    public function admin()
    {
        $posts = Post::paginate(10);

        return view('admin.posts.index', compact('posts'));
    }
}
