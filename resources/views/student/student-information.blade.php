<x-app-layout>
    {{-- header  --}}
    <div class="header-wrapper flex justify-between items-center flex-wrap bg-white p-4 py-3">
        <div class="header-title pl-3 font-semibold text-[#206A5D]">
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

    {{-- main content --}}
    <div class="main-content p-4 bg-[#ebe9e9]">
        {{-- Student Information Section --}}
        <div class="bg-white p-8 rounded-lg shadow mt-2">
            <h2 class="text-2xl font-medium border-b border-gray-200 text-gray-800 mb-5">Student Information</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Student Number</label>
                    <div class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ $student->student_number }}
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Student Name</label>
                    <div class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ strtoupper($student->last_name) }}, {{ strtoupper($student->first_name) }} {{ strtoupper($student->middle_name) }}
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">School Year</label>
                    <div class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        2023-2024
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Semester</label>
                    <div class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{-- {{ $student->semester }} --}} First Semester
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Program</label>
                    <div class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ $student->program_name }}  <!-- Corrected to program_name -->
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Major</label>
                    <div class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ $student->major ?? 'N/A' }}
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Year Level</label>
                    <div class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{-- {{ $student->year }}  --}} F
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Section</label>
                    <div class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{-- {{ $student->semester }}-{{ $student->year }} --}} ..
                    </div>
                </div>
                
            </div>
        </div>
        

        {{-- Personal Information Section --}}
        <div class="bg-white p-8 rounded-lg shadow-md mt-6">
            <h2 class="text-2xl font-medium border-b border-gray-100 text-gray-800 mb-6">Personal Information</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <!-- House Number -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="house_number">House Number</label>
                    <div id="house_number" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ $student->house_number }} <!-- Display House Number -->
                    </div>
                </div>
                <!-- Street -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="street">Street</label>
                    <div id="street" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ $student->street }} <!-- Display Street -->
                    </div>
                </div>
                <!-- Barangay -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="barangay">Barangay</label>
                    <div id="barangay" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ $student->barangay }} <!-- Display Barangay -->
                    </div>
                </div>
                <!-- Municipality -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="municipality">Municipality</label>
                    <div id="municipality" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ $student->city }} <!-- Display Municipality -->
                    </div>
                </div>
                <!-- Province -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="province">Province</label>
                    <div id="province" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ $student->province }} <!-- Display Province -->
                    </div>
                </div>
                <!-- Date of Birth -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="date_of_birth">Date of Birth</label>
                    <div id="date_of_birth" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ \Carbon\Carbon::parse($student->birthday)->format('F d, Y') }} <!-- Format Date of Birth -->
                    </div>
                </div>
                <!-- Sex -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="sex">Sex</label>
                    <div id="sex" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ $student->sex }} <!-- Display Sex -->
                    </div>
                </div>
                <!-- Civil Status -->
                {{-- <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1" for="civil_status">Civil Status</label>
                    <div id="civil_status" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                        {{ $student->civil_status }} <!-- Display Civil Status -->
                    </div>
                </div> --}}
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
