<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<style>
    body .main {
        background: #ebe9e9;

    }
</style>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 h-screen">
            {{-- @include('layouts.navigation') --}}

            
            @if (auth()->check())
            <p>User is authenticated</p>
            <p>User Role: {{ auth()->user()->role->title }}</p>
        
            @switch(auth()->user()->role->id)
                @case(1) <!-- Student -->
                    @include('student.student-navbar')
                    @break
        
                @case(2) <!-- Department -->
                    @include('department.department-navbar')
                    @break
        
                @case(3) <!-- Registrar -->
                    @include('registrar.registrar-navbar')
                    @break
        
                @case(4) <!-- Admin -->
                    @include('admin.admin-navbar')
                    @break
        
                @default
                    <p>Role not recognized: {{ auth()->user()->role->id }}</p>
            @endswitch
        @else
            <p>User not authenticated</p>
        @endif
        
        </aside>

        <!-- Main Content -->
        <div class="flex-1 bg-gray-100 dark:bg-gray-900 main">
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
