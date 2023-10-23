<?php
try {
    $options = array(
        PDO::MYSQL_ATTR_SSL_CA => '../connections/DigiCertGlobalRootCA.crt.pem'
    );
    $conexao = new PDO('mysql:host=api-webquest-teste01-server2.mysql.database.azure.com;port=3306;dbname=bdapi', 'qrlvyvqjpp', '114810AOWJI2F2F1$', $options);

} catch (PDOException $e) {
    die("Conexão falhou: " . $e->getMessage());
}

// Recebe os dados do questionário via POST
$data = json_decode(file_get_contents('php://input'), true);

// Proteção contra SQL Injection (opcional, mas altamente recomendado)
$totalCorrect = $data['totalCorrect'];
$totalQuestions = $data['totalQuestions'];
$tempo = $data['tempo'];

// Recupera o ID do usuário da sessão (assumindo que você está usando sessões)
session_start();

$usuario_id = $_SESSION['usuario_id'];

// Insere os dados no banco de dados usando declarações preparadas
$query = "INSERT INTO questionarios (usuario_id, total, tempo, data_conclusao) VALUES (:usuario_id, :totalCorrect, :tempo, NOW())";

try {
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
    $stmt->bindParam(':totalCorrect', $totalCorrect, PDO::PARAM_INT);
    $stmt->bindParam(':tempo', $tempo, PDO::PARAM_STR);
    $stmt->execute();

    echo json_encode(array('status' => 'success', 'message' => 'Resultados salvos com sucesso!'));
} catch (PDOException $e) {
    echo json_encode(array('status' => 'error', 'message' => 'Erro ao salvar resultados: ' . $e->getMessage()));
}

// Fecha a conexão com o banco de dados
$conexao = null; // ou $stmt = null; se preferir
?>