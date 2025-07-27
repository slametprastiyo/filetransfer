<!-- application/views/user_form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            color: #333;
            margin-bottom: 25px;
            text-align: center;
            font-size: 1.75rem;
            font-weight: 700;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
            font-size: 0.95rem;
        }
        input[type="text"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
            color: #333;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            box-sizing: border-box;
        }
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25);
        }
        .error {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 5px;
        }
        .btn-submit {
            width: 100%;
            padding: 12px 20px;
            background-color: #6366f1;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, transform 0.1s ease-in-out;
        }
        .btn-submit:hover {
            background-color: #4f46e5;
            transform: translateY(-1px);
        }
        .btn-submit:active {
            transform: translateY(0);
        }
        .btn-secondary {
            display: block;
            width: 100%;
            padding: 10px 15px;
            margin-top: 15px;
            background-color: #4CAF50; /* Green */
            color: white;
            text-align: center;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none; /* Remove underline for links */
            transition: background-color 0.2s ease-in-out, transform 0.1s ease-in-out;
        }
        .btn-secondary:hover {
            background-color: #45a049;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Input Data User Baru</h1>
        <?php echo form_open('admin/insert_user'); ?>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" class="rounded-lg">
                <?php echo form_error('username', '<div class="error">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo set_value('fullname'); ?>" class="rounded-lg">
                <?php echo form_error('fullname', '<div class="error">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="rounded-lg">
                <?php echo form_error('password', '<div class="error">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label for="passconf">Konfirmasi Password:</label>
                <input type="password" id="passconf" name="passconf" class="rounded-lg">
                <?php echo form_error('passconf', '<div class="error">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label>Pilih Role:</label>
                <?php
               

                foreach ($user_role as $role_item) {
                    // Cek apakah checkbox harus dicentang berdasarkan nilai yang sudah di-submit sebelumnya
                    $checked = (is_array(set_value('role')) && in_array($role_item['id'], set_value('role'))) ? 'checked' : '';
                    echo '<div class="flex items-center mb-2">';
                    echo '<input type="checkbox" id="role_' . $role_item['id'] . '" name="role[]" value="' . $role_item['id'] . '" class="form-checkbox h-5 w-5 text-indigo-600 rounded" ' . $checked . '>';
                    echo '<label for="role_' . $role_item['id'] . '" class="ml-2 text-gray-700">' . $role_item['name'] . '</label>';
                    echo '</div>';
                }
                ?>
                <?php echo form_error('role[]', '<div class="error">', '</div>'); ?>
            </div>

            <button type="submit" class="btn-submit">Simpan Data User</button>
        <?php echo form_close(); ?>
        <a href="<?php echo base_url('usercontroller/list_users'); ?>" class="btn-secondary">Lihat Daftar User</a>
    </div>
</body>
</html>
