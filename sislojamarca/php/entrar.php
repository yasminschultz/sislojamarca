<?php 
require_once '../database/conexao.php';

require_once "../controllers/users/crudUsuario.php";

if(isset($_POST["entrar"])){
    $IDSuap = $_POST["IDSuap"];
    $senha = $_POST["senha"];
        
    $reponse = login($IDSuap);
    echo $senha ."Está Incorreta";

    if($reponse["IDSuap"]){
        if($reponse["senha"] == $senha){ // Comparação direta
            session_start();
            $_SESSION["id"] = $reponse["IDSuap"];
            header("Location: ./index.php");
        } else {
            echo "<script>alert('Senha Incorreta!')</script>";
        }
    } else {
        echo "<script>alert('Usuário não encontrado!')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/entrar.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="shortcut icon" href="../img/img2/iconshop1.png" type="image/x-icon">
    <title>Entrar ESE</title>

</head>

<body>

    <header>
        <h2>Entre na sua Conta</h2>
        <p>Bem Vindo de Volta!! Insira seus dados:</p>
    </header>

    <main>
        <form action="" method="post">

            <label for="IDSuap">ID Suap</label>
            <input type="text" name="IDSuap" id="IDSuap">

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">

            <input type="submit" value="Entrar" name="entrar">

        </form>

        <div class="cadastro">
            <p>Você não tem uma conta? <br>
            <a href="cadastro.php">Cadastre sua conta Aqui</a> </p>
        </div>
    </main>

    <footer>
        <div class="cad-enviar">
            <a href="index.php">Voltar para a pagina Incial</a>
        </div>
    </footer>
</body>

</html>