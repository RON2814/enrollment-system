<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Some Page</title>
</head>
<body>
    <h1>Welcome to Some Page</h1>
    <form method="POST" action="/submit-form">
        @csrf
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</body>
</html>
