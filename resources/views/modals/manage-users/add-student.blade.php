<!-- Add Student Modal -->
<div id="addStudentModal" class="hidden flex fixed inset-0 bg-gray-800 bg-opacity-75 justify-center items-center z-50">
  <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-3xl">
    <h3 class="text-2xl font-semibold mb-6 text-gray-800">Add New Student</h3>
    <form id="addStudentForm" action="{{ route('admin.manage-users.store-student') }}" method="POST">
      @csrf
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div>
          <label for="studentNumber" class="text-sm font-medium text-gray-700">Student Number <span
              class="text-red-400">*</span></label>
          <input required type="text" id="studentNumber" name="student_number"
            class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div>
          <label for="password" class="text-sm font-medium text-gray-700">Password <span
              class="text-red-400">*</span></label>
          <div class="relative">
            <input required type="text" id="password" name="password"
              class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              oninput="toggleIcon()">
            <i id="generatePass"
              class="fas fa-sync-alt absolute top-1/2 translate-y-[-40%] right-3 cursor-pointer text-blue-500"
              onclick="generatePassword()"></i>
          </div>
        </div>

        <div>
          <label for="lastName" class="text-sm font-medium text-gray-700">Last Name <span
              class="text-red-400">*</span></label>
          <input required type="text" id="lastName" name="last_name"
            class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div>
          <label for="firstName" class="text-sm font-medium text-gray-700">First Name <span
              class="text-red-400">*</span></label>
          <input required type="text" id="firstName" name="first_name"
            class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div>
          <label for="middleName" class="text-sm font-medium text-gray-700">Middle Name <span
              class="text-red-400">*</span></label>
          <input type="text" id="middleName" name="middle_name"
            class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div>
          <label for="extensionName" class="text-sm font-medium text-gray-700">Extension Name</label>
          <input type="text" id="extensionName" name="extension_name"
            class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <!-- Program Dropdown -->
        <div>
          <label for="program" class="text-sm font-medium text-gray-700">Program <span
              class="text-red-400">*</span></label>
          <select required id="program" name="program"
            class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="" disabled selected>Select Program</option>
            <option value="1">BS Computer Science</option>
            <option value="2">BS Information Technology</option>
          </select>
        </div>

        <!-- Classification Dropdown -->
        <div>
          <label for="classification" class="text-sm font-medium text-gray-700">Classification <span
              class="text-red-400">*</span></label>
          <select required id="classification" name="classification"
            class="mt-1 px-4 py-2 border border-gray-300 rounded-lg w-full shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="" disabled selected>Select Classification</option>
            <option value="regular">Regular</option>
            <option value="irregular">Irregular</option>
            <option value="transferee">Transferee</option>
            <option value="returnee">Returnee</option>
          </select>
        </div>
      </div>

      <!-- Modal Actions -->
      <div class="flex justify-end space-x-4 mt-6">
        <button type="button" onclick="closeAddStudentModal()" id="cancel"
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
  function openAddStudentModal() {
    document.getElementById("addStudentModal").classList.remove("hidden");
  }

  // Close modal
  function closeAddStudentModal() {
    document.getElementById('addStudentModal').classList.add('hidden');
  }

  // Open Edit Student Modal (populate modal with current data)
  function openModal(studentNumber, lastName, firstName, middleName, program, classification) {
    document.getElementById("studentNumber").value = studentNumber;
    document.getElementById("lastName").value = lastName;
    document.getElementById("firstName").value = firstName;
    document.getElementById("middleName").value = middleName;
    document.getElementById("program").value = program;
    document.getElementById("classification").value = classification;
    openAddStudentModal(); // Open the modal when editing
  }

  function generatePassword() {
    const length = 8;
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    let password = "";
    for (let i = 0, n = charset.length; i < length; ++i) {
      password += charset.charAt(Math.floor(Math.random() * n));
    }
    document.getElementById("password").value = password;
    toggleIcon();
  }

  function toggleIcon() {
    const passwordInput = document.getElementById("password");
    const generateIcon = document.getElementById("generatePass");
    if (passwordInput.value) {
      generateIcon.style.display = "none";
    } else {
      generateIcon.style.display = "block";
    }
  }

  // Initialize icon visibility on page load
  document.addEventListener("DOMContentLoaded", function() {
    toggleIcon();
  });
</script>
