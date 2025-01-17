<!-- Advising Modal -->
<div id="evaluationModal"
    class="hidden fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 transition-opacity duration-300 ease-in-out">
    <div
        class="modal-container bg-white w-full sm:w-[80%] md:w-[80%] lg:w-[90%] max-w-full rounded-lg shadow-xl p-8 relative overflow-y-auto max-h-[calc(100vh-4rem)]">
        <!-- Close Button -->
        <button onclick="closeEvaluationModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <h3 class="text-2xl text-center font-bold mb-2 text-dark-green border-b border-gray-300 w-full">
            <span class="text-green-700">Details for Advising</span>
        </h3>

        {{-- Enrollment Table COG  --}}
        <h2 class="text-xl font-semibold mb-2 text-gray-800 ">Submitted Grades for Evaluation</h2>
        <table id="evaltable" class="w-full border-collapse mb-4">
            <thead class="bg-[#0A6847] text-white text-xs">
                <tr>
                    <th class="px-4 py-2 text-center">Course Code</th>
                    <th class="px-4 py-2 text-center">Course Title</th>
                    <th class="px-4 py-2 text-center">Credit Units</th>
                    <th class="px-4 py-2 text-center">Final Grades</th>
                    <th class="px-4 py-2 text-center">Instructor</th>
                    <th class="px-4 py-2 text-center max-w-[100px] break-words">Enrollment Status</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        {{-- Checklist  --}}
        <h2 class="text-xl font-semibold text-gray-800 mt-12 ">Student Checklist</h2>
        <div id="checklistTable">
            {{-- JS will do here  --}}
        </div>


        {{-- Assign Courses --}}
        <div class="px-16 py-8 border border-gray-200 mt-16 shadow-lg rounded">
            <h3
                class="text-3xl text-center font-bold mb-2 mt-4 text-dark-green border-b border-t border-gray-300 w-full p-1">
                <span class="text-green-800">Advising</span>
            </h3>
            <p class="mb-4 text-center text-gray-800">Please select the eligible courses for the student with student
                number
                <span class="font-semibold text-green-700" id="student_number"></span>.
            </p>

            <table id="advisingTable" class="w-full border-collapse mb-4 ">
                <thead class="bg-[#0A6847] text-white text-xs">
                    <tr>
                        <th class="px-4 py-2 text-center">#</th>
                        <th class="px-4 py-2 text-center">Course</th>
                        <th class="px-4 py-2 text-center">Credit Units</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 text-center">1</td>
                        <td class="px-4 py-2 text-center">
                            <select class="w-full p-2 border border-gray-300 rounded-md"
                                onchange="updateTotalUnits(this)">
                                <option value="">Select a course</option>
                                <!-- Empty option to show no selection initially -->
                                @foreach ($courses as $course)
                                    <option value="{{ $course->course_code }}"
                                        data-lecture="{{ $course->credit_unit_lecture }}"
                                        data-lab="{{ $course->credit_unit_laboratory }}">
                                        {{ $course->course_code }} - {{ $course->course_title }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-4 py-2 text-center" id="creditUnits_1"></td>
                        <td class="px-4 py-2 text-center">
                            <button class="add-btn bg-blue-500 text-white rounded-md py-1 px-2 hover:bg-blue-600"
                                onclick="addRow()">Add Row</button>
                            <button class="remove-btn bg-red-500 text-white rounded-md py-1 px-2 hover:bg-red-600"
                                onclick="removeRow(this)">Remove</button>
                        </td>
                    </tr>

                </tbody>
            </table>

            <button
                class="submit-btn block mx-auto bg-green-500 border-none rounded-md py-3 text-white font-medium px-8 text-lg hover:bg-green-600"
                onclick="submitForm()">SEND</button>
        </div>

    </div>
</div>

<script>
     function openEvaluationModal(student) {
        console.log("Opening modal", student);

        const modal = document.getElementById('evaluationModal');
        const checklistTable = document.getElementById('checklistTable');


        // Clear any previous checklist data
        checklistTable.innerHTML = '';

        // Get the checklist data for the student
        const checklist = student.checklist;

        // Define year levels and semesters
        const yearLevels = ['First Year', 'Second Year', 'Third Year', 'Fourth Year'];
        const semesters = ['First Semester', 'Second Semester', 'Midyear'];

        // Loop through year levels and semesters to populate the table
        yearLevels.forEach(yearLevel => {
            semesters.forEach(semester => {
                // Filter the checklist for the current year level and semester
                const filteredItems = checklist.filter(item => item.year === yearLevel && item
                    .semester === semester);

                // If there are items for this year and semester, create a table and populate it
                if (filteredItems.length > 0) {
                    const table = document.createElement('table');
                    table.classList.add('min-w-full', 'table-auto', 'border-collapse',
                        'border-spacing-0', 'table-fixed');

                    // Add table headers
                    table.innerHTML = `
                <thead class="bg-gray-200 text-xs">
                    <tr class="text-left bg-white border-none">
                        <th colspan="8" class="text-sm border-none font-medium border-b border-gray-300 py-2">
                            ${yearLevel} - ${semester}
                        </th>
                    </tr>
                    <tr>
                        <th class="py-3 px-4 text-left font-medium" style="width: 10%;">COURSE CODE</th>
                        <th class="py-3 px-4 text-left font-medium" style="width: 18%;">COURSE TITLE</th>
                        <th class="py-3 px-4 text-center font-medium" style="width: 12%;">Credit Units</th>
                        <th class="py-3 px-4 text-center font-medium" style="width: 12%;">Contact Hours</th>
                        <th class="py-3 px-4 text-left font-medium" style="width: 15%;">Pre-requisites</th>
                        <th class="py-3 px-4 text-left font-medium" style="width: 10%;">Semester Taken</th>
                        <th class="py-3 px-4 text-left font-medium" style="width: 8%;">Final Grade</th>
                        <th class="py-3 px-4 text-left font-medium" style="width: 12%;">Instructor</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                </tbody>
            `;

                    // Append the table to the modal
                    checklistTable.appendChild(table);

                    // Populate the table rows with the filtered items
                    const tbody = table.querySelector('tbody');
                    filteredItems.forEach(item => {
                        const row = document.createElement('tr');
                        row.classList.add('hover', 'rounded-lg', 'transition-colors',
                            'duration-200');

                        // Check if the course exists and prevent errors for missing or null course
                        const course = item.course ?? {};

                        row.innerHTML = `
                    <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">${course.course_code ?? '..'}</td>
                    <td class="py-4 px-4 text-sm truncate  max-w-[200px] break-words">${course.course_title ?? '..'}</td>
                    <td class="text-center py-4 px-4 text-sm truncate max-w-xs">
                        ${course.credit_unit_lecture ? Number(course.credit_unit_lecture) + Number(course.credit_unit_laboratory || 0) : '..'}
                    </td>
                    <td class="text-center py-4 px-4 text-sm truncate max-w-xs">
                        ${course.contact_hours_lecture ? Number(course.contact_hours_lecture) + Number(course.contact_hours_laboratory || 0) : '..'}
                    </td>
<td class="py-4 px-4 text-sm truncate whitespace-normal max-w-[120px] break-words">
    ${item.course?.pre_requisite ?? '..'}
</td>
                    <td class="py-4 px-4 text-sm truncate max-w-xs">${item.semester ?? '..'}</td>
                    <td class="py-4 px-4 text-sm font-semibold text-center max-w-xs">${item.grade ?? '..'}</td>
                    <td class="py-4 px-4 text-sm font-semibold max-w-xs">${item.instructor?.last_name ?? '..'}</td>
                `;
                        tbody.appendChild(row);
                    });
                }
            });
        });

        // Show the modal
        modal.classList.remove('hidden');
    }

    let rowCount = 1;
    function addRow() {
        rowCount++;

        const tableBody = document.querySelector("#advisingTable tbody");
        const newRow = document.createElement("tr");

        newRow.innerHTML = `
        <td class="px-4 py-2 text-center">${rowCount}</td>
        <td class="px-4 py-2 text-center">
            <select class="w-full p-2 border border-gray-300 rounded-md" onchange="updateTotalUnits(this)">
                <option value="">Select a course</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->course_code }}" 
                            data-lecture="{{ $course->credit_unit_lecture }}" 
                            data-lab="{{ $course->credit_unit_laboratory }}">
                        {{ $course->course_code }} - {{ $course->course_title }}
                    </option>
                @endforeach
            </select>
        </td>
        <td class="px-4 py-2 text-center" id="creditUnits_${rowCount}"></td>
        <td class="px-4 py-2 text-center">
            <button class="add-btn bg-blue-500 text-white rounded-md py-1 px-2 hover:bg-blue-600" onclick="addRow()">Add Row</button>
            <button class="remove-btn bg-red-500 text-white rounded-md py-1 px-2 hover:bg-red-600" onclick="removeRow(this)">Remove</button>
        </td>
    `;

        tableBody.appendChild(newRow);
    }

    function removeRow(button) {
        const row = button.closest('tr');
        row.remove();
        console.log('Row removed');
    }

    function updateTotalUnits(selectElement) {
        // Get the selected option
        const selectedOption = selectElement.options[selectElement.selectedIndex];

        // Get the credit unit data
        const creditUnitLecture = selectedOption.getAttribute('data-lecture');
        const creditUnitLab = selectedOption.getAttribute('data-lab');

        // Calculate the total credit units
        const totalCreditUnits = parseInt(creditUnitLecture) + parseInt(creditUnitLab);

        // Update the corresponding credit unit cell
        const row = selectElement.closest('tr');
        const creditUnitCell = row.querySelector("td[id^='creditUnits_']");
        creditUnitCell.textContent = totalCreditUnits;
    }

    // Close Section Modal
    function closeEvaluationModal() {
        document.getElementById('evaluationModal').classList.add('hidden');
    }
</script>
