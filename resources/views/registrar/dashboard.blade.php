<x-app-layout>

    <style>
        .dashboard {
            margin: 20px;
            display: flex;
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            background-color: #e3f2fd; 
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); 
        }

        #chart-section {
            margin-top: 20px;
            display: flex;
            gap: 20px;
            justify-content: center;
            width: 80%;
        }

        #chart, #course-chart {
            width: 40%;
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>


    {{-- main content --}}
    <div class="main-content p-4 bg-[#ebe9e9]">
        <div class="bg-white p-8 rounded-lg shadow mt-2">
            <div class="dashboard">
                <div class="card">
                    <h2>IT Students</h2>
                    <p id="it-count">0</p>
                </div>
                <div class="card">
                    <h2>CS Students</h2>
                    <p id="cs-count">0</p>
                </div>
                <div class="card">
                    <h2>Total Students</h2>
                    <p id="total-count">0</p>
                </div>
            </div>
        
            <div id="chart-section">
                <div id="chart">
                    <canvas id="classificationChart"></canvas>
                </div>
                <div id="course-chart">
                    <canvas id="courseClassificationChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script>
        function toggleDropdown() {
            const dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.classList.toggle('hidden');
        }

        // Sample data
        const students = [
            { name: "Rai", course: "IT", classification: "Regular" },
            { name: "Hatdog", course: "CS", classification: "Irregular" },
            { name: "Rances", course: "IT", classification: "Regular" },
            { name: "Ja", course: "CS", classification: "Regular" },
            { name: "Mans", course: "IT", classification: "Irregular" },
            { name: "Maris Racal", course: "CS", classification: "Transferee" },
            { name: "Anthony", course: "IT", classification: "Returnee" },
            { name: "Rai", course: "IT", classification: "Regular" },
            { name: "Hatdog", course: "CS", classification: "Irregular" },
            { name: "Rances", course: "IT", classification: "Regular" },
            { name: "Ja", course: "CS", classification: "Regular" },
            { name: "Mans", course: "IT", classification: "Irregular" },
            { name: "Maris Racal", course: "CS", classification: "Transferee" },
            { name: "Anthony", course: "IT", classification: "Returnee" }
        ];

        // Count IT and CS students
        const itCount = students.filter(student => student.course === "IT").length;
        const csCount = students.filter(student => student.course === "CS").length;
        const totalCount = students.length;

        document.getElementById('it-count').textContent = itCount;
        document.getElementById('cs-count').textContent = csCount;
        document.getElementById('total-count').textContent = totalCount;

        // Classification chart
        const classifications = students.reduce((acc, student) => {
            acc[student.classification] = (acc[student.classification] || 0) + 1;
            return acc;
        }, {});

        const ctx = document.getElementById('classificationChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: Object.keys(classifications),
                datasets: [{
                    data: Object.values(classifications),
                    backgroundColor: ['#b6eca8', '#a8ece6', '#e7eca8', '#eca8b2', '#9966FF'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });

        // Course-wise classification chart
        const courseClassification = students.reduce((acc, student) => {
            if (!acc[student.course]) {
                acc[student.course] = { Regular: 0, Irregular: 0, Transferee: 0, Returnee: 0 };
            }
            acc[student.course][student.classification]++;
            return acc;
        }, {});

        const courseLabels = ["Regular", "Irregular", "Transferee", "Returnee"];
        const itData = courseLabels.map(label => courseClassification.IT ? courseClassification.IT[label] || 0 : 0);
        const csData = courseLabels.map(label => courseClassification.CS ? courseClassification.CS[label] || 0 : 0);

        const courseCtx = document.getElementById('courseClassificationChart').getContext('2d');
        new Chart(courseCtx, {
            type: 'bar',
            data: {
                labels: courseLabels,
                datasets: [
                    {
                        label: 'IT',
                        data: itData,
                        backgroundColor: '#2cd932',
                    },
                    {
                        label: 'CS',
                        data: csData,
                        backgroundColor: '#d92c37',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
