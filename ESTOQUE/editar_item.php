<?php
require("protected.php");
require("conn.php");

// Verifica se o ID do item foi passado como parâmetro
if (!isset($_GET['id'])) {
    echo "ID do item não especificado.";
    exit;
}

$idItem = $_GET['id'];

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se a quantidade foi informada
    if (!isset($_POST['quantidade'])) {
        echo "Quantidade não informada.";
        exit;
    }

    $quantidade = $_POST['quantidade'];

    // Busca as informações do item no banco de dados
    $stmt = $pdo->prepare("SELECT * FROM itens_tb WHERE id_item = :id");
    $stmt->bindParam(':id', $idItem);
    $stmt->execute();
    $item = $stmt->fetch();

    if (!$item) {
        echo "Item não encontrado.";
        exit;
    }

    $quantidadeAtual = $item['qtd_item'];
    $nomeItem = $item['nome_item'] ?? '';

    // Verifica se a quantidade informada é menor ou igual à quantidade atual
    if ($quantidade <= $quantidadeAtual) {
        // Atualiza a quantidade do item no banco de dados
        $novaQuantidade = $quantidadeAtual - $quantidade;

        if ($novaQuantidade === 0) {
            // Exclui o item do banco de dados
            $stmt = $pdo->prepare("DELETE FROM itens_tb WHERE id_item = :id");
            $stmt->bindParam(':id', $idItem);
            $stmt->execute();

            // Redireciona de volta para a página principal ou exibe uma mensagem de sucesso
            
            echo "<script>
                alert('A quantidade máxima foi retirada!')
                window.location.href='tabela.php';
            </script>";
        } else {
            // Atualiza a quantidade do item no banco de dados
            $stmt = $pdo->prepare("UPDATE itens_tb SET qtd_item = :quantidade WHERE id_item = :id");
            $stmt->bindParam(':quantidade', $novaQuantidade);
            $stmt->bindParam(':id', $idItem);
            $stmt->execute();

            // Insere os dados na tabela relatorios_tb
            $stmt = $pdo->prepare("INSERT INTO relatorios_tb (id_item, nome_item, quantidade, retirante_item, contato_retirante_item, data_retirada_item) 
                                  VALUES (:id_item, :nome_item, :quantidade, :retirante_item, :contato_retirante_item, CURRENT_TIMESTAMP)");
            $stmt->bindParam(':id_item', $idItem);
            $stmt->bindParam(':nome_item', $nomeItem);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':retirante_item', $_POST['retirante_item']);
            $stmt->bindParam(':contato_retirante_item', $_POST['contato_retirante_item']);
            $stmt->execute();

            // Exibe uma mensagem de sucesso
            echo "<script>
                alert('Registro de saída feito com sucesso!')
                window.location.href='registrar_saida.php';
            </script>";


            // Exibe uma mensagem de sucesso
            echo "<script>
                alert('Registro de saida feito com sucesso!')
                window.location.href='registrar_saida.php';
            </script>";
        }
    } else {
        echo "A quantidade informada é maior do que a quantidade atual do item.";
    }
}

// Busca as informações do item no banco de dados
$stmt = $pdo->prepare("SELECT * FROM itens_tb WHERE id_item = :id");
$stmt->bindParam(':id', $idItem);
$stmt->execute();
$item = $stmt->fetch();

if (!$item) {
    echo "Item não encontrado.";
    exit;
}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>REGISTRAR SAÍDA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/table.css">
</head>
<body>
    <div class="container">
        <br><br>
        <h1 style="text-align:center;">Registrar saída</h1>
        <br>
        <form action="" method="post">
            <div class = "container">
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="nome_item">Nome do Item:</label>
                        <input type="text" class="form-control" id="nome_item" name="nome_item" value="<?= $item['nome_item'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="qtd_item">Quantidade Disponível:</label>
                        <input type="text" class="form-control" id="qtd_item" name="qtd_item" value="<?= $item['qtd_item'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="qtd_item">Quantidade a sair:</label>
                        <input type="number" class="form-control" id="qtd_item" name="quantidade" min="1" max="<?= $item['qtd_item'] ?>" required>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Nome do Retirante: </label>
                        <input type="text" name="retirante_item" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Contato do Retirante: </label>
                        <input type="text" name="contato_retirante_item" id="" class="form-control" maxlength="11" required>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <label for="">Data: </label>
                        <input type="date" name="data_retirada_item" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-8">
                        <br>
                        <button a href="registrar_saida.php" type="submit" class="btn btn-primary">CONFIRMAR SAÍDA</button>
                        <br><br><br><br><br>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
