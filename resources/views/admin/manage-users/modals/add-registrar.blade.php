<!-- Add Department - Advisers Modal -->
<div id="addRegistrar" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center z-50">
  <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-3xl">
      <h3 class="text-2xl font-semibold mb-6 text-gray-800">Add New Registration Advisers</h3>
      <form id="addStudentForm">
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
              <div>
                  <label for="userID" class="block text-sm font-medium text-gray-700">User ID</label>
                  <input type="text" id="studentNumber" name="studentNumber"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>

              <div>
                  <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                  <input type="text" id="lastName" name="lastName"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>

              <div>
                  <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                  <input type="text" id="firstName" name="firstName"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>

              <div>
                  <label for="middleName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                  <input type="text" id="middleName" name="middleName"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>

              <div>
                  <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                  <input type="text" id="email" name="email"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>

              <div>
                  <label for="contactNumber" class="block text-sm font-medium text-gray-700">Contact Number</label>
                  <input type="text" id="contactNumber" name="contactNumber"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>

              <!-- Program Dropdown -->
              <div>
                  <label for="program" class="block text-sm font-medium text-gray-700">Program</label>
                  <select id="program" name="program"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                      <option value="" disabled selected>Select Program</option>
                      <option value="BSCS">BS Computer Science</option>
                      <option value="BSIT">BS Information Technology</option>
                  </select>
              </div>

              <div>
                  <label for="houseNumber" class="block text-sm font-medium text-gray-700">House Number</label>
                  <input type="text" id="houseNumber" name="houseNumber"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>

              <div>
                  <label for="street" class="block text-sm font-medium text-gray-700">Street</label>
                  <input type="text" id="street" name="street"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>

              <div>
                  <label for="barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                  <input type="text" id="barangay" name="barangay"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>

              <div>
                  <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                  <input type="text" id="city" name="city"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>

              <div>
                  <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                  <input type="text" id="province" name="province"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>

              <div>
                  <label for="zipCode" class="block text-sm font-medium text-gray-700">Zip Code</label>
                  <input type="text" id="zipCode" name="zipCode"
                      class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
              </div>



          </div>

          <!-- Modal Actions -->
          <div class="flex justify-end space-x-4 mt-6">
              <button type="button" onclick="closeModal()" id="cancel"
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
  // Open Add Student Modal
  function openaddRegistrar() {
      document.getElementById("addRegistrar").classList.remove("hidden");
  }

  // Close modal
  function closeModal() {
      document.getElementById('addRegistrar').classList.add('hidden');
  }

  function openModal(studentNumber, lastName, firstName, middleName, contactNumber, address, program,
      classification) {
      document.getElementById("userID").value = studentNumber;
      document.getElementById("lastName").value = lastName;
      document.getElementById("firstName").value = firstName;
      document.getElementById("middleName").value = middleName;
      document.getElementById("email").value = contactNumber;
      document.getElementById("contactNumber").value = contactNumber;
      document.getElementById("program").value = program;
      document.getElementById("address").value = address;
      openaddRegistrar(); 
  }
</script>
