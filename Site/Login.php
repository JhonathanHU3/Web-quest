<?php

if (isset($_POST['submit'])){

$email = $_POST['email1'];
$senha = $_POST['senha1'];

include_once("connections/config.php");
$verificar = "SELECT email FROM usuarios WHERE email = '$email'";
$verifysenha = "SELECT senha FROM usuarios WHERE senha = '$senha'";
$sql = $conexao->query($verificar);
$sqlsenha = $conexao->query($verifysenha);
if ((mysqli_num_rows($sql)) > 0 and (mysqli_num_rows($sqlsenha)) > 0 ){
    header("Location: intro.html");
} else {
    
    echo("Conta ou senha incorretos! <a href='Login.html'>Voltar</a>");
    
}
}

?>