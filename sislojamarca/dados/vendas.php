<?php
require_once '../database/conexao.php';

$sql = "SELECT * FROM venda ORDER BY IDVenda DESC";
$stm = $conn->prepare($sql);
$stm->execute();
$usuarios = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/todosprodutos.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="shortcut icon" href="../img/img2/iconshop1.png" type="image/x-icon">
    <title>ESE Shop</title>

</head>
<body>

<?php include_once "../components/header.php"?>

    <main>
        <h2>Vendas</h2>

        <table id="customers">
            <tr>
                <th>ID Venda</th>
                <th>C. Barra</th>
                <th>Suap Cliente</th>
                <th>Data Venda</th>
                <th>Preço</th>
                <th>Desconto</th>
                <th>Tamanhos</th>
                <th>Quantidade</th>
                <th>Deletar</th>
                
            </tr>
            <?php foreach ($usuarios as $row) { ?>
                <tr>
                    <td><?php echo $row['IDCompra']; ?></td>
                    <td>
                        <?php
                            $sql = "SELECT titulo FROM produto WHERE CBarra = :CBarra";
                            $stm = $conn->prepare($sql);
                            $stm ->bindParam(':CBarra', $row['CBarra']);
                            $executed = $stm->execute();
                            
                            if ($executed) {
                                $produto = $stm->fetch(PDO::FETCH_ASSOC);
                                if ($produto) {
                                    echo $produto['titulo'];
                                } else {
                                    echo "Produto não encontrado"; // Mensagem alternativa se não houver resultados
                                }
                            } else {
                                echo "Erro na consulta: " . implode(", ", $stm->errorInfo()); // Exibe erro da consulta
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            $sql = "SELECT IDSuap FROM produto WHERE CBarra = :CBarra";
                            $stm = $conn->prepare($sql);
                            $stm ->bindParam(':CBarra', $row['CBarra']);
                            $executed = $stm->execute();
                            
                            if ($executed) {
                                $produto = $stm->fetch(PDO::FETCH_ASSOC);
                                if ($produto) {
                                    echo $produto['titulo'];
                                } else {
                                    echo "Produto não encontrado"; // Mensagem alternativa se não houver resultados
                                }
                            } else {
                                echo "Erro na consulta: " . implode(", ", $stm->errorInfo()); // Exibe erro da consulta
                            }
                        ?>
                    </td>
                    <td><?php echo $row['dataVenda']; ?></td>
                    <td><?php echo $row['preco']; ?></td>
                    <td><?php echo $row['desconto']; ?></td>
                    <td><?php echo $row['tamanhos']; ?></td>
                    <td><?php echo $row['quantidade']; ?></td>
                    
                    <td>
                    <form method="post" action="../database/delete.php">
                        <input type="hidden" name="id" value="<?= $row['IDVenda']; ?>">
                        <input type="hidden" name="area" value="produtos">
                        <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</button>
                    </form>
                    </td>
                
                </tr>
            <?php } ?>
        </table>

        <div class="voltar">
            <a href="../php/index.php">Voltar para a pagina Incial</a>
        </div>

    </main>

    <script src="../js/truncate.js"></script>
    <script src="https://kit.fontawesome.com/19ad99d8f1.js" crossorigin="anonymous"></script>
</body>
</html> 