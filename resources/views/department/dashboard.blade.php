<x-app-layout>

    <style>
        #classificationChart {
            /* margin-top: -2rem; */
        }
    </style>

    {{-- main content --}}
    <div class="main-content p-16 py-2 bg-[#ebe9e9]">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-2">
            <!-- Number of Students Card -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <i class="fas fa-users text-3xl mr-4"></i>
                    <div>
                        <h2 class="text-xl font-semibold">Total Students</h2>
                        <p class="text-2xl">200</p>
                    </div>
                </div>
            </div>
            <!-- Number of Program Card -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <i class="fas fa-users text-3xl mr-4"></i>
                    <div>
                        <h2 class="text-xl font-semibold">Program</h2>
                        <p class="text-2xl">200</p>
                    </div>
                </div>
            </div>
            <!-- Number of Courses Card -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <i class="fas fa-users text-3xl mr-4"></i>
                    <div>
                        <h2 class="text-xl font-semibold">Courses</h2>
                        <p class="text-2xl">200</p>
                    </div>
                </div>
            </div>
            <!-- Number of Instructor Card -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <i class="fas fa-users text-3xl mr-4"></i>
                    <div>
                        <h2 class="text-xl font-semibold">Instructor</h2>
                        <p class="text-2xl">200</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <!-- Chart of Students (BSCS and IT) -->
            <div class="bg-white p-8 rounded-lg shadow-md">
                {{-- <h2 class="text-xl font-semibold mb-4 border-b border-gray-300">Program Chart</h2> --}}
                <canvas id="studentsChart" width="200" height="150" class='mt-8'></canvas>
            </div>

            <!-- Donut Chart of Classification of Students -->
            <div class="bg-white p-16 rounded-lg shadow-md relative">
                {{-- <h2 class="text-xl font-semibold mb-2 border-b border-gray-300">Classification of Students</h2> --}}
                <canvas id="classificationChart" class="w-64 h-64 "></canvas>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Students Chart
            const studentsCtx = document.getElementById('studentsChart').getContext('2d');
            new Chart(studentsCtx, {
                type: 'bar',
                data: {
                    labels: ['BSCS', 'IT'],
                    datasets: [{
                        label: 'Number of Students',
                        data: [120, 80], // Example data
                        backgroundColor: ['#4CAF50', '#2196F3'],
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        tooltip: {
                            enabled: false
                        },
                        legend: {
                            position: 'bottom'
                        },

                    }
                }
            });

            // Donut Chart for Classification of Students
            const classificationCtx = document.getElementById('classificationChart').getContext('2d');
            new Chart(classificationCtx, {
                type: 'doughnut', 
                data: {
                    labels: ['Regular', 'Irregular', 'Transferee', 'Returnee'],
                    datasets: [{
                        label: 'Classification of Students',
                        data: [150, 50, 30, 20], 
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                    }]
                },
                options: {
                    responsive: true,
                    cutoutPercentage: 70, 
                    plugins: {
                        legend: {
                            position: 'bottom', 
                        }
                    }
                }
            });
        });
    </script>

</x-app-layout>
