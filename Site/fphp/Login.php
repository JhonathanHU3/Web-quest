<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email1'];
    $senha = $_POST['senha1'];

    include_once(__DIR__ . "/../connections/config.php");

    if (!$conexao) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    $verificar = "SELECT usuario_id, nome, email, senha FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($verificar);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $row['usuario_id'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['email'] = $row['email'];
        header("Location: ../intro.php");
        exit(); 
    } else {
        echo "Conta ou senha incorretos! <a href='../Login.html'>Voltar</a>";
    }
}
?>

