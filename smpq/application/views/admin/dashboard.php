<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Kehadiran</title>
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
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto bg-white rounded-lg shadow-xl p-8 mt-10">
        <h1 class="text-3xl font-bold text-indigo-700 mb-8 text-center">Dashboard Admin Kehadiran</h1>

        <div class="overflow-x-auto rounded-lg shadow-md">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-3 px-6 rounded-tl-lg">No.</th>
                        <th class="py-3 px-6">Nama Pegawai</th>
                        <th class="py-3 px-6">NIP</th>
                        <th class="py-3 px-6 rounded-tr-lg">Rata-rata Jam Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pegawai)): ?>
                        <?php $no = 1; ?>
                        <?php foreach ($pegawai as $p): ?>
                            <tr>
                                <td class="py-4 px-6"><?php echo $no++; ?></td>
                                <td class="py-4 px-6">
                                    <!-- Menambahkan tautan ke halaman rekap bulanan -->
                                    <a href="<?php echo base_url('administrator/rekap_bulanan/' . $p->id); ?>" class="text-indigo-600 hover:text-indigo-900 font-medium">
                                        <?php echo htmlspecialchars($p->nama); ?>
                                    </a>
                                </td>
                                <td class="py-4 px-6"><?php echo htmlspecialchars($p->nip); ?></td>
                                <td class="py-4 px-6">
                                    <span class="font-medium text-indigo-600">
                                        <?php echo htmlspecialchars($p->rata_rata_jam_masuk); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="py-4 px-6 text-center text-gray-500">Tidak ada data pegawai.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-8 text-center text-gray-600">
            <p>Klik nama pegawai untuk melihat rekap kehadiran bulanan.</p>
            <p>Data rata-rata jam masuk dihitung berdasarkan catatan kehadiran yang ada.</p>
        </div>
    </div>
</body>
</html>
