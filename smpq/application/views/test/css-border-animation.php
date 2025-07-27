<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CSS Border Animation</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/css/output.css">
	<style>
		.box{

		}
		.box-back{
			filter: blur(20px);
			z-index: -2;
			opacity: .25;
		}
		.box::after, .box-back::after{
			content : "";
			width: 100%;
			height: 100%;
			background: conic-gradient(transparent, transparent, transparent, blue, blue, blue, white);
			padding: 10px;
			position: absolute;
			top: 50%;
			left: 50%;
			translate: -50% -50%;
			transform: scale(1.1);
			border-radius: 15px;
			animation: 3s spin linear infinite;
		}
		.box::before{
			content: "";
			width: 97%;
			height: 97%;
			background: black;
			position: absolute;
			z-index: 1;
			border-radius: 100%;
		}
		.box-back::after{
			background: conic-gradient(transparent, blue);

		}
		@keyframes spin{
			from{
				transform: rotate(0deg);
			}
			to{
				transform: rotate(360deg);
			}
		}
	</style>
</head>
<body class="bg-black ">
	<div class="box-container min-h-screen flex justify-center items-center w-full h-full">
		<!-- <div class=" box w-64 absolute bg-black aspect-square rounded-full"></div> -->
		<div class=" box w-72 absolute bg-black aspect-square rounded-full overflow-hidden flex justify-center items-center"></div>
		<div class=" box-back w-72 absolute bg-black aspect-square rounded-full overflow-hidden"></div>
	</div>
</body>
</html>