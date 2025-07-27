<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | Add user role</title>
</head>
<body>
	<form method="POST" action="<?= base_url(); ?>admin/insert_user_role">
		<input type="text" name="role">
		<label for="role">role</label>
		<input type="text" name="role_name">
		<label for="role_name">role name</label>
		<button type="submit">simpan</button>
	</form>
</body>
</html>