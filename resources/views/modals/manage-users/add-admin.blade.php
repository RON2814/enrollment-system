<!-- Add Admin Modal -->
<div id="add_admin" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-3xl">
        <h3 class="text-2xl font-semibold mb-6 text-gray-800">Add New Admin</h3>
        <form id="add_admin_form">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
                    <input type="text" id="student_number" name="student_number"
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
  
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="last_name" name="last_name"
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
  
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="first_name" name="first_name"
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
  
                <div>
                    <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name"
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
  
                <div>
                    <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="text" id="contact_number" name="contact_number"
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
  
            <!-- Modal Actions -->
            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" onclick="close_modal()" id="cancel"
                    class="px-6 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg shadow-sm hover:bg-gray-400 transition">
                    Cancel
                </button>
  
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 transition">
                    Save
                </button>
            </div>
        </form>
    </div>
  </div>
  
  <script>
    function open_add_admin() {
        document.getElementById("add_admin").classList.remove("hidden");
    }

    function close_modal() {
        document.getElementById('add_admin').classList.add('hidden');
    }
  </script>
  