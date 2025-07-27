<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMPQ Al Muanawiyah | Login Form</title>
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/output.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>
  <body class="flex h-screen bg-gray-100">
    <!-- <div class="notif-container w-full flex justify-center absolute">
      <div class="notif min-h-10 min-w-20 w-fit h-fit py-2 px-4 bg-primary shadow-lg mx-auto rounded-lg absolute border border-primary">notif</div>
    </div> -->
    <div class="w-full max-w-xs m-auto bg-white rounded-xl p-5 shadow-lg ">   
      <header>
        <img class="w-20 mx-auto mb-5" src="<?= base_url("public/assets/images/") ;?>logo.png" />
      </header>   
      <form method="POST" action="<?= base_url("auth/do_login") ;?>">
        <div>
          <input class="w-full p-2 px-5 mb-3 bg-primary/25 rounded-full text-indigo-700 focus:border-b-2 border-indigo-500 outline-none focus:bg-gray-200" type="text" required name="username" placeholder="Username">
        </div>
        <div>
          <input class="w-full p-2 px-5 mb-6 bg-primary/25 rounded-full text-indigo-700 focus:border-b-2 border-indigo-500 outline-none focus:bg-gray-200" type="password" required name="password" placeholder="Password">
        </div>
        <input type="checkbox" id="ingat" name="ingat" value="true">
  <label for="ingat"> Remember Me</label><br>
        <div class="flex justify-center">          
          <input class="hover:bg-secondary bg-primary  hover:cursor-pointer text-white font-bold py-2 px-4 rounded-full mx-auto transition-all duration-300 ease-in-out" type="submit">
        </div>       
      </form>    
    </div>
    <?php 
    if($this->session->flashdata("error")){
        echo '<script>Swal.fire("Error", "'. $this->session->flashdata("error") .'", "error")</script>';
    }
    ;?>
  </body>
</html>

