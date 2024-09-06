<?php
require_once '../database/conexao.php';

require_once "../controllers/venda/crudVenda.php";
require_once "../controllers/clientes/crudClientes.php";
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
    <img src="../img/img2/back-login-roxo.png" alt="">
    <main>
        <h3>produtos-vd</h3>

        <div class="for">
        <form action="../php/vd-produto.php" method="post">
            <h1>Venda de Produto</h1><br><br>
            <label for="produto"><p>Produto</p></label>
            <select name="produto" id="produto"  onchange="atualizarValor()" required>
            <option value=""></option> <!-- Campo Vazio -->
                <?php foreach ($produto as $CBarra => $produtos) { ?>
                    <option value="<?php echo $CBarra; ?>"><?php echo '+ '.$produtos['titulo']; ?></option>
                <?php } ?>
            </select><br>

            <label for="clientes"><p>Cliente</p></label>
            <select name="clientes" id="clientes" placeholder="<Clientes">
            <option value=""></option> <!-- Campo Vazio -->
                <?php 
                    $data = findAllClientes();
                    foreach ($data as $clientes) {?>
                        <option value="<?= $clientes["nome"]?>"><?= $clientes["nome"]?></option>
                    <?php }?>
            </select><br>

            <label for="data"><p>Data</p></label>
            <input type="date" name="data" id="data" placeholder="Data" required><br>

            <label for="preco"><p>Preço</p></label>
            <input type="text" name="preco" id="preco" placeholder="Preço" readonly><br>

            <label for="tamanhos"><p>Tamanhos</p></label>
                    <select id="tamanhos" name="tamanhos">
                        <option value="P">P</option>
                        <option value="M">M</option>
                        <option value="G">G</option>
                        <option value="GG">GG</option>
                    </select><br>

            <label for="quantidade"><p>Quantidade</p></label>
            <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade" min="1" required><br><br>
            

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