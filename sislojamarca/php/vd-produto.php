<?php
require_once "../database/conexao.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Recebe os dados do formulário
    $CBarra = $_POST['CBarra'];
    $IDSuap = $_POST['IDSuap'];
    $dataVenda = $_POST['dataVenda'];
    $preco = $_POST['preco'];
    $tamanhos = $_POST['tamanhos'];
    $quantidade = $_POST['quantidade'];

    if (empty($CBarra) || empty($IDSuap) || empty($dataVenda) || empty($preco) || empty($tamanhos) || empty($quantidade)) {
        echo "<script>alert('Todos os campos são obrigatórios.');</script>";
        echo "<script>window.location.href = '../php/produto-vd.php'</script>";
        exit;
    }

    $data_formatada = date('Y-m-d', strtotime($dataVenda));

// Buscar o preço do produto e a quantidade disponível
    $stm  = $conexao->prepare("SELECT preco, qtdProduto FROM produto WHERE idproduto = ?");
    $stm ->bindParam(1, $CBarra);
    $stm ->execute();
    $produto = $stm ->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT IDSuap FROM usuario WHERE nome = :IDSuap";
    $stm = $conn->prepare($sql);
    $stm ->bindParam(':IDSuap', $IDSuap);
    $stm ->execute();
    $IDSuap = $stm ->fetchColumn();

    
    if (!$IDSuap) {
        echo "<script>alert('O comprador informado não existe.');</script>";
        echo "<script>window.location.href = '../php/podruto-vd.php'</script>";
        exit;
    }

    $sql = "INSERT INTO venda (CBarra, IDSuap, dataVenda, preco, tamanhos, quantidade) 
    VALUES (:CBarra, :IDSuap, :dataVenda, :preco, :tamanhos, :quantidade)";
    $stm = $conn->prepare($sql);
    $stm->bindParam(':CBarra', $CBarra);
    $stm->bindParam(':IDSuap', $IDSuap);
    $stm->bindParam(':dataVenda', $dataVenda);
    $stm->bindParam(':preco', $preco);
    $stm->bindParam(':tamanhos', $tamanhos);
    $stm->bindParam(':quantidade', $quantidade);
    try {
        $stm->execute();
        echo "<script>alert('Venda cadastrada com sucesso!');</script>";
        echo "<script>window.location.href = '../database/dados/vendas.php'</script>";
    } catch (PDOException $e) {
        echo "Erro ao inserir a venda: " . $e->getMessage();
    }
    } else {
        echo "<script>alert('O Produto informado não existe.');</script>";
        echo "<script>window.location.href = '../php/produto-vd.php'</script>";
    }

