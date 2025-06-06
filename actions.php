<?php

session_start();
require 'connect.php';

if (isset($_POST['create_user'])) {
    $name = mysqli_real_escape_string($connect, trim($_POST['name']));
    $email = mysqli_real_escape_string($connect, trim($_POST['email']));
    $date_birth = mysqli_real_escape_string($connect, trim($_POST['date_birth']));
    $password = isset($_POST['password']) ? mysqli_real_escape_string($connect, password_hash(trim($_POST['password']), PASSWORD_DEFAULT)): '';

    $sql = "INSERT INTO users (name, email, date_birth, password) VALUES ('$name', '$email', '$date_birth', '$password')";

    mysqli_query($connect, $sql);

    if (mysqli_affected_rows($connect) > 0) {
        $_SESSION['message'] = 'Usuário criado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['message'] = 'Usuário não foi criado';
        header('Location: index.php');
        exit;
    }
}


?>