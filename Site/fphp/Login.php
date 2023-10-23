<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email1'];
    $senha = $_POST['senha1'];

    // Inclua o arquivo de configuração com a conexão PDO
    $options = array(
        PDO::MYSQL_ATTR_SSL_CA => '../connections/DigiCertGlobalRootCA.crt.pem'
    );
    $conexao = new PDO('mysql:host=api-webquest-teste01-server2.mysql.database.azure.com;port=3306;dbname=bdapi', 'qrlvyvqjpp', '114810AOWJI2F2F1$', $options);
    
    // Verifique se a conexão foi bem-sucedida
    if (!$conexao) {
        die("Erro na conexão: " . print_r($conexao->errorInfo(), true));
    }

    // Consulta SQL parametrizada
    $verificar = "SELECT usuario_id, nome, email, senha FROM usuarios WHERE email = :email AND senha = :senha";

    // Preparar a consulta
    $stmt = $conexao->prepare($verificar);

    // Bind dos parâmetros
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    // Executar a consulta
    if ($stmt->execute()) {
        // Buscar resultados
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $_SESSION['usuario_id'] = $row['usuario_id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
            header("Location: ../intro.php");
            exit();
        } else {
            echo "Conta ou senha incorretos! <a href='../Login.html'>Voltar</a>";
    }
}
}
?>

