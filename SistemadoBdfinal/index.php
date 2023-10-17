
<?php

if (isset($_POST['submit'])){


$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];


include_once("config.php");
$select = mysqli_query($conexao, "SELECT * FROM usuario");
if (mysqli_num_rows($select)>0){
    echo "Essa conta já existe!";
} else{
$inserir = mysqli_query($conexao, "INSERT INTO usuario (nome, email, senha) VALUES ( '$nome', '$email', '$senha')");
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
<body class="body1">
    <h2>Cadastro</h2>
    <form action="index.php" method="POST" name="cadastro1" class="cadastro1">
        <label for="email">Email</label>
        <input type="email" name="email" class="email">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class= "nome">
        <label for="senha">Senha</label>
        <input type="password" name="senha" class="senha"> 
        <br><br>
        <input type="submit" name="submit" class="submit">
        
        <p class="notaccont">Já possui uma conta? Faça login <a href="login.php">aqui</a></p>
    </form>
</body>
</html>
