<x-app-layout>
  <div class="main-content p-32 py-2 bg-[#ebe9e9]">
      <div class="overflow-x-auto bg-white p-12 rounded-lg shadow-2xl mt-2 max-w-[210mm] mx-auto">
          <div class="flex items-center justify-center mb-2">
              <img src="{{ Vite::asset('resources/assets/cvsulogo.png') }}" alt="University Logo" class="h-20 mr-4">
              <div class="flex flex-col items-center">
                  <h2 class="m-0 p-0 text-center">Cavite State University</h2>
                  <h3 class="text-center">Bacoor City Campus</h3>
                  <p class="text-center text-sm mt-2">REGISTRATION FORM</p>
              </div>
          </div>


          <table class="w-full border-collapse mb-0 border-none text-sm">
              <tr>
                  <td class="border-none p-2">Student Number: <span class="font-medium">202211773</span></td>
                  <td class="border-none p-2">Semester: <span class="font-medium">1st Semester</span></td>
                  <td class="border-none p-2">Schoolyear: <span class="font-medium">2023-2024</span></td>
              </tr>
              <tr>
                  <td class="border-none p-2">Name: <span class="font-medium">GUNDAY RAINA ISABEL MAGNAYE</span></td>
                  <td class="border-none p-2">Year: <span class="font-medium">2nd Year</span></td>
                  <td class="border-none p-2">Program: <span class="font-medium">BSCS</span></td>
                  <td class="border-none p-2">Major: <span class="font-medium"></span></td>
              </tr>
              <tr>
                  <td class="border-none p-2">Address: <span class="font-medium">259, Ligas 2, Bacoor Cavite</span>
                  </td>
                  <td class="border-none p-2">Section: <span class="font-medium">BSCS 2-7</span></td>
                  <td class="border-none p-2">Encoder: <span class="font-medium">G. GARCIA</span></td>
              </tr>
          </table>


          <table class="w-full border-collapse mt-4">
              <thead>
                  <tr>
                      <th class="border p-2 text-sm">Sched Code</th>
                      <th class="border p-2 text-sm">Course Code</th>
                      <th class="border p-2 text-sm">Course Description</th>
                      <th class="border p-2 text-sm">Units</th>
                      <th class="border p-2 text-sm">Time</th>
                      <th class="border p-2 text-sm">Day</th>
                      <th class="border p-2 text-sm">Room</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td class="border p-2 text-sm">TBA</td>
                      <td class="border p-2 text-sm">GNED 01</td>
                      <td class="border p-2 text-sm">Mga Babasahin Hinggil sa Kasaysayan ng Pilipinas</td>
                      <td class="border p-2 text-sm">3</td>
                      <td class="border p-2 text-sm">TBA</td>
                      <td class="border p-2 text-sm">TBA</td>
                      <td class="border p-2 text-sm">TBA</td>
                  </tr>
              </tbody>
          </table>

          <table class="w-full border-collapse mt-4">
            <tr>
                <th class="border p-2 text-sm">Laboratory Fees</th>
                <th class="border p-2 text-sm">Other Fees</th>
                <th class="border p-2 text-sm">Assessment</th>
                <th class="border p-2 text-sm">Total<br></th>
            </tr>
            <tr>
                <td class="border p-2 text-sm">
                    Com. Lab: <span class="font-medium">&#8369; 800.00</span>
                </td>
                <td class="border p-2 text-sm">
                    NSTP: <span class="font-medium">&#8369; -</span><br>
                    Reg Fee: <span class="font-medium">&#8369; 55.00</span><br>
                    ID: <span class="font-medium">&#8369; -</span><br>
                    Late Reg.: <span class="font-medium"> -</span><br>
                    Insurance: <span class="font-medium">&#8369; 25.00</span><br>
                </td>
                <td class="border p-2 text-sm">
                    Tuition Fee: <span class="font-medium">&#8369; 5000.00</span><br>
                    SFDF: <span class="font-medium">&#8369; 1500.00</span><br>
                    SRF: <span class="font-medium">&#8369; 2025.00</span><br>
                    Misc.: <span class="font-medium">&#8369; 435.00</span><br>
                    Athletics: <span class="font-medium">&#8369; 100.00</span><br>
                    SCUAA: <span class="font-medium">&#8369; 100.00</span><br>
                    Library Fee: <span class="font-medium">&#8369; 50.00</span><br>
                    Lab Fees: <span class="font-medium">&#8369; 800.00</span><br>
                    Other Fees: <span class="font-medium">&#8369; 80.00</span>
                </td>
                <td class="border p-2 text-sm">
                    Total Hours: <span class="font-medium">37</span><br>
                    Total Units: <span class="font-medium">37</span><br>
                    <hr>
                    <span class="font-medium">TOTAL AMOUNT: &#8369; 10,090.00</span><br><br>
                    Scholarship: <span class="font-medium">CHED Free Tuition and Misc. Fee</span><br>
                    <hr>
                    Terms of Payment:<br>
                    <div class="pl-2">
                        First: <span class="font-medium">&#8369; 10,090.00</span><br>
                        Second: <span class="font-medium">-</span><br>
                        Third: <span class="font-medium">-</span>
                    </div>
                </td>
            </tr>
        </table>
        

        <p class="text-sm mt-2"><span class="font-medium">NOTE:</span> Your slots on the above subjects will be confirmed only upon payment.</p>

        <div class="mt-8 text-left pb-4">
            Old/New Student: <span class="font-medium">Old Student</span><br>
            Registration Status: <span class="font-medium">REGULAR</span><br>
            Date of Birth: <span class="font-medium">November 6, 2003</span><br>
            Gender: <span class="font-medium">FEMALE</span><br>
            Contact Number: <span class="font-medium">09600000</span><br>
            E-mail Address: <span class="font-medium">rai@gmail.com</span><br>
            <p>Student's Signature: __________________________</p>
        </div>
        
      </div>
  </div>
</x-app-layout>
