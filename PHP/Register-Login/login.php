<?php session_start() ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <?php include_once "./parts/links.php"?>


  <style>
    input[type=text], 
    input[type=email], 
    input[type=password] {
      border: 1px solid;
      border-radius: 6px;
    }
  </style>
</head>
<body>




  <div class="d-flex justify-content-center align-items-center mt-5">



    <form action="./process/login.php" method="POST" class="p-4 border border-1 border-dark rounded">
      <div class="py-2 my-4 text-center">
        <h1>login</h1>
      </div>

      <?php echo @$_SESSION["login_error"] ?>

      <div class="py-2">
          <input type="email" class="form-control" placeholder="Email" aria-label="Email" name="email">
          <?php echo @$email_error ?>
      </div>
  
      <div class="py-2">
          <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password">
          <?php echo @$password_error ?>
      </div>

      <div class="py-2 text-center">
          <input type="submit" class="form-control btn btn-primary btn-block" value="Login">
          <a href="./register.php">of Create a new account?</a>
      </div>
    </form>

  </div>




  <?php include_once "./parts/scripts.php"?>
  <?php unset($_SESSION["login_error"]) ?>
</body>
</html>