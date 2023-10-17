<?php

if (isset($_POST['submit'])){
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

include_once("config.php");
$verificar = "SELECT email FROM usuario WHERE email = '$email'";
$sql = $conexao->query($verificar);
if (mysqli_num_rows($sql) > 0){
    header("Location: home.php");
} else {
    
    echo("Essa conta não existe! Cadastre-se");
    
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Login</title>
    <link rel="stylesheet" href="style.php">
</head>
<body class = "body1">
    <h2>Login</h2>
    <form action="login.php" method="POST" name="cadastro1" class="cadastro1">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="nome">
        <label for="email">Email</label>
        <input type="email" name="email" class="email">
        <label for="senha">Senha</label>
        <input type="password" name="senha" class="senha"> 
        
        <input type="submit" name="submit" class="submit">
        
        <p class="notaccont">Não possui uma conta? Cadastre-se <a href="index.php">aqui</a></p>
    </form>
</body>
</html>
