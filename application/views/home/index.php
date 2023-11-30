<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
//debug_print_backtrace();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Loja Verde</title>

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

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #ddd;
        }

        p {
            text-align: center;
        }

        .alert {
            margin: 20px 0;
            padding: 15px;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <h1>Bem-Vindo</h1>
    <hr />
    <p>Lista de produtos</p>
    <?php if (isset($data["msg-valido"])) { ?>
        <div class="alert alert-success" role="alert">Sucesso ao autenticar</div>
    <?php } ?>
    <table>
        <thead>
            <th>Nome</th>
            <th>Marca</th>
            <th>Preço</th>
            <th>Imagem</th>
        </thead>
        <tbody>
            <?php if (isset($data['produtos'])) foreach ($data['produtos'] as $produto) { ?>
                <tr>
                    <td><?= $produto->getNome() ?></td>
                    <td><?= $produto->getMarca() ?></td>
                    <td>R$:&nbsp;<?= $produto->getPreco() ?>.00</td>
                    <td><img src="<?= $produto->getImagem() ?>" alt="Sem imagem" style="width: 150px;  height: auto"></td>
                    
                </tr>
            <?php } else { ?>
                <tr>
                    <td colspan="4">Nenhum produto cadastrado</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
