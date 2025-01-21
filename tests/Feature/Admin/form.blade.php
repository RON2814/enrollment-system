<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h1>Submit Form</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Form</h1>
    <form method="POST" action="/submit-form">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>

    <form method="POST" action="/form-submit">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
