<!-- Update Student Modal -->
<div id="updateModal"
  class="fixed inset-0 z-50 hidden  bg-gray-800 bg-opacity-75 flex items-center justify-center transition-opacity duration-300 ease-in-out">
  <div
    class="bg-white p-8 rounded-xl w-full max-w-2xl shadow-lg transform transition-transform duration-300 ease-in-out scale-95 hover:scale-100">
    <h3 class="text-2xl font-semibold mb-6 text-gray-800">Update Student Information</h3>
    <form id="updateForm">
      <input type="hidden" id="studentId">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="mb-4">
          <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
          <input type="text" id="lastName"
            class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out"
            required />
        </div>
        <div class="mb-4">
          <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
          <input type="text" id="firstName"
            class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out"
            required />
        </div>
        <div class="mb-4">
          <label for="middleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
          <input type="text" id="middleName"
            class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out"
            required />
        </div>
        <div class="mb-4">
          <label for="contactNumber" class="block text-sm font-medium text-gray-700">Contact Number</label>
          <input type="text" id="contactNumber"
            class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out"
            required />
        </div>
        <div class="mb-4">
          <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
          <input type="text" id="address"
            class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out"
            required />
        </div>

        <!-- Dropdown for Program -->
        <div class="mb-4">
          <label for="program" class="block text-sm font-medium text-gray-700">Program</label>
          <select id="program"
            class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out"
            required>
            <option value="">Select Program</option>
            <option value="CS">Computer Science</option>
            <option value="IT">Information Technology</option>
          </select>
        </div>

        <div class="mb-4">
          <label for="classification" class="block text-sm font-medium text-gray-700">Classification</label>
          <select id="classification"
            class="px-4 py-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200 ease-in-out"
            required>
            <option value="">Select Classification</option>
            <option value="Regular">Regular</option>
            <option value="Irregular">Irregular</option>
            <option value="Transferee">Transferee</option>
            <option value="Returnee">Returnee</option>
          </select>
        </div>
      </div>

      <!-- Action buttons -->
      <div class="flex justify-end space-x-4 mt-6">
        <button type="button" onclick="closeUpdateStudentModal()"
          class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none transition duration-200 ease-in-out">Cancel</button>
        <button type="submit"
          class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none transition duration-200 ease-in-out">Update</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Open modal with student data
  function openUpdateStudentModal(studentId, lastName, firstName, middleName, contactNumber, address, program,
    classification) {
    document.getElementById('updateModal').classList.remove('hidden');
    document.getElementById('studentId').value = studentId;
    document.getElementById('lastName').value = lastName || '';
    document.getElementById('firstName').value = firstName || '';
    document.getElementById('middleName').value = middleName || '';
    document.getElementById('contactNumber').value = contactNumber || '';
    document.getElementById('address').value = address || '';
    document.getElementById('program').value = program || '';
    document.getElementById('classification').value = classification || '';
  }


  // Close modal
  function closeUpdateStudentModal() {
    document.getElementById('updateModal').classList.add('hidden');
  }

  document.getElementById('updateForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const updatedData = {
      studentId: document.getElementById('studentId').value,
      lastName: document.getElementById('lastName').value,
      firstName: document.getElementById('firstName').value,
      middleName: document.getElementById('middleName').value,
      contactNumber: document.getElementById('contactNumber').value,
      address: document.getElementById('address').value,
      program: document.getElementById('program').value,
      classification: document.getElementById('classification').value
    };


    closeModal();
    alert("Student info updated!");
  });
</script>
