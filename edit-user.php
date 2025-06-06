<?php
session_start();
require 'connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <section class="section-user">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar usuário
                                <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['id'])) {
                                $user_id = mysqli_real_escape_string($connect, $_GET['id']);
                                $sql = "SELECT * FROM users WHERE id='$user_id'";
                                $query = mysqli_query($connect, $sql);

                                if (mysqli_num_rows($query) > 0) {
                                    $user = mysqli_fetch_array($query);

                            ?>
                                <form action="actions.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?=$user['id']?>">
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="name" value="<?=$user['name']?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>E-mail</label>
                                        <input type="text" name="email" value="<?=$user['email']?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Data de Nascimento</label>
                                        <input type="date" name="date_birth" value="<?=$user['date_birth']?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Senha</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_user" class="btn btn-primary">Aplicar</button>
                                    </div>
                                </form>
                            <?php
                            } else {
                                echo "<h5>Usuário não encontrado</h5>";
                            }
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>