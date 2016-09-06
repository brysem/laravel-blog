@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Post
    </div>
    <div class="panel-body">
        {{ Form::open(['route' => 'admin::post.store', 'method' => 'post', 'files' => true]) }}
        @include('admin.posts.form')
        {{ Form::close() }}
    </div>
</div>
@endsection
