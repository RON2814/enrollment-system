<x-app-layout>

    <style>
        
.card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

.card h3 {
  margin: 0;
  margin-bottom: 20px;
  font-size: 18px;
  border-bottom: 1px solid #ddd;
  padding-bottom: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.displayGrades {
  background-color: #28a745; 
  color: #fff;
  border: none; 
  padding: 10px 20px; 
  border-radius: 5px; 
  font-size: 16px; 
  cursor: pointer; 
  transition: background-color 0.3s ease; 
  margin-top: 10px;
}

.displayGrades:hover {
  background-color: #3d6540; 
}

.card h3 span {
  font-size: 14px;
  color: #888;
  cursor: pointer;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  text-align: left;
  padding: 10px;
  border: 1px solid #ddd;
}

th {
  background-color: #f5f5f5;
  font-weight: bold;
}

td {
  color: #555;
}

.card table th, .card table td {
  text-align: left;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}

    </style>
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
        <div class="bg-white p-8 rounded-lg shadow mt-4">
            <div class="econtainer flex gap-5">
                <!-- Student Information -->
                <div class="card">
                  <h3>Student Information</h3>
                  <table>
                    <tr>
                      <th>Student Number</th>
                      <td>202211773</td>
                    </tr>
                    <tr>
                      <th>Student Name</th>
                      <td>GUINDAY RAINA ISABEL M.</td>
                    </tr>
                    <tr>
                      <th>School Year</th>
                      <td>2024-2025</td>
                    </tr>
                    <tr>
                      <th>Semester</th>
                      <td>FIRST SEMESTER</td>
                    </tr>
                    <tr>
                      <th>Course</th>
                      <td>BSCS</td>
                    </tr>
                    <tr>
                      <th>Year Level</th>
                      <td>3</td>
                    </tr>
                    <tr>
                      <th>Section</th>
                      <td>3-2</td>
                    </tr>
                  </table>
                </div>
            
                <!-- Enrolled Subjects -->
                <div class="card">
                  <h3>
                    Enrolled Subjects 
                    <span>📄 Registration Form</span>
                  </h3>
                  <table>
                    <thead>
                      <tr>
                        <th>Schedule Code</th>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Units</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Example Row -->
                      <tr>
                        <td>SC123</td>
                        <td>ENG101</td>
                        <td>English Literature</td>
                        <td>3</td>
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
