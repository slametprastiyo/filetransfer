<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Success</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold mb-6">Upload Successful</h1>
    <p>File uploaded successfully!</p>
    <p><a href="<?php echo base_url('uploads/' . $upload_data['file_name']); ?>" target="_blank" class="text-blue-500 hover:underline">View File</a></p>
  </div>
</body>
</html>
