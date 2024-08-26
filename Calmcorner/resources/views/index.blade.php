<!-- resources/views/home.blade.php -->

@extends('layout')

@section('title', 'Home Page')

@section('content')
   


    <header>
        <h1>Welcome to Calm Corner</h1>
        <p>Your safe space for mental health support and resources.</p>
        
    </header>

    <section>
        <h2>Our Mission</h2>
        <p>At Calm Corner, our mission is to provide a supportive community where you can find information, tools, and resources to help you on your mental health journey.</p>
    </section>

    <section>
        <h2>What We Offer</h2>
        <div class="services">
            <div class="service">
                <h3>Information</h3>
                <p>Explore articles, guides, and resources on mental health topics.</p>
               
            </div>
            <div class="service">
                <h3>Support</h3>
                <p>We offer the following 24/7 crisis hotlines and proffessional contacts.</p>
           
            </div>
            <div class="service">
                <h3>Blog</h3>
                <p>Read inspiring stories and tips from our community members.</p>
              
            </div>
        </div>
    </section>
@endsection
