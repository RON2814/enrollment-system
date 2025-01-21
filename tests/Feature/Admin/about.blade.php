<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Add your stylesheet here -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>About Us</h1>
        @include('layouts.nav')

        <p>Welcome to our website! We are a team dedicated to providing the best service and experience for our users.</p>

        <section>
            <h2>Our Mission</h2>
            <p>Our mission is to deliver high-quality solutions that meet the needs of our clients and users, ensuring a seamless experience every time.</p>
        </section>

        <section>
            <h2>Our Values</h2>
            <ul>
                <li>Integrity</li>
                <li>Innovation</li>
                <li>Customer Satisfaction</li>
            </ul>
        </section>

        <section>
            <h2>Contact Us</h2>
            <p>If you have any questions, feel free to <a href="{{ route('contact') }}">contact us</a>.</p>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Our Company. All rights reserved.</p>
    </footer>
</body>
</html>
