<?php

if (isset($_POST['submit'])){

$email = $_POST['email1'];
$senha = $_POST['senha1'];

include_once("connections/config.php");
$verificar = "SELECT email FROM usuarios WHERE email = '$email'";

$sql = $conexao->query($verificar);

if (mysqli_num_rows($sql) > 0){
    header("Location: home.php");
} else {
    
    echo("Essa conta não existe! Cadastre-se <a href='Login.html'>Voltar</a>");
    
}
}

?>