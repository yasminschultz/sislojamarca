<?php 
require_once "../database/conexao.php";
// Inserindo Marcas
function insertMarca ($nomeMarca, $sigla, $descricao, $dataCriacao, $contato, $endereco, $IDFornecedor) {
    require "../database/conexao.php";
    $sql = "INSERT INTO marca VALUES (DEFAULT, :nomeMarca, :sigla, :descricao, :dataCriacao, :contato, :endereco, :IDFornecedor)";
    $stm = $conn->prepare($sql);
    $stm->bindParam(":nomeMarca", $nomeMarca);
    $stm->bindParam(":sigla", $sigla);
    $stm->bindParam(":descricao", $descricao);
    $stm->bindParam(":dataCriacao", $dataCriacao);
    $stm->bindParam(":contato", $contato);
    $stm->bindParam(":endereco", $endereco);
    $stm->bindParam(":IDFornecedor", $IDFornecedor);
    $stm->execute();
    try {
        return $stm->execute();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

// Selecionando todas as marcas
function findAllMarca() {
    require realpath(__DIR__ . "/../../database/conexao.php");
    $sql = "SELECT * FROM marca";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetchAll();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

// Selecionando uma marca pelo ID
function findIdByNameMarca($nomeMarca) {
    require realpath(__DIR__ . "/../../database/conexao.php");
    $sql = "SELECT IDMarca FROM marca WHERE sigla = '$nomeMarca'";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetch();
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
