<?php
include('config.php');

try{
    $sql = "SELECT * FROM myguests ORDER BY id ASC";
    $stmt = $conn->query($sql);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($result);

    if(count($result) > 0){
        echo"<table border = '1' cellpadding = '10' cellspacing = '0'>
        <tr>
        <th>id</th>
        <th>firstname</th>
        <th>lastname</th>
        <th>email</th>
        <th>password</th>
        <th colspan = '2'>Action</th>
        </tr>";

        foreach($result as $row){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['firstname'] . "</td>";
            echo "<td>" . $row['lastname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>". $row['password'] . "</td>";
            echo "<td><a href='edit.php?id=" . $row['id'] . "' class= 'btn-edit'>Edit</a></td>";
            echo "<td><a href='delete.php?id=" . $row['id'] . "' class= 'btn-delete'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "No result found";
    }
}catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, JS, Coding Academy, Orange">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Table</title>
</head>
<body>
</body>
</html>