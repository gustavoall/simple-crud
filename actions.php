<?php

session_start();
require 'connect.php';

if (isset($_POST['create_user'])) {
    $name = mysqli_real_escape_string($connect, trim($_POST['name']));
    $email = mysqli_real_escape_string($connect, trim($_POST['email']));
    $date_birth = mysqli_real_escape_string($connect, trim($_POST['date_birth']));
    $password = isset($_POST['password']) ? mysqli_real_escape_string($connect, trim($_POST['password'])): '';

    $sql = "INSERT INTO users (name, email, date_birth, password) VALUES ('$name', '$email', '$date_birth', '$password')";

    mysqli_query($connect, $sql);
}


?>