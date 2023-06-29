<?php
    require ("conn.php");
    require("protected.php");

    if (isset($_GET['item'])){
        $item = $_GET['item'];
    }
    else{
        header("Location: emprestimo.php");
    }
    
    $tabela = $pdo->prepare("SELECT * FROM itens_tb WHERE id_item=:item;");
    $tabela->execute(array(':item'=>$item));
    $rowTable = $tabela->fetchAll();

?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>DEVOLUÇÃO</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/table.css">
    </head>
    <body>
        <div class="container">
            <br><br>
            <h1 style="text-align:center;">REALIZAR DEVOLUÇÃO</h1>
            <br>
            <form action="CRUD/devolver.php" method="post" id="formulario">
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Nome do Item: </label>
                        <input type="text" name="nome_item" id="" class="form-control" value=<?php echo $rowTable[0]['nome_item']?> onkeydown="return false;">
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Quantidade disponível: </label>
                        <input type="text" name="qtd_item" id="" class="form-control" value=<?php echo $rowTable[0]['qtd_item']?> onkeydown="return false;">
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Categoria do Item: </label>
                        <input type="text" name="cat_item" id="" class="form-control" value=<?php echo $rowTable[0]['cat_item']?> onkeydown="return false;">
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Local Armazenado: </label>
                        <input type="text" name="local_item" id="" class="form-control" value=<?php echo $rowTable[0]['local_item']?> onkeydown="return false;">
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Status será alterado para "Disponível": </label>
                        <input type="text" name="status_item" id="" class="form-control" value="DISPONÍVEL" onkeydown="return false;">
                    </div>
                </div>
                <br>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <input type="submit" value="CONFIRMAR DEVOLUÇÃO" class="btn btn-success">
                        <a href="tabela_emprestimo.php" type="button" class="btn btn-primary float-end">ESTOQUE</a>
                    </div>
                </div>
                <input type="hidden" name='id_item' value=<?php echo $rowTable[0]['id_item']?>>
            </form>
            <div id="resultado"></div>
        </div>
        <script
        src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>