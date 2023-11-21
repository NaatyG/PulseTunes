<?php
include('conection_bd.php');

$email = $mysqli->real_escape_string($_POST['email']);
$senha = $mysqli->real_escape_string($_POST['senha']);

// Verifica se o usuário existe
$sql_code = "SELECT * FROM users WHERE email = ?";
$stmt = $mysqli->prepare($sql_code);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>alert('Usuário não cadastrado.')</script>";
} else {
    // Hash da nova senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Atualiza a senha no banco de dados
    $sql_code = "UPDATE users SET senha = ? WHERE email = ?";
    $stmt = $mysqli->prepare($sql_code);
    $stmt->bind_param('ss', $senha_hash, $email);

    if ($stmt->execute()) {
        echo "<script>
                alert('Senha redefinida com sucesso.');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>alert('Falha ao redefinir senha.')</script>";
    }
}
