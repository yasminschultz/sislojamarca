<?php
require '../database/conexao.php'; // Inclui o arquivo de configuração
// Verificando se o Usuário existe
function findOneById($id)
{
    include "../database/conexao.php";
    
    $sql = "SELECT * FROM usuario WHERE IDSuap = '$id'";
    $stm = $conn -> prepare($sql);
    try {
        $stm->execute();
        return $stm->fetch();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

// Fazendo Login de sua Conta
function login($IDSuap)
{
    include "../database/conexao.php";
    $sql = "SELECT IDSuap, senha FROM usuario WHERE IDSuap = :IDSuap";
    $stm = $conn->prepare($sql);
    $stm->bindParam(":IDSuap", $IDSuap);
    try {
        $stm->execute();
        return $stm->fetch();
    } catch (PDOException $e) {
        return $e->getMessage();
    }

}

// Inserindo Usuário
function insert(string $IDSuap, string $nome, string $cpf, string $senha, string $email, string $telefone)
{
    include '../database/conexao.php';
    // Remover a hash da senha
    $sql = "INSERT INTO usuario VALUES ('$IDSuap', '$nome', '$email', '$senha', '$telefone', '$cpf')";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetch();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

// Verificando se o Usuário existe
function findIdByNameUsuario($IDSuap) {
    include '../database/conexao.php';
    $sql = "SELECT IDSuap FROM usuario WHERE sigla = '$IDsuap'";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetch();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

// Selecionando todos os Usuários
function findAllUsuarios() {
    include '../database/conexao.php';
    $sql = "SELECT * FROM usuario";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}


//Excluindo Usuario
function delete() {
    require '../database/conexao.php';
if(isset($_GET['excluir'])){
    if(isset($_GET['IDSuap'])){
        $IDSuap = $_GET['IDSuap'];

        // Exclua todos os produtos associados às vendas deste cliente
        $sqlCompra = "DELETE FROM compra WHERE IDSuap = :ISuap ";
        $stmCompra = $conn->prepare($sqlCompra);
        $stmCompra->bindParam(':IDSuap', $IDSuap, PDO::PARAM_INT);
        $stmCompra->execute();

        // Exclua todas as vendas associadas a este cliente
        $sqlVenda = "DELETE FROM venda WHERE IDSuap = :IDSuap";
        $stmtVenda = $conn->prepare($sqlVenda);
        $stmtVenda->bindParam(':IDSuap', $IDSuap, PDO::PARAM_INT);
        $stmtVenda->execute();

        // Agora, exclua o cliente
        $sqlUsuario = "DELETE FROM usuario WHERE IDSuap = :IDSuap";
        $stmtUsuario = $conn->prepare($sqlUsuario);
        $stmtUsuario->bindParam(':IDSuap', $IDSuap, PDO::PARAM_INT);

        if($stmtCliente->execute()) {
            $_SESSION['message'] = "O Usuario foi excluído com sucesso!";
            header("Location: ../dados/usuarios.php");
            exit();
        } else {
            $_SESSION['message'] = "A exclusão do Usuario falhou.";
            header("Location: ../dados/usuarios.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "ID do Usuario não fornecido.";
        header("Location: ../dados/usuarios.php");
        exit();
    }
}
}
