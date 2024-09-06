<?php
require '../database/conexao.php'; // Inclui o arquivo de configuração
// Inserindo Clintes
function insertClientes($admID, $IDSuap_cliente, $nome, $email, $senha, $telefone, $cpf)
{
    include "../database/conexao.php";
    try {
        $data = $conn->query("INSERT INTO clientes VALUES ('$admID', '$IDSuap_cliente', '$nome', '$email', '$senha', '$telefone', '$cpf')");
    } catch (Exception $e) {
        $data = $e->getMessage();
    }

    return $data;
}

// Buscando todos os clientes
function findAllClientes() {
    include "../database/conexao.php";
    $sql = "SELECT * FROM clientes";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

// Buscando Cliente pelo id
function findProdutoByNameClientes($nome) {
    include "../database/conexao.php";
    $sql = "SELECT IDSuap FROM clientes WHERE sigla = '$nome'";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetch();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}
