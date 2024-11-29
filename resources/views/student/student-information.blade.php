<x-app-layout>
    <div class="main-content p-4 bg-[#ebe9e9]">
        <div class="header-wrapper flex justify-between items-center flex-wrap bg-white rounded-lg p-4 mb-4">
            <div class="header-title text-[#27984b]">
                <h1>Hello {name}</h1>
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
        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <!-- Student Information Section -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Student Information</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="studentNumber">Student Number</label>
                <input id="studentNumber" type="text" value="202211773" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="programName">Program Name</label>
                <input id="programName" type="text" value="BACHELOR OF SCIENCE IN COMPUTER SCIENCE" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="major">Major</label>
                <input id="major" type="text" value="N/A" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="section">Section</label>
                <input id="section" type="text" value="3-2" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
          
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="lastName">Last Name</label>
                <input id="lastName" type="text" value="Rodelas" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="firstName">First Name</label>
                <input id="firstName" type="text" value="Artze" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="middleName">Middle Name</label>
                <input id="middleName" type="text" value="Valles" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
            </div>
          </div>
          
          <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <!-- Personal Information Section -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Personal Information</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="streetName">Street Name</label>
                <input id="streetName" type="text" value="DE LEON" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="barangay">Barangay</label>
                <input id="barangay" type="text" value="LIGAS" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="municipality">Municipality</label>
                <input id="municipality" type="text" value="BACOOR" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="province">Province</label>
                <input id="province" type="text" value="CAVITE" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="dateOfBirth">Date of Birth</label>
                <input id="dateOfBirth" type="text" value="2003-11-06" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="sex">Sex</label>
                <input id="sex" type="text" value="FEMALE" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="civilStatus">Civil Status</label>
                <input id="civilStatus" type="text" value="SINGLE" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="religion">Religion</label>
                <input id="religion" type="text" value="CATHOLIC" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1" for="citizenship">Citizenship</label>
                <input id="citizenship" type="text" value="FILIPINO" class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 focus:ring-2 focus:ring-blue-300 focus:outline-none" disabled />
              </div>
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
