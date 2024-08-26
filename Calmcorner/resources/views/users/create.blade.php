@extends('layout')

@section('title', 'create user')

@section('content')

<h1>Create User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
        <label for="role">Role:</label>
        <input type="text" name="role" id="role" required>
        <button type="submit">Create</button>
    </form>
    @endsection