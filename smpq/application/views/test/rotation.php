<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><meta charset="utf-8"></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/css/output.css">
	<style>
		.main-container{
			animation: rotation linear infinite 10s;
		}
		.item{
			animation: item-rotation linear infinite 10s;
		}
		@keyframes rotation{
			from {
				transform: rotate(0deg);
			}
			to {
				transform: rotate(-360deg);
			}
		}
			@keyframes item-rotation{
			from {
				transform: rotate(0deg);
			}
			to {
				transform: rotate(360deg);
			}
		}
	</style>
</head>
<body class="min-h-screen flex justify-center items-center">
	<div class="main-container w-[400px] aspect-square rounded-full relative border-2">
		<div class="item w-[100px] aspect-square border-2 border-red-400 rounded absolute top-[150px] -left-[50px] "></div>
<!-- 		<div class="item w-[100px] aspect-square border-2 border-blue-400 rounded absolute top-[100%] left-[50%]"></div>
		<div class="item w-[100px] aspect-square border-2 border-green-400 rounded absolute top-[50%] left-[100%]"></div>
		<div class="item w-[100px] aspect-square border-2 border-blue-400 rounded absolute top-[0%] left-[50%]"></div> -->



	</div>
</body>
</html>