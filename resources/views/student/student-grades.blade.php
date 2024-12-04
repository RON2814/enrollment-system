<x-app-layout>

    <div class="header-wrapper flex justify-between items-center flex-wrap bg-white p-4 py-3">
        <div class="header-title pl-3 font-semibold text-[#206A5D]">
            <h2>Student Grades</h2>
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
            <div class="overflow-x-auto rounded-lg">
                <table class="min-w-full table-auto border-collapse border-spacing-0">
                    <h2 class="text-xl font-medium border-b border-gray-200 text-gray-800 mb-4">Student Information</h2>
                    <thead class="bg-[#0A6847] text-white text-xs">
                        <tr>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Student Number</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Student Name</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">School Year</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Program</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Year Level</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Semester</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Section</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 border border-gray-200">
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->student_number }}</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">
                                {{  strtoupper($student->last_name) }}, {{ strtoupper($student->first_name) }} {{ strtoupper($student->middle_name) }}
                            </td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->school_year ?? '' }}</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->program_name }}</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->year_level ?? '' }}</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->semester ?? '' }}</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->section ?? '' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>

        <div class="bg-white p-8 rounded-lg shadow mt-4">
            <h2 class="text-lg font-semibold mb-4 border-b border-gray-200">Grades Management</h2>
            <div class="grid grid-cols-3 gap-4 text-xs">
                <div>
                    <label class="block font-medium text-gray-700 mb-1" for="school_year">Year Level</label>
                    <select id="school_year" class="w-full py-1 border-gray-300 rounded-md shadow-sm">
                        <option>------------</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium text-gray-700 mb-1" for="semester">Semester</label>
                    <select id="semester" class="w-full py-1 border-gray-300 rounded-md shadow-sm">
                        <option>------------</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button
                        class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-1.5 px-2 rounded-md shadow text-sm">
                        Display Grades
                    </button>
                    <form action="{{ route('student.student-checklist') }}" method="GET" class="flex-1">
                        <button
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white py-1.5 px-2 rounded-md shadow text-sm">
                            View Checklist
                        </button>
                    </form>
                </div>
                
            </div>
            {{-- grades management  --}}
            <div class="overflow-x-auto rounded-lg mt-4">
                <table class="min-w-full table-auto border-collapse border-spacing-0">
                    <thead class="bg-[#0A6847] text-white text-xs">
                        <tr>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Course Code</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Course Title</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Credit Units</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Final Grade</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Instructor</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Remark</th>
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
