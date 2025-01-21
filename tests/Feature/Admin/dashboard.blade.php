<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <li><a href="{{ route('profile') }}">Profile</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h1>Welcome, {{ auth()->user()->name }}!</h1>

        <p>This is your dashboard where you can manage your account and view important updates.</p>

        <!-- Dashboard Overview -->
        <section>
            <h2>Dashboard Overview</h2>
            @include('layouts.nav')
            @extends('layouts.app')

@section('content')
    <h1>Welcome to the Dashboard!</h1>
    <!-- Page content goes here -->
@endsection


            <div class="overview">
                <div class="card">
                    <h3>Total Users</h3>
                    <p>150</p>
                </div>
                <div class="card">
                    <h3>Recent Activity</h3>
                    <p>You have 3 new notifications.</p>
                </div>
                <div class="card">
                    <h3>Messages</h3>
                    <p>You have 5 unread messages.</p>
                </div>
            </div>
        </section>

        <!-- Latest Activity -->
        <section>
            <h2>Latest Activity</h2>
            <ul>
                <li>Logged in at {{ now()->format('Y-m-d H:i:s') }}</li>
                <li>Profile updated</li>
                <li>New message from admin</li>
            </ul>
        </section>

        <!-- Quick Links -->
        <section>
            <h2>Quick Links</h2>
            <ul>
                <li><a href="{{ route('profile') }}">Update Profile</a></li>
                <li><a href="{{ route('settings') }}">Account Settings</a></li>
                <li><a href="{{ route('notifications') }}">View Notifications</a></li>
            </ul>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
    </footer>
</body>
</html>
