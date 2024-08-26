<!-- resources/views/home.blade.php -->

@extends('layout')

@section('title', 'Home Page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contactus.css') }}">
@endpush

@section('content')
   
<h1>Contact Us</h1>

<form action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="message">Message:</label>
        <textarea name="message" id="message">{{ old('message') }}</textarea>
        @error('message')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Send Message</button>
</form>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif
@endsection
