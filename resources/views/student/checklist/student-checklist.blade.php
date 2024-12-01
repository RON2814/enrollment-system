<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Grade Table</title>
</head>

<body class="main-content bg-[#ebe9e9]">
    {{-- header  --}}
    <div class="header-wrapper flex justify-between items-center flex-wrap bg-white p-4 py-3">
        <div class="header-title pl-3 font-bold text-black">
            <h2>{Student Number}  <span class="text-sm text-gray-600 uppercase">{Student Full Name}</span></h2>
        </div>

        <div class="user-info flex items-center gap-2">
            <butto  onclick="open_request_grades()" class="text-sm text-blue-500 font-semibold py-2 px-4 underline"  >Request for Missing Grades</button>
        </div>
    </div>



    {{-- main content  --}}
    <div class ="p-4">
        {{-- First Year - First Semester --}} 
        <div class="bg-white p-8 rounded-lg shadow mt-2">
            <h2 class="text-2xl font-medium border-b border-gray-200 text-gray-800 mb-5">First Year - First Semester </h2>
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full table-auto border-collapse border-spacing-0">
                    <thead class="bg-gray-200 text-xs">
                        <tr>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Course Code</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Course Title</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Credit Units Lecture</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Credit Units Lecture</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Contact Hours Lecture
                            </th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Contact Hours Laboratory
                            </th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Pre-requisites</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">SY/Semester Taken</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Final Grade</th>
                            <th class="border border-gray-200 py-3 px-4 text-left font-medium">Instructor</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 border border-gray-200">
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                            <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                        </tr>
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                            <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                        </tr>
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                        </tr>
                        <tr class="hover:bg-gray-100 transition-colors duration-200">
                            <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                            <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                            <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="font-semibold">Sub Total:</td>
                            <td class="text-center">20</td>
                            <td class="text-center">12</td>
                            <td class="text-center">20</td>
                            <td class="text-center">20</td>
                            <td></td>
                            <td class=" font-semibold">GWA:</td>
                            <td class="text-green-600 font-semibold"></td>  {{-- gwa --}}               
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        {{-- First Year - Second Semester  --}}
        <div class="bg-white p-8 rounded-lg shadow mt-2">
          <h2 class="text-2xl font-medium border-b border-gray-200 text-gray-800 mb-5">First Year - First Semester </h2>
          <div class="overflow-x-auto mt-4">
              <table class="min-w-full table-auto border-collapse border-spacing-0">
                  <thead class="bg-gray-200 text-xs">
                      <tr>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Course Code</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Course Title</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Credit Units Lecture</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Credit Units Lecture</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Contact Hours Lecture
                          </th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Contact Hours Laboratory
                          </th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Pre-requisites</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">SY/Semester Taken</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Final Grade</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Instructor</th>
                      </tr>
                  </thead>
                  <tbody class="text-gray-700 border border-gray-200">
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr>
                          <td></td>
                          <td class="font-semibold">Sub Total:</td>
                          <td class="text-center">20</td>
                          <td class="text-center">12</td>
                          <td class="text-center">20</td>
                          <td class="text-center">20</td>
                          <td></td>
                          <td class=" font-semibold">GWA:</td>
                          <td class="text-green-600 font-semibold"></td>  {{-- gwa --}}               
                          <td></td>
                          <td></td>
                      </tr>

                  </tbody>
              </table>
          </div>
      </div>

        {{-- Second Year - First Semester  --}}
        <div class="bg-white p-8 rounded-lg shadow mt-2">
          <h2 class="text-2xl font-medium border-b border-gray-200 text-gray-800 mb-5">Second Year - First Semester </h2>
          <div class="overflow-x-auto mt-4">
              <table class="min-w-full table-auto border-collapse border-spacing-0">
                  <thead class="bg-gray-200 text-xs">
                      <tr>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Course Code</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Course Title</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Credit Units Lecture</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Credit Units Lecture</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Contact Hours Lecture
                          </th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Contact Hours Laboratory
                          </th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Pre-requisites</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">SY/Semester Taken</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Final Grade</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Instructor</th>
                      </tr>
                  </thead>
                  <tbody class="text-gray-700 border border-gray-200">
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr>
                          <td></td>
                          <td class="font-semibold">Sub Total:</td>
                          <td class="text-center">20</td>
                          <td class="text-center">12</td>
                          <td class="text-center">20</td>
                          <td class="text-center">20</td>
                          <td></td>
                          <td class=" font-semibold">GWA:</td>
                          <td class="text-green-600 font-semibold"></td>  {{-- gwa --}}               
                          <td></td>
                          <td></td>
                      </tr>

                  </tbody>
              </table>
          </div>
      </div>

        {{-- Second Year - Second Semester  --}}
        <div class="bg-white p-8 rounded-lg shadow mt-2">
          <h2 class="text-2xl font-medium border-b border-gray-200 text-gray-800 mb-5">Second Year - Second Semester </h2>
          <div class="overflow-x-auto mt-4">
              <table class="min-w-full table-auto border-collapse border-spacing-0">
                  <thead class="bg-gray-200 text-xs">
                      <tr>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Course Code</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Course Title</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Credit Units Lecture</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Credit Units Lecture</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Contact Hours Lecture
                          </th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Contact Hours Laboratory
                          </th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Pre-requisites</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">SY/Semester Taken</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Final Grade</th>
                          <th class="border border-gray-200 py-3 px-4 text-left font-medium">Instructor</th>
                      </tr>
                  </thead>
                  <tbody class="text-gray-700 border border-gray-200">
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr class="hover:bg-gray-100 transition-colors duration-200">
                          <td class="py-4 px-4 text-sm truncate max-w-xs">GNED 08</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">Understanding the Self</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="text-center py-4 px-4 text-sm truncate max-w-xs">3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">MATH 3</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs">2023/First</td>
                          <td class=" py-4 px-4 text-sm truncate max-w-xs">1.00</td>
                          <td class="py-4 px-4 text-sm truncate max-w-xs font-semibold">Sambrano J.</td>
                      </tr>
                      <tr>
                          <td></td>
                          <td class="font-semibold">Sub Total:</td>
                          <td class="text-center">20</td>
                          <td class="text-center">12</td>
                          <td class="text-center">20</td>
                          <td class="text-center">20</td>
                          <td></td>
                          <td class=" font-semibold">GWA:</td>
                          <td class="text-green-600 font-semibold"></td>  {{-- gwa --}}               
                          <td></td>
                          <td></td>
                      </tr>

                  </tbody>
              </table>
          </div>
      </div>
      @include('student.checklist.modals.request-grades')
    </div>

</body>

</html>
