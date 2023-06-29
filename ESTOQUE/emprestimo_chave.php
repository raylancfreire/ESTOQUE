<?php
    require ("conn.php");
    require("protected.php");

    if (isset($_GET['chave'])){
        $chave = $_GET['chave'];
    }
    else{
        header("Location: quadro_chaves_emprestadas.php");
    }
    
    $tabela = $pdo->prepare("SELECT * FROM chaves WHERE id_chave=:chave;");
    $tabela->execute(array(':chave'=>$chave));
    $rowTable = $tabela->fetchAll();

?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>EMPRÉSTIMO</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/table.css">
    </head>
    <body>
        <div class="container">
            <br><br>
            <h1 style="text-align:center;">REALIZAR EMPRÉSTIMO</h1>
            <br>
            <form action="CRUD/emprestar_chave.php" method="post" id="formulario">
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Nome do Solicitador: </label>
                        <input type="text" name="solicitador_chave" id="" class="form-control" value=<?php echo $rowTable[0]['solicitador_chave']?>>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Contato do Solicitador: </label>
                        <input type="text" name="contato_solicitador_chave" id="" class="form-control" maxlength="11" value=<?php echo $rowTable[0]['contato_solicitador_chave']?>>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Status será alterado para "EMPRESTADA": </label>
                        <input type="text" name="status_chave" id="" class="form-control" value="EMPRESTADA" onkeydown="return false;">
                    </div>
                </div>
                <br>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <input type="submit" value="CONFIRMAR EMPRÉSTIMO" class="btn btn-success">
                        <a href="quadro_chaves_emprestadas.php" type="button" class="btn btn-primary float-end">CHAVES EMPRESTADAS</a>
                    </div>
                </div>
                <input type="hidden" name='id_chave' value=<?php echo $rowTable[0]['id_chave']?>>
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