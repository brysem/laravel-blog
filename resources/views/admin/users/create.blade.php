@extends('layouts.admin')

@section('title', 'Add User')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        User
    </div>
    <div class="panel-body">
        {{ Form::open(['route' => 'admin::user.store', 'method' => 'post']) }}
        @include('admin.users.form')
        {{ Form::close() }}
    </div>
</div>
@endsection
