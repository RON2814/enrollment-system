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

        <select id="programFilter"
          class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-48 text-sm">
          <option value="all" class="text-gray-600">Program</option>
          <option value="all">All</option>
          <option value="BSCS">Computer Science</option>
          <option value="BSIT">Information Technology</option>
        </select>

        <select id="enrollmentStatusFilter"
          class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-48 text-sm">
          <option value="all" class="text-gray-600">Enrollment Status</option>
          <option value="all">All</option>
          <option value="enrolled">Enrolled</option>
          <option value="pending">Pending</option>
          <option value="under evaluation">Under Evaluation</option>
        </select>
      </div>
    </div>


    <div class="bg-white mt-3 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 p-8 py-5">
      <div class="flex items-center justify-between mb-4">
        <h3 class="text-2xl font-semibold text-gray-900 border-b borderpgray-300">Enrollment List</h3>

        <!-- Search and Filter Section -->
        <div class="flex space-x-4">
          <!-- Search Bar -->
          <div class="relative mt-1">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
            </div>
            <input type="text" id="searchBar"
              class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
              placeholder="Search student number / name" />
          </div>

          <button onclick="openAddStudentModal()"
            class="px-4 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 text-sm">
            + Enroll New Student
          </button>

          <!-- Section Capacity Button -->
          <button onclick="openSectionModal()"
            class="px-4 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
            Set Section Capacity
          </button>

        </div>
      </div>

      <div class="overflow-x-auto rounded-lg">
        <table class="min-w-full table-auto border-separate border-spacing-0">
          <thead class="bg-[#0A6847] text-white text-sm">
            <tr>
              <th class="py-3 px-4 text-left font-medium" style="width: 16.66%;">Student #</th>
              <th class="py-3 px-4 text-left font-medium" style="width: 33.33%;">Student Name</th>
              <th class="py-3 px-4 text-left font-medium" style="width: 16.66%;">Program</th>
              <th class="py-3 px-4 text-left font-medium" style="width: 16.66%;">Year Level</th>
              <th class="py-3 px-4 text-left font-medium" style="width: 16.66%;">Section</th>
              <th class="py-3 px-4 text-left font-medium" style="width: 16.66%;">Classification</th>
              <th class="py-3 px-4 text-left font-medium" style="width: 16.66%;">Status</th>
              <th class="py-3 px-4 text-left font-medium" style="width: 16.66%;">Action</th>
            </tr>
          </thead>
          <tbody id="studentTableBody" class="text-gray-700">
            {{-- Student rows will be inserted here JS will do the job :) --}}
            @foreach ($students as $student)
              <tr>
                <td class="py-3 px-4 font-medium border-b" style="white-space: nowrap;">
                  {{ $student->student_number }}</td>
                <td class="py-3 px-4 text-sm border-b capitalize"
                  style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                  {{ $student->getFullName() }}
                </td>
                <td class="py-3 px-4 text-sm border-b" style="white-space: nowrap;">
                  {{ $student->program->title }}</td>
                <td class="py-3 px-4 text-sm border-b" style="white-space: nowrap;">
                  {{ $student->enrollment()->latest()->first() ? $student->enrollment()->latest()->first()->year_level : 'No Enrollment' }}
                </td>
                <td class="py-3 px-4 text-sm border-b" style="white-space: nowrap;">
                  {{ $student->enrollment()->latest()->first()->section_id ?? 'N/A' }}
                </td>


                <td class="py-3 px-4 text-sm border-b" style="white-space: nowrap;">
                  {{ $student->classification }}</td>
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

                <td class="py-3 px-4 text-center text-sm border-b" style="white-space: nowrap;">
                  @php
                    $latestEnrollment = $student->enrollment()->latest()->first();
                  @endphp

                  @if ($latestEnrollment && $latestEnrollment->status == 'enrolled')
                    <!-- Show 'COR' button for enrolled status -->
                    <a href="{{ route('registrar.certRegistration') }}"
                      style="background-color: #34D399; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                      COR
                    </a>
                  @else
                    <!-- Show 'Enroll' button if not enrolled -->
                    {{-- <button onclick='openEnrollStudentModal({{ $student }})'
                                            style="background-color: #3b82f6; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem;">
                                            View
                                        </button> --}}
                  @endif
                </td>



              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
  <!-- Include modals -->
  @include('modals.manage-users.add-student')
  @include('modals.registrar.sectioning')
  @include('modals.registrar.enroll-student')
  @include('modals.registrar.cor')


  <script>
    // Function to handle filtering by dropdowns
    function filterStudents() {
      const yearLevelFilter = document.getElementById("yearLevelFilter").value.toLowerCase();
      const programFilter = document.getElementById("programFilter").value.toLowerCase();
      const enrollmentStatusFilter = document.getElementById("enrollmentStatusFilter").value.toLowerCase();

      const rows = document.querySelectorAll("#studentTableBody tr");

      rows.forEach(row => {
        const yearLevel = row.querySelector("td:nth-child(4)").textContent.toLowerCase();
        const program = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
        const status = row.querySelector("td:nth-child(7)").textContent.toLowerCase();

        console.log(
          `Filtering: Year Level - ${yearLevel}, Program - ${program}, Status - ${status}`
        ); // Debugging logs

        // Check if row matches the selected filters
        const yearMatch = (yearLevelFilter === "all" || yearLevel.includes(yearLevelFilter));
        const programMatch = (programFilter === "all" || program.includes(programFilter));
        const statusMatch = (enrollmentStatusFilter === "all" || status.includes(enrollmentStatusFilter));

        // Show or hide row based on filter conditions
        if (yearMatch && programMatch && statusMatch) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    }

    // Attach filter function to dropdowns
    document.getElementById("yearLevelFilter").addEventListener("change", filterStudents);
    document.getElementById("programFilter").addEventListener("change", filterStudents);
    document.getElementById("enrollmentStatusFilter").addEventListener("change", filterStudents);

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
