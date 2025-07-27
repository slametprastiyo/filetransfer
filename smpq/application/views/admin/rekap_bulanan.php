<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Kehadiran Bulanan - <?php echo htmlspecialchars($pegawai->nama); ?></title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        .container {
            max-width: 1000px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th {
            background-color: #4f46e5;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        tr:hover {
            background-color: #eef2ff;
        }
        .select-wrapper {
            position: relative;
            display: inline-block;
        }
        .select-wrapper::after {
            content: '▼';
            font-size: 0.75rem;
            color: #6b7280;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            position: absolute;
            pointer-events: none;
        }
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 2.5rem; /* Space for the custom arrow */
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto bg-white rounded-lg shadow-xl p-8 mt-10">
        <h1 class="text-3xl font-bold text-indigo-700 mb-4 text-center">Rekap Kehadiran Bulanan</h1>
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
            <?php echo htmlspecialchars($pegawai->nama); ?> (NIP: <?php echo htmlspecialchars($pegawai->nip); ?>)
        </h2>

        <div class="flex justify-between items-center mb-6">
            <a href="<?php echo base_url('administrator'); ?>" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Dashboard
            </a>

            <form action="<?php echo base_url('administrator/rekap_bulanan/' . $pegawai->id); ?>" method="get" class="flex space-x-4">
                <div class="select-wrapper">
                    <select name="month" id="month" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <?php foreach ($months as $num => $name): ?>
                            <option value="<?php echo $num; ?>" <?php echo ($num == $current_month) ? 'selected' : ''; ?>>
                                <?php echo $name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="select-wrapper">
                    <select name="year" id="year" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <?php foreach ($years as $yr): ?>
                            <option value="<?php echo $yr; ?>" <?php echo ($yr == $current_year) ? 'selected' : ''; ?>>
                                <?php echo $yr; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    Lihat
                </button>
            </form>
        </div>

        <div class="text-lg font-semibold text-gray-700 mb-4 text-center">
            Bulan: <?php echo htmlspecialchars($month_name); ?> <?php echo htmlspecialchars($current_year); ?>
        </div>

        <div class="overflow-x-auto rounded-lg shadow-md">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-3 px-6 rounded-tl-lg">Tanggal</th>
                        <th class="py-3 px-6 rounded-tr-lg">Waktu Kehadiran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($kehadiran_bulanan)): ?>
                        <?php foreach ($kehadiran_bulanan as $k): ?>
                            <tr>
                                <td class="py-4 px-6 font-medium text-gray-700"><?php echo htmlspecialchars(date('d-m-Y', strtotime($k->tanggal))); ?></td>
                                <td class="py-4 px-6 text-indigo-600 font-semibold"><?php echo htmlspecialchars($k->waktu_kehadiran_harian); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="py-4 px-6 text-center text-gray-500">Tidak ada catatan kehadiran untuk bulan ini.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-8 text-center text-gray-600">
            <p>Catatan: Jika ada beberapa kali absensi dalam sehari, semua waktu akan ditampilkan dalam satu baris.</p>
        </div>
    </div>
</body>
</html>
