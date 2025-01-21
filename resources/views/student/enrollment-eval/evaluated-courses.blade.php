<x-app-layout>
    {{-- main content  --}}
    <div class="main-content p-16 py-2 bg-[#ebe9e9]">
        <div class="overflow-x-auto bg-white p-8 rounded-lg shadow-2xl mt-2">
            <!-- Student Information Section -->
            <form action="" method="get">
                <h2
                    class="flex justify-between items-center text-2xl font-medium border-b border-gray-300 text-gray-800 mb-5">
                    <span class="flex-1">Student Evaluated Course:</span>
                    <div class="flex space-x-2">
                        <span class="text-sm text-gray-500">Enrollment /</span>
                        <span class="text-sm text-blue-500">Evaluation</span>
                    </div>
                </h2>
                <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1" for="student_number">Student
                            Number</label>
                        <div id="student_number"
                            class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm font-semibold">
                            {{ $student->student_number }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1" for="student_name">Student
                            Name</label>
                        <div id="student_name" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm ">
                            {{ strtoupper($student->last_name ?? '') }}, {{ strtoupper($student->first_name ?? '') }}
                            {{ strtoupper($student->middle_name ?? '') }}
                        </div>
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1" for="section">Section</label>
                        <div id="section" class="w-full px-4 py-1 rounded-md text-gray-700 bg-gray-100 text-sm">
                          {{ $student->enrollment->first()->section->fullSectionName() ?? 'N/A' }}

                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1"
                            for="classification">Classification</label>
                        <div id="classification"
                            class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm font-semibold">
                            {{ strtoupper($student->classification ?? 'N/A') }}
                        </div>
                    </div>


                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1" for="program_name">Program</label>
                        <div id="program_name" class="w-full px-4 py-1 rounded-md bg-gray-100 text-gray-700 text-sm">
                            {{ $student->program ? $student->program->title : '' }}

                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1" for="major">Major</label>
                        <div id="major" class="w-full px-4 py-1 rounded-md text-gray-700 bg-gray-100 text-sm">
                            {{ strtoupper($student->program->major ?? 'N/A') }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1" for="year_level">Year Level</label>
                        <div id="year_level" class="w-full px-4 py-1 rounded-md text-gray-700 bg-gray-100 text-sm">
                            {{ $existingEnrollment ? $existingEnrollment->year_level : 'N/A' }}
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1" for="semester">Semester</label>
                        <div id="semester" class="w-full px-4 py-1 rounded-md text-gray-700 bg-gray-100 text-sm">
                            {{ $existingEnrollment ? $existingEnrollment->semester : 'N/A' }}
                        </div>
                    </div>



                </div>
                <div class="border-b border-gray-400 py-2"></div>

                <div class="overflow-x-auto rounded-lg mt-3 ">

                    <table class="min-w-full table-auto border-collapse border-spacing-0">
                        <thead class="bg-gray-200 text-xs">
                            <tr>
                                <th class="border border-gray-300 py-3 px-4 text-left font-semibold">Course Code</th>
                                <th class="border border-gray-300 py-3 px-4 text-left font-semibold">Course Title</th>
                                <th class="border border-gray-300 py-3 px-4 text-left font-semibold">Credit Units</th>
                                <th class="border border-gray-300 py-3 px-4 text-left font-semibold">Instructor</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 border border-gray-200">
                            @if (empty($nextCourses))
                                <tr>
                                    <td colspan="4" class="py-4 px-4 text-center text-sm">No evaluated courses
                                        available.</td>
                                </tr>
                            @else
                                @foreach ($nextCourses as $course)
                                    <tr class="hover:bg-gray-100 transition-colors duration-200">
                                        <td class="py-4 px-4 text-sm truncate max-w-xs">{{ $course->course_code }}</td>
                                        <td class="py-4 px-4 text-sm truncate max-w-xs">
                                            {{ $course->course->course_title }}</td>
                                        <td class="py-4 px-4 text-sm truncate max-w-xs">
                                            {{ ($course->course->credit_unit_lecture ?? 0) + ($course->course->credit_unit_laboratory ?? 0) ?: 'N/A' }}
                                        </td>
                                        <td class="py-4 px-4 text-sm truncate max-w-xs">
                                            {{ $course->instructor ? $course->instructor->name : 'TBA' }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    @if ($existingEnrollment && $existingEnrollment->status === 'under evaluation')
                        <p class="text-center text-red-500 font-semibold mt-4">Your enrollment is under review due to
                            grade discrepancies.</p>
                    @else
                        <button type="button" id="proceedToAssessment"
                            class="w-full bg-green-800 hover:bg-green-700 text-white py-1.5 px-2 shadow text-sm mt-4">
                            PROCEED TO ASSESSMENT
                        </button>
                    @endif


                </div>
        </div>

        <!-- Confirmation Modal -->
        <div id="confirmationModal"
            class="hidden fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 transition-opacity duration-300 ease-in-out">
            <div
                class="modal-container bg-white w-full sm:w-[80%] md:w-[80%] lg:w-[80%] max-w-full h-[92vh] max-h-[92vh] rounded-lg shadow-2xl p-12 py-8 relative overflow-y-auto">

                <!-- Close Button -->
                <button onclick=c() class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <h3 class="text-2xl text-center font-bold mb-2 text-dark-green border-b border-gray-300 w-full">
                    <span class="text-green-700">CONFIRMATION OF ENROLLMENT</span>
                </h3>
                <p class="text-gray-600 mb-8">
                    Please check the evaluated courses and review the information carefully before proceeding with the
                    Certificate of Registration (COR).
                </p>

                <h3 class="text-base font-semibold mt-2 mb-2 border-b border-gray-300">Courses to Enroll:</h3>

                <!-- Table to show evaluated courses -->
                <div class="mt-2 flex space-x-6 mb-8">
                    <table
                        class="min-w-full table-auto border-spacing-0 table-fixed border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 text-sm">
                                <th class="border border-gray-300 py-2 px-4">Course Code</th>
                                <th class="border border-gray-300 py-2 px-4">Course Title</th>
                                <th class="border border-gray-300 py-2 px-4">Credit Units</th>
                                <th class="border border-gray-300 py-2 px-4">instructor</th>
                            </tr>
                        </thead>
                        <tbody id="modalCourseList" class="text-gray-700"></tbody>
                    </table>
                </div>



                {{-- Billing Information  --}}
                @include('modals.registrar.partials.billing', ['student' => $student])


                <!-- Buttons -->
                <div class="flex justify-end mt-6 space-x-4">
                    <button id="cancelModal"
                        class="px-6 py-3 text-base font-semibold text-gray-800 bg-gray-300 rounded-xl shadow-md transition-all duration-300 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Cancel
                    </button>
                    <button  type="submit" id="enrollSaveButton" formaction="{{ route('student.enrollment-eval.cor') }}"
                        class="px-7 py-3 text-base font-semibold text-white bg-green-600 rounded-xl shadow-lg transition-all duration-300 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Confirm Enrollment
                    </button>
                </div>


            </div>

        </div>
        </form>

    </div>
    @include('modals.registrar.partials.success-notif')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("confirmationModal");
            const proceedButton = document.getElementById("proceedToAssessment");
            const cancelModal = document.getElementById("cancelModal");
            const confirmProceed = document.getElementById("confirmProceed");
            const courseList = document.getElementById("modalCourseList");

            // Open modal and populate data
            proceedButton.addEventListener("click", function() {
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
            <td class="border border-gray-300 py-2 px-4">TBA</td>
          `;
                    courseList.appendChild(newRow);
                });

                modal.classList.remove("hidden");
            });

            // Close modal
            cancelModal.addEventListener("click", function() {
                modal.classList.add("hidden");
            });

            // Proceed to assessment
            confirmProceed.addEventListener("click", function() {
                document.querySelector("form").submit(); // Manually submit the form
            });

        });


        function togglePaymentFields() {
            var checkbox = document.getElementById('applyFreeTuition');
            var receivedMoneyDiv = document.getElementById('receivedMoneyDiv');
            var changeDiv = document.getElementById('changeDiv');

            // Toggle visibility of "Received Money" and "Change" divs based on checkbox state
            if (checkbox.checked) {
                receivedMoneyDiv.style.display = 'none';
                changeDiv.style.display = 'none';
            } else {
                receivedMoneyDiv.style.display = 'flex';
                changeDiv.style.display = 'flex';
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const classificationElement = document.getElementById("classification");
            const applyFreeTuitionCheckbox = document.getElementById("applyFreeTuition");

            if (classificationElement && applyFreeTuitionCheckbox) {
                const classification = classificationElement.innerText.trim().toLowerCase();

                if (classification === "regular") {
                    applyFreeTuitionCheckbox.checked = true;
                    togglePaymentFields(); // Ensure fields update based on checked state
                }
            }
        });

        // Show success modal
  function showSuccessModal() {
    alert("Enrollment Successful!"); // Replace this with your modal logic
  }
    </script>
</x-app-layout>
