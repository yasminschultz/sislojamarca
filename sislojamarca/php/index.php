<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="shortcut icon" href="../img/img2/iconshop1.png" type="image/x-icon">
    <title>ESE Shop</title>

</head>
<body>

    <?php include_once "../components/header.php"?>

    <div class="main1">
    
        <section>
            <img src="../img/eventos-carrousel/2.png" alt="" class="d-block" style="width: 100%">
        </section>  

        <div class="areablack">
            <?php 
            if (!isset($_SESSION["id"])) {
                echo "
                <h3><a href='../php/cadastro.php'>Cadastrar</a></h3>
                <p><a href='entrar.php'>Entrar</a></p>";
            } else {
                echo "
                <h3><a href='../php/cadclientes.php'>Cadastrar Clientes</a></h3>
                <p><a href='logout.php'>Sair</a></p>";
            }
            ?>
        </div>

    </div>

    <div class="mainback">
        <div class="produtos">

            <?php 
            include_once ("../controllers/produto/crudProduto.php");

            $data = findAllProduto();

            for($i = 0; $i < 1; $i++){
                
            foreach ($data as $produto) {?>

            <div class="produto" id="<?= $produto["CBarra"]?>">
                <div class="imagem">
                    <img src="../img/laboratoria/<?= $produto["CBarra"] ?>.PNG" alt="Imagem do Produto">
                </div>
                <div class="info">
                    <h3 class="desc-prod"><?= $produto["titulo"]?></h3>
                    <div>
                        <span>R$<?= str_replace(".", ",", $produto["preco"])?></span>
                        <button><i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>
            </div>

            <?php }}?>

        </div>

        <div class="produtos">

            <?php 
            include_once ("../controllers/produto/crudProduto.php");

            $data = findAllProduto();

            for($i = 0; $i < 1; $i++){
                
            foreach ($data as $produto) {?>

            <div class="produto" id="<?= $produto["CBarra"]?>">
                <div class="imagem">
                    <img src="../img/laboratoria/<?= $produto["CBarra"] ?>.PNG" alt="Imagem do Produto">
                </div>
                <div class="info">
                    <h3 class="desc-prod"><?= $produto["titulo"]?></h3>
                    <div>
                        <span>R$<?= str_replace(".", ",", $produto["preco"])?></span>
                        <button><i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>
            </div>

            <?php }}?>

        </div>

        <div class="produtos">

            <?php 
            include_once ("../controllers/produto/crudProduto.php");

            $data = findAllProduto();

            for($i = 0; $i < 1; $i++){
                
            foreach ($data as $produto) {?>

            <div class="produto" id="<?= $produto["CBarra"]?>">
                <div class="imagem">
                    <img src="../img/laboratoria/<?= $produto["CBarra"] ?>.PNG" alt="Imagem do Produto">
                </div>
                <div class="info">
                    <h3 class="desc-prod"><?= $produto["titulo"]?></h3>
                    <div>
                        <span>R$<?= str_replace(".", ",", $produto["preco"])?></span>
                        <button><i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>
            </div>

            <?php }}?>
        </div>
        
    </div>

    <footer>
        <div class="names">
            <div class="1">
                <br><br><h2>Desenvolvedores:</h2>
                <a href="https://github.com/Eduardo-Guimaraes1480"  target="_blank"><p>Eduardo Guimarães</p></a><br>
                <a href="https://www.instagram.com/gabrielnestor17/"  target="_blank"><p>Gabriel Nestor</p></a><br>
                <a href="https://github.com/yasminschultz"  target="_blank"><p>Yasmin Schultz</p></a>
            </div>
        </div>
        <div class="names">
            <div class="2">
                <h2>Contatos:</h2>
                <p>Numero de telefone: +55 (77)98141-4031</p><br>
                <p>E-mail: eseguanambiese@gmail.com</p>
            </div>
        </div>
        <div class="names">
            <br><br><h2>Redes Sociais:</h2>
            <p><a href="https://github.com/TheGrandAristocrat" target="_blank">Github: The Grand Aristocrat</a></p><br>
            <p><a href="https://www.instagram.com/ese_equipeoficial/" target="_blank">Instagram: @ese_equipeoficial</a></p><br>
            <p>Twitter: Não disponível</p>
        </div>

    </footer>

    <footer>
        <div class="copyright">
            <p>Copyright &copy; 2024 - Todos os direitos reservados</p>
        </div>
    </footer>

</body>
</html>