<?php
/**
 * Register a new user.
 * MySQL Database, PDO.
 */

  session_start();






/**
 * Check if the register form field are validated.
 * - all fields are required.
 * - the email address must be a valid email.
 * -- the password must be the same of password confirmation.
 */


function validation (){

  $result = true;


  if (!$_POST["fname"]){
    $_SESSION["errors"]["fname_error"] = "<span class='text-danger'>First Name field is required.</span>";
    $result = false;
  }
  
  if (!$_POST["lname"]){
    $_SESSION["errors"]["lname_error"] = "<span class='text-danger'>Last Name field is required.</span>";
    $result = false;
  }
  
  if (!$_POST["email"]){
    $_SESSION["errors"]["email_error"] = "<span class='text-danger'>Email field is required.</span>";
    $result = false;
  }
  // else if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_POST['email'])){
  //   $_SESSION["email_error"] = "<span class='text-danger'>You must enter valid email address.</span>";
  //   $result = false;
  // }
  
  if (!$_POST["password"]){
    $_SESSION["errors"]["password_error"] = "<span class='text-danger'>Password field is required.</span>";
    $result = false;
  }
  
  if (!$_POST["password_confirmation"]){
    $_SESSION["errors"]["password_confirmation_error"] = "<span class='text-danger'>Password Confirmation field is required.</span>";
    $result = false;
  }
  else if ($_POST["password"] != $_POST["password_confirmation"]){
    $_SESSION["errors"]["password_error"] = "<span class='text-danger'>Passwords don't match.</span>";
    $result = false;
  }


  

  return $result;
}

function clean($data){
  $data = trim($data);
  $data = strip_tags($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

function open_db_connection($servername, $username, $password, $dbname){

  try {
    $conn = new PDO("mysql:host=localhost;dbname=$dbname", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
  } catch (PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
  }

}

function close_db_connection(&$conn){
  $conn = null;
}

function createDB($dbname){
  try {
    $conn = new PDO("mysql:host=localhost", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql_query = "CREATE DATABASE $dbname";
    try {
      $conn->exec($sql_query);
    }catch(Exception $error){
    }

    $conn = null;
  } catch (PDOException $error) {
    echo $sql_query."<br>";
    echo $error->getMessage();
  }
}

function createTable($dbname){
  try {
    //open connection
    $conn = new PDO("mysql:host=localhost;dbname=$dbname", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql query.
    $sql_query = "CREATE TABLE users (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      first_name VARCHAR(30) NOT NULL,
      last_name VARCHAR(30) NOT NULL,
      email VARCHAR(50),
      password VARCHAR(50),
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
    
    // use exec() because no results are returned
    try {
      $conn->exec($sql_query);
    }catch(Exception $error){
    }

    // close connection
    $conn = null;
  } catch (PDOException $error) {
    echo $sql_query."<br>";
    echo $error->getMessage();
  }
}

function create(...$data){
  $dbname = "php_form_task";
  createDB($dbname);
  createTable($dbname);

  $conn = open_db_connection("localhost", "root", "", $dbname);

  try {
  
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password)
    VALUES (:first_name, :last_name, :email, :password)");

    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);


    $first_name = $data[0];
    $last_name = $data[1];
    $email = $data[2];
    $password = sha1($data[3]);
    $stmt->execute();


    $conn = null;
  }catch(PDOException $error){
    echo $error->getMessage();
  }

}



if($_SERVER["REQUEST_METHOD"] == "POST"){


  //validation
  if(!validation()){

    $_SESSION["names"]["fname"] = $_POST["fname"];
    $_SESSION["names"]["lname"] = $_POST["lname"];
    $_SESSION["names"]["email"] = $_POST["email"];
    $_SESSION["names"]["password"] = $_POST["password"];
    $_SESSION["names"]["password_confirmation"] = $_POST["password_confirmation"];

    header("Location: ../register.php");
    exit();
  }
  else{
    $fname = clean($_POST["fname"]);
    $lname = clean($_POST["lname"]);
    $email = clean($_POST["email"]);
    $password = clean($_POST["password"]);
    $password_confirmation = clean($_POST["password_confirmation"]);


    create($fname, $lname, $email, $password);
    $_SESSION["success"] = '<div class="alert alert-success alert-dismissible fade show">
    The registration done successfully.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';


    header("Location: ../");
    exit();
  }


}
else {
  include_once "../parts/404.php";
}

