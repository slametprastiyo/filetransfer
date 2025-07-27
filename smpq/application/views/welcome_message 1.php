<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rotate Background Image</title>
  <style>
    .rotate-bg {
      position: relative;
      width: 300px;
      height: 300px;
      overflow: hidden;
      transform: rotate(45deg); /* Adjust the angle as needed */
      border-radius: 20px;
    }

    .rotate-bg::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: url('http://localhost/smpq/public/assets/images/bg.png') no-repeat center center;
      background-size: cover;
      transform: rotate(-45deg); /* Adjust the angle as needed */
    }
  </style>
</head>
<body>
  <div class="rotate-bg"></div>
</body>
</html>
