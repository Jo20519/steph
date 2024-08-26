<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <!-- Add any additional stylesheets or scripts here -->
    
    <link rel="stylesheet" href="{{ asset('css/contactus.css') }}">
  

</head>
<body>
    <header>
        <!-- Header content, like navigation -->
        <nav>
          
            <a href="{{ url('/') }}" data-page="home">Home</a>
           
            <a href="{{ url('/about') }}" data-page="about">AboutUs</a>
           
           
            <a href="{{ url('/contactus') }}" data-page="contactus">Contactus</a>
           
            <a href="{{ url('/blog') }}" data-page="blog">Blog</a>

            <a href="{{ url('/information') }}" data-page="information">Information</a>

            <a href="{{ url('/support') }}" data-page="support">Support</a>

            <a href="{{ url('/register') }}" data-page="register">Register</a>
       

        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer content -->
        <p>&copy; {{ date('Y') }} Calmcorner. All rights reserved.</p>
    </footer>

    
    <!-- Add any additional scripts here -->
    <!-- In your Blade view -->


<script>
    document.getElementById('fetch-data').addEventListener('click', function() {
        fetch('/ajax-data')
            .then(response => response.json())
            .then(data => {
                document.getElementById('result').innerText = data.message;
            })
            .catch(error => console.error('Error:', error));
    });
</script>

</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
