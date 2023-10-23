<?php

include_once(__DIR__ . "/../connections/config.php");

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Recebe os dados do questionário via POST
$data = json_decode(file_get_contents('php://input'), true);

// Proteção contra SQL Injection (opcional, mas altamente recomendado)
$totalCorrect = $conexao->real_escape_string($data['totalCorrect']);
$totalQuestions = $conexao->real_escape_string($data['totalQuestions']);
$tempo = $conexao->real_escape_string($data['tempo']);

// Recupera o ID do usuário da sessão (assumindo que você está usando sessões)
session_start();

$usuario_id = $_SESSION['usuario_id'];

// Insere os dados no banco de dados
$query = "INSERT INTO questionarios (usuario_id, total, tempo, data_conclusao) VALUES ('$usuario_id', '$totalCorrect', '$tempo', NOW())";

if ($conexao->query($query) === TRUE) {
    echo json_encode(array('status' => 'success', 'message' => 'Resultados salvos com sucesso!'));
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Erro ao salvar resultados: ' . $conexao->error));
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>