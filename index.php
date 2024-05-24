<?php
session_start();
if (!isset($_SESSION["user"])){
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/styles/style.css">
    <link rel="shortcut icon" href="./src/images/logo.png" type="image/x-icon">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Welcome</h1>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
</body>
</html>