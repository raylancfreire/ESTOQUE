<?php
    require("protected.php");
    require("conn.php");

    $tabela = $pdo->prepare("SELECT id, login, senha 
    FROM usuarios;");
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
        <title>Cadastro de Itens</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/table.css">
    </head>
    <body>
        <div class="container">
            <br><br>
            <h1 style="text-align:center;">REGISTRAR ENTRADA DE ITEM</h1>
            <br>
            <form action="" method="post" id="formulario">
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Nome do Item: </label>
                        <input type="text" name="nome_item" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Quantidade: </label>
                        <input type="number" name="qtd_item" id="" class="form-control" min="1" required>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="cat_item">Categoria do Item:</label>
                        <select name="cat_item" id="cat_item" class="form-control">
                            <option value="Uso Único">Uso Único</option>
                            <option value="Patrimônio">Patrimônio</option>
                        </select>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Local de Armazenamento: </label>
                        <input type="text" name="local_item" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Status (já preenchido): </label>
                        <input type="text" name="status_item" id="" class="form-control" value="DISPONÍVEL"onkeydown="return false;">
                    </div>
                </div>
                <br>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-success" value="CADASTRAR ITEM">
                        <a href="tabela.php" type="button" class="btn btn-primary float-end">ESTOQUE</a>
                    </div>
                </div>
            </form>
            <div id="resultado"></div>
        </div>
        <script
        src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script>
            $("#formulario").submit(function(){
                event.preventDefault();
                var dados =  $(this).serialize();
                $.ajax({
                    type:'POST',
                    url:'CRUD/cad_item.php',
                    data: dados,
                    success: function(data){
                        $("#resultado").html(data);
                    }
                });
            });
        </script>
    </body>
</html>