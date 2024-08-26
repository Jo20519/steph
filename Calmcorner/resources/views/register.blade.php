<!-- resources/views/home.blade.php -->

@extends('layout')

@section('title', 'Registration Page')


@section('content')
<h1> Register</h1>

<!-- Display Success Message -->
@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<!-- Registration Form -->
<form action="{{ route('register.store') }}" method="POST">
    @csrf

    <!-- Name Field -->
    <div>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <div style="color: red;">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- Email Field -->
    <div>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div style="color: red;">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- Password Field -->
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        @error('password')
            <div style="color: red;">
                {{ $message }}
            </div>
        @enderror
    </div>

    <!-- Password Confirmation Field -->
    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
    </div>
    <div>
        <label for="role">Role:</label>
        <input type="role" id="role" name="role">
        @error('role')
            <div style="color: red;">
                {{ $message }}
            </div>
        @enderror
    </div>
    <!-- Submit Button -->
    <button type="submit">Register</button>
</form>

</div>

@endsection
