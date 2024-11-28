<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">User Profile</h1>
    
    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
      <h2 class="text-2xl font-semibold mb-2">{{ $user->name }}</h2>
      <p class="text-gray-700 mb-1">Email: {{ $user->email }}</p>
      <p class="text-gray-700">Joined: {{ $user->created_at->format('d M Y') }}</p>
    </div>

    <div class="flex space-x-2">
      <a href="{{ route('admin.profile.edit', $user->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
      <form action="{{ route('admin.profile.update', $user->id) }}" method="POST" class="inline">
        @csrf
        @method('PUT')
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
      </form>
      <form action="{{ route('admin.profile.destroy', $user->id) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
      </form>
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>