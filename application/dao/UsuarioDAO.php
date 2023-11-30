<?php
namespace Application\dao;

use Application\models\Usuario;

class UsuarioDAO {

    public function salvar($usuario) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $nome = $usuario->getNome();
        $cpf = $usuario->getCpf();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

       
        $stmt = $conn->prepare("INSERT INTO usuarios (codigo, nome, cpf, email, senha) VALUES (null, ?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $cpf, $email, $senha);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    public function findAll() {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT * FROM usuarios";
        $result = $conn->query($SQL);
        $usuarios = [];

        while ($row = $result->fetch_assoc()) {
            $usuario = new Usuario($row["nome"], $row["cpf"], $row["email"], $row["senha"]);
            $usuario->setCodigo($row["codigo"]);
            array_push($usuarios, $usuario);
        }

        return $usuarios;
    }

    public function findById($id) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT * FROM usuarios WHERE codigo =" . $id;
        $result = $conn->query($SQL);
        $row = $result->fetch_assoc();

        $usuario = new Usuario($row["nome"], $row["cpf"], $row["email"], $row["senha"]);
        $usuario->setCodigo($row["codigo"]);

        return $usuario;
    }
    public function buscarPorCPF($termoBusca) {
        $conexao = new Conexao();
		$conn = $conexao->getConexao();
	
		$termoBusca = $conn->real_escape_string($termoBusca); 
	
		$SQL = "SELECT * FROM usuarios WHERE cpf like "." '$termoBusca%'";
		$result = $conn->query($SQL);
		if ($result && $result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$usuario = new Usuario($row["nome"], $row["cpf"],  $row["email"], $row["senha"]);
			$usuario->setCodigo($row["codigo"]);
			return $usuario;
		}
	
		return null; 
    }
    
    
    public function buscarPorEmailOrCpf($login) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? OR cpf = ? LIMIT 1");
        $stmt->bind_param("ss", $login, $login);
        $stmt->execute();

        $result = $stmt->get_result();

        $usuario = null;

        while ($row = $result->fetch_assoc()) {
            $usuario = new Usuario($row["nome"], $row["cpf"], $row["email"], $row["senha"]);
            $usuario->setCodigo($row["codigo"]);
        }

        $stmt->close();

        return $usuario;
    }

    public function atualizar($usuario) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $codigo = $usuario->getCodigo();
        $nome = $usuario->getNome();
        $cpf = $usuario->getCpf();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, cpf = ?, email = ?, senha = ? WHERE codigo = ?");
        $stmt->bind_param("ssssi", $nome, $cpf, $email, $senha, $codigo);

        if ($stmt->execute()) {
            $stmt->close();
            return $this->findById($codigo);
        } else {
            $stmt->close();
            echo "Error: " . $stmt->error;
            return $usuario;
        }
    }

    public function deletar($id) {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $stmt = $conn->prepare("DELETE FROM usuarios WHERE codigo = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
}
?>
