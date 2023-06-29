<?php
require("conn.php");
require("protected.php");
?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>MENU</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/menu.css">
    </head>
    <body>
        <br>
        <br>
        <h1 style="text-align:center;">SISTEMA DE ESTOQUE</h1>
        <a href="logout.php" class="btn btn-secondary btn-lg float-end">LOGOUT</a>
        <br>
        <br>
        <br>
        <div class = container>
            <br>
        <div class="container1">
            <div class="elemento1">
                <a href= "tabela.php" class="botao1">ESTOQUE </a>
            </div>
            
            <div class="elemento2">
                <a href= "quadro_chaves_disponiveis.php" class="botao1">QUADRO CHAVES</a>
            </div>
        </div>
        <div class="container2">
            <div class="elemento3">
                <a href= "registrar_saida.php" class="botao1">REGISTRAR SAÍDA </a>
            </div>

            <div class="elemento4">
                <a href= "tabela_emprestimo.php" class="botao1">EMPRÉSTIMO </a>
            </div>
        </div>
            
        <div class="container3">
            <div class="elemento5">
                <a href= "index.php" class="botao1">REGIST. ENTRADA </a>
            </div>

            <div class="elemento6">
                <a href= "relatorios.php" class="botao1">RELATÓRIOS </a>
            </div>
        </div>
        </div>
        <script>
    </body>
</html>