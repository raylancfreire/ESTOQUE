<?php
include("conn.php");
$login = $_POST['login'];
$senha = $_POST['senha'];

$usuarios = $pdo->prepare('SELECT * FROM usuarios WHERE login=:login AND senha=:senha');
$usuarios->execute(array(':login' => $login, ':senha' => $senha));

$rowTabela = $usuarios->fetchAll();

if (empty($rowTabela)) {
    echo "<script>
        alert('Usuário e/ou senha inválidos!');
        window.location.href='login.php';
        </script>";
} else {
    $sessao = $rowTabela[0];

    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['id'] = $sessao['id'];
    $_SESSION['login'] = $sessao['login'];
    $_SESSION['senha'] = $sessao['senha'];
    $_SESSION['categoria'] = $sessao['categoria']; // Armazena a categoria na sessão
    
    $senha = $sessao['senha'];
    $categoria = $sessao['categoria'];

    // Redireciona com base na categoria do usuário
    switch ($categoria) {
        case 'ADMIN':
            header("Location: menu.php");
            break;
        case 'FUNCIONARIO':
            header("Location: menu_funcionario.php");
            break;
        case 'INSPETOR':
            header("Location: menu_inspetor.php");
            break;
        default:
            echo "Categoria de usuário inválida.";
            break;
    }
}
?>
