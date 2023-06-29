<?php
    require('../conn.php');

    $id_item = $_POST['id_item'];
    $nome_item = $_POST['nome_item'];
    $qtd_item = $_POST['qtd_item'];
    $cat_item = $_POST['cat_item'];
    $local_item = $_POST['local_item'];

    if(empty($id_item) || empty($nome_item) || empty($qtd_item) || empty($cat_item) || empty($local_item)){
        echo "Os valores não podem ser vazios";
    }else{
        $update_item = $pdo->prepare("UPDATE itens_tb set 
        id_item = :id_item, 
        nome_item = :nome_item,
        qtd_item = :qtd_item, 
        cat_item = :cat_item,
        local_item = :local_item
        WHERE 
        id_item = :id_item;");
    

    $update_item->execute(array(
        ':id_item' => $id_item,
        ':nome_item'=> $nome_item,
        ':qtd_item'=> $qtd_item,
        ':cat_item'=> $cat_item,
        ':local_item'=> $local_item
    ));

    echo "<script>
        alert('Atualização feita com sucesso!')
        window.location.href='../tabela.php';
        </script>";
    }

?>