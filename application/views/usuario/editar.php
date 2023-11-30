<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
$usuario = $data['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    h1 {
        color: #333;
        text-align: center;
    }

    form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    .alert {
        margin: 20px 0;
        padding: 15px;
        border-radius: 4px;
        text-align: center;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    img {
        width: 300px;
        height: auto;
    }
</style>
    <title>Alterar Usuário</title>
</head>

<body>
    <h1>Alterar Usuário</h1>
    <a href="/usuario/" class="btn btn-info">Voltar</a>
    <?php 
        if(isset($data["msg-editarUsuario"])){
    ?>
    <div class="alert alert-success" role="alert">Usuário editado com sucesso</div>
    <?php } ?>

    <form class="form-control" method="POST" action="/usuario/atualizar">
        <input type="hidden" value="<?= $usuario->getCodigo() ?>" name="codigo" />
        <label class="label">Nome</label>
        <input type="text" value="<?= $usuario->getNome() ?>" name="nome" class="form-control" />

        <label class="label">CPF</label>
        <input type="text" value="<?= $usuario->getCPF() ?>" name="cpf" class="form-control" />

        <label class="label">E-mail</label>
        <input type="email" value="<?= $usuario->getEmail() ?>" name="email" class="form-control" />

        <label class="label">Senha</label>
        <input type="password" value="<?= $usuario->getSenha() ?>" name="senha" class="form-control" />

        <div class="row" style="margin-top: 5px">
            <input type="submit" value="Alterar" class="btn btn-info" />
        </div>
    </form>
</body>

</html>
