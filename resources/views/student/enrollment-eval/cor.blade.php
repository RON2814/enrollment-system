<x-app-layout>
  <div class="relative flex items-center justify-center min-h-screen bg-gray-100">
    <div class="cor overflow-hidden bg-white p-14 rounded-lg shadow-2xl mt-2 border border-gray-300"
      style="width: 210mm; height: 297mm;">
      <div class="flex items-center justify-center mb-5">
        <img src="{{ Vite::asset('resources/assets/cvsulogo.png') }}" alt="University Logo" class="h-10 mr-4">
        <div class="flex flex-col h-auto">
          <p class="m-0 p-0 text-center">Cavite State University</p>
          <p class="text-center text-sm">Bacoor City Campus</p>
          <p class="text-center text-base font-semibold">REGISTRATION FORM</p>
        </div>
      </div>
      <div class="border-b border-gray-200"></div>
      <table class="w-full border-collapse mb-0 border-none text-xs">
        @isset($student)
          <tr>
            <td class="border-none p-2">Student Number:<span class="font-medium"
                id="updatedStudentNumber">{{ old('student_number', $student->student_number) }}</span>
            </td>
            <td class="border-none p-2">Semester: <span
                class="font-medium">{{ $latestEnrollment ? $latestEnrollment->semester : 'N/A' }}</span></td>
            <td class="border-none p-2">School Year: <span
                class="font-medium">{{ $latestEnrollment->school_year_start . '-' . $latestEnrollment->school_year_end }}</span>
            </td>
            <td class="border-none p-2">Date: <span
                class="font-medium">{{ $latestEnrollment->updated_at->format('F j, Y') }}</span></td>
          </tr>
          <tr>
            <td class="border-none p-2">Name: <span
                class="font-medium capitalize">{{ $student->last_name . ', ' . $student->first_name . ' ' . $student->middle_name }}</span>
            </td>
            <td class="border-none p-2">Year: <span
                class="font-medium">{{ $latestEnrollment ? $latestEnrollment->year_level : 'N/A' }}</span></td>
            <td class="border-none p-2">Program: <span class="font-medium">{{ $student->program->title }}</span></td>
            <td class="border-none p-2">Major: <span class="font-medium">{{ $student->program->major ?: 'N/A' }}</span>
            </td>
          </tr>
          <tr>
            <td class="border-none p-2">Address: <span
                class="font-medium">{{ $student->address->getFullAddress() }}</span>
            </td>
            <td class="border-none p-2">Section:
              <span class="font-medium">
                {{ $student->enrollment->first()->section->fullSectionName() ?? 'N/A' }}
              </span>
            </td>
            <td class="border-none p-2">Encoder: <span
                class="font-medium">{{ $latestEnrollment->encoder ?: 'N/A' }}</span></td>
          </tr>
        @endisset
      </table>

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
        <tbody>
          @foreach ($nextCourses as $course)
            <tr class="text-xs">
              <td class="border border-gray-400 p-2">{{ $course->course_code }}</td>
              <td class="border border-gray-400 p-2">{{ $course->course->course_title }}</td>
              <td class="border border-gray-400 p-2">
                {{ $course->course->credit_unit_lecture ?? 0 }} | {{ $course->course->credit_unit_laboratory ?: '' }}
              </td>

              <td class="border border-gray-400 p-2">TBA</td>
              <td class="border border-gray-400 p-2">TBA</td>
              <td class="border border-gray-400 p-2">TBA</td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <table class="w-full border-collapse mt-6 text-xs">
        <tr class="bg-gray-200 text-xs">
          <th class="border border-gray-400 p-2">Laboratory Fees</th>
          <th class="border border-gray-400 p-2">Other Fees</th>
          <th class="border border-gray-400 p-2">Assessment</th>
          <th class="border border-gray-400 p-2">Totals<br></th>
        </tr>
        <tr>
          <td class="border border-gray-400 p-2">
            Com. Lab: <span class="font-medium text-right">&#8369; ---</span>
          </td>
          <td class="border border-gray-400 p-2">
            NSTP: <span class="font-medium text-right">&#8369; -</span><br>
            Reg Fee: <span class="font-medium text-right">&#8369; 55.00</span><br>
            ID: <span class="font-medium text-right">&#8369; -</span><br>
            Late Reg.: <span class="font-medium text-right"> -</span><br>
            Insurance: <span class="font-medium text-right">&#8369; 25.00</span><br>
          </td>
          <td class="border border-gray-400 p-2">
            Tuition Fee: <span class="font-medium text-right">&#8369; 5000.00</span><br>
            SFDF: <span class="font-medium text-right">&#8369; 1500.00</span><br>
            SRF: <span class="font-medium text-right">&#8369; 2025.00</span><br>
            Misc.: <span class="font-medium text-right">&#8369; 435.00</span><br>
            Athletics: <span class="font-medium text-right">&#8369; 100.00</span><br>
            SCUAA: <span class="font-medium text-right">&#8369; 100.00</span><br>
            Library Fee: <span class="font-medium text-right">&#8369; 50.00</span><br>
            Lab Fees: <span class="font-medium text-right">&#8369; 800.00</span><br>
            Other Fees: <span class="font-medium text-right">&#8369; 80.00</span>
          </td>
          <td class="border border-gray-400 p-2">
            Total Units: <span class="font-medium text-right">{{ $totalUnits }}</span><br>
            <hr>
            Total Hours: <span class="font-medium text-right">{{ $totalHours }}</span><br>
            <hr>
            <span class="font-medium text-right">TOTAL AMOUNT: &#8369; 10,090.00</span><br><br>
            Scholarship: <span class="font-medium text-right">CHED Free Tuition and Misc. Fee</span><br>
            <hr>
            Terms of Payment:<br>
            <div class="pl-2">
              First: <span class="font-medium text-right">&#8369; 10,090.00</span><br>
              Second: <span class="font-medium text-right">-</span><br>
              Third: <span class="font-medium text-right">-</span>
            </div>
          </td>
        </tr>
      </table>

      <p class="text-sm mt-2 italic"><span class="font-medium">NOTE:</span> Your slots on the above subjects will be
        confirmed only upon payment.</p>

      <div class="mt-8 text-left pb-4 text-sm">
        Registration Status: <span class="font-medium">{{ $student->classification }}</span><br>
        Date of Birth: <span class="font-medium">
          {{ $student->birthday ? $student->birthday->format('F j, Y') : 'N/A' }}
        </span><br>
        Sex: <span class="font-medium">{{ ucfirst($student->sex) }}</span><br>
        Contact Number: <span class="font-medium">{{ $student->contact_number }}</span><br>
        E-mail Address: <span class="font-medium">{{ $student->user->email }}</span><br>
        <p>Student's Signature: __________________________</p>


      </div>
    </div>
    <button id="downloadPdf"
      class="absolute top-4 right-4 bg-blue-500 text-white px-4 py-2 rounded md:static md:mt-4 md:right-auto md:left-auto md:block">
      Download PDF</button>
  </div>

  <script>
    document.getElementById('downloadPdf').addEventListener('click', function() {
      const element = document.querySelector('.cor'); // Select the content to export

      const options = {
        margin: 0, // Remove margin to ensure the content fits within the page size
        filename: 'registration_form.pdf',
        image: {
          type: 'jpeg',
          quality: 1
        }, // Highest quality JPEG
        html2canvas: {
          scale: 2, // Enhance resolution by increasing scale
          logging: true, // Enable logging for debugging
          useCORS: true, // Ensure external images are loaded
          letterRendering: true, // Improve font rendering
        },
        jsPDF: {
          unit: 'mm',
          format: [210, 297], // Set custom page size to match the .cor dimensions
          orientation: 'portrait'
        }
      };

      // Convert the selected content to PDF
      html2pdf().from(element).set(options).save();
    });
  </script>


</x-app-layout>
