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
    $chaveID = $_POST['chave'];
    $senha = $_POST['senha'];

    // Verifica se a senha informada é a senha correta
    if ($senha === $senha) {
        // Obtém o item da tabela de itens_tb com base no ID
        $item = $pdo->prepare("SELECT * FROM chaves WHERE id_chave = :chaveID");
        $item->bindParam(':chaveID', $chaveID, PDO::PARAM_INT);
        $item->execute();
        $rowItem = $item->fetch();

        // Verifica se o item existe
        if ($rowItem) {
            // Exclui o item do banco de dados
            $excluir = $pdo->prepare("DELETE FROM chaves WHERE id_chave = :chaveID");
            $excluir->bindParam(':chaveID', $chaveID, PDO::PARAM_INT);
            $excluir->execute();

            // Redireciona de volta para a página anterior
            echo "<script>
                    Swal.fire({
                         icon: 'success',
                         title: 'Exclusão de Chave',
                         text: 'Chave excluída com sucesso!',
                         confirmButtonText: 'OK',
                         onClose: function() {
                              window.location.href = '../quadro_chaves_disponiveis.php';
                         }
                    }).then(function() {
                         window.location.href = '../quadro_chaves_disponiveis.php';
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
        echo "<script>window.location.href = '../quadro_chaves_disponiveis.php';</script>";
    }
} else {
    // Redireciona de volta para a página anterior caso não tenha sido enviada uma senha
    header("Location: ../tabela.php");
}
?>
