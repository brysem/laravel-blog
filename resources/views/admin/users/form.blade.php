<div class="form-group">
    {{ Form::label('Name') }}
    {{ Form::text('name', null, ['class' => 'form-control'] )}}
</div>

<div class="form-group">
    {{ Form::label('Email') }}
    {{ Form::text('email', null, ['class' => 'form-control'] )}}
</div>

<div class="form-group">
    {{ Form::label('Introduction') }}
    {{ Form::textarea('intro', null, ['class' => 'form-control'] )}}
</div>

<div class="form-group">
    {{ Form::label('Password') }}
    {{ Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off'] )}}
</div>

<div class="form-group">
    {{ Form::label('Password Confirmation') }}
    {{ Form::password('password_confirmation', ['class' => 'form-control', 'autocomplete' => 'off'] )}}
</div>

<div class="form-group">
    {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) }}
</div>
