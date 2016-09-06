@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
{{ Form::model($settings, ['route' => 'admin::setting.update', 'method' => 'put', 'files' => true]) }}
<div class="panel panel-default">
    <div class="panel-heading">
        Site
    </div>
    <div class="panel-body">
        <div class="form-group">
            {{ Form::label('Site Title') }}
            {{ Form::text('site_title', null, ['class' => 'form-control'] )}}
            <p class="help-block">The name of your website.</p>
        </div>

        <div class="form-group">
            {{ Form::label('Site Subtitle') }}
            {{ Form::text('site_subtitle', null, ['class' => 'form-control'] )}}
            <p class="help-block">A little slogan to describe your site.</p>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Blog
    </div>
    <div class="panel-body">

        <div class="form-group">
            {{ Form::label('Blog Pagination') }}
            {{ Form::number('blog_pagination', null, ['class' => 'form-control'] )}}
            <p class="help-block">Amount of posts to show on the blog page.</p>
        </div>

        <div class="form-group">
            {{ Form::label('Blog Author') }}
            {{ Form::hidden('blog_author', false) }}
            {{ Form::checkbox('blog_author', null, null) }}
            <p class="help-block">Display the about author block on posts.</p>
        </div>

        <div class="form-group">
            {{ Form::label('Blog Comments') }}
            {{ Form::hidden('blog_comments', false) }}
            {{ Form::checkbox('blog_comments', null, null) }}
            <p class="help-block">Display the comments block for posts.</p>
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) }}
</div>
{{ Form::close() }}
@endsection
