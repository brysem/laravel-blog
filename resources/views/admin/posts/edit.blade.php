@extends('layouts.admin')

@section('title', $post->title)

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Post
    </div>
    <div class="panel-body">
        {{ Form::model($post, ['route' => ['admin::post.update', $post], 'method' => 'put', 'files' => true]) }}
        @include('admin.posts.form')
        {{ Form::close() }}
    </div>
</div>
@endsection
