<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  @vite('resources/css/app.css')
</head>

<body>
  @auth
  <h2>login successful! Welcome {{$user}}</h2>
  <form action="/logout" method="post">
  @csrf
  <input type="submit" value="Logout" class="bg-green-500 text-white rounded p-2 hover:bg-green-600">
  </form>
  @else
  <div class="p-4">
    <h1 class="text-3xl font-bold text-green-500 pb-4">Register</h1>
    <form action="/login" method="post" class="flex flex-col ">
      @csrf
      <input type="text" name="loginname" id="name" placeholder="Name" class="border-green-300 border-solid border-2 p-2 rounded mb-2">
      <input type="password" name="loginpassword" id="password" placeholder="Password" class="border-green-300 border-solid border-2 p-2 rounded mb-2">
      <input type="submit" value="Login" class="bg-green-500 p-2 rounded text-gray-100 font-bold text-[1.2rem] hover:bg-green-600">
    </form>
  </div>
  <div class="p-4">
    <h1 class="text-3xl font-bold text-green-500 pb-4">Register</h1>
    <form action="/register" method="post" class="flex flex-col ">
      @csrf
      <input type="text" name="name" id="name" placeholder="Name" class="border-green-300 border-solid border-2 p-2 rounded mb-2">
      <input type="text" name="email" id="email" placeholder="Email" class="border-green-300 border-solid border-2 p-2 rounded mb-2">
      <input type="password" name="password" id="password" placeholder="Password" class="border-green-300 border-solid border-2 p-2 rounded mb-2">
      <input type="submit" value="Register" class="bg-green-500 p-2 rounded text-gray-100 font-bold text-[1.2rem] hover:bg-green-600">
    </form>
  </div>
  @endauth

  
</body>

</html>