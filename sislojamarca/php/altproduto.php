<?php 
session_start();

require_once ("../controllers/produto/crudProduto.php");
require_once ("../controllers/marca/crudMarca.php");

$list_produtos = findAllProduto();
$marcas = findAllMarca();
$produto_search = [];
$CBarra = "";

if(isset($_GET["CBarra"])){
    $cbarra = $_GET["CBarra"];
    $produto_search = findProdutoByCBarra($CBarra);

    if(isset($_POST["update"])){
        $titulo = $_POST["titulo"];
        $preco = $_POST["preco"];
        $marca = $_POST["marcas"];
        $tipo = $_POST["tipo"];
        $detalhesproduto = $_POST["qtdProduto"];
        $tamanhos = $_POST["tamanhos"];
        
        $result = updateProduto($CBarra, $titulo, $preco, $marca, $tipo, $detalhesproduto, $tamanhos);
        
        if($result){
            echo "Produto Alterado com Sucesso!";
        } else {
            echo "Erro ao Alterar Produto!";
        }
    }

    if(isset($_POST["delete"])){
        $result = deleteProduto($CBarra);
        if($result){
            echo "Produto Deletado com Sucesso!";
        } else {
            echo "Erro ao Deletar Produto!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="shortcut icon" href="../img/img2/iconshop1.png" type="image/x-icon">
    <title>Alterar Produto</title>

</head>
<body>
    <header>
        <div class="header-cad">
        <h2>Altere seu Produto!!! </h2>
        <p>Insira seus Dados Abaixo </p><br><br>
        </div>
    </header>
   
    <main>
        <div class="cadastro">
            <form action="" method="get" class="CBarra-form">
                <input type="hidden" name="CBarra">
                <label for="CBarra"><p>C. Barra</p></label>
                <select name="CBarra" id="CBarra" onchange="submit()">
                    <option value="NA">N\A</option>
                    <?php foreach ($list_produtos as $produto) { ?>
                        <option value="<?= $produto["CBarra"]?>" <?php if($produto["CBarra"] == $_GET["CBarra"]) echo "selected='selected'"?>><?= $produto["CBarra"]?></option>
                    <?php } ?>
                </select>
            </form>

            <form action="" method="post">
                <label for="titulo"><p>Titulo</p></label>
                    <input type="text" name="titulo" id="titulo" value="<?= $produto_search["titulo"]?>" required><br>

                <label for="preco"><p>Preço</p></label>
                    <input type="number" name="preco" id="preco" value="<?= $produto_search["preco"]?>" required><br>

                <label for="marcas"><p>Marcas</p></label>
                    <select id="marcas" name="marcas">
                        <?php foreach($marcas as $marca) {?>
                            <option value="<?= $marca["IDMarca"]?>" <?php if($produto_search["marca"] == $marca["IDMarca"]) echo "selected='selected'"?>><?= $marca["nomeMarca"]?></option>
                        <?php } ?>
                    </select><br>

                <label for="tipo"><p>Tipos</p></label>

                
                    <select id="tipo" name="tipo">
                        <option value="C" <?php if($produto_search["tipo"] == "C") echo "selected='selected'"?>>Camisa</option>
                        <option value="M" <?php if($produto_search["tipo"] == "M") echo "selected='selected'"?>>Moletom</option>
                        <option value="R" <?php if($produto_search["tipo"] == "R") echo "selected='selected'"?>>Regata</option>
                    </select><br>

                <label for="qtdProduto"><p>Quantidade do Produto</p></label>
                    <input type="tel" name="qtdProduto" id="qtdProduto" value="<?= $produto_search["qtdProduto"]?>" ><br>

                <label for="tamanhos"><p>Tamanhos</p></label>
                    <select id="tamanhos" name="tamanhos">
                        <option value="P" <?php if($produto_search["tamanhos"] == "P") echo "selected='selected'"?>>P</option>
                        <option value="M" <?php if($produto_search["tamanhos"] == "P") echo "selected='selected'"?>>M</option>
                        <option value="G" <?php if($produto_search["tamanhos"] == "P") echo "selected='selected'"?>>G</option>
                        <option value="GG" <?php if($produto_search["tamanhos"] == "P") echo "selected='selected'"?>>GG</option>
                    </select><br>

                <input type="submit" value="Alterar" name="update" onclick="return confirm('Tem certeza que deseja ALterar?');">
                <input type="submit" value="Deletar" name="delete" style="background-color: rgb(190, 50, 60);" onclick="return confirm('Tem certeza que deseja Deletar?');"><br><br>

            </form>
        </div>
    </main>

    <footer>
        <div class="voltar">
            <a href="./index.php">Voltar para a pagina Incial</a>
        </div>
    </footer>

    <script>

        function submit(){
            setInterval(() => {
                document.querySelector(".CBarra-form").submit();
            }, 1000);
        }
    </script>
</body>
</html>