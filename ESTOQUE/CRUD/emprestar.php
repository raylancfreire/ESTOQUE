<?php
    require('../conn.php');

    $id_item = $_POST['id_item'];
    $nome_item = $_POST['nome_item'];
    $qtd_item = $_POST['qtd_item'];
    $cat_item = $_POST['cat_item'];
    $local_item = $_POST['local_item'];
    $solicitador_item = $_POST['solicitador_item'];
    $contato_solicitador_item = $_POST['contato_solicitador_item'];
    $status_item = $_POST['status_item'];

    if(empty($id_item) || empty($nome_item) || empty($qtd_item) || empty($cat_item) || empty($local_item) || empty($solicitador_item) || empty($contato_solicitador_item) || empty($status_item)){
        echo "Os valores não podem ser vazios";
    }else{
        $emprestar = $pdo->prepare("UPDATE itens_tb set 
        id_item = :id_item, 
        nome_item = :nome_item,
        qtd_item = :qtd_item,
        cat_item = :cat_item,
        local_item = :local_item,
        solicitador_item = :solicitador_item,
        contato_solicitador_item = :contato_solicitador_item,
        status_item = :status_item
        WHERE 
        id_item = :id_item;");
    

    $emprestar->execute(array(
        ':id_item' => $id_item,
        ':nome_item'=> $nome_item,
        ':qtd_item'=> $qtd_item,
        ':cat_item'=> $cat_item,
        ':local_item'=> $local_item,
        ':solicitador_item'=> $solicitador_item,
        ':contato_solicitador_item'=> $contato_solicitador_item,
        ':status_item'=> $status_item
    ));

    echo "<script>
        alert('Empréstimo feito com sucesso!')
        window.location.href='../tabela_emprestimo.php';
        </script>";
        
    }

?>

