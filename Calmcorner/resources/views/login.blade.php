<!-- resources/views/home.blade.php -->

@extends('layout')

@section('title', 'Login Page')
<style>.logo {
    max-width: 150px; /* Adjust the size as needed */
    height: auto;
}</style>

@section('content')
<h1>Login</h1>

<form action="{{ route('login.submit') }}" method="POST">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        @error('password')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Login</button>
</form>
<div>
@endsection
