<x-app-layout>

    <div class="header-wrapper flex justify-between items-center flex-wrap bg-white p-4 py-3">
        <div class="header-title pl-3 font-semibold text-[#206A5D]">
            <h2>Department</h2>
        </div>

        <div class="user-info flex items-center gap-2">
            <div class="dropdown relative inline-block">
                <button
                    class="dropdown-button bg-white text-[#333] border border-[#ccc] py-2 px-4 text-sm font-medium rounded-lg flex items-center cursor-pointer"
                    onclick="toggleDropdown()">
                    <span id="username">{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down ml-2"></i>
                </button>

                <div
                    class="dropdown-content absolute hidden bg-white min-w-[160px] shadow-lg z-10 top-full right-0 rounded-xl py-2">
                    <a href="{{ route('profile.edit') }}"
                        class="block py-3 px-4 text-sm text-[#333] hover:bg-[#f1f1f1]">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <button type="submit"
                            class="w-full py-3 px-4 text-sm text-[#333] bg-transparent border-0 text-left hover:bg-[#f1f1f1]">Log
                            Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content p-4 py-0 bg-[#ebe9e9]">
        <div class="bg-white p-8 rounded-lg shadow mt-4">
            <div class="overflow-x-auto rounded-md">
                <table class="min-w-full table-auto border-collapse border-spacing-0 ">
                    <h2 class="text-xl font-medium border-b border-gray-200 text-gray-800 mb-4">List of Programs:</h2>
                    <thead class="bg-[#0A6847] text-white text-xs">
                        <tr>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Program</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Program Description</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Major</th>
                            {{-- <th class="border border-gray-200 py-3 px-4 text-left font-medium">Department</th> --}}
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 border border-gray-200">
                        @foreach ($programs as $program)
                            <tr class="hover:bg-gray-100 transition-colors duration-200">
                                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $program->title }}</td>
                                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $program->description }}</td>
                                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $program->major ?: '...' }}</td>
                                {{-- <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $program->department }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="bg-white p-8 rounded-lg shadow mt-4">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold border-b border-gray-200">List of Instructors:</h2>
                <button onclick="openModal()"
                    class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    + Add Instructor
                </button>
            </div>

            <div class="overflow-x-auto rounded-lg mt-4">
                <table class="min-w-full table-auto border-collapse border-spacing-0">
                    <thead class="bg-[#0A6847] text-white text-xs">
                        <tr>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Instructor ID</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Instructor Name</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Email Address</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Position</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 border border-gray-200">
                        @foreach ($instructors as $instructor)
                            <tr class="hover:bg-gray-100 transition-colors duration-200">
                                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $instructor->id }}</td>
                                <td class="py-4 px-4 text-sm truncate max-w-xs">
                                    {{ $instructor->last_name }}, {{ $instructor->first_name }}
                                    {{ $instructor->middle_name }}
                                </td>
                                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $instructor->email }}</td>
                                <td class="py-4 px-4 text-sm truncate max-w-xs">Instructor</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="addInstructorModal"
            class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center z-50">
            <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Add Instructor</h2>
                <form action="" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" id="lastName" name="lastName" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" id="firstName" name="firstName" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="middleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                        <input type="text" id="middleName" name="middleName" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-400 text-white rounded-lg mr-2">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save</button>
                    </div>
                </form>
                
            </div>
        </div>


    </div>

    <script>
        function toggleDropdown() {
            const dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.classList.toggle('hidden');
        }

        function openModal() {
            document.getElementById('addInstructorModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('addInstructorModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
