<?php
session_start();

// Conecte-se ao banco de dados
include('conection_bd.php');

if (!isset($_SESSION['id'])) {
    // O usuário não está logado, redirecione-o para a página de login
    header("Location: login.php");
    exit;
}

// Prepare a consulta SQL
$query = $mysqli->prepare("DELETE FROM users WHERE id = ?");

// Vincule o parâmetro à consulta
$query->bind_param('i', $_SESSION['id']);

// Execute a consulta SQL
$query->execute();

// Encerre a sessão do usuário
session_destroy();

// Redirecione o usuário para a página principal
header("Location: index.html");
exit;
