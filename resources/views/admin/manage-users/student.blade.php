<x-app-layout>
    {{-- main-content --}}
    <div class="main-content p-4 py-0 bg-[#ebe9e9]">

        <div class="bg-white mt-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 p-8">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-2xl font-semibold text-gray-900">Student Table</h3>

        <!-- Search and Filter Section -->
        <div class="flex space-x-4">
          <!-- Search Bar -->
          {{-- <input type="text" placeholder="Search..."
            class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" /> --}}
          <!-- Filter Dropdown -->
          <select id="programFilter"
            class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="all" selected disabled class="text-gray-600">Filter by Program</option>
            <option value="">All</option>
            <option value="1">Computer Science</option>
            <option value="2">Information Technology</option>
          </select>

                    <!-- Add New Student Button -->
                    <button onclick="openAddStudentModal()"
                        class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Add New Student
                    </button>
                </div>
            </div>

      <div class="overflow-x-auto rounded-lg">
        <table class="min-w-full table-auto border-separate border-spacing-0">
          <thead class="bg-[#0A6847] text-white text-sm">
            <tr>
              <th class="py-3 px-4 text-left font-medium">Student #</th>
              <th class="py-3 px-4 text-left font-medium">Last Name</th>
              <th class="py-3 px-4 text-left font-medium">First Name</th>
              <th class="py-3 px-4 text-left font-medium">Middle Name</th>
              <th class="py-3 px-4 text-left font-medium">Email</th>
              <th class="py-3 px-4 text-left font-medium">Program</th>
              <th class="py-3 px-4 text-left font-medium">Classification</th>
              <th class="py-3 px-4 text-left font-medium">Action</th>
            </tr>
          </thead>
          <tbody id="studentTableBody" class="text-gray-700">
            @foreach ($students as $student)
              <tr class="hover:bg-gray-100 transition-colors duration-200">
                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->student_number }}</td>
                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->last_name }}</td>
                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->first_name }}</td>
                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->middle_name }}</td>
                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->user->email }}</td>
                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->program->title }}</td>
                <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $student->classification }}</td>
                <td class="py-4 px-4 text-sm">
                  <button
                    onclick="openUpdateStudentModal(
                      '{{ $student->student_number }}', 
                      '{{ $student->last_name }}', 
                      '{{ $student->first_name }}', 
                      '{{ $student->middle_name }}', 
                      '{{ $student->contact_number }}', 
                      '{{ $student->address_id }}', 
                      '{{ $student->program->title }}', 
                      '{{ $student->classification }}'
                    )"
                    class="text-blue-500 hover:text-blue-700">
                    <i class="fas fa-edit"></i> <!-- Update icon -->
                  </button>
                  <button class="ml-4 text-red-500 hover:text-red-700">
                    <i class="fas fa-trash-alt"></i> <!-- Delete icon -->
                  </button>
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
    // Function to toggle dropdown visibility
    function toggleDropdown() {
      const dropdownContent = document.querySelector('.dropdown-content');
      dropdownContent.classList.toggle('hidden');
    }

    // Function to filter students by program using AJAX
    document.getElementById('programFilter').addEventListener('change', function() {
      const selectedProgram = this.value;
      fetch(`{{ route('admin.manageUsers.student.filter') }}?program_id=${selectedProgram}`)
        .then(response => response.json())
        .then(data => {
          const tbody = document.getElementById('studentTableBody');
          tbody.innerHTML = '';

          data.forEach(student => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-100', 'transition-colors', 'duration-200');
            row.innerHTML = `
              <td class="py-4 px-4 text-sm truncate max-w-xs">${student.student_number}</td>
              <td class="py-4 px-4 text-sm truncate max-w-xs">${student.last_name}</td>
              <td class="py-4 px-4 text-sm truncate max-w-xs">${student.first_name}</td>
              <td class="py-4 px-4 text-sm truncate max-w-xs">${student.middle_name || ""}</td>
              <td class="py-4 px-4 text-sm truncate max-w-xs">${student.user.email || ""}</td>
              <td class="py-4 px-4 text-sm truncate max-w-xs">${student.program.title}</td>
              <td class="py-4 px-4 text-sm truncate max-w-xs">${student.classification}</td>
              <td class="py-4 px-4 text-sm">
                <button
                  onclick="openUpdateStudentModal(
                    '${student.student_number}', 
                    '${student.last_name}', 
                    '${student.first_name}', 
                    '${student.middle_name || ""}', 
                    '${student.contact_number || ""}', 
                    '${student.address_id}', 
                    '${student.program.title}', 
                    '${student.classification}'
                  )"
                  class="text-blue-500 hover:text-blue-700">
                  <i class="fas fa-edit"></i> <!-- Update icon -->
                </button>
                <button class="ml-4 text-red-500 hover:text-red-700">
                  <i class="fas fa-trash-alt"></i> <!-- Delete icon -->
                </button>
              </td>
            `;
            tbody.appendChild(row);
          });
        })
        .catch(error => console.error('Error:', error));
    });
  </script>
</x-app-layout>
