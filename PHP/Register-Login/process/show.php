<?php


function open_db_connection($servername, $username, $password, $dbname){

  try {
    $conn = new PDO("mysql:host=localhost;dbname=$dbname", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
  } catch (PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
  }

}


function read($dbname){
  try {
    $conn = open_db_connection("localhost", "root", "", $dbname);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $stmt = $conn->prepare("SELECT first_name, last_name, email FROM users");
    $stmt->execute();

    return $stmt->fetchAll();
  
  }catch(PDOException $error){
    echo $error->getMessage();
  }
}

return read("php_form_task");