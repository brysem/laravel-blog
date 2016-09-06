@extends('layouts.app')

@section('content')
    <section class="splash" style="{{ (!empty($post->cover_photo->cover->url)) ? 'background-image: url(\''.$post->cover_photo->cover->url.'\');' : '' }}">
        <div class="container">
            <h1 class="blog-post__heading">{{ $post->title}}</h1>
        </div>
    </section>

    <section class="blog-post">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-9">
                    {!! $post->content !!}
                    <hr>
                    <i class="fa fa-fw fa-clock-o"></i> Posted {{ $post->created_at }}
                </div>
                <div class="col-lg-3 col-lg-offset-1 col-md-2 col-md-offset-1">
                    @{{ Sidebar Placeholder }}
                </div>
            </div>
        </div>
    </section>

    @if($settings->blog_author)
    <section class="blog-author">
        <div class="container">
            <h2>{{ $post->user->name }}</h2>
            <div class="row">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4">
                    <img src="http://www.gravatar.com/avatar/{{ md5($post->user->email) }}?s=80&d=identicon" alt="Avatar" class="img-rounded" />
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-8">
                    <p>
                        {{ $post->user->intro }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($settings->blog_comments)
    <section class="blog-comments">
        <div class="container">
            <div class="well">
                {{ Form::open(['route' => ['post.comment', $post]]) }}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>Leave a Comment</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          {{ Form::label('Title') }}
                          {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          {{ Form::label('Email Address') }}
                          {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  {{ Form::label('Message') }}
                  {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Message']) }}
                </div>
                <div class="form-group">
                  {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
            @if($post->comments->count())
            <hr>
            <h2>Comments</h2>
            @forelse ($post->comments as $comment)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://www.gravatar.com/avatar/{{ md5($comment->email) }}?s=64&d=identicon" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->title }}
                        <small>{{ $comment->created_at }}</small>
                    </h4>
                    {{ $comment->content }}
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>
    @endif
@endsection
