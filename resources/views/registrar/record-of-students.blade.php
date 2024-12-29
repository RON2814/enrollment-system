<x-app-layout>


  {{-- main-content --}}
  <div class="main-content p-4 py-0 bg-[#ebe9e9]">

    <div class="bg-white mt-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 p-8">
      <div class="flex items-center justify-between mb-5">
        <h3 class="text-2xl font-semibold text-gray-900">Record of Students</h3>

        <!-- Search and Filter Section -->
        <div class="flex space-x-4">
          <!-- Search Bar -->
          <input type="text" id="searchBar" placeholder="Search students..."
            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
          <!-- Filter Dropdown -->
          <select id="programFilter"
            class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="all" selected disabled class="text-gray-600">Filter by Program</option>
            <option value="all">All</option>
            <option value="1">Computer Science</option>
            <option value="2">Information Technology</option>
          </select>

          <!-- Add New Student Button -->
          {{-- <button onclick="openAddStudentModal()"
            class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Add New Student
          </button> --}}
        </div>
      </div>

      <div class="overflow-x-auto rounded-lg">
        <table class="min-w-full table-auto border-separate border-spacing-0">
          <thead class="bg-[#0A6847] text-white text-sm">
            <tr>
              <th class="py-3 px-4 text-left font-medium">Student Number</th>
              <th class="py-3 px-4 text-left font-medium">Student Name</th>
              <th class="py-3 px-4 text-left font-medium">Program</th>
              <th class="py-3 px-4 text-left font-medium">Email</th>
              {{-- <th class="py-3 px-4 text-left font-medium">Address</th> --}}
              <th class="py-3 px-4 text-left font-medium">Year Level</th>
              <th class="py-3 px-4 text-left font-medium">Section</th>
              {{-- <th class="py-3 px-4 text-left font-medium">Address</th> --}}
              <th class="py-3 px-4 text-left font-medium text-center">Classification</th>
              <th class="py-3 px-4 text-left font-medium">Action</th>
            </tr>
          </thead>
          <tbody id="studentTableBody" class="text-gray-700">
            @foreach ($students as $student)
              <tr class="hover:bg-gray-100 transition-colors duration-200">
                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->student_number }}</td>
                <td class="py-4 px-4 text-sm truncate max-w-xs">
                  {{ $student->last_name }}, {{ $student->first_name }} {{ $student->middle_name }}
                </td>
                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->program->title }}</td>
                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->user?->email }}</td>
                <td class="py-4 px-4 text-sm truncate max-w-xs">{Year Level }</td>
                <td class="py-4 px-4 text-sm truncate max-w-xs">{Section }</td>

                {{-- <td class="py-4 px-4 text-sm truncate max-w-xs">
                  {{ $student->address->house_number || '' }} {{ $student->address->street || '' }}
                  {{ $student->address->barangay || '' }} {{ $student->address->city || '' }}
                  {{ $student->address->province || '' }} {{ $student->address->zip_code || '' }}
                </td> --}}
                <td class="py-4 px-4 text-sm truncate max-w-xs text-center">{{ $student->classification }}</td>
                <td class="py-4 px-4 text-sm">
                  <button onclick="openUpdateStudentModal({{ $student }})"
                    class="text-blue-500 hover:text-blue-700">
                    View Record
                  </button>
                  {{-- <button class="ml-4 text-red-500 hover:text-red-700">
                    <i class="fas fa-trash-alt"></i> 
                  </button> --}}
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
  @include('modals.manage-users.update-student')

  <script>
    // Debounce function to limit the rate of AJAX calls
    function debounce(func, delay) {
      let timeout;
      return function(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
      };
    }

    // Function to fetch and display students based on search and filter
    function fetchStudents() {
      const searchQuery = document.getElementById('searchBar').value.trim();
      const programId = document.getElementById('programFilter').value;

      let url = `{{ route('registrar.record-of-students.search') }}?query=${encodeURIComponent(searchQuery)}`;

      if (programId && programId !== 'all') {
        url += `&program_id=${encodeURIComponent(programId)}`;
      }

      fetch(url, {
          headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }

          const contentType = response.headers.get('content-type');
          if (!contentType || !contentType.includes('application/json')) {
            throw new TypeError("Expected JSON, got " + contentType);
          }

          return response.json();
        })
        .then(data => {
          const tbody = document.getElementById('studentTableBody');
          tbody.innerHTML = ''; // Clear existing table rows

          if (data.length === 0) {
            tbody.innerHTML = `
            <tr>
              <td colspan="9" class="py-4 px-4 text-center text-sm text-gray-500">No students found.</td>
            </tr>
          `;
            return;
          }

          data.forEach(student => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-100');

            const email = student.user?.email || '';
            const programTitle = student.program?.title || '';
            const fullName = `${student.last_name}, ${student.first_name} ${student.middle_name}`;

            row.innerHTML = `
            <td class="py-4 px-4 text-sm">${student.student_number}</td>
            <td class="py-4 px-4 text-sm">${fullName}</td>
            <td class="py-4 px-4 text-sm">${programTitle}</td>
            <td class="py-4 px-4 text-sm">${email}</td>
            <td class="py-4 px-4 text-sm">Year level</td>
            <td class="py-4 px-4 text-sm">Section</td>
            <td class="py-4 px-4 text-sm">${student.classification}</td>
            <td class="py-4 px-4 text-sm">
              <button
                onclick='openUpdateStudentModal(${JSON.stringify(student).replace(/'/g, "\\'")})'
                class="text-blue-500 hover:text-blue-700">
                View Record
              </button>
            </td>
          `;
            tbody.appendChild(row);
          });
        })
        .catch(error => {
          console.error('Error fetching students:', error);
          alert('An error occurred while fetching students.');
        });
    }

    // Event listeners for search and filter
    document.getElementById('searchBar').addEventListener('input', debounce(fetchStudents, 300));
    document.getElementById('programFilter').addEventListener('change', fetchStudents);
  </script>
</x-app-layout>
