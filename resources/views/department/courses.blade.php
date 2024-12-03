<x-app-layout>
    {{-- header --}}
    <div class="header-wrapper flex justify-between items-center flex-wrap bg-white p-4 py-2">
        <div class="header-title pl-3 font-semibold text-[#206A5D]">
            <h2>Courses</h2>
        </div>

        <div class="user-info flex items-center gap-2">
            <div class="dropdown relative inline-block">
                <button
                    class="dropdown-button bg-white text-[#333] border border-[#ccc] py-2 px-3 text-sm font-medium rounded-lg flex items-center cursor-pointer"
                    onclick="toggleDropdown()">
                    <span id="username">{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down ml-2"></i>
                </button>

                <div
                    class="dropdown-content absolute hidden bg-white min-w-[160px] shadow-lg z-10 top-full right-0 rounded-xl py-2">
                    <a href="{{ route('profile.edit') }}"
                        class="block py-2 px-3 text-sm text-[#333] hover:bg-[#f1f1f1]">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <button type="submit"
                            class="w-full py-2 px-3 text-sm text-[#333] bg-transparent border-0 text-left hover:bg-[#f1f1f1]">Log
                            Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- main content --}}
    <div class="main-content p-4 bg-[#ebe9e9]">
        <div class="bg-white p-8 rounded-lg shadow mt-2">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-2xl font-semibold text-gray-900">List of Courses</h3>
                <!-- Search and Filter Section -->
                <div class="flex space-x-4">
                    <!-- Search Bar -->
                    <div class="relative mt-1">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search for course code or code title" oninput="filterTable()">
                    </div>

                    <!-- Add New Course Button -->
                    {{-- <button onclick="openAddStudentModal()"
                        class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Add New Course
                    </button> --}}

                    <!-- Entries Filter Dropdown  -->
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707l-6 6a1 1 0 01-.707.293H9.707a1 1 0 01-.707-.293l-6-6A1 1 0 013 6V4z" />
                            </svg>
                        </div>
                        <select id="entries-filter"
                            class="block text-sm text-gray-900 border border-gray-300 rounded-lg w-32 pl-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 px-1 font-semibold"
                            onchange="filterEntries()">
                            <option value="10" disabled selected>Entries </option>
                            <option value="10">10 </option>
                            <option value="20">20 </option>
                            <option value="50">50 </option>
                            <option value="100">100 </option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="border-b border-gray-300 mt-0 py-0"></div>
            <div class="overflow-x-auto mt-2 rounded-md">
                <table class="min-w-full table-auto border-collapse border-spacing-0 table-fixed">
                    <thead class="bg-[#0A6847] text-white text-xs">
                        <tr>
                            <th class="py-2 px-3 text-left font-medium">Course Code</th>
                            <th class="py-2 px-3 text-left font-medium">Course Title</th>
                            <th class="py-2 px-3 text-left font-medium">Credit Units Lecture</th>
                            <th class="py-2 px-3 text-left font-medium">Credit Units Laboratory
                            </th>
                            <th class="py-2 px-3 text-left font-medium">Contact Hours Lecture
                            </th>
                            <th class="py-2 px-3 text-left font-medium">Contact Hours Laboratory
                            </th>
                            <th class="py-2 px-3 text-left font-medium max-w-[100px]">
                                Pre-requisites</th>
                            {{-- <th class="p-2 text-left">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody class="text-gray-700" id="course-table-body">
                        @forelse($courses as $course)
                            <tr class="hover:bg-gray-200 transition-colors duration-200">
                                <td class="py-4 px-3 text-sm truncate max-w-xs font-medium">{{ $course->course_code }}</td>
                                <td class="py-4 px-3 text-sm truncate max-w-xs font-medium">{{ $course->course_title }}</td>
                                <td class="text-center py-4 px-3 text-sm truncate max-w-xs">
                                    {{ $course->credit_unit_lecture }}</td>
                                <td class="text-center py-4 px-3 text-sm truncate max-w-xs">
                                    {{ $course->credit_unit_laboratory }}</td>
                                <td class="text-center py-4 px-3 text-sm truncate max-w-xs">
                                    {{ $course->contact_hours_lecture }}</td>
                                <td class="text-center py-4 px-3 text-sm truncate max-w-xs">
                                    {{ $course->contact_hours_laboratory }}</td>
                                <td class="py-4 px-3 text-sm whitespace-normaL max-w-[100px] break-words font-medium ">
                                    {{ $course->pre_requisite ?: '...' }}</td>
                                {{-- <td class="p-2 text-center">
                                    <button class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4 text-gray-500">No courses available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function filterTable() {
            const searchInput = document.getElementById('table-search').value.toLowerCase().trim();
            const table = document.getElementById('course-table-body');
            const rows = table.getElementsByTagName('tr');

            Array.from(rows).forEach(row => {
                const cells = row.getElementsByTagName('td');
                const courseTitle = cells[1]?.textContent || ''; 
                const courseCode = cells[0]?.textContent || ''; 

                if (courseTitle.toLowerCase().includes(searchInput) || courseCode.toLowerCase().includes(
                        searchInput)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function filterEntries() {
            const entriesPerPage = document.getElementById('entries-filter').value;
            const table = document.getElementById('course-table-body');
            const rows = table.getElementsByTagName('tr');

            Array.from(rows).forEach(row => row.style.display = 'none');

            for (let i = 0; i < entriesPerPage; i++) {
                if (rows[i]) {
                    rows[i].style.display = '';
                }
            }
        }



        // Toggle dropdown menu visibility
        function toggleDropdown() {
            const dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
