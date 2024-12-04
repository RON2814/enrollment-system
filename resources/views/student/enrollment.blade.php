<x-app-layout>

    {{-- header  --}}
    <div class="header-wrapper flex justify-between items-center flex-wrap bg-white p-4 py-3">
        <div class="header-title pl-3 font-semibold  text-[#206A5D]">
            <h2>Enrollment Module</h2>
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

    {{-- main content  --}}
    <div class="main-content p-4 bg-[#ebe9e9]">
        <div class="overflow-x-auto bg-white p-8 rounded-lg shadow mt-2">
            <!-- Student Information Section -->
            <h2 class=" text-2xl font-medium border-b border-gray-300 text-gray-800 mb-5">Enrollment • <span
                    class="text-sm text-blue-500">Student Evaluation</span></h2>
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="student_number">Student
                        Number</label>
                    <div id="student_number" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ $student->student_number }}
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1" for="student_name">Student Name</label>
                    <div id="student_name" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ strtoupper($student->last_name ?? '') }}, {{ strtoupper($student->first_name ?? '') }} {{ strtoupper($student->middle_name ?? '') }}
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="school_year">School Year</label>
                    <div id="school_year" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        2023-2024
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="section">Section</label>
                    <div id="section" class="w-full px-4 py-1 rounded-md text-gray-700 bg-gray-100 text-sm">
                        3-2
                    </div>
                </div>

               

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="program_name">Program</label>
                    <div id="program_name" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ strtoupper($student->program_name ?? '') }}
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="major">Major</label>
                    <div id="major" class="w-full px-4 py-1 rounded-md text-gray-700 bg-gray-100 text-sm">
                        {{ strtoupper($student->major ?? 'N/A') }}
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="year_level">Year Level</label>
                    <div id="year_level" class="w-full px-4 py-1 rounded-md text-gray-700 bg-gray-100 text-sm">
                        Third Year
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="section">Semester</label>
                    <div id="semester" class="w-full px-4 py-1 rounded-md text-gray-700 bg-gray-100 text-sm">
                        First Semester
                    </div>
                </div>


            </div>
            <div class="border-b border-gray-400 py-3"></div>

            <div class="overflow-x-auto rounded-lg mt-4 ">

                <table class="min-w-full table-auto border-collapse border-spacing-0">
                    <thead class="bg-gray-200  text-xs">
                        <tr>
                            <th class="border border-gray-300 py-3 px-4 text-left font-semibold">Course Code</th>
                            <th class="border border-gray-300 py-3 px-4 text-left font-semibold">Course Title</th>
                            <th class="border border-gray-300 py-3 px-4 text-left font-semibold">Credit Units</th>
                            <th class="border border-gray-300 py-3 px-4 text-left font-semibold">Final Grade</th>
                            <th class="border border-gray-300 py-3 px-4 text-left font-semibold">Instructor</th>
                            <th class="border border-gray-300 py-3 px-4 text-left font-semibold">Remark</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 border border-gray-200">
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">1.25</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">Sambrano J.</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Passed</td>
                        </tr>
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">1.25</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">Sambrano J.</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Passed</td>
                        </tr>
                    </tbody>
                </table>
                <button class="w-full bg-green-800 hover:bg-green-700 text-white py-1.5 px-2  shadow text-sm mt-4">
                    Evaluate Grades
                </button>
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
