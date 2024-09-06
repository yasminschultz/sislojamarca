<?php 
session_start();
ini_set("display_errors", 1);

require_once "../controllers/produto/crudProduto.php";
require_once "../controllers/marca/crudMarca.php";

if(isset($_POST["cadastrar"])){
    $CBarra = $_POST["CBarra"] ?? "não informado";
    $titulo = $_POST["titulo"] ?? "não informado";
    $preco = $_POST["preco"] ?? "não informado";
    $marca = $_POST["marca"] ?? "não informado";
    $tipo = $_POST["tipo"] ?? "não informado";
    $detalhesproduto = $_POST["detalhesProduto"] ?? "não informado";
    $idSuap_produto = $_SESSION["id"];

    $marca = findIdByNameMarca($marca)["IDMarca"];

    try {
        $reponse = insertProduto($CBarra, $titulo, $preco, $marca, $tipo, $detalhesproduto, $tamanhos, $idSuap_produto);
    } catch (PDOException $e) {
        echo "<script>alert('Erro ao cadastrar!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadproduto.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="shortcut icon" href="../img/img2/iconshop1.png" type="image/x-icon">
    <title>Cadastro ESE</title>

</head>
<body>
    <header>
        <div class="header-cad">
        <h2>Cadastre seu Produto!!! </h2>
        <p>Insira seus Dados Abaixo </p><br><br>
        </div>
    </header>

<div class="imgback">
<img src="../img/img2/back-login-roxo.png" alt="">
    <main>
        <div class="cadastro">

        <div class="part1">
            <form action="" method="post">
            <label for="CBarra"><p>C. Barra</p></label>
                <input type="text" maxlength="11" name="CBarra" id="CBarra" required><br>

            <label for="titulo"><p>Titulo</p></label>
                <input type="text" name="titulo" id="titulo" required><br>

            <label for="preco"><p>Preço</p></label>
                <input type="number" name="preco" id="preco" required><br>

        </div>
            
        <div class="part2">
                <label for="marca"><p>Marca</p></label>
                        <select id="marca" name="marca">
                            <?php 
                            $listaMarcas = findAllMarca();
                            foreach ($listaMarcas as $imarca) {?>
                                <option value="<?= $imarca["sigla"]?>"><?= $imarca["nomeMarca"]?></option>
                            <?php }?>

                        </select><br>
                <label for="tipo"><p>Tipos</p></label>
                    <select id="tipo" name="tipo">
                        <option value="C">Camisa</option>
                        <option value="M">Moletom</option>
                        <option value="R">Regata</option>
                    </select><br>

                <label for="qtdProduto"><p>Quantidade do Produto</p></label>
                    <input type="text" name="qtdProduto" id="qtdProduto" ><br>

                <label for="tamanhos"><p>Tamanhos</p></label>
                    <select id="tamanhos" name="tamanhos">
                        <option value="P">P</option>
                        <option value="M">M</option>
                        <option value="G">G</option>
                        <option value="GG">GG</option>
                    </select><br>

        </div>

                <input type="submit" value="Cadastrar" name="cadastrar"><br><br>

            </form>
        </div>
    </main>
</div>
    <footer>
        <div class="voltar">
            <a href="index.php">Voltar para a pagina Incial</a>
        </div>
    </footer>
</body>
</html>