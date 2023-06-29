<?php
    require('../conn.php');

    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
   
    if(empty($email) || empty($nome) || empty($categoria) || empty($login) || empty($senha)){
        echo "Os valores não podem ser vazios";
    }else{
        $cad_usuario = $pdo->prepare("INSERT INTO usuarios(email, nome, categoria, login, senha) 
        VALUES(:email, :nome, :categoria, :login, :senha)");
        $cad_usuario->execute(array(
            ':email'=> $email,
            ':nome'=> $nome,
            ':categoria' => $categoria,
            ':login'=> $login,
            ':senha'=> $senha
        ));

        echo "<script>
        alert('Usuario Cadastrado com sucesso!')
        window.location.href='../login.php';;
        </script>";
    }
?>