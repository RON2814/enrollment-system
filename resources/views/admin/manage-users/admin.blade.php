<x-app-layout>
  {{-- header  --}}
  <div class="header-wrapper flex justify-between items-center flex-wrap bg-white p-4 py-3">
    <div class="header-title">
      <h2 class="pl-3 font-semibold  text-[#206A5D]">Admin Management</h2>
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

  {{-- main content  --}}
  <div class="main-content p-4 py-0 bg-[#ebe9e9]">
    <div class="bg-white mt-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 p-8">
      <div class="flex items-center justify-between mb-5">
        <h3 class="text-2xl font-semibold text-gray-900">Admin Table</h3>

        <!-- Search and Filter Section -->
        <div class="flex space-x-4">
          <!-- Search Bar -->
          <input type="text" placeholder="Search..."
            class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />

          <!-- Add New Admin Button -->
          <button onclick="open_add_admin()"
            class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Add New Admin
          </button>
        </div>
      </div>
      <div class="overflow-x-auto rounded-lg">
        <table class="min-w-full table-auto border-separate border-spacing-0">
          <thead class="bg-[#0A6847] text-white text-sm">
            <tr>
              <th class="py-3 px-4 text-left font-medium">Last Name</th>
              <th class="py-3 px-4 text-left font-medium">First Name</th>
              <th class="py-3 px-4 text-left font-medium">Middle Name</th>
              <th class="py-3 px-4 text-left font-medium">Contact Number</th>
              <th class="py-3 px-4 text-left font-medium">Created at</th>
              <th class="py-3 px-4 text-left font-medium">Action</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <tr class="hover:bg-gray-100 transition-colors duration-200">
              <td class="py-4 px-4 text-sm truncate max-w-xs">Kim</td>
              <td class="py-4 px-4 text-sm truncate max-w-xs">Mingyu</td>
              <td class="py-4 px-4 text-sm truncate max-w-xs">Svt</td>
              <td class="py-4 px-4 text-sm truncate max-w-xs">123-456-7890</td>
              <td class="py-4 px-4 text-sm truncate max-w-xs">2024-12-23</td>
              <td class="py-4 px-4 text-sm">
                <div class="flex items-center">
                  <button class="text-blue-500 hover:text-blue-700"
                    onclick="openAdminModal('Kim', 'Mingyu', 'Svt', '123-456-7890')">
                    <i class="fas fa-edit"></i>
                  </button>

                  <button class="ml-4 text-red-500 hover:text-red-700">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </div>
              </td>
            </tr>


          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Include modals -->
  @include('modals.manage-users.add-admin')
  @include('modals.manage-users.update-admin')

  <script>
    function toggleDropdown() {
      const dropdownContent = document.querySelector('.dropdown-content');
      dropdownContent.classList.toggle('hidden');
    }
  </script>
</x-app-layout>
