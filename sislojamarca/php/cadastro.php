<?php

require_once "../controllers/users/crudUsuario.php";

if(isset($_POST["cadastrar"])){
    $IDSuap = $_POST["IDSuap"] ?? "não informado";
    $nome = $_POST["nome"] ?? "não informado";
    $email = $_POST["email"] ?? "não informado";
    $senha = $_POST["senha"] ?? "não informado";
    $telefone = $_POST["telefone"] ?? "não informado";
    $cpf = $_POST["cpf"] ?? "não informado";

    $sql = "INSERT INTO usuario VALUES (:IDSuap, :nome, :email, :senha, :telefone, :cpf)";
    //Verificando Usuario
    $stm = $conn->prepare($sql);

    $stm->bindParam(':IDSuap', $IDSuap, PDO::PARAM_STR);
    $stm->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stm->bindParam(':email', $email, PDO::PARAM_STR);
    $stm->bindParam(':senha', $senha, PDO::PARAM_STR);
    $stm->bindParam(':telefone', $telefone, PDO::PARAM_STR);
    $stm->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $stm->execute();

    if ($stm->execute()) {
        $_SESSION['message'] = "O usuario $IDSuap foi registrado.";
        header("Location: ../entrar.php");
        exit();
    } else {
        $_SESSION['message'] = "Não foi possível registrar o usuario.";
        header("Location: ../entrar.php");
        exit();
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
    <title>Cadastro ESE</title>

</head>

<body>
    <header>
        <div class="header-cad">
            <h2>CADASTRE AGORA!!</h2>
            <p>Para iniciar sua Conta, Insira seus Dados Abaixo </p><br><br>
        </div>
    </header>

    <main>
<div class="imgback"> 
    <img src="../img/img2/back-cadastro-roxo.png" alt="">
        <div class="cadastro">

            <div class="part1">
                <form action="" method="post">
                    
                    <label for="IDSuap">
                        <p>ID Suap</p>
                    </label>
                    <input type="text" name="IDSuap" id="IDSuap" required>

                    <label for="nome">
                        <p>Nome</p>
                    </label>
                    <input type="text" name="nome" id="nome" required>

                    <label for="email">
                        <p>Email</p>
                    </label>
                    <input type="email" name="email" id="email" required>
            </div>

            <div class="part2">
                <label for="senha">
                    <p>Senha</p>
                </label>
                <input type="password" name="senha" id="senha" required>

                <label for="telefone">
                    <p>Telefone</p>
                </label>
                <input type="tel" name="telefone" id="telefone">

                <label for="cpf">
                    <p>CPF</p>
                </label>
                <input type="text" name="cpf" id="cpf">

            </div>

            <input type="submit" value="Cadastrar" name="cadastrar"><br>

            </form>
        </div>
</div>        
    </main>

    <footer>
        <div class="cad-enviar">
            <a href="index.php">Voltar para a pagina Incial</a>
        </div>
    </footer>
</body>

</html>