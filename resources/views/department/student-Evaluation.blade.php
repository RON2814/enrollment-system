<x-app-layout>
    <div class="main-content p-16 py-2 bg-[#ebe9e9]">
        <div class="bg-white p-10 py-8 rounded-lg shadow mt-2">
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-2xl font-semibold text-gray-900">Student Evaluation List</h3>
                <!-- Search and Filter Section -->
                <div class="flex space-x-4">
                    <!-- Search Bar -->
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search student number / name" />
                    </div>
                </div>
            </div>
            <div class="border-b border-gray-300 mt-0 py-0"></div>
            <div class="overflow-x-auto mt-2 rounded-md">
                <table class="min-w-full table-auto border-collapse border-spacing-0 table-fixed">
                    <thead class="bg-[#0A6847] text-white text-xs">
                        <tr>
                            <th class="py-2 px-3 text-left font-medium">Student Number</th>
                            <th class="py-2 px-3 text-left font-medium text-sm">Student Name</th>
                            <th class="py-2 px-3 text-left font-medium">Year - Semester</th>
                            <th class="py-2 px-3 text-left font-medium">Section</th>
                            <th class="py-2 px-3 text-left font-medium">Status</th>
                            <th class="py-2 px-3 text-left font-medium">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700" id="course-table-body">
                        <tr class="hover:bg-gray-200 transition-colors duration-200">
                            <td class="py-4 px-3 text-sm truncate max-w-xs font-medium"></td>
                            <td class="py-4 px-3 text-sm truncate max-w-xs font-medium"></td>
                            <td class="py-4 px-3 text-sm truncate max-w-xs"></td>
                            <td class="py-4 px-3 text-sm truncate max-w-xs"></td>
                            <td class="py-4 px-3 text-sm truncate max-w-xs"></td>
                            <td class="py-4 px-3 text-sm">
                                <button onclick="openChecklistModal()" class="">
                                 view
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('modals.student.evaluation.student-eval')
    
    <script>
        function openChecklistModal() {
            document.getElementById('openChecklist').classList.remove('hidden');
        }

        function closeChecklistModal() {
            document.getElementById('openChecklist').classList.add('hidden');
        }
    </script>
</x-app-layout>
