<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kehadiran Staf</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Inter", sans-serif;
            background-color: #f3f4f6;
        }
        /* Style for loading indicator */
        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="p-6">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Data Kehadiran Staf</h1>

        <!-- JSON Input Section - Hidden from user -->
        <!-- This section is hidden and its textarea content is directly used for initial data load -->
        <div id="json-input-section" class="mb-6 hidden">
            <label for="json-input" class="block text-gray-700 text-sm font-semibold mb-2">Masukkan Data JSON di Sini:</label>
            <textarea id="json-input" rows="10" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-900 shadow-sm">
                <?= $kehadiran; ?>
            </textarea>
            <div id="json-error-message" class="text-red-600 text-sm mt-2 hidden"></div>
        </div>

        <!-- Filter Section -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6 items-center justify-center">
            <div class="w-full sm:w-auto">
                <label for="year-filter" class="block text-gray-700 text-sm font-semibold mb-2">Pilih Tahun:</label>
                <select id="year-filter" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-900">
                    <!-- Options will be populated by JavaScript -->
                </select>
            </div>
            <div class="w-full sm:w-auto">
                <label for="month-filter" class="block text-gray-700 text-sm font-semibold mb-2">Pilih Bulan:</label>
                <select id="month-filter" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-900">
                    <!-- Options will be populated by JavaScript -->
                </select>
            </div>
            <div class="w-full sm:w-auto">
                <label for="staff-id-filter" class="block text-gray-700 text-sm font-semibold mb-2">Pilih Staf:</label>
                <select id="staff-id-filter" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-900">
                    <option value="">Semua Staf</option> <!-- Option to show all staff -->
                    <!-- Options will be populated by JavaScript -->
                </select>
            </div>
            <!-- Checkbox for average time removed -->
        </div>

        <!-- Loading Indicator -->
        <div id="loading-indicator" class="loader hidden"></div>

        <!-- Attendance Table -->
        <div class="overflow-x-auto rounded-lg shadow-md">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider rounded-tl-lg">Nama Staf</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Waktu Datang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider rounded-tr-lg">Waktu Pulang</th>
                    </tr>
                </thead>
                <tbody id="attendance-body" class="divide-y divide-gray-200">
                    <!-- Data will be populated by JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Average Time Display Section (New) -->
        <!-- Using grid to align with table columns -->
        <div id="average-time-display" class="mt-6 p-4 bg-blue-100 rounded-lg shadow-md hidden grid grid-cols-4 gap-4 items-center">
            <div class="col-span-2 text-right text-lg font-semibold text-blue-800 pr-4">Rata-rata Kehadiran Staf Ini:</div>
            <div class="text-left text-blue-700 pl-6">Waktu Datang: <span id="avg-datang" class="font-bold"></span></div>
            <div class="text-left text-blue-700 pl-6">Waktu Pulang: <span id="avg-pulang" class="font-bold"></span></div>
        </div>

        <!-- No Data Message -->
        <div id="no-data-message" class="text-center text-gray-500 mt-6 hidden">
            Tidak ada data kehadiran untuk bulan, tahun, dan staf yang dipilih.
        </div>
    </div>

    <script>
        let attendanceData = []; // This will be populated from the textarea content

        // Get references to HTML elements
        const jsonInput = document.getElementById('json-input');
        const jsonErrorMessage = document.getElementById('json-error-message');

        const yearFilter = document.getElementById('year-filter');
        const monthFilter = document.getElementById('month-filter');
        const staffIdFilter = document.getElementById('staff-id-filter');
        const attendanceBody = document.getElementById('attendance-body');
        const noDataMessage = document.getElementById('no-data-message');
        const loadingIndicator = document.getElementById('loading-indicator');
        const averageTimeDisplay = document.getElementById('average-time-display');
        const avgDatangSpan = document.getElementById('avg-datang');
        const avgPulangSpan = document.getElementById('avg-pulang');


        // Helper function to convert "HH:MM:SS" time string to minutes from midnight
        function timeToMinutes(timeStr) {
            const parts = timeStr.split(':').map(Number);
            const hours = parts[0];
            const minutes = parts[1];
            // Ignoring seconds for average calculation as it's typically not needed for this level of detail
            return hours * 60 + minutes;
        }

        // Helper function to convert minutes from midnight back to "HH:MM" format
        function minutesToTime(totalMinutes) {
            const hours = Math.floor(totalMinutes / 60);
            const minutes = Math.round(totalMinutes % 60);
            return `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}`;
        }

        /**
         * Loads and processes JSON data from the textarea.
         * Handles potential parsing errors. This function is called automatically on page load.
         */
        async function loadDataFromJsonInput() {
            loadingIndicator.classList.remove('hidden'); // Show loading indicator
            attendanceBody.innerHTML = ''; // Clear table
            noDataMessage.classList.add('hidden'); // Hide no data message
            jsonErrorMessage.classList.add('hidden'); // Hide any previous error message
            averageTimeDisplay.classList.add('hidden'); // Hide average display initially

            const jsonString = jsonInput.value.trim();

            if (!jsonString) {
                attendanceData = []; // Clear data if input is empty
                populateFilters();
                renderAttendance();
                loadingIndicator.classList.add('hidden');
                noDataMessage.textContent = 'Tidak ada data JSON yang dimasukkan.';
                noDataMessage.classList.remove('hidden');
                return;
            }

            try {
                // Simulate processing delay
                await new Promise(resolve => setTimeout(resolve, 300));

                const parsedData = JSON.parse(jsonString); // Parse the JSON string from textarea

                // Validate if parsedData is an array
                if (!Array.isArray(parsedData)) {
                    throw new Error('Data JSON harus berupa array.');
                }

                // Pre-process data: ensure fullname is not null and add default values if needed
                attendanceData = parsedData.map(item => ({
                    ...item,
                    fullname: item.fullname === null ? 'Nama Tidak Tersedia' : item.fullname,
                    // Ensure 'tanggal', 'datang', 'pulang' exist for filtering/display
                    tanggal: item.tanggal || '1970-01-01', // Default date if missing
                    datang: item.datang || '00:00:00', // Default time if missing
                    pulang: item.pulang || '00:00:00' // Default time if missing
                }));

                console.log('Data loaded and processed from textarea:', attendanceData);
                populateFilters(); // Populate filters based on newly loaded data
                renderAttendance(); // Render table with newly loaded data

            } catch (error) {
                console.error('Error parsing JSON:', error);
                jsonErrorMessage.textContent = `Error: ${error.message}. Pastikan format JSON benar.`;
                jsonErrorMessage.classList.remove('hidden');
                attendanceData = []; // Clear data on error
                populateFilters(); // Re-populate filters with empty data
                renderAttendance(); // Clear table
            } finally {
                loadingIndicator.classList.add('hidden'); // Hide loading indicator
            }
        }

        // Function to populate year, month, and staff ID dropdowns
        function populateFilters() {
            if (attendanceData.length === 0) {
                yearFilter.innerHTML = '<option value="">Tidak Ada Tahun</option>';
                monthFilter.innerHTML = '<option value="">Tidak Ada Bulan</option>';
                staffIdFilter.innerHTML = '<option value="">Tidak Ada Staf</option>';
                return;
            }

            const years = [...new Set(attendanceData.map(item => new Date(item.tanggal).getFullYear()))].sort((a, b) => b - a);
            const months = [
                { value: 1, name: 'Januari' }, { value: 2, name: 'Februari' }, { value: 3, name: 'Maret' },
                { value: 4, name: 'April' }, { value: 5, name: 'Mei' }, { value: 6, name: 'Juni' },
                { value: 7, name: 'Juli' }, { value: 8, name: 'Agustus' }, { value: 9, name: 'September' },
                { value: 10, name: 'Oktober' }, { value: 11, name: 'November' }, { value: 12, name: 'Desember' }
            ];
            const staffIdsAndNames = [...new Map(attendanceData.map(item => [item.id_gtk, { id_gtk: item.id_gtk, fullname: item.fullname }])).values()]
                                        .sort((a, b) => a.fullname.localeCompare(b.fullname));

            yearFilter.innerHTML = '';
            years.forEach(year => {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                yearFilter.appendChild(option);
            });

            monthFilter.innerHTML = '';
            months.forEach(month => {
                const option = document.createElement('option');
                option.value = month.value;
                option.textContent = month.name;
                monthFilter.appendChild(option);
            });

            staffIdFilter.innerHTML = '<option value="">Semua Staf</option>';
            staffIdsAndNames.forEach(staff => {
                const option = document.createElement('option');
                option.value = staff.id_gtk;
                option.textContent = staff.fullname;
                staffIdFilter.appendChild(option);
            });

            const currentYear = new Date().getFullYear();
            const currentMonth = new Date().getMonth() + 1;
            yearFilter.value = years.includes(currentYear) ? currentYear : (years.length > 0 ? years[0] : '');
            monthFilter.value = currentMonth;
            staffIdFilter.value = "";
        }

        // Function to render attendance data based on filters
        function renderAttendance() {
            const selectedYear = parseInt(yearFilter.value);
            const selectedMonth = parseInt(monthFilter.value);
            const selectedStaffId = staffIdFilter.value;

            // Hide average display by default
            averageTimeDisplay.classList.add('hidden');

            let filteredData = attendanceData.filter(item => {
                const itemDate = new Date(item.tanggal);
                if (isNaN(itemDate.getTime())) {
                    console.warn('Invalid date encountered:', item.tanggal);
                    return false;
                }
                return itemDate.getFullYear() === selectedYear && (itemDate.getMonth() + 1) === selectedMonth;
            });

            if (selectedStaffId !== "") {
                filteredData = filteredData.filter(item => item.id_gtk === selectedStaffId);
            }

            attendanceBody.innerHTML = '';

            if (filteredData.length === 0) {
                noDataMessage.classList.remove('hidden');
            } else {
                noDataMessage.classList.add('hidden');

                // Always display individual records
                filteredData.forEach(item => {
                    const row = document.createElement('tr');
                    row.className = 'hover:bg-gray-50';
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 rounded-bl-lg">${item.fullname}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.tanggal}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.datang}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.pulang}</td>
                    `;
                    attendanceBody.appendChild(row);
                });

                // Display average times below the table ONLY if a specific staff is selected
                if (selectedStaffId !== "") {
                    // Filter out entries where datang or pulang is "00:00:00" for average calculation
                    const validTimeEntries = filteredData.filter(item => 
                        item.datang !== "00:00:00" && item.pulang !== "00:00:00"
                    );

                    if (validTimeEntries.length > 0) {
                        const totalDatangMinutes = validTimeEntries.reduce((sum, item) => sum + timeToMinutes(item.datang), 0);
                        const totalPulangMinutes = validTimeEntries.reduce((sum, item) => sum + timeToMinutes(item.pulang), 0);

                        const avgDatangMinutes = totalDatangMinutes / validTimeEntries.length;
                        const avgPulangMinutes = totalPulangMinutes / validTimeEntries.length;

                        const avgDatangTime = minutesToTime(avgDatangMinutes);
                        const avgPulangTime = minutesToTime(avgPulangMinutes);

                        avgDatangSpan.textContent = avgDatangTime;
                        avgPulangSpan.textContent = avgPulangTime;
                        averageTimeDisplay.classList.remove('hidden'); // Show the average display div
                    } else {
                        // If no valid entries for average, hide the average display
                        averageTimeDisplay.classList.add('hidden');
                        // Optionally, you could display a message like "Tidak ada data valid untuk rata-rata"
                        // For now, it will just remain hidden if no valid entries are found.
                    }
                }
            }
        }

        // Event listeners for filter changes
        yearFilter.addEventListener('change', renderAttendance);
        monthFilter.addEventListener('change', renderAttendance);
        staffIdFilter.addEventListener('change', renderAttendance);

        // Initial data load when the page loads
        document.addEventListener('DOMContentLoaded', () => {
            loadDataFromJsonInput(); // Load data automatically from the pre-filled textarea
        });

        const months = [
            { value: 1, name: 'Januari' }, { value: 2, name: 'Februari' }, { value: 3, name: 'Maret' },
            { value: 4, name: 'April' }, { value: 5, name: 'Mei' }, { value: 6, name: 'Juni' },
            { value: 7, name: 'Juli' }, { value: 8, name: 'Agustus' }, { value: 9, name: 'September' },
            { value: 10, name: 'Oktober' }, { value: 11, name: 'November' }, { value: 12, name: 'Desember' }
        ];
    </script>
</body>
</html>
