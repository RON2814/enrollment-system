<x-app-layout>
  <div class="main-content p-4 bg-[#ebe9e9]">
      <div class="header-wrapper flex justify-between items-center flex-wrap bg-white rounded-lg p-4 mb-4">
          <div class="header-title text-[#27984b]">
              <h2>Student Information</h2>
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

      {{-- edit here below --}}
      <div class="bg-white p-8 rounded-lg shadow-md mt-6">
          <!-- Student Information Section -->
          <h2 class="text-2xl font-medium border-b border-gray-200 text-gray-800 mb-6">Student Information</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="student_number">Student Number</label>
                  <input id="student_number" type="text" value="202211773"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="program_name">Program Name</label>
                  <input id="program_name" type="text" value="BACHELOR OF SCIENCE IN COMPUTER SCIENCE"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="major">Major</label>
                  <input id="major" type="text" value="N/A"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="section">Section</label>
                  <input id="section" type="text" value="3-2"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>

              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="last_name">Last Name</label>
                  <input id="last_name" type="text" value="Rodelas"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="first_name">First Name</label>
                  <input id="first_name" type="text" value="Artze"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="middle_name">Middle Name</label>
                  <input id="middle_name" type="text" value="Valles"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="extension_name">Extension Name</label>
                  <input id="extension_name" type="text" value=""
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
          </div>
      </div>

      <div class="bg-white p-8 rounded-lg shadow-md mt-6">
          <!-- Personal Information Section -->
          <h2 class="text-2xl font-medium border-b border-gray-200 text-gray-800 mb-6">Personal Information</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="house_number">House Number</label>
                  <input id="house_number" type="text" value="Blk 12 Lot 2"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="street">Street</label>
                  <input id="street" type="text" value="DE LEON"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="barangay">Barangay</label>
                  <input id="barangay" type="text" value="LIGAS"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="municipality">Municipality</label>
                  <input id="municipality" type="text" value="BACOOR"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="province">Province</label>
                  <input id="province" type="text" value="CAVITE"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="date_of_birth">Date of Birth</label>
                  <input id="date_of_birth" type="text" value="February 08, 2003"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="sex">Sex</label>
                  <input id="sex" type="text" value="FEMALE"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
              </div>
              <div>
                  <label class="block text-sm font-medium text-gray-600 mb-1" for="civil_status">Civil Status</label>
                  <input id="civil_status" type="text" value="SINGLE"
                      class="w-full px-4 py-1 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                      disabled />
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
