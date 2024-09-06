<?php
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/psw1/sislojamarca-main/sislojamarca/');

require_once '../database/conexao.php'; // Inclua o arquivo de conexão

// Verifique se o usuário está logado
if (isset($_SESSION['IDSuap'])) {
    $IDSuap = $_SESSION['IDSuap'];

    // Prepare a consulta SQL
    $sql = "SELECT nome FROM usuario WHERE IDSuap = :IDSuap";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':IDSuap', $IDSuap);
    $stm->execute();

    // Verifique se o usuário foi encontrado
    $usuario = $stm->fetch(PDO::FETCH_ASSOC);
    if ($usuario) {
        $nome_usuario = $usuario['nome'];
    } else {
        $nome_usuario = '|Usuário não encontrado|';
    }
} else {
    $nome_usuario = '|Usuário não logado|';
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/area-admin.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="shortcut icon" href="../img/img2/iconshop1.png" type="image/x-icon">
    <title>ESE Shop</title>

    <style>
        h3{
            margin-top: 100px;
            margin-bottom: 30px;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2dvh;
            padding-bottom: 2dvh;
            width: 100%;
            height: 100vh;
        }

        main a {
            width: 35dvh;
            padding: 2dvh;
            font-size: 3dvh;
            background-color: #310054;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        main h1 {
            background: none;
            font-size: 5dvh;
            margin-top: 1dvh;
            margin-bottom: -6dvh;
        }

        a {
            cursor: pointer;
            transition: .5s ease;
            color: #ffffff;
        }

        #cadastro:hover {
            background: #C69F00;
            color: #ffffff;
            transform: scale(1.1);
        }

        #sair:hover {
            background: #c30000;
            color: #ffffff;
            transform: scale(1.1);
        }
        
        #dados:hover {
            background: #1870d5;
            color: #ffffff;
            transform: scale(1.1);
        }

        #users:hover {
            background: #00FF80;
            color: #ffffff;
            transform: scale(1.1);
        }

        .btns {
            display: grid;
            gap: 4dvh;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            margin-bottom: 7dvh;
        }
    </style>

</head>
<body>

    <?php include_once "../components/header.php"?>

    <main>
        <h3>Seja Bem vindo <?php echo htmlspecialchars($nome_usuario); ?>!</h3>
        <div class="btns">
            <a href="../php/cadproduto.php" id="cadastro">Cadastrar Produto</a>
            <a href="../php/cadmarca.php" id="cadastro">Cadastrar Marca</a>
            <a href="../php/cadclientes.php" id="cadastro">Cadastrar Clientes</a>
            <a href="../php/produto-vd.php" id="cadastro">Vender Produto</a>
            <a href="../php/comprar-produto.php" id="cadastro">Comprar Produto</a>
            <a href="../dados/fornecedores.php" id="users">Ver Fornecedores</a>
            <a href="../dados/clientes.php" id="users">Ver Clientes</a>
            <a href="../dados/usuarios.php" id="users">Ver Usuarios</a>
            <a href="../dados/todosprodutos.php" id="dados">Ver Produtos</a>
            <a href="../dados/todasmarcas.php" id="dados">Ver Marcas</a>
            <a href="../dados/vendas.php" id="dados">Ver Vendas</a>
            <a href="../dados/compras.php" id="dados">Ver Compras</a>
            <a href="../php/logout.php" id="sair">Sair</a>
        </div>

        <div class="voltar">
            <a href="./index.php" id="sair">Voltar para a pagina Incial</a>
        </div>
    </main>

</body>
</html>