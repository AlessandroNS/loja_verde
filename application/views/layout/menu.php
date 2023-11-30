<?php
if (!isset($_SESSION))
    session_start();
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

    .navbar {
        background-color: #606060;
        padding: 10px;
    }

    .nav-link {
        color: #fff;
        margin-right: 15px;
        text-decoration: none;
    }
    .nav-link:hover {
        color: #aaa;
       
    }
    .active {
        font-weight: bold;
    }

    .justify-content-end {
        justify-content: flex-end;
    }
    </style>
</head>

<body>
    <ul class="navbar nav justify-content-end">

        <?php
        if (isset($_SESSION['usuario'])) {
            $user = $_SESSION['logado'];
            ?>

            <li class="nav-item">
                <a class="nav-link" href="/Produto/">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/usuario/">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/home/index">Início</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/login/logout">logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg><?= $user ?>
                </a>
            </li>


            <?php
        } else {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="/usuario/cadastrar">Crie a sua conta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login/">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/home/index">Início</a>
            </li>
            <?php
        }
        ?>
    </ul>
</body>

</html>