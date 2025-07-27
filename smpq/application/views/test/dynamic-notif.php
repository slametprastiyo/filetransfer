<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dynamic Notif Test</title>
	<style>
		.notif {
  width : 40px;
  height: 30px;
  background: black;
  border-radius: 15px;
  position:absolute;
  left:50%;
  transform: translateX(-15px);
  transform: translateY(-60px);
  transition: all .2s ease;
}

.notif.down{
   transform: translateY(-20px);
  transition: all .2s ease;
}
.notif.expand-flow{
   width: 425px;
  height: 80px;
  transform: translateX(-170px);
  border-radius: 30px;
  transition: all 300ms ease;
}
.notif.expand{
   width: 400px;
  transform: translateX(-160px);
  
  transition: all 200ms ease;
}
	</style>
</head>
<body>
	<button>click me</button>
	<div class="notif"></div>
	<script>
		const notif = document.querySelector(".notif");
const button = document.querySelector("button");
button.addEventListener("click",()=>{
  if(!notif.classList.contains("down")){
  notif.classList.add("down");
setTimeout(()=>{
  notif.classList.add("expand-flow");
}, 200);
    setTimeout(()=>{
  notif.classList.add("expand");
}, 500);
  }else{
  notif.classList.remove("expand");
  notif.classList.remove("expand-flow");
setTimeout(()=>{
  notif.classList.remove("down");
}, 200);
  }
    
});





	</script>
</body>
</html>