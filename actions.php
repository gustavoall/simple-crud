<?php

session_start();
require 'connect.php';

if (isset($_POST['create_user'])) {
    $name = mysqli_real_escape_string($connect, trim($_POST['name']));
    $email = mysqli_real_escape_string($connect, trim($_POST['email']));
    $data_birth = mysqli_real_escape_string($connect, trim($_POST['data_birth']));
    $password = isset($_POST['password']) ? mysqli_real_escape_string($connect, trim($_POST['password'])): '';

    $sql = "INSERT INTO users (name, email, data_birth, password) VALUES ('name', 'email', 'data_birth', 'password')";

    mysqli_query($connect, $sql);
}


?>