<?php
    require("conn.php");
    require("protected.php");

    $tabela = $pdo->prepare("SELECT id_item, nome_item, qtd_item, cat_item, local_item, status_item, data_item
    FROM itens_tb WHERE cat_item not like 'Uso Único' and status_item like 'DÍSPONÍVEL';");
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
            <?php if ($tipoUsuario === 'FUNCIONARIO') : ?>
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

                    foreach ($rowTabela as $linha) {
                        echo '<tr>';
                        echo "<th scope='row'>" . $linha['id_item'] . "</th>";
                        echo "<td>" . $linha['nome_item'] . "</td>";
                        echo "<td>" . $linha['qtd_item'] . "</td>";
                        echo "<td>" . $linha['cat_item'] . "</td>";
                        echo "<td>" . $linha['local_item'] . "</td>";
                        echo "<td>" . $linha['status_item'] . "</td>";
                        echo "<td>" . $linha['data_item'] . "</td>";
                        echo '<td><a href=realizar_emprestimo.php?item='.$linha['id_item'].' class="btn btn-warning">EMPRESTAR</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        <?php elseif ($tipoUsuario === 'ADMIN') : ?>
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
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($rowTabela as $linha) {
                        echo '<tr>';
                        echo "<th scope='row'>" . $linha['id_item'] . "</th>";
                        echo "<td>" . $linha['nome_item'] . "</td>";
                        echo "<td>" . $linha['qtd_item'] . "</td>";
                        echo "<td>" . $linha['cat_item'] . "</td>";
                        echo "<td>" . $linha['local_item'] . "</td>";
                        echo "<td>" . $linha['status_item'] . "</td>";
                        echo "<td>" . $linha['data_item'] . "</td>";
                        echo '<td><a href=realizar_emprestimo.php?item='.$linha['id_item'].' class="btn btn-warning">EMPRESTAR</a></td>';
                        echo '<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal' . $linha['id_item'] . '">Excluir</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="tabela_emprestados.php" class="btn btn-primary">ITENS EMPRESTADOS</a>
        </div>
        <!-- Modal -->
        <?php foreach ($rowTabela as $linha) : ?>
            <div class="modal fade" id="confirmModal<?php echo $linha['id_item']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalLabel">Confirmação de Exclusão</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <p>Para confirmar a exclusão, insira sua senha de ADMIN:</p>
                            <form method="post" action="CRUD/del_item.php">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                                </div>
                                <input type="hidden" name="item" value="<?php echo $linha['id_item']; ?>">
                                <button type="submit" class="btn btn-danger">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>



