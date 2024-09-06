<?php
require_once '../database/conexao.php';

$sql = "SELECT * FROM produto ORDER BY CBarra DESC";
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
        <h2>Produtos</h2>

    <div class="custome">
        <table id="customers">
            <tr>
                <th>C. Barra</th>
                <th>Titulo</th>
                <th>Preço</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Quantidade do Produto</th>
                <th>IDSuap</th>
                <th>Deletar</th>
                <th>Alterar</th>
            </tr>
            <?php foreach ($usuarios as $row) { ?>
                <tr>
                    <td><?php echo $row['CBarra']; ?></td>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo "R$ ".$row['preco']; ?></td>
                    <td>
                        <?php
                            $sql = "SELECT nomeMarca FROM marca WHERE IDMarca = :IDMarca";
                            $stm = $conn->prepare($sql);
                            $stm ->bindParam(':IDMarca', $row['IDMarca']);
                            $executed = $stm->execute();
                            
                            if ($executed) {
                                $marca = $stm->fetch(PDO::FETCH_ASSOC);
                                if ($marca) {
                                    echo $marca['nomeMarca'];
                                } else {
                                    echo "Marca não encontrada"; // Mensagem alternativa se não houver resultados
                                }
                            } else {
                                echo "Erro na consulta: " . implode(", ", $stm->errorInfo()); // Exibe erro da consulta
                            }
                        ?>
                    </td>
                    <td><?php echo $row['tipo']; ?></td>
                    <td><?php echo $row['qtdProduto']; ?></td>
                    <td><?php echo $row['IDSuap_produto']; ?></td>
                    
                    <td>
                    <form method="post" action="../database/delete.php">
                        <input type="hidden" name="id" value="<?= $row['CBarra']; ?>">
                        <input type="hidden" name="area" value="produtos">
                        <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</button>
                    </form>
                    </td>
                    <td>
                    <form method="post" action="../php/altproduto.php">
                        <input type="hidden" name="id" value="<?= $row['CBarra']; ?>">
                        <input type="hidden" name="area" value="produtos">
                        <button type="submit" class="alterar" onclick="return confirm('Tem certeza que deseja alterar?');">Alterar</button>
                    </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

        <div class="vd-produtos">
            <div class="part1">
            <p><a href="../php/vd-produto.php">Vender Produto</a></p>
            <p><a href="../php/medidas.php">Medidas das Camisas</a></p>
            </div>
           
        </div>

        <div class="voltar">
            <a href="../php/index.php">Voltar para a pagina Incial</a>
        </div>

    </main>

    <script src="../js/truncate.js"></script>
    <script src="https://kit.fontawesome.com/19ad99d8f1.js" crossorigin="anonymous"></script>
</body>
</html> 