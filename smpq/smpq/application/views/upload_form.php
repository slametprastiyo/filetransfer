<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold mb-6">Upload a File</h1>
    <?php echo $error; ?>
    <?php echo form_open_multipart('upload/do_upload'); ?>
      <div class="mb-4">
        <input type="file" name="userfile" class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Upload</button>
      </div>
    </form>
  </div>
</body>
</html>
