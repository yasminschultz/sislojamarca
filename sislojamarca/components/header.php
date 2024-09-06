<?php 
session_start();
?>

<header>
        <div class="imglogo">
            <a href="../php/index.php"><img src="../img/img2/logoshop1.png" alt="Teste" class="d-block"
                    style="width: 100%"></a>
        </div>

        <?php 
                if (!isset($_SESSION["id"])) {
                    echo "";
                } else {
                    echo "<a href='../php/area-admin.php'>area-admin</a>";
                }
                ?>

        <div class="imguser">
            <?php 
                if (!isset($_SESSION["id"])) {
                    echo "<a href='../php/entrar.php'><img class='user' src='../img/img2/perfil.png' style='width: 100%'></a>";
                } else {
                    echo "<a href='../php/minhaconta.php'><img class='user' src='../img/img2/perfil.png' style='width: 100%'></a>";;
                }
                ?>
        </div>
    </header>

    <nav>
        <ul>
            <li class="nav-item">
                <a href="../dados/todosprodutos.php">Todos os Produtos</a>
            </li>
            <li class="nav-item">
                <a href="../php/marcasparceiras.php">Marcas Parceiras</a>
            </li>
            <li class="nav-item">
                <a href="../php/cadproduto.php">Cadastrar Produto</a>
            </li>
            <li class="nav-item">
                <a href="../php/comprar-produto.php">Comprar Produto</a>
            </li>
            <li class="nav-item">
                <a href="../php/sobre.php">Sobre Nós</a>
            </li>
        </ul>
    </nav>
