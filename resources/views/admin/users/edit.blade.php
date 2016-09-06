@extends('layouts.admin')

@section('title', $user->name)

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        User
    </div>
    <div class="panel-body">
        {{ Form::model($user, ['route' => ['admin::user.update', $user], 'method' => 'put', 'autocomplete' => 'off']) }}
        @include('admin.users.form')
        {{ Form::close() }}
    </div>
</div>
@endsection
