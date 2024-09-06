<?php
session_start();
ini_set("display_errors", 1);

require_once "../controllers/clientes/crudClientes.php";
require_once "../controllers/users/crudUsuario.php";

if(isset($_POST["clientes"])){
    $admID = findIdByNameUsuario($admID)["admID"];

    $IDSuap_cliente = $_POST["IDSuap_cliente"] ?? "não informado";
    $nome = $_POST["nome"] ?? "não informado";
    $email = $_POST["email"] ?? "não informado";
    $senha = $_POST["senha"] ?? "não informado";
    $telefone = $_POST["telefone"] ?? "não informado";
    $cpf = $_POST["cpf"] ?? "não informado";

    $sqlcombanco = $conexao->prepare($sql);

    if($sqlcombanco->execute()){
        echo "<script type='text/javascript'>
                   confirm('Cliente cadastrado com sucesso!');
                  window.location='../php/index.php';
              </script>";
    }

    try {
        $reponse = insertClientes($admID, $IDSuap_cliente, $nome, $cpf, $senha, $email, $telefone);
    } catch (PDOException $e) {
        echo "<script> window.alert('Erro ao cadastrar: '" . $e->getMessage() . ")</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadclientes.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="shortcut icon" href="../img/img2/iconshop1.png" type="image/x-icon">
    <title>Cadastro ESE</title>

</head>

<body>
    <header>
        <div class="header-cad">
            <h2>Cadatre seu clientes por Aqui, </h2>
            <p>Insira os dados no campo Abaixo </p><br><br>
        </div>
    </header>

<div class="imgback">
<img src="../img/img2/back-cadastro-roxo.png" alt="">
    <main>
        <div class="cadastro">

            <div class="part1">
            <form action="../controllers/clientes/crudClientes.php" method="post">
                <label for="admID"><p>Usuário ADM</p></label>
                    <select id="admID" name="admID">
                        <?php 
                        $data = findAllUsuarios();
                        foreach ($data as $usuario) {?>
                            <option value="<?= $usuario["nome"]?>"><?= $usuario["nome"]?></option>
                        <?php }?>

                    </select><br>
            </div>

            <div class="part2">
                    <label for="IDSuap_cliente"><p>ID Suap</p></label>
                    <input type="text" name="IDSuap_cliente" id="IDSuap_cliente" required>

                    <label for="nome"><p>Nome</p></label>
                    <input type="text" name="nome" id="nome" required>

                    <label for="email"><p>Email</p></label>
                    <input type="email" name="email" id="email" required>

                    <label for="senha"><p>Senha</p></label>
                    <input type="password" name="senha" id="senha" required>

                    <label for="telefone"><p>Telefone</p></label>
                    <input type="tel" name="telefone" id="telefone">

                    <label for="cpf"><p>CPF</p></label>
                    <input type="text" name="cpf" id="cpf"><br>

                    <input id="enviar" type="submit" value="Cadastrar" name="cadastrar">
            </div>

            

            </form>
        </div>
    </main>
</div>
    <footer>
        <div class="cad-enviar">
            <a href="index.php">Voltar para a pagina Incial</a>
        </div>
    </footer>
</body>
</html>