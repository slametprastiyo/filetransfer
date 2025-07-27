<?php 
    // $this->session->sess_destroy();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ;?>public/assets/css/output.css">
    <script src="<?= base_url(); ?>public/assets/js/sweetalert2@11.js"></script>

</head>
<body class="bg-gray-300">
	<section class="max-w-md bg-gray-100 min-h-screen mx-auto">
		<div class="user-detail  p-5 md:p-10 text-indigo-700 relative">
			<img src="<?= base_url(); ?>public/assets/images/welcome.png" class="h-full absolute right-0 top-0">
			<p>Assalamu'alaikum,</p>
			<p class="font-bold text-xl"><?= $user['fullname']; ?></p>
		</div>
		<div class="menu-container bg-indigo-700 min-h-screen rounded-t-3xl p-5 md:p-10 pt-5">
			<div class="tanggal">
				<p class="w-full text-center mb-3 text-white"><?= $today; ?></p>
			</div>
			<div class="main grid grid-cols-2 text-white gap-2">
				<div class="datang w-full rounded-3xl bg-white/10 p-3 pb-10 border border-white/10 relative">
				<?php if($kehadiran != null): ?>
					<?php if($kehadiran['datang'] != "00:00:00"): ?>
						<p class="font-bold text-6xl w-full text-center"><?= substr($kehadiran['datang'], 0 ,5); ?></p>
					<?php else: ?>
						<p class="font-bold text-6xl w-full text-center">-</p>
					<?php endif; ?>
				<?php else: ?>
					<p class="font-bold text-6xl w-full text-center">-</p>
				<?php endif; ?>

					<span class="capitalize mt-3 inline-block absolute bottom-3 left-3 text-white/30">jam datang</span>
				</div>

				<div class="pulang w-full rounded-3xl bg-white/10 p-3 pb-10 border border-white/10 relative">
					<?php if($kehadiran != null): ?>
					<?php if($kehadiran['pulang'] != "00:00:00"): ?>
						<p class="font-bold text-6xl w-full text-center"><?= substr($kehadiran['pulang'], 0 ,5); ?></p>
					<?php else: ?>
						<p class="font-bold text-6xl w-full text-center">-</p>
					<?php endif; ?>
				<?php else: ?>
					<p class="font-bold text-6xl w-full text-center">-</p>
				<?php endif; ?>
					<span class="capitalize mt-3 inline-block absolute bottom-3 left-3 text-white/30">jam pulang</span>
				</div>				
			</div>
			<div class="menu mt-5 mb-10">
				<?php if($kehadiran == null): ?>

				<a href="<?= base_url(); ?>kehadiran_gtk/catat_kehadiran?id=<?= $user['id'];?>" class="capitalize w-full inline-block rounded-full bg-white text-indigo-700 font-bold text-center p-3 my-2">catat kedatangan</a>
				<?php else: ?>

				<a href="<?= base_url(); ?>kehadiran_gtk/catat_kepulangan?id=<?= $user['id'];?>" class="capitalize w-full inline-block rounded-full bg-white text-indigo-700 font-bold text-center p-3 my-2" id="catat-kepulangan">catat kepulangan</a>
				<?php endif; ?>	

			</div>
			<div class="grid grid-cols-6">
				<div class="flex flex-col items-center text-white">
					<div class="w-full aspect-square bg-white/10 rounded-3xl">
					</div>
					<span class="capitalize">riwayat</span>

				</div>
			</div>
		</div>
		<?php if ($this->session->flashdata('message')): ?>
		<input type="hidden" id="message" name="" value="<?= $this->session->flashdata("message"); ?>" data-type="<?= $this->session->flashdata("type"); ?>">
		<?php else: ?>
		<input type="hidden" id="message" name="" value="" data-type="">
		<?php endif; ?>		
	</section>
<script>
    const baseurl = "http://localhost/smpq/"; 
	const gtk_id = localStorage.getItem("gtk_id");
	const catatKepulanganLink = document.getElementById("catat-kepulangan");
	if(gtk_id == null){
		window.location.replace(baseurl + "kehadiran_gtk/error");
	}
const message = document.getElementById("message");
if(message.value != ""){
	Swal.fire({
		icon: message.dataset.type,
		title: message.value,
		showConfirmButton: false, // Tidak menampilkan tombol OK
		timer: 2000               // Alert akan hilang otomatis setelah 2 detik
	});
}
catatKepulanganLink.addEventListener('click', function(event) {
    // Mencegah perilaku default tautan (navigasi langsung)
    event.preventDefault();

    const targetUrl = this.href;
    const confirmationMessage = `Catat kepulangan sekarang?`;

    // Menggunakan confirm() untuk konfirmasi
    if (confirm(confirmationMessage)) {
        // Jika pengguna mengklik 'OK' (Ya), lanjutkan ke URL
        window.open(targetUrl, '_self'); // Atau window.location.href = targetUrl;
    } else {
        // Jika pengguna mengklik 'Batal', tidak melakukan apa-apa
        console.log('Navigasi dibatalkan oleh pengguna.');
    }
});
</script>
</body>
</html>

