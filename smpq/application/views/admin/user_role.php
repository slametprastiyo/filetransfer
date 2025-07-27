<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin / User managemen</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>public/assets/css/output.css">
	<style>
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
<body>
<table>
	<tr>
		<th>role</th>
		<th>role name</th>
		<th>aksi</th>
	</tr>
	<?php foreach($user_role as $ur): ?>
	<tr>
		<td><?= $ur['role']; ?></td>
		<td><?= $ur['name']; ?></td>
		<td>
			<a href="<?= base_url(); ?>admin/delete_user_role/<?= $ur['id'];?>" onclick="confirm('Hapus!')">hapus</a>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<a href="<?= base_url(); ?>admin/add_user_role">tambahkan role baru</a>
</body>
</html>