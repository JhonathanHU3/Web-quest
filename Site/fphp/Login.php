<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email1'];
    $senha = $_POST['senha1'];

    include_once("connections/config.php");

    $verificar = "SELECT email, senha, nome FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($verificar);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['nome'] = $row['nome'];
        header("Location: ..intro.php");
        exit(); 
    } else {
        echo "Conta ou senha incorretos! <a href='Login.html'>Voltar</a>";
    }
}
?>

