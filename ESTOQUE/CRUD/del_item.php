<!DOCTYPE html>
<html lang="en">
<head>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>
<body>
     
</body>
</html>

<?php
require("../protected.php");
require("../conn.php");

// Verifica se a senha foi enviada via POST
if (isset($_POST['senha'])) {
    // Obtém o ID do item a ser excluído e a senha informada
    $itemID = $_POST['item'];
    $senha = $_POST['senha'];

    // Verifica se a senha informada é a senha correta
    if ($senha === $senha) {
        // Obtém o item da tabela de itens_tb com base no ID
        $item = $pdo->prepare("SELECT * FROM itens_tb WHERE id_item = :itemID");
        $item->bindParam(':itemID', $itemID, PDO::PARAM_INT);
        $item->execute();
        $rowItem = $item->fetch();

        // Verifica se o item existe
        if ($rowItem) {
            // Exclui o item do banco de dados
            $excluir = $pdo->prepare("DELETE FROM itens_tb WHERE id_item = :itemID");
            $excluir->bindParam(':itemID', $itemID, PDO::PARAM_INT);
            $excluir->execute();

            // Redireciona de volta para a página anterior
            echo "<script>
                    Swal.fire({
                         icon: 'success',
                         title: 'Exclusão de Item',
                         text: 'Item excluído com sucesso!',
                         confirmButtonText: 'OK',
                         onClose: function() {
                              window.location.href = '../tabela.php';
                         }
                    }).then(function() {
                         window.location.href = '../tabela.php';
                    });
            </script>";
        } else {
            // Item não encontrado, exibe mensagem de erro
            echo "<script>alert('Item não encontrado. A exclusão não foi realizada.');</script>";
            echo "<script>window.location.href = '../menu.php';</script>";
        }
    } else {
        // Senha incorreta, exibe mensagem de erro
        echo "<script>alert('Senha incorreta. A exclusão não foi realizada.');</script>";
        echo "<script>window.location.href = '../tabela.php';</script>";
    }
} else {
    // Redireciona de volta para a página anterior caso não tenha sido enviada uma senha
    header("Location: ../tabela.php");
}
?>
