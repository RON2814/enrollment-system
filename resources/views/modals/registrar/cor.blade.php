<!-- COR Modal -->
<div id="corModal"
    class="hidden fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 transition-opacity duration-300 ease-in-out">
    <div
        class="modal-container bg-white w-full sm:w-[80%] md:w-[80%] lg:w-[80%] max-w-full h-[92vh] max-h-[92vh] rounded-lg shadow-2xl p-12 py-8 relative overflow-y-auto">

        <!-- Close Button -->
        <button onclick="closeUpdateStudentModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Page 1  -->
        <h3 class="text-xl font-semibold mb-6 text-gray-800 border-b border-gray-300">Certificate of Registration</h3>

        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="overflow-hidden bg-white p-16 rounded-lg shadow-2xl mt-2 border border-gray-300"
                style="width: 210mm; height: 297mm; overflow: hidden;">
                <div class="flex items-center justify-center mb-5">
                    <img src="{{ Vite::asset('resources/assets/cvsulogo.png') }}" alt="University Logo"
                        class="h-10 mr-4">
                    <div class="flex flex-col h-auto">
                        <p class="m-0 p-0 text-center">Cavite State University</p>
                        <p class="text-center text-sm">Bacoor City Campus</p>
                        <p class="text-center text-base font-semibold">REGISTRATION FORM</p>
                    </div>
                </div>
                <div class="border-b border-gray-200"></div>
                <table class="w-full border-collapse mb-0 border-none text-xs">
                    <tr>
                        <td class="border-none p-2">Student Number: <span class="font-medium" id="updatedStudentNumber">N/A</span></td>
                        <td class="border-none p-2">Semester: <span class="font-medium" id="updatedStudentSemester">N/A</span></td>
                        <td class="border-none p-2">School Year: <span class="font-medium" id="updatedStudentSchoolYear">N/A</span></td>
                        <td class="border-none p-2">Date: <span class="font-medium" id="updatedStudentDate">N/A</span></td>
                    </tr>
                    <tr>
                        <td class="border-none p-2">Name: <span class="font-medium" id="updatedStudentName">N/A</span></td>
                        <td class="border-none p-2">Year: <span class="font-medium" id="updatedStudentYear">N/A</span></td>
                        <td class="border-none p-2">Program: <span class="font-medium" id="updatedStudentProgram">N/A</span></td>
                        <td class="border-none p-2">Major: <span class="font-medium" id="updatedStudentMajor">N/A</span></td>
                    </tr>
                    <tr>
                        <td class="border-none p-2">Address: <span class="font-medium" id="updatedStudentAddress">N/A</span></td>
                        <td class="border-none p-2">Section: <span class="font-medium" id="updatedStudentSection">N/A</span></td>
                        <td class="border-none p-2">Encoder: <span class="font-medium" id="updatedStudentEncoder">N/A</span></td>
                    </tr>
                </table>

                <!-- Course Table -->
                <table class="w-full border-collapse mt-4">
                    <thead>
                        <tr class="bg-gray-200 text-xs">
                            <th class="border border-gray-400 p-2">Course Code</th>
                            <th class="border border-gray-400 p-2">Course Title</th>
                            <th class="border border-gray-400 p-2">Units</th>
                            <th class="border border-gray-400 p-2">Time</th>
                            <th class="border border-gray-400 p-2">Day</th>
                            <th class="border border-gray-400 p-2">Room</th>
                        </tr>
                    </thead>
                    <tbody id="courseList">
                        <!-- Dynamically populated -->
                    </tbody>
                </table>

                <!-- Fees Table -->
                <table class="w-full border-collapse mt-6 text-xs">
                    <tr class="bg-gray-200 text-xs">
                        <th class="border border-gray-400 p-2">Laboratory Fees</th>
                        <th class="border border-gray-400 p-2">Other Fees</th>
                        <th class="border border-gray-400 p-2">Assessment</th>
                        <th class="border border-gray-400 p-2">Totals</th>
                    </tr>
                    <tr>
                        <td class="border border-gray-400 p-2">Com. Lab: <span class="font-medium text-right">&#8369; ---</span></td>
                        <td class="border border-gray-400 p-2">NSTP: <span class="font-medium text-right">&#8369; -</span></td>
                        <td class="border border-gray-400 p-2">Tuition Fee: <span class="font-medium text-right">&#8369; 5000.00</span></td>
                        <td class="border border-gray-400 p-2">TOTAL AMOUNT: <span class="font-medium text-right">&#8369; 10,090.00</span></td>
                    </tr>
                </table>

                <p class="text-sm mt-2 italic"><span class="font-medium">NOTE:</span> Your slots on the above subjects will be confirmed only upon payment.</p>

                <div class="mt-8 text-left pb-4 text-sm">
                    Registration Status: <span class="font-medium" id="updatedStudentStatus">N/A</span><br>
                    Date of Birth: <span class="font-medium" id="updatedStudentBirthday">N/A</span><br>
                    Sex: <span class="font-medium" id="updatedStudentSex">N/A</span><br>
                    Contact Number: <span class="font-medium" id="updatedStudentContact">N/A</span><br>
                    E-mail Address: <span class="font-medium" id="updatedStudentEmail">N/A</span><br>
                    <p>Student's Signature: __________________________</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to open the COR modal and populate it with student data
    function openCORMOdal(studentData) {
        const corModal = document.getElementById('corModal');

        // Populate the modal with student data
        document.getElementById('updatedStudentNumber').textContent = studentData.enrollment?.[0]?.student_number || 'N/A';
        document.getElementById('updatedStudentName').textContent = `${studentData.last_name}, ${studentData.first_name} ${studentData.middle_name || ''}`;
        document.getElementById('updatedStudentYear').textContent = studentData.enrollment?.[0]?.year_level || 'N/A';
        document.getElementById('updatedStudentProgram').textContent = studentData.program?.title || 'N/A';
        document.getElementById('updatedStudentMajor').textContent = studentData.program?.major || 'N/A';
        document.getElementById('updatedStudentEncoder').textContent = studentData.enrollment?.[0]?.registrar_encoder_id || 'N/A';
        document.getElementById('updatedStudentStatus').textContent = studentData.classification || 'N/A';
        document.getElementById('updatedStudentBirthday').textContent = studentData.birthday ? new Date(studentData.birthday).toLocaleDateString() : 'N/A';
        document.getElementById('updatedStudentSex').textContent = studentData.sex ? ucfirst(studentData.sex) : 'N/A';
        document.getElementById('updatedStudentContact').textContent = studentData.contact_number || 'N/A';
        document.getElementById('updatedStudentEmail').textContent = studentData.user?.email || 'N/A';

        // Populate the courses list dynamically
        const courseList = document.getElementById('courseList');
        courseList.innerHTML = ''; // Clear the current course list
        studentData.checklist?.forEach(checklistItem => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="border border-gray-400 p-2">${checklistItem.course_code || 'N/A'}</td>
                <td class="border border-gray-400 p-2">${checklistItem.course?.course_title || 'N/A'}</td>
                <td class="border border-gray-400 p-2">${checklistItem.units || 'N/A'}</td>
                <td class="border border-gray-400 p-2">TBA</td>
                <td class="border border-gray-400 p-2">TBA</td>
                <td class="border border-gray-400 p-2">TBA</td>
            `;
            courseList.appendChild(row);
        });

        // Open the modal
        corModal.classList.remove('hidden');
    }

    // Function to close the COR modal
    function closeUpdateStudentModal() {
        const corModal = document.getElementById('corModal');
        corModal.classList.add('hidden');
    }

    // Helper function to capitalize the first letter of a string
    function ucfirst(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
</script>
