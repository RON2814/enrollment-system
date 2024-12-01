<!-- Update Department - Advisers Modal -->
<div id="update_modal" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-75 flex items-center justify-center transition-opacity duration-300 ease-in-out">
    <div class="bg-white p-8 rounded-xl w-full max-w-2xl shadow-lg transform transition-transform duration-300 ease-in-out scale-95 hover:scale-100">
        <h3 class="text-2xl font-semibold mb-6 text-gray-800">Update Registration Advisers Information</h3>
        <form id="update_form">
            <input type="hidden" id="user_id">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="last_name" class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out" required />
                </div>
                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="first_name" class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out" required />
                </div>
                <div class="mb-4">
                    <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                    <input type="text" id="middle_name" class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out" required />
                </div>
                <div class="mb-4">
                    <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="text" id="contact_number" class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out" required />
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out" required />
                </div>

                <!-- Dropdown for Program -->
                <div class="mb-4">
                    <label for="program" class="block text-sm font-medium text-gray-700">Program</label>
                    <select id="program" class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out" required>
                        <option value="">Select Program</option>
                        <option value="CS">Computer Science</option>
                        <option value="IT">Information Technology</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="address" class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out" required />
                </div>
            </div>

            <!-- Action buttons -->
            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" onclick="close_modal()" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none transition duration-200 ease-in-out">Cancel</button>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none transition duration-200 ease-in-out">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
  // Open modal with student data
function open_Advisers_modal(student_id, last_name, first_name, middle_name, contact_number, address, email, program) {
    const modal = document.getElementById('update_modal');
    modal.classList.remove('hidden');  // Make the modal visible
    document.getElementById('user_id').value = student_id || '';
    document.getElementById('last_name').value = last_name || '';
    document.getElementById('first_name').value = first_name || '';
    document.getElementById('middle_name').value = middle_name || '';
    document.getElementById('contact_number').value = contact_number || '';
    document.getElementById('email').value = email || '';
    document.getElementById('program').value = program || '';
    document.getElementById('address').value = address || '';
}

// Close modal
function close_modal() {
    document.getElementById('update_modal').classList.add('hidden');
}

document.getElementById('update_form').addEventListener('submit', function(e) {
    e.preventDefault();

    const updated_data = {
        user_id: document.getElementById('user_id').value,
        last_name: document.getElementById('last_name').value,
        first_name: document.getElementById('first_name').value,
        middle_name: document.getElementById('middle_name').value,
        contact_number: document.getElementById('contact_number').value,
        email: document.getElementById('email').value, 
        program: document.getElementById('program').value,
        address: document.getElementById('address').value,
    };


    close_modal(); 
    alert("Registration Adviser info updated!"); 
});
</script>
