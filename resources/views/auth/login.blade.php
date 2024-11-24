<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>CvSU-B Enrollment System</title>
</head>

<body class="bg-gradient-to-r from-green-100 to-green-200 flex items-center justify-center h-screen">
  <div class="text-center w-[900px]">
    {{-- <div class="mb-4">
            <img src="{{ Vite::asset('resources/assets/cvsulogo.png') }}" alt="University Logo" class="w-20 mx-auto">
        </div>
        <h1 class="text-2xl font-semibold text-green-700 mb-2">Cavite State University</h1>
        <h2 class="text-lg font-medium text-green-800 mb-8">Bacoor Campus</h2> --}}

    <div class="flex justify-between bg-white rounded-3xl shadow-lg overflow-hidden">
      <div class="w-[45%] p-8">
        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
          @csrf

          <!-- Email Address -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 text-left">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
              autocomplete="username" placeholder="Enter your email"
              class="p-3 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-green-500 w-full">
            @error('email')
              <span class="text-sm text-red-500 mt-2">{{ $message }}</span>
            @enderror
          </div>

          <!-- Password -->
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 text-left">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
              placeholder="Enter your password"
              class="p-3 border border-gray-300 rounded-md text-base focus:outline-none focus:ring-2 focus:ring-green-500 w-full">
            @error('password')
              <span class="text-sm text-red-500 mt-2">{{ $message }}</span>
            @enderror
          </div>

          <!-- Remember Me -->
          <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember"
              class="rounded border-gray-300 text-green-600 focus:ring-green-500">
            <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
          </div>

          <a href="{{ route('password.request') }}" class="text-sm text-green-700 hover:underline text-center">
            Forgot Your Password?
          </a>
          <button type="submit" class="bg-green-700 text-white py-3 rounded-md text-base hover:bg-green-800 mt-4">Log
            In</button>
        </form>
      </div>

      <div class="w-[45%] flex items-center justify-center bg-gray-100">
        <img src="{{ Vite::asset('resources/assets/stingrays.png') }}" alt="University Logo"
          class="w-full h-full object-cover rounded-lg">
      </div>
    </div>
  </div>
</body>

</html>
