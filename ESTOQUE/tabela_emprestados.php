<?php
    require("conn.php");
    require("protected.php");

    $tabela = $pdo->prepare("SELECT id_item, nome_item, solicitador_item, cat_item, status_item, data_solicitacao_item
    FROM itens_tb WHERE cat_item not like 'uso-unico' and status_item like 'EMPRESTADO';");
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
        <title>EMPRÉSTIMOS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/table.css">
    </head>
    <body>
        <div class="container">
            <br><br>
            <h1 style="text-align:center;">EMPRÉSTIMOS</h1>
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
            <th scope="col">ID ITEM</th>
            <th scope="col">NOME</th>
            <th scope="col">SOLICITADOR</th>
            <th scope="col">CATEGORIA</th>
            <th scope="col">STATUS</th>
            <th scope="col">DATA E HORA SOLICITACAO</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($rowTabela as $linha){
                echo '<tr>';
                echo "<th scope='row'>".$linha['id_item']."</th>";
                echo "<td>".$linha['nome_item']."</td>";
                echo "<td>".$linha['solicitador_item']."</td>";
                echo "<td>".$linha['cat_item']."</td>";
                echo "<td>".$linha['status_item']."</td>";
                echo "<td>".$linha['data_solicitacao_item']."</td>";
                echo '<td><a href=realizar_devolucao.php?item='.$linha['id_item'].' class="btn btn-success">DEVOLVER</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
        </table>
        <a href="tabela_emprestimo.php" class="btn btn-primary">ITENS DISPONÍVEIS</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>

<?php
    require("protected.php");
    require("conn.php");

    $tabela = $pdo->prepare("SELECT id_item, nome_item, qtd_item, cat_item, local_item, status_item, data_item
    FROM itens_tb;");
    $tabela->execute();
    $rowTabela = $tabela->fetchAll();
    
    if (empty($rowTabela)){
        echo "<script>
        alert('Tabela vazia!!!');
        </script>";
    }

?>