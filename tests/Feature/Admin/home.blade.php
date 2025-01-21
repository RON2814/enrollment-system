<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    @include('layouts.nav')

    @auth
        <div class="dropdown">
            <button class="dropdown-toggle">Dropdown Menu</button>
            <div class="dropdown-menu">
            <a href="/dropdown-option-1">Option 1</a>
                <a href="/dropdown-option-2">Option 2</a>
                @can('access-admin-panel')
                    <a href="/admin-panel">Admin Panel</a>
                @endcan
                <a href="/profile">Profile</a>
                <form method="POST" action="/logout" style="display:inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    @else
        <p>Please <a href="/login">log in</a> to see the dropdown menu.</p>
    @endauth
</body>
</html>
