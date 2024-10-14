<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  @vite('resources/css/app.css')
</head>
<body>
  <div class="p4 flex flex-col">

    <form action="/loginlogin" method="POST">
      @csrf
      <input type="text" name="stundet_id" placeholder="Student Id" class="border-green-300 border-solid border-2 p-2 rounded mb-2">
      <input type="password" name="password" placeholder="Password" class="border-green-300 border-solid border-2 p-2 rounded mb-2">
      <input type="submit" value="Login" class="bg-green-500 text-white font-bold p-2">
    </form>
  </div>
</body>
</html>