<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';
?>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="index.css">
<title>Lista de Usuários</title>
<head>
</head>
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

.alert {
    margin: 20px 0;
    padding: 15px;
    border-radius: 4px;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
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

.acao-botao-azul {
    background-color: #007bff;
    color: #fff;
    padding: 5px 10px;
    text-decoration: none;
    display: inline-block;
    border: none;
    cursor: pointer;
    font-weight: bold;
    margin-right: 10px;
    transition: background-color 0.3s;
}

.acao-botao-azul:hover {
    background-color: #0056b3;
}
</style>
<body>

<form action="/usuario/buscarUsuario/" method="POST" style="margin-bottom: 20px;">
    <label for="search" >Buscar Usuário:</label>
    <input type="text" id="search" name="CPF" placeholder="Digite o CPF">
    <input type="submit" value="Buscar" class="acao-botao-azul">
</form>


    <h1>Lista de Usuários</h1>
    <?php if (isset($data['msg'])) { ?>
        <div class="alert alert-danger" role="alert">Usuário removido com Sucesso</div>
    <?php } ?>
    <p><a href="/usuario/index" class="acao-botao-azul">Voltar</a></p>
    
    <?php
        if(isset($data['usuarios'])){
            $usuariosEncontrados = $data['usuarios'];
    ?>
    <table>
        <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Ações</th>
        </thead>
        <tbody>
                <tr>
                    <td><?= $usuariosEncontrados->getCodigo() ?></td>
                    <td><?= $usuariosEncontrados->getNome() ?></td>
                    <td><?= $usuariosEncontrados->getCpf() ?></td>
                    <td><?= $usuariosEncontrados->getEmail() ?></td>
                    <td>
                        <a href="/usuario/iniciarEditar/<?= $usuariosEncontrados->getCodigo() ?>" class="acao-botao-azul">Editar Usuário</a>
                        <form action="/usuario/deletar" method="post" style="display: inline;">
                            <input type="hidden" value="<?= $usuariosEncontrados->getCodigo() ?>" name="codigo" />
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Excluir
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Exclusão</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Você deseja mesmo excluiar o usuario? 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                    <button type="submit" class="btn btn-primary">Sim</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </form>
                    </td>
                </tr>
        </tbody>
    </table>
<?php }else{
?>
    <table>
        <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Ações</th>
        </thead>
        <h3>Não foi encontrado nenhum usuario!</h3>
    </table>


<?php } ?>
</body>

</html>
