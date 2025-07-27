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
		<th>username</th>
		<th>role</th>
	</tr>
	<?php foreach($users as $u): ?>
	<tr>
		<td><?= $u['user_username']; ?></td>
		<td>
			<?php
                                // Memisahkan string role menjadi array ID
                                if (!empty($u['user_role'])) {
                                   $user_roles_ids = explode(',', $u['user_role']);
                                    $user_roles_names = [];
                                    // Mengubah ID role menjadi nama role menggunakan available_roles
                                    foreach ($user_roles_ids as $role_id) {
                                    	foreach($available_roles as $avro){
                                    	if ($avro["role"] == $role_id ) {
                                            $user_roles_names[] = $avro["name"];
                                        }	
                                    	}
                                        
                                    }
                                    echo implode(', ', $user_roles_names);
                                } else {
                                    echo '-';
                                }
                                ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<a href="<?= base_url(); ?>admin/add_user">tambahkan user baru</a>
</body>
</html>