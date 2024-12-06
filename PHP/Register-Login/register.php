<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <?php include_once "./parts/links.php";?>


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

    <form action="./process/register.php" method="POST" class="p-4 border border-1 border-dark rounded">
      <div class="py-2 my-4 text-center">
        <h1>Create New Account</h1>
      </div>


      <div class="row py-2">
        <div class="col">
          <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="fname"
          value="<?php echo @$_SESSION["names"]["fname"]; ?>">
          <?php echo @$_SESSION["errors"]["fname_error"] ?>
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lname"
          value="<?php echo @$_SESSION["names"]["lname"]; ?>">
          <?php echo @$_SESSION["errors"]["lname_error"] ?>
        </div>
      </div>
  
      <div class="py-2">
          <input type="text" class="form-control" placeholder="Email" aria-label="Email" name="email"
          value="<?php echo @$_SESSION["names"]["email"]; ?>">
          <?php echo @$_SESSION["errors"]["email_error"] ?>
      </div>
  
      <div class="py-2">
          <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password">
          <?php echo @$_SESSION["errors"]["password_error"] ?>
      </div>
  
      <div class="py-2">
          <input type="password" class="form-control" placeholder="Password Confirmation" aria-label="Password" name="password_confirmation">
          <?php echo @$_SESSION["errors"]["password_confirmation_error"] ?>
      </div>
  
      <div class="py-2 text-center">
          <input type="submit" class="form-control btn btn-primary" value="Register">
          <a href="./login.php" class="text-primary">Already have an account?</a>
      </div>
    </form>

  </div>



  <?php include_once "./parts/scripts.php"?>
  <?php
    unset($_SESSION["errors"]);
    unset($_SESSION["names"]);
  ?>





</body>
</html>