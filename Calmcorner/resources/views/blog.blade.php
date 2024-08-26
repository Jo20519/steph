<!-- resources/views/home.blade.php -->

@extends('layout')

@section('title', 'Home Page')

@section('content')
   
<header>
        <h1>Our Blog</h1>
        <p>Read inspiring stories and helpful tips on mental health and well-being.</p>
    </header>

    <main>
        <section class="blog-posts">
            <article>
                <h2>Understanding Anxiety: Tips for Managing Your Symptoms</h2>
                <p>Published on August 8, 2024 by Jane Doe</p>
                <p>Anxiety can feel overwhelming, but there are many strategies you can use to manage your symptoms. In this blog post, we explore practical tips and techniques for reducing anxiety and improving your quality of life.</p>
                <a href= >Read More</a>
            </article>

            <article>
                <h2>The Importance of Self-Care in Mental Health</h2>
                <p>Published on July 22, 2024 by John Smith</p>
                <p>Self-care is crucial for maintaining mental health and well-being. This post delves into the various self-care practices you can incorporate into your daily routine to enhance your emotional resilience and overall health.</p>
                <a href=>Read More</a>
            </article>

            <!-- Add more blog posts as needed -->
        </section>
    </main>
@endsection
