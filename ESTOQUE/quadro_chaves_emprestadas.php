<?php
    require("protected.php");
    require("conn.php");

    $tabela = $pdo->prepare("SELECT id_chave, numero_chave, sala_chave, solicitador_chave, contato_solicitador_chave, data_solicitacao_chave
    FROM chaves WHERE status_chave like 'EMPRESTADA';");
    $tabela->execute();
    $rowTabela = $tabela->fetchAll();
    
    if (empty($rowTabela)){
        echo "<script>
        alert('Quadro de chaves vazio!!!');
        </script>";
    }

?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>QUADRO DE CHAVES</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/table.css">
    </head>
    <body>
        <div class="container">
            <br><br>
            <h1 style="text-align:center;">QUADRO DE CHAVES EMPRESTADAS</h1>
            <?php if($tipoUsuario === 'ADMIN') : ?>
                <a href="menu.php" class="btn btn-secondary btn-lg float-end">MENU</a>
                <?php elseif($tipoUsuario === 'FUNCIONARIO') : ?>
                    <a href="menu_funcionario.php" class="btn btn-secondary btn-lg float-end">MENU</a>
                    <?php elseif($tipoUsuario === 'INSPETOR') : ?>
                        <a href="menu_inspetor.php" class="btn btn-secondary btn-lg float-end">MENU</a>
                        <?php endif; ?>
            <br>
            <br>
            <br>   
        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID CHAVE</th>
            <th scope="col">NUMERO</th>
            <th scope="col">SALA</th>
            <th scope="col">SOLICITADOR</th>
            <th scope="col">CONTATO</th>
            <th scope="col">DATA E HORA</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($rowTabela as $linha){
                echo '<tr>';
                echo "<th scope='row'>".$linha['id_chave']."</th>";
                echo "<td>".$linha['numero_chave']."</td>";
                echo "<td>".$linha['sala_chave']."</td>";
                echo "<td>".$linha['solicitador_chave']."</td>";
                echo "<td>".$linha['contato_solicitador_chave']."</td>";
                echo "<td>".$linha['data_solicitacao_chave']."</td>";
                echo '<td><a href=devolucao_chave.php?chave='.$linha['id_chave'].' class="btn btn-success">DEVOLVER</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
        </table>
        <a href="quadro_chaves_disponiveis.php" class="btn btn-primary">CHAVES DISPONÍVEIS</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>