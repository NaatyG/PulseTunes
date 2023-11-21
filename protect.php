<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    $_SESSION['message'] = 'Acesso não permitido.';
    header('Location: login.php');
    exit;
}
