<?php
session_start();

// Check if the user is logged in and is an admin or editor
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'editor')) {
    echo "Access Denied. You do not have permission to access this page.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor Page</title>
</head>
<body>
<div class="container mt-5">
    <h2>Editor Page</h2>
    <p>Welcome, Editor! You have access to this page.</p>
</div>
</body>
</html>
