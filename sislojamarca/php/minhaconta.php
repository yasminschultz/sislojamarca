<?php
require_once '../database/conexao.php';

require_once "../controllers/users/crudUsuario.php";

$sql = "SELECT * FROM usuario ORDER BY IDSuap DESC";
$stm = $conn->prepare($sql);
$stm->execute();
$usuarios = $stm->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/minhaconta.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="shortcut icon" href="../img/img2/iconshop1.png" type="image/x-icon">
    <title>ESE Shop</title>

</head>
<body>

    <?php include_once "../components/header.php"?>

    <main>
        <div class="main1">
            <h2>minhaconta.php </h2>
               
        </div> 
    </main>

    <main>
        <div class="usuario">
            <div class="imguser">
                <img class="user" src="../img/user.png" style="height: 150px"></a>
            </div>

            <div class="dadosuser">
            <?php foreach ($usuarios as $row) { ?>
        <div class="part1">
            
                <p>ID Usuario: </p>
                <?php echo $row ['IDSuap'] ??'';?><br><br>
                <p>Email: </p>
                <?php echo $row ['email'] ??'';?><br><br>
                <p>Telefone: </p>
                <?php echo $row ['telefone'] ??'';?><br><br>
        </div>
        <div class="part2">
                <p>Nome: </p>
                <?php echo $row ['nome'] ??'';?><br><br>
                <p>Senha: </p>
                <?php echo $row ['senha'] ??'';?> <br><br>
                <p>CPF: </p>
                <?php echo $row ['cpf'] ??'';?><br><br>
        </div>
                
            <?php } ?>
            </div>
        </div>
        
        <div class="sair">
            <br><p><a href="logout.php">Sair da Conta</a></p>  
        </div>
        
        <div class="MaisCadastros">
            <div class="altusuario">
                <br><br><p><a href="../dados/usuarios.php">Alterar Usuario</a></p>
            </div>

            <div class="delusuario">
                <br><br><p><a href="../dados/usuarios.php">Excluir Usuario</a></p>
            </div>

        </div>

        
        

    </main>
    
</body>
</html>