<?php
session_start();


if (!isset($_SESSION['nome'])) {
    header('Location: /fphp/Login.html');
    exit;
}
?>
