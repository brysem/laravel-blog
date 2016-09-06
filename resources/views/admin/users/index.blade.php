@extends('layouts.admin')

@section('title', 'Users')

@section('content')
{{ Form::open(['route' => 'admin::user.delete', 'method' => 'delete']) }}
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ Form::checkbox('checkall', null, null, ['id' => 'checkall']) }}</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ Form::checkbox('checked[]', $user->id) }}</td>
                <td><a href="{{ route('admin::user.edit', $user) }}">{{ $user->name }}</a></td>
                <td>{{ $user->created_at }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No users available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->

<div class="row">
    <div class="col-sm-6">
        
    </div>
    <div class="col-sm-6 text-right">
        {{ Form::submit('Delete Selection', ['class' => 'btn btn-danger']) }}
        <a class="btn btn-success" href="{{ route('admin::user.create') }}">Create User</a>
    </div>
</div>
{{ Form::close() }}
@endsection
