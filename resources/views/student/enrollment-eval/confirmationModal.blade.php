<!-- Confirmation Modal -->
<div id="confirmationModal"
  class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex justify-center items-center">
  <div class="bg-white rounded-lg shadow-lg p-6 w-1/2">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Confirm Assessment</h2>
    <p class="text-gray-600 mb-4">Are you sure you want to proceed to assessment?</p>

    <!-- Table to show evaluated courses -->
    <div class="overflow-x-auto max-h-60 overflow-y-auto">
      <table class="min-w-full border-collapse border border-gray-300">
        <thead>
          <tr class="bg-gray-200 text-sm">
            <th class="border border-gray-300 py-2 px-4">Course Code</th>
            <th class="border border-gray-300 py-2 px-4">Course Title</th>
            <th class="border border-gray-300 py-2 px-4">Credit Units</th>
          </tr>
        </thead>
        <tbody id="modalCourseList" class="text-gray-700"></tbody>
      </table>
    </div>

    <!-- Buttons -->
    <div class="flex justify-end mt-4">
      <button id="cancelModal"
        class="bg-gray-400 text-white px-4 py-2 mr-2 rounded hover:bg-gray-500">
        Cancel
      </button>
      <button id="confirmProceed" route = "{{ route('student.enrollment-eval.cor') }}"
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Confirm Enrollment
      </button>
    </div>
  </div>
</div>


<script>
  document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("confirmationModal");
  const proceedButton = document.getElementById("proceedToAssessment");
  const cancelModal = document.getElementById("cancelModal");
  const confirmProceed = document.getElementById("confirmProceed");
  const courseList = document.getElementById("modalCourseList");

  // Open modal and populate data
  proceedButton.addEventListener("click", function () {
    // Fetch evaluated courses from the page
    const rows = document.querySelectorAll("tbody tr");
    courseList.innerHTML = "";

    rows.forEach((row) => {
      if (!row.cells.length) return; // Skip empty rows

      const courseCode = row.cells[0].innerText;
      const courseTitle = row.cells[1].innerText;
      const creditUnits = row.cells[2].innerText;

      const newRow = document.createElement("tr");
      newRow.innerHTML = `
        <td class="border border-gray-300 py-2 px-4">${courseCode}</td>
        <td class="border border-gray-300 py-2 px-4">${courseTitle}</td>
        <td class="border border-gray-300 py-2 px-4">${creditUnits}</td>
      `;
      courseList.appendChild(newRow);
    });

    modal.classList.remove("hidden");
  });

  // Close modal
  cancelModal.addEventListener("click", function () {
    modal.classList.add("hidden");
  });

  // Proceed to assessment
  confirmProceed.addEventListener("click", function () {
    window.location.href = "/student/enrollment-eval/cor"; // Replace with Laravel route
  });
});

</script>