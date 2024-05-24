<?php
    //membuat koneksi
    $hostname = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "blug";
    $conn = new mysqli($hostname, $dbUser, $dbPass, $dbName);

    //check koneksi
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>