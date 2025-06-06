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
        $_SESSION['message'] = 'Usuário criado com sucesso!';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['message'] = 'Usuário não foi criado!';
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['update_user'])) {
    $user_id = mysqli_real_escape_string($connect, $_POST['user_id']);

    $name = mysqli_real_escape_string($connect, trim($_POST['name']));
    $email = mysqli_real_escape_string($connect, trim($_POST['email']));
    $date_birth = mysqli_real_escape_string($connect, trim($_POST['date_birth']));
    $password = mysqli_real_escape_string($connect, trim($_POST['password']));

    $sql = "UPDATE users SET name = '$name', email = '$email', date_birth = '$date_birth'";
    
    if (!empty($password)) {
        $sql .= ", password='" . password_hash($password, PASSWORD_DEFAULT) . "'";
    }

    $sql .= " WHERE id = '$user_id'";

    mysqli_query($connect, $sql);

    if (mysqli_affected_rows($connect) > 0) {
        $_SESSION['message'] = 'Usuário atualizado com sucesso!';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['message'] = 'Usuário não foi atualizado!';
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['delete_user'])) {
    $user_id = mysqli_real_escape_string($connect, $_POST['delete_user']);

    $sql = "DELETE FROM users WHERE id = '$user_id'";

    mysqli_query($connect, $sql);

    if (mysqli_affected_rows($connect) > 0) {
        $_SESSION['messege'] = 'Usuário deletado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['message'] = 'Usuário não foi deletado!';
        header('Location: index.php');
        exit;
    }
}

?>