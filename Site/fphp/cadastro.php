<?php

if (isset($_POST['submit'])){


$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

include_once("connections/config.php");
$select = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '$email' ");
$selectsenha = mysqli_query($conexao, "SELECT * FROM usuarios WHERE senha = '$senha' ");
if (mysqli_num_rows($select)>0){
    echo "Essa conta já existe!";
} else{
    $inserir = mysqli_query($conexao, "INSERT INTO usuarios (nome, email, senha) VALUES ( '$nome', '$email', '$senha')");
    header("Location: ..Login.html");
}






}

?>