<aside
    class="sidebar fixed top-0 left-0 bottom-0 w-1/6 h-full p-6 bg-[#0A6847] text-white shadow-lg z-50 transition-all duration-300 ease-in-out">
    <!-- Sidebar Header -->
    <div class="sidebar-header mb-6">
        <div class="logo h-[80px] p-4 flex items-center gap-4">
            <!-- Logo Image -->
            <img src="{{ Vite::asset('resources/assets/cvsulogo.png') }}" alt="CvSU-B Logo"
                class="h-12 w-12 object-contain">
            <!-- Title -->
            <h2 class="text-xl font-medium opacity-80">CvSU-B</h2>
        </div>
        <hr class="border-t-2 border-[#2c8c6d] mb-6">
    </div>

    <!-- Sidebar Navigation Menu -->
    <ul class="menu h-[80%] relative list-none p-0">
        <!-- Dashboard -->
        <li
            class="menu-item p-4 my-2 rounded-xl transition-all duration-300 ease-in-out 
                @if (request()->routeIs('department.dashboard')) bg-[#4F9A85] @else hover:bg-[#2c8c6d] @endif">
            <a href="{{ route('department.dashboard') }}" class="text-white no-underline flex items-center gap-3">
                <i class="fas fa-tachometer-alt text-xs opacity-75 mr-2"></i>
                <span class="text-xs opacity-80">Dashboard</span>
            </a>
        </li>

        <!-- Department -->
        <li
            class="menu-item p-4 my-2 rounded-xl transition-all duration-300 ease-in-out 
                @if (request()->routeIs('department.department')) bg-[#4F9A85] @else hover:bg-[#2c8c6d] @endif">
            <a href="{{ route('department.department') }}" class="text-white no-underline flex items-center gap-3">
                <i class="fas fa-user text-xs opacity-75 mr-2"></i>
                <span class="text-xs opacity-80">Department</span>
            </a>
        </li>

        <!-- Student Checklist -->
        <li
            class="menu-item p-4 my-2 rounded-xl transition-all duration-300 ease-in-out 
                @if (request()->routeIs('department.studentChecklist')) bg-[#4F9A85] @else hover:bg-[#2c8c6d] @endif">
            <a href="{{ route('department.studentChecklist') }}" class="text-white no-underline flex items-center gap-3">
                <i class="fas fa-user text-xs opacity-75 mr-2"></i>
                <span class="text-xs opacity-80">Student Checklist</span>
            </a>
        </li>

        <!-- Courses -->
        <li
            class="menu-item p-4 my-2 rounded-xl transition-all duration-300 ease-in-out 
                @if (request()->routeIs('department.courses')) bg-[#4F9A85] @else hover:bg-[#2c8c6d] @endif">
            <a href="{{ route('department.courses') }}" class="text-white no-underline flex items-center gap-3">
                <i class="fas fa-user text-xs opacity-75 mr-2"></i>
                <span class="text-xs opacity-80">Courses</span>
            </a>
        </li>

        <!-- Schedule -->
        <li
            class="menu-item p-4 my-2 rounded-xl transition-all duration-300 ease-in-out 
                @if (request()->routeIs('department.schedule')) bg-[#4F9A85] @else hover:bg-[#2c8c6d] @endif">
            <a href="{{ route('department.schedule') }}" class="text-white no-underline flex items-center gap-3">
                <i class="fas fa-user text-xs opacity-75 mr-2"></i>
                <span class="text-xs opacity-80">Schedule</span>
            </a>
        </li>
    </ul>
</aside>
