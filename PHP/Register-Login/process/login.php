<?php
session_start();

function open_db_connection($servername, $username, $password, $dbname){

  try {
    $conn = new PDO("mysql:host=localhost;dbname=$dbname", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
  } catch (PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
  }

}


function read($dbname, $email){
  try {
    $conn = open_db_connection("localhost", "root", "", $dbname);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $stmt = $conn->prepare("SELECT first_name, last_name, email, password FROM users
    WHERE email='$email'");
    $stmt->execute();

    return $stmt->fetch();
  
  }catch(PDOException $error){
    echo $error->getMessage();
  }
}



if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $data = read("php_form_task", $_POST["email"]);
  $flag = false;



  if (!$data){
    $flag = true;
  }
  else if (sha1($_POST["password"]) != $data["password"]){
    $flag = true;
  }


  if($flag){
    $_SESSION["login_error"] ='<div class="alert alert-danger alert-dismissible fade show">
    Your email or password is incorrect.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

    header("Location: ../login.php");
    exit();
  }
  else {
    header("Location: ../index.php");
    exit();
  }
  
}