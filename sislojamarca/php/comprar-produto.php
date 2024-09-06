<?php
require_once '../database/conexao.php';

require_once "../controllers/compra/crudCompra.php";
require_once "../controllers/fornecedor/crudFornecedor.php";
require_once "../controllers/produto/crudProduto.php";

$sql = "SELECT CBarra, titulo, preco FROM produto";
$stm = $conn->query($sql);

$produto = [];
while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
    $produto[$row['CBarra']] = $row;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/produto-vd.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="shortcut icon" href="../img/img2/iconshop1.png" type="image/x-icon">
    <title>Realizar Venda ESE</title>

</head>
<body>

<div class="imgback">
    <img src="../img/img2/back-cadastro-roxo.png" alt="">
    <main>
        <h3>comprar-produto.php</h3>

        <div class="for">
        <form action="../php/vd-produto.php" method="post">
            <h1>Comprar Produtos</h1><br><br>
            <label for="produto"><p>C. Barra do Produto</p></label>
            <select name="produto" id="produto"  onchange="atualizarValor()">
                <?php foreach ($produto as $CBarra => $produtos) { ?>
                    <option value="<?php echo $CBarra; ?>"><?php echo '+ '.$produtos['titulo']; ?></option>
                <?php } ?>
            </select><br>

            <label for="qtdProduto"><p>Quatidade do Produto</p></label>
            <input type="text" name="qtdProduto" id="qtdProduto" placeholder="Quantidade" required><br>

            <label for="dataCompra"><p>Data da Compra</p></label>
            <input type="date" name="dataCompra" id="dataCompra" placeholder="Data Compra" required><br>

            <label for="fornecedor"><p>Fornecedor</p></label>
            <select name="fornecedor" id="fornecedor"  onchange="atualizarValor()">
                <?php 
                        $data = findAllFornecedor();
                        foreach ($data as $fornecedor) {?>
                            <option value="<?= $fornecedor["nomeFornecedor"]?>"><?= $fornecedor["nomeFornecedor"]?></option>
                        <?php }?>
            </select><br><br>

            <label for="submit"></label>
            <input class="btn" type="submit" value="Vender" id="sub" name="submit"/>
        </form>
    </div>

        <div class="voltar">
            <a href="./index.php">Voltar para a pagina Incial</a>
        </div>
    </main>

        <script>
        var produto = <?php echo json_encode($produto); ?>;

        function atualizarValor() {
            var produtoSelecionado = document.getElementById("produtos").value;
            var inputValor = document.getElementById("preco");
            inputValor.value = produto[produtoSelecionado]?.preco || 0;
        }

        // Chamar a função ao carregar a página e ao mudar a opção
        window.onload = atualizarPreco;
    </script>
</div>
</body>
</html>