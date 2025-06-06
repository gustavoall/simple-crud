<?php
session_start();
require 'connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <section class="section-list">
        <div class="container mt-5">
            <?php include('message.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4> Lista de Usuários
                                <a href="create-users.php" class="btn btn-primary float-end">Adicionar usuário</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Data de Nascimento</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = 'SELECT * FROM users';
                                    $users = mysqli_query($connect, $sql);
                                    if (mysqli_num_rows($users) > 0) {
                                        foreach ($users as $user) {
                                    ?>
                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= date('d/m/y', strtotime($user['date_birth'])) ?></td>
                                            <td>
                                                <a href="view-user.php?id=<?= $user['id'] ?>" class="btn btn-secondary btn-sm"><span class="bi bi-eye"></span>&nbsp;Visualizar</a>
                                                <a href="edit-user.php?id=<?= $user['id'] ?>" class="btn btn-success btn-sm"><span class="bi bi-eye"></span>&nbsp;Editar</a>
                                                <form action="actions.php" method="POST" class="d-inline">
                                                    <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_user" value="<?= $user['id'] ?>" class="btn btn-danger btn-sm"><span class="bi bi-trash"></span>&nbsp;Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    } else {
                                        echo '<h5>Nenhum usuário encontrado</h5>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>