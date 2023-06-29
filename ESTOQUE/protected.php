<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die('Você não pode acessar esta página porque não está logado.<p><a href="login.php">Entrar</a></p>');
}

$senha = $_SESSION['senha'];
// Verifica a categoria do usuário
$categoria = $_SESSION['categoria'];

// Verifica a categoria e permite ou nega o acesso a funcionalidades
if ($categoria == 'ADMIN') {
    $tipoUsuario = 'ADMIN';
    // Funcionalidades permitidas para o ADMIN
    // Coloque o código desejado para o ADMIN aqui
} elseif ($categoria == 'FUNCIONARIO') {
    $tipoUsuario = 'FUNCIONARIO';
    // Funcionalidades permitidas para o FUNCIONARIO
    // Coloque o código desejado para o FUNCIONARIO aqui
} elseif ($categoria == 'INSPETOR') {
    $tipoUsuario = 'INSPETOR';
    // Funcionalidades permitidas para o INSPETOR
    // Coloque o código desejado para o INSPETOR aqui
} else {
    die('Categoria de usuário inválida.');
}
?>