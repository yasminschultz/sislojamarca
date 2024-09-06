<?php 
require_once "../database/conexao.php";
//Inserindo Produtos
function insertProduto ($CBarra, $titulo, $preco, $marca, $tipo, $qtdProduto, $tamanhos, $IDSuap_produto) {
    require "../database/conexao.php";
    $sql = "INSERT INTO produto VALUES ('$CBarra', '$titulo', '$preco', '$marca', '$tipo', '$qtdProduto', '$tamanhos', '$IDSuap_produto')";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetch();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

//Verficando existencia do Produto 
if (isset($_GET["CBarra"])) {
    $CBarra = $_GET["CBarra"];
    $produto_search = findProdutoByCBarra($CBarra);
} else {
    // Se CBarra não estiver definido, você pode definir um valor padrão ou lidar com a situação
    $CBarra = ""; // ou outra lógica que faça sentido
    $produto_search = []; // ou outra lógica que faça sentido
}

if (!empty($produto_search)) {
    // Acesso seguro aos dados do produto
    $titulo = $produto_search["titulo"] ?? ''; // Valor padrão se não existir
    $preco = $produto_search["preco"] ?? '';
    $marca = $produto_search["marca"] ?? '';
    $tipo = $produto_search["tipo"] ?? '';
    $qtdProduto = $produto_search["detalhesProduto"] ?? '';
    $tamanhos = $produto_search["tamanhos"] ?? '';
} else {
    // Se não encontrar o produto, defina valores padrão ou trate o erro
    $titulo = '';
    $preco = '';
    $marca = '';
    $tipo = '';
    $qtdProduto = '';
    $tamanhos = '';
}

//Buscando Produtos
function findAllProduto() {
    require "../database/conexao.php";
    $sql = "SELECT * FROM produto";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetchAll();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

//Atualizando Produtos
function updateProduto($CBarra, $titulo, $preco, $marca, $tipo, $qtdProduto, $tamanhos) {
    require "../database/conexao.php";
    $sql = "UPDATE produto SET titulo = '$titulo', preco = '$preco', marca = '$marca', tipo = '$tipo', detalhesProduto = '$qtdProduto', tamanhos = '$tamanhos' WHERE CBarra = '$CBarra'";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetch();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

//Buscando Produtos por CBarra
function findProdutoByCBarra($CBarra) {
    require "../database/conexao.php";
    $sql = "SELECT * FROM produto WHERE CBarra = '$CBarra'";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetch();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

//Deletando Produtos
function deleteProduto($CBarra) {
    require "../database/conexao.php";
    $sql = "DELETE FROM produto WHERE CBarra = '$CBarra'";
    $stm = $conn->prepare($sql);
    try {
        $stm->execute();
        return $stm->fetch();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
}

