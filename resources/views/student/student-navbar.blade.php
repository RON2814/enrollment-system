<aside
  class="sidebar fixed top-0 left-0 bottom-0 w-1/6 h-full p-6 bg-[#0A6847] text-white shadow-lg z-50 transition-all duration-300 ease-in-out">
  <!-- Sidebar Header -->
  <div class="sidebar-header mb-6">
    <div class="logo h-[80px] p-4 flex items-center gap-4">
      <!-- Logo Image -->
      <img src="{{ Vite::asset('resources/assets/cvsulogo.png') }}" alt="CvSU-B Logo" class="h-12 w-12 object-contain">
      <!-- Title -->
      <h2 class="text-xl font-medium opacity-80">CvSU-B</h2>
    </div>
    <hr class="border-t-2 border-[#2c8c6d] mb-6">
  </div>

  <!-- Sidebar Navigation Menu -->
  <ul class="menu h-[80%] relative list-none p-0">
    <!-- Dashboard -->
    <li
      class="menu-item p-4 my-2 rounded-xl transition-all duration-300 ease-in-out hover:bg-[#2c8c6d] active:bg-[#4F9A85]">
      <a href="{{ route('student.dashboard') }}" class="text-white no-underline flex items-center gap-3">
        <i class="fas fa-tachometer-alt text-xs opacity-75 mr-2"></i>
        <span class="text-xs opacity-80">Dashboard</span>
      </a>
    </li>

    <!-- Student Information -->
    <li
      class="menu-item p-4 my-2 rounded-xl transition-all duration-300 ease-in-out hover:bg-[#2c8c6d] active:bg-[#4F9A85]">
      <a href="{{ route('student.student-information') }}" class="text-white no-underline flex items-center gap-3">
        <i class="fas fa-user text-xs opacity-75 mr-2"></i>
        <span class="text-xs opacity-80">Student Information</span>
      </a>
    </li>

    <!-- Enrolled Subjects -->
    <li
      class="menu-item p-4 my-2 rounded-xl transition-all duration-300 ease-in-out hover:bg-[#2c8c6d] active:bg-[#4F9A85]">
      <a href="{{ route('student.enrolled-sub') }}" class="text-white no-underline flex items-center gap-3">
        <i class="fas fa-user text-xs opacity-75 mr-2"></i>
        <span class="text-xs opacity-80">Enrolled Subjects</span>
      </a>
    </li>

    <!-- Class Schedule -->
    <li
      class="menu-item p-4 my-2 rounded-xl transition-all duration-300 ease-in-out hover:bg-[#2c8c6d] active:bg-[#4F9A85]">
      <a href="{{ route('student.schedule') }}" class="text-white no-underline flex items-center gap-3">
        <i class="fas fa-user text-xs opacity-75 mr-2"></i>
        <span class="text-xs opacity-80">Class Schedule</span>
      </a>
    </li>

    <!-- Student Grades -->
    <li
      class="menu-item p-4 my-2 rounded-xl transition-all duration-300 ease-in-out hover:bg-[#2c8c6d] active:bg-[#4F9A85]">
      <a href="{{ route('student.student-grades') }}" class="text-white no-underline flex items-center gap-3">
        <i class="fas fa-user text-xs opacity-75 mr-2"></i>
        <span class="text-xs opacity-80">Student Grades</span>
      </a>
    </li>

    <!-- Enrollment Module -->
    <li
      class="menu-item p-4 my-2 rounded-xl transition-all duration-300 ease-in-out hover:bg-[#2c8c6d] active:bg-[#4F9A85]">
      <a href="{{ route('student.enrollment') }}" class="text-white no-underline flex items-center gap-3">
        <i class="fas fa-user text-xs opacity-75 mr-2"></i>
        <span class="text-xs opacity-80">Enrollment Module</span>
      </a>
    </li>
  </ul>

</aside>
