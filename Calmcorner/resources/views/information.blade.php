<!-- resources/views/home.blade.php -->

@extends('layout')

@section('title', 'Information')

@section('content')
<div class="container">
        <h1>Understanding Mental Illnesses</h1>
        
        <section class="section" id="introduction">
            <h2>Introduction</h2>
            <p>Mental illnesses affect millions of people worldwide, yet they are often misunderstood. Understanding mental illnesses is crucial for providing appropriate support and treatment. This page provides an overview of various mental health conditions, their symptoms, and available resources for help.</p>
        </section>

        <section class="section" id="depression">
            <h2>Depression</h2>
            <p>Depression is a common mental health disorder characterized by persistent feelings of sadness, hopelessness, and a lack of interest in activities once enjoyed. It can significantly impact daily functioning and quality of life.</p>
            <img src="depression-image.jpg" alt="Depression">
            <ul>
                <li><a href="https://www.example.com/depression/symptoms">Symptoms of Depression</a></li>
                <li><a href="https://www.example.com/depression/treatment">Treatment Options for Depression</a></li>
                <li><a href="https://www.example.com/depression/self-help">Self-Help Strategies</a></li>
            </ul>
        </section>

        <section class="section" id="anxiety">
            <h2>Anxiety Disorders</h2>
            <p>Anxiety disorders are characterized by excessive worry, fear, or anxiety that interferes with daily activities. Common anxiety disorders include generalized anxiety disorder, panic disorder, and social anxiety disorder.</p>
            <img src="anxiety-image.jpg" alt="Anxiety Disorders">
            <ul>
                <li><a href="https://www.example.com/anxiety/symptoms">Symptoms of Anxiety Disorders</a></li>
                <li><a href="https://www.example.com/anxiety/treatment">Treatment Options for Anxiety</a></li>
                <li><a href="https://www.example.com/anxiety/self-help">Self-Help Strategies for Anxiety</a></li>
            </ul>
        </section>

        <section class="section" id="bipolar">
            <h2>Bipolar Disorder</h2>
            <p>Bipolar disorder involves extreme mood swings that include emotional highs (mania or hypomania) and lows (depression). These mood swings can affect sleep, energy levels, behavior, and the ability to think clearly.</p>
            <img src="bipolar-image.jpg" alt="Bipolar Disorder">
            <ul>
                <li><a href="https://www.example.com/bipolar/symptoms">Symptoms of Bipolar Disorder</a></li>
                <li><a href="https://www.example.com/bipolar/treatment">Treatment Options for Bipolar Disorder</a></li>
                <li><a href="https://www.example.com/bipolar/self-help">Self-Help Strategies for Bipolar Disorder</a></li>
            </ul>
        </section>

        <section class="section" id="schizophrenia">
            <h2>Schizophrenia</h2>
            <p>Schizophrenia is a severe mental disorder that affects how a person thinks, feels, and behaves. It is characterized by distorted thinking, hallucinations, and delusions, which can significantly impair daily functioning.</p>
            <img src="schizophrenia-image.jpg" alt="Schizophrenia">
            <ul>
                <li><a href="https://www.example.com/schizophrenia/symptoms">Symptoms of Schizophrenia</a></li>
                <li><a href="https://www.example.com/schizophrenia/treatment">Treatment Options for Schizophrenia</a></li>
                <li><a href="https://www.example.com/schizophrenia/self-help">Self-Help Strategies for Schizophrenia</a></li>
            </ul>
        </section>

        <section class="section" id="resources">
            <h2>Additional Resources</h2>
            <p>For more information and support, consider exploring these additional resources:</p>
            <div class="resources">
                <ul>
                    <li><a href="https://supportdirectory.au">Mental Health Directory</a></li>
                    <li><a href="https://www.mayoclinic.org/healthy-lifestyle/stress-management/in-depth/support-groups/art-20044655">Support Groups</a></li>
                    <li><a href="https://ultimatecarelinks.co.ke">Counseling Services</a></li>
                    <li><a href="https://findahelpline.com">Crisis Hotlines</a></li>
                </ul>
            </div>
        </section>

        <section class="section" id="get-in-touch">
            <h2>Get In Touch</h2>
            <p> We are here to help and provide support.</p>
        </section>
    </div>
@endsection
