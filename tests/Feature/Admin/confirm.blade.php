<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Action</title>
</head>
<body>
    <h1>Are you sure you want to delete this resource?</h1>
    <p>Resource: {{ $resource->name }}</p>

    <form method="POST" action="/danger-action">
        @csrf
        <input type="hidden" name="id" value="{{ $resource->id }}">
        <button type="submit">Yes, Delete</button>
    </form>

    <a href="/resources">Cancel</a>
</body>
</html>
