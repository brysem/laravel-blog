@extends('layouts.admin')

@section('title', 'Posts')

@section('content')
{{ Form::open(['route' => 'admin::post.delete', 'method' => 'delete']) }}
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ Form::checkbox('checkall', null, null, ['id' => 'checkall']) }}</th>
                <th>Title</th>
                <th>Author</th>
                <th>Status</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>{{ Form::checkbox('checked[]', $post->id) }}</td>
                <td><a href="{{ route('admin::post.edit', $post) }}">{{ $post->title }}</a></td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No posts available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->

<div class="row">
    <div class="col-sm-6">
        {{ $posts->links() }}
    </div>
    <div class="col-sm-6 text-right">
        {{ Form::submit('Delete Selection', ['class' => 'btn btn-danger']) }}
        <a class="btn btn-success" href="{{ route('admin::post.create') }}">Create Post</a>
    </div>
</div>
{{ Form::close() }}
@endsection
