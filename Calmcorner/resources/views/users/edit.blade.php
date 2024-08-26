@extends('layout')

@section('title', 'edit user')

@section('content')

<h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        <label for="role">Role:</label>
        <input type="text" name="role" id="role" value="{{ $user->role }}" required>
        <button type="submit">Update</button>
    </form>
@endsection