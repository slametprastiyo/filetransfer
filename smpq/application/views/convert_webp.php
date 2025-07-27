<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert to Webp</title>
    <script src="<?= base_url(); ?>public/assets/js/sweetalert2@11.js"></script>

</head>
<body>
    <form action="<?= base_url("webp/convert") ;?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToConvert" id="fileToConvert" required>
        <button type="submit">ok</button>
    </form>
    <?php
if ($this->session->flashdata("error")) {
    echo '<script>Swal.fire("Error", "' . $this->session->flashdata("error") . '", "error")</script>';
}
; ?>
<?php if($name != null) :?>
    <a href="<?= base_url() ;?>public/assets/images/convert_webp/<?= $name ;?>.webp" download>unduh</a>
    <?php endif ;?>
</body>
</html>