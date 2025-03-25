<!-- resources/views/roles/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>

    <form action="{{ route('roles.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" class="form-control" value="{{ $user->role }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update User</button>
    </form>
</div>
@endsection