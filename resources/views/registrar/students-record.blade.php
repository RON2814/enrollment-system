<x-app-layout>

    {{-- main-content --}}
    <div class="main-content p-10 py-0 bg-[#ebe9e9]">

        <div class="p-4 rounded-lg shadow mt-3 flex items-center justify-between bg-white">
            <h3 class="text-base font-medium text-black-700">Filter By:</h3>

            <div class="flex space-x-6">
                <select id="yearLevelFilter"
                    class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-48 text-sm">
                    <option value="all" class="text-gray-600">Year Level</option>
                    <option value="all">All</option>
                    <option value="First Year">First Year</option>
                    <option value="Second Year">Second Year</option>
                    <option value="Third Year">Third Year</option>
                    <option value="Fourth Year">Fourth Year</option>
                </select>

                <select id="sectionFilter"
                    class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-48 text-sm">
                    <option value="all" selected disabled class="text-gray-600">Section</option>
                    <option value="all">All</option>
                    <option value="A">Section A</option>
                    <option value="B">Section B</option>
                </select>

                <select id="programFilter"
                    class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-48 text-sm">
                    <option value="all" class="text-gray-600">Program</option>
                    <option value="all">All</option>
                    <option value="BSCS">Computer Science</option>
                    <option value="BSIT">Information Technology</option>
                </select>
            </div>
        </div>

        <div class="bg-white mt-3 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 p-8 py-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-2xl font-semibold text-gray-900 border-b borderpgray-300">STUDENT'S RECORD:</h3>

                <!-- Search and Filter Section -->
                <div class="flex space-x-4">
                    <!-- Search Bar -->
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="searchBar"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-96  bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search student number / name" /> 
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto rounded-lg">
                <table class="min-w-full table-auto border-separate border-spacing-0">
                    <thead class="bg-[#0A6847] text-white text-sm">
                        <tr>
                            <th class="py-3 px-4 text-left font-medium">Student #</th>
                            <th class="py-3 px-4 text-left font-medium">Student Name</th>
                            <th class="py-3 px-4 text-left font-medium">Program</th>
                            <th class="py-3 px-4 text-left font-medium">Year Level</th>
                            <th class="py-3 px-4 text-left font-medium">Section</th>
                            <th class="py-3 px-4 text-left font-medium">Classification</th>
                            <th class="py-3 px-4 text-left font-medium">Status</th>
                            <th class="py-3 px-4 text-left font-medium">Action</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody" class="text-gray-700">
                        {{-- Student rows will be inserted here JS will do the job :) --}}
                        @foreach ($students as $student)
                            <tr>
                                <td class="py-3 px-4 text-sm border-b">{{ $student->student_number }}</td>
                                <td class="py-3 px-4 text-sm border-b">
                                    {{ $student->last_name . ', ' . $student->first_name . ' ' . $student->middle_name }}
                                </td>
                                <td class="py-3 px-4 text-sm border-b">{{ $student->program->title }}</td>
                                <td class="py-3 px-4 text-sm border-b">
                                    {{ $student->enrollment()->latest()->first() ? $student->enrollment()->latest()->first()->year_level : 'No Enrollment' }}
                                </td>
                                <td class="py-3 px-4 text-sm border-b">
                                    {{ $student->enrollment->first() ? $student->enrollment->first()->section->fullSectionName() : 'N/A' }}
                                </td>
                                <td class="py-3 px-4 text-sm border-b">{{ $student->classification }}</td>
                                <td class="py-3 px-4 text-sm border-b" style="white-space: nowrap;">
                                    <span class="capitalize"
                                        style="color: {{ $student->enrollment()->latest()->first()
                                            ? ($student->enrollment()->latest()->first()->status == 'enrolled'
                                                ? 'blue'
                                                : ($student->enrollment()->latest()->first()->status == 'under evaluation'
                                                    ? 'green'
                                                    : ($student->enrollment()->latest()->first()->status == 'evaluated'
                                                        ? 'blue'
                                                        : ($student->enrollment()->latest()->first()->status == 'pending'
                                                            ? 'red'
                                                            : ($student->enrollment()->latest()->first()->status == 'N/A'
                                                                ? 'gray'
                                                                : ($student->enrollment()->latest()->first()->status == 'completed'
                                                                    ? 'purple'
                                                                    : 'red'))))))
                                            : 'gray' }};">
                                        {{ $student->enrollment()->latest()->first() ? $student->enrollment()->latest()->first()->status : 'No Enrollment' }}
                                    </span>
                                </td>

                                <td class="py-3 px-4 text-sm flex space-x-2 border-b">
                                    <a href="{{ route('registrar.checklist', ['student_number' => $student->student_number]) }}"
                                        class="bg-green-500 text-white px-2 py-2 rounded-lg text-center">
                                       Checklist Record
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Function to handle filtering by dropdowns
        function filterStudents() {
            const yearLevelFilter = document.getElementById("yearLevelFilter").value.toLowerCase();
            const programFilter = document.getElementById("programFilter").value.toLowerCase();
            const sectionFilter = document.getElementById("sectionFilter").value.toLowerCase();

            const rows = document.querySelectorAll("#studentTableBody tr");

            rows.forEach(row => {
                const yearLevel = row.querySelector("td:nth-child(4)").textContent.toLowerCase();
                const program = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
                const section = row.querySelector("td:nth-child(6)").textContent.toLowerCase();

                // Check if row matches the selected filters
                const yearMatch = (yearLevelFilter === "all" || yearLevel.includes(yearLevelFilter));
                const programMatch = (programFilter === "all" || program.includes(programFilter));
                const sectionMatch = (sectionFilter === "all" || section.includes(sectionFilter));

                // Show or hide row based on filter conditions
                if (yearMatch && programMatch && sectionMatch) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        // Attach filter function to dropdowns
        document.getElementById("yearLevelFilter").addEventListener("change", filterStudents);
        document.getElementById("programFilter").addEventListener("change", filterStudents);
        document.getElementById("sectionFilter").addEventListener("change", filterStudents);

        // Debounce function for search
        function debounce(func, delay) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        // Search function to filter students based on search term
        function searchStudents() {
            const searchTerm = document.getElementById("searchBar").value.toLowerCase();
            const rows = document.querySelectorAll("#studentTableBody tr");

            rows.forEach(row => {
                const studentNumber = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
                const studentName = row.querySelector("td:nth-child(2)").textContent.toLowerCase();

                // Show or hide row based on search term match
                if (studentNumber.includes(searchTerm) || studentName.includes(searchTerm)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        // Attach the search function to the search bar with debouncing
        const searchBar = document.getElementById("searchBar");
        searchBar.addEventListener("input", debounce(searchStudents, 300));
    </script>
</x-app-layout>
