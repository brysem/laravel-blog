<div class="form-group">
    {{ Form::label('Title') }}
    {{ Form::text('title', null, ['class' => 'form-control'] )}}
</div>

<div class="form-group">
    {{ Form::label('Slug') }}
    {{ Form::text('slug', null, ['class' => 'form-control'] )}}
</div>

<div class="form-group">
    {{ Form::label('Status') }}
    {{ Form::select('status', $status_list, null, ['class' => 'form-control'] )}}
</div>

<div class="form-group">
    {{ Form::label('Content') }}
    {{ Form::textarea('content', null, ['class' => 'form-control wysiwyg'] )}}
</div>



<div class="form-group">
    {{ Form::label('Cover Photo') }}
    @if(isset($post->cover_photo) || !empty($post->cover_photo->original->url))
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8">
            <img class="img-responsive" src="{{ $post->cover_photo->original->url }}">
        </div>
    </div>
    <br>
    @endif
    {{ Form::file('cover_photo', null, ['class' => 'form-control'] )}}
</div>

<div class="form-group">
    {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) }}
</div>
