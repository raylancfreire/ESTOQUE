<?php
    require("protected.php");
    require("conn.php");

    $tabela = $pdo->prepare("SELECT id_relatorio, id_item, nome_item, quantidade, retirante_item, contato_retirante_item, data_retirada_item
    FROM relatorios_tb;");
    $tabela->execute();
    $rowTabela = $tabela->fetchAll();
    
    if (empty($rowTabela)){
        echo "<script>
        alert('Tabela vazia!!!');
        </script>";
    }

?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>RELATÓRIOS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/table.css">
    </head>
    <body>
        <div class="container">
            <br>
            <br>
            <h1 style="text-align:center;">RELATÓRIOS</h1>
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
            <th scope="col">ID RELATÓRIO</th>
            <th scope="col">ID ITEM</th>
            <th scope="col">NOME DO ITEM</th>
            <th scope="col">QUANTIDADE RETIRADA</th>
            <th scope="col">NOME RETIRANTE</th>
            <th scope="col">CONTATO RETIRANTE</th>
            <th scope="col">DATA E HORA DE RETIRADA</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($rowTabela as $linha){
                echo '<tr>';
                echo "<th scope='row'>".$linha['id_relatorio']."</th>";
                echo "<td>".$linha['id_item']."</td>";
                echo "<td>".$linha['nome_item']."</td>";
                echo "<td>".$linha['quantidade']."</td>";
                echo "<td>".$linha['retirante_item']."</td>";
                echo "<td>".$linha['contato_retirante_item']."</td>";
                echo "<td>".$linha['data_retirada_item']."</td>";
                echo '</tr>';
            }
            ?>
        </tbody>
        </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>