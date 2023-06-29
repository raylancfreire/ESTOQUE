<?php
require("protected.php");
require("conn.php");

$tabela = $pdo->prepare("SELECT id_item, nome_item, qtd_item, cat_item, local_item, status_item, data_item FROM itens_tb WHERE cat_item like 'Uso Único';");
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
    <title>ESTOQUE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/table.css">
</head>
<body>
    <div class="container">
        <br>
        <br>
        <h1 style="text-align:center;">ESTOQUE</h1>
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
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">LOCAL</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">DATA E HORA</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rowTabela as $linha){
                    echo '<tr>';
                    echo "<th scope='row'>".$linha['id_item']."</th>";
                    echo "<td>".$linha['nome_item']."</td>";
                    echo "<td>".$linha['qtd_item']."</td>";
                    echo "<td>".$linha['cat_item']."</td>";
                    echo "<td>".$linha['local_item']."</td>";
                    echo "<td>".$linha['status_item']."</td>";
                    echo "<td>".$linha['data_item']."</td>";
                    echo '<td><a href="editar_item.php?id='.$linha['id_item'].'" class="btn btn-danger edit-link">REGISTRAR SAÍDA</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">CADASTRAR ITEM</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
