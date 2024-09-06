<?php
require_once '../database/conexao.php';

$sql = "SELECT * FROM marca ORDER BY IDMarca DESC";
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
        <h2>Marcas</h2>

        <table id="customers">
            <tr>
                <th>ID Marca</th>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Descrição</th>
                <th>Data Criação</th>
                <th>Contato</th>
                <th>Endereco</th>
                <th>Deletar</th>
                <th>Alterar</th>
            </tr>
            <?php foreach ($usuarios as $row) { ?>
                <tr>
                    <td><?php echo $row['IDMarca']; ?></td>
                    <td><?php echo $row['nomeMarca']; ?></td>
                    <td><?php echo $row['sigla']; ?></td>
                    <td><?php echo $row['descricao']; ?></td>
                    <td><?php echo $row['dataCriacao']; ?></td>
                    <td><?php echo $row['contato']; ?></td>
                    <td><?php echo $row['endereco']; ?></td>
                    
                    <td>
                    <form method="post" action="../database/delete.php">
                        <input type="hidden" name="id" value="<?= $row['IDMarca']; ?>">
                        <input type="hidden" name="area" value="produtos">
                        <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</button>
                    </form>
                    </td>
                    <td>
                    <form method="post" action="../php/altproduto.php">
                        <input type="hidden" name="id" value="<?= $row['IDMarca']; ?>">
                        <input type="hidden" name="area" value="produtos">
                        <button type="submit" class="alterar" onclick="return confirm('Tem certeza que deseja alterar?');">Alterar</button>
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