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
    <div class="w-full max-w-xs m-auto bg-white rounded-lg p-5 shadow-lg ">   
      <header>
        <img class="w-20 mx-auto mb-5" src="<?= base_url("public/assets/images/") ;?>logo.png" />
      </header>   
      <form method="POST" action="<?= base_url("auth/do_login") ;?>">
        <div>
          <label class="block mb-2 text-indigo-500" for="username">Username</label>
          <input class="w-full p-2 mb-6 bg-gray-100 text-indigo-700 focus:border-b-2 border-indigo-500 outline-none focus:bg-gray-200" type="text" required name="username">
        </div>
        <div>
          <label class="block mb-2 text-indigo-500" for="password">Password</label>
          <input class="w-full p-2 mb-6 bg-gray-100 text-indigo-700 focus:border-b-2 border-indigo-500 outline-none focus:bg-gray-200" type="password" required name="password">
        </div>
        <input type="checkbox" id="ingat" name="ingat" value="true">
  <label for="ingat"> Remember Me</label><br>
        <div>          
          <input class="w-full hover:bg-indigo-700 bg-primary  hover:cursor-pointer text-white font-bold py-2 px-4 mb-6 rounded transition-all duration-300 ease-in-out" type="submit">
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

