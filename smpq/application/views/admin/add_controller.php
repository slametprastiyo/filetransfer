<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | Add controller</title>
</head>
<body>
	<form method="POST" action="<?= base_url(); ?>admin/insert_controller">
		<input type="text" name="controller_name">
		<label for="controller_name">controller name</label>
		<button type="submit">simpan</button>
	</form>
</body>
</html>