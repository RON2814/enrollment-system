<x-app-layout>
    {{-- header  --}}
    <div class="header-wrapper flex justify-between items-center flex-wrap bg-white p-4 py-3">
        <div class="header-title pl-3 font-semibold  text-[#206A5D]">
            <h2>Enrolled Subjects</h2>
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

    {{-- main contnet  --}}
    <div class="main-content p-4 bg-[#ebe9e9]">
        {{-- edit here below --}}
        <div class="bg-white p-4 rounded-lg shadow mt-4">
            <div class="flex gap-5">
                <!-- Student Information -->
                <div class="bg-white p-6 rounded-lg shadow-md w-full text-sm">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2 flex justify-between items-center">
                        Student Information
                    </h3>
                    <table class="min-w-full border-collapse">
                        <tbody>
                            <tr>
                                <th class="text-left p-3 font-medium text-gray-600 border-b">Student Number</th>
                                <td class="p-3 text-gray-800 border-b">202211773</td>
                            </tr>
                            <tr>
                                <th class="text-left p-3 font-medium text-gray-600 border-b">Student Name</th>
                                <td class="p-3 text-gray-800 border-b">GUINDAY RAINA ISABEL M.</td>
                            </tr>
                            <tr>
                                <th class="text-left p-3 font-medium text-gray-600 border-b">School Year</th>
                                <td class="p-3 text-gray-800 border-b">2024-2025</td>
                            </tr>
                            <tr>
                                <th class="text-left p-3 font-medium text-gray-600 border-b">Semester</th>
                                <td class="p-3 text-gray-800 border-b">FIRST SEMESTER</td>
                            </tr>
                            <tr>
                                <th class="text-left p-3 font-medium text-gray-600 border-b">Course</th>
                                <td class="p-3 text-gray-800 border-b">BSCS</td>
                            </tr>
                            <tr>
                                <th class="text-left p-3 font-medium text-gray-600 border-b">Year Level</th>
                                <td class="p-3 text-gray-800 border-b">3</td>
                            </tr>
                            <tr>
                                <th class="text-left p-3 font-medium text-gray-600 border-b">Section</th>
                                <td class="p-3 text-gray-800 border-b">3-2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Enrolled Subjects -->
                <div class="bg-white p-6 rounded-lg shadow-md w-full text-sm">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2 flex justify-between items-center">
                        Enrolled Subjects
                        <span class="text-sm text-gray-500 cursor-pointer">📄 Registration Form</span>
                    </h3>
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="text-left p-3 font-medium text-gray-600 bg-gray-100 border-b">Schedule Code
                                </th>
                                <th class="text-left p-3 font-medium text-gray-600 bg-gray-100 border-b">Course Code
                                </th>
                                <th class="text-left p-3 font-medium text-gray-600 bg-gray-100 border-b">Course Title
                                </th>
                                <th class="text-left p-3 font-medium text-gray-600 bg-gray-100 border-b">Units</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-3 text-gray-800 border-b">SC123</td>
                                <td class="p-3 text-gray-800 border-b">ENG101</td>
                                <td class="p-3 text-gray-800 border-b">English Literature</td>
                                <td class="p-3 text-gray-800 border-b">3</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>


    <script>
        function toggleDropdown() {
            const dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
