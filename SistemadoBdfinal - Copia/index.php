
<?php

if (isset($_POST['submit'])){


$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$CEP = $_POST['CEP'];
$CPF = $_POST['CPF'];
$CP = $_POST['CP'];
$telefone = $_POST['telefone'];
include_once("config.php");
$select = mysqli_query($conexao, "SELECT * FROM usuario");
if (mysqli_num_rows($select)>0){
    echo "Essa conta já existe!";
} else{
$inserir = mysqli_query($conexao, "INSERT INTO usuario (nome, email, cep, senha, cpf, categoria_primaria, numero) VALUES ( '$nome', '$email', '$CEP', '$senha', '$CPF', '$CP', '$telefone')");
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
        <label for="CEP">CEP</label>
        <input type="text" name="CEP" class="CEP">
        <label for="CPF">CPF</label>
        <input type="text" name="CPF" class="CPF">
        <label for="CP">Categoria preferida</label>
        <input type="text" name="CP" class="CP"> 
        <label for="telefone">Telefone</label>
        <input type="number" name="telefone" class="telefone">  
        <br><br>
        <input type="submit" name="submit" class="submit">
        
        <p class="notaccont">Já possui uma conta? Faça login <a href="login.php">aqui</a></p>
    </form>
</body>
</html>
