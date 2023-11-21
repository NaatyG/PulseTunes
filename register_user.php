<?php
session_start();

include('conection_bd.php');

// Protege contra SQL Injection
$email = $mysqli->real_escape_string($_POST['email']);
$senha = $mysqli->real_escape_string($_POST['senha']);

// Verifica se a senha atende aos critérios
if (strlen($senha) < 6 || !preg_match('/[^a-zA-Z0-9]/', $senha)) {
    header('Location: signup.html?error=senha');
    exit;
}

// Verifica se o usuário existe
$sql_code = "SELECT * FROM users WHERE email = ?";
$stmt = $mysqli->prepare($sql_code);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

// Se o usuário existir, exibe mensagem de erro
if ($result->num_rows > 0) {
    echo "<script>alert('Usuário já cadastrado.')</script>";
} else {
    // Hash da senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Insere o novo usuário
    $sql_code = "INSERT INTO users (email, senha) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql_code);
    $stmt->bind_param('ss', $email, $senha_hash);

    // Se o usuário for inserido com sucesso, redirecione para a página de dashboard
    if ($stmt->execute()) {
        $_SESSION['id'] = $mysqli->insert_id;
        header('Location: dashboard.php');
        exit;
    } else {
        echo "<script>alert('Falha ao cadastrar usuário.')</script>";
    }
}
