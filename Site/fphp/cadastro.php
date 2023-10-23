<?php

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    try {
        $options = array(
            PDO::MYSQL_ATTR_SSL_CA => '../connections/DigiCertGlobalRootCA.crt.pem'
        );
        $pdo = new PDO('mysql:host=api-webquest-teste01-server2.mysql.database.azure.com;port=3306;dbname=bdapi', 'qrlvyvqjpp', '114810AOWJI2F2F1$', $options);
        

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Essa conta já existe!";
        } else {
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            header("Location: ../Login.html");
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

?>