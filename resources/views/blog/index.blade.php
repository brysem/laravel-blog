@extends('layouts.app')

@section('content')
<section class="splash">
    <div class="container">
        <h1>{{ $settings->site_title }}</h1>
        <p>{{ $settings->site_subtitle }}</p>
    </div>
</section>

<section class="blog-posts">
    <div class="container">
        <h1>Latests Entries</h1>
        <div class="grid">
            <div class="grid-sizer"></div>
            @foreach($posts as $post)
            <div class="grid-item blog-excerpt">
                <a class="blog-excerpt__image" href="{{ $post->url }}" style="{{ (!empty($post->cover_photo->cover->url)) ? 'background-image: url(\''.$post->cover_photo->cover->url.'\');' : '' }}"></a>
                <h3 class="blog-excerpt__header"><a href="{{ $post->url }}">{{ $post->title }}</a></h3>
                <p class="blog-excerpt__text">{{ $post->excerpt }}</p>
                <a class="btn btn-primary" href="{{ $post->url }}">Read More <i class="fa fa-fw fa-arrow-right"></i></a>
            </div>
            @endforeach
        </div>
        @if(!$posts->count())
            <p>There are no entries yet.</p>
        @endif

        {{ $posts->links() }}
    </div>
</section>
@endsection
