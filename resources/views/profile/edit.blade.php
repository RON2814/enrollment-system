<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 w-full"> <!-- Make the container full width -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full"> <!-- Ensure the form container is full width -->
                <div class="w-full"> <!-- Remove the max-w-xl restriction -->
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
