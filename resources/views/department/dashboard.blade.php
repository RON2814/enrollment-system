<x-app-layout>
    {{-- header  --}}
    <div class="header-wrapper flex justify-between items-center flex-wrap bg-white p-4 py-3">
        <div class="header-title pl-3 font-semibold  text-[#206A5D]">
            <h2>Dashboard</h2>
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
        <h2 class="text-3xl font-semibold text-primary mb-6">Welcome to the Department Dashboard</h2>

        <!-- Dashboard Cards -->
        {{-- <section id="dashboard-cards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-primary">Total Students</h3>
                <p class="text-3xl font-bold">1,250</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-primary">Verifying Students</h3>
                <p class="text-3xl font-bold">100</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-primary">Courses</h3>
                <p class="text-3xl font-bold">35</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-primary">Programs</h3>
                <p class="text-3xl font-bold">2</p>
            </div>
        </section> --}}

        <!-- Announcements Section -->
        {{-- <section id="announcement-view" class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-2xl font-semibold text-primary">Announcements</h3>
                <a href="announcement_manage.html" class="px-4 py-2 bg-accent text-white rounded hover:bg-yellow-500 text-sm lg:text-base">Manage Announcements</a>
            </div>
            <div id="announcementList">
                <div class="border-b pb-4">
                    <h4 class="font-semibold text-primary">Announcement Title</h4>
                    <p class="text-sm text-gray-600">Announcement content goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </section> --}}


    </div>

    <script>
        function toggleDropdown() {
            const dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.classList.toggle('hidden');
        }
    </script>

    </div>
</x-app-layout>
