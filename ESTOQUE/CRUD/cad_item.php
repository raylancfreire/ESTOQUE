<?php
    require('../conn.php');

    $nome_item = $_POST['nome_item'];
    $qtd_item = $_POST['qtd_item'];
    $cat_item = $_POST['cat_item'];
    $local_item = $_POST['local_item'];
    $status_item = $_POST['status_item'];

   
    if(empty($nome_item) || empty($qtd_item) || empty($cat_item) || empty($local_item) || empty($status_item)){
        echo "Os valores não podem ser vazios";
    }else{
        // Verificar se o nome_item já existe
    $verifica_nome = $pdo->prepare("SELECT * FROM itens_tb WHERE nome_item = :nome_item");
    $verifica_nome->bindValue(':nome_item', $nome_item);
    $verifica_nome->execute();
    $registro_existente = $verifica_nome->fetch(PDO::FETCH_ASSOC);

    if ($registro_existente) {
        // Nome_prod já existe, atualizar a quantidade
        $quantidade_existente = $registro_existente['qtd_item'];
        $nova_quantidade = $quantidade_existente + $qtd_item;

        $atualiza_quantidade = $pdo->prepare("UPDATE itens_tb SET qtd_item = :nova_quantidade WHERE nome_item = :nome_item");
        $atualiza_quantidade->bindValue(':nova_quantidade', $nova_quantidade);
        $atualiza_quantidade->bindValue(':nome_item', $nome_item);
        $atualiza_quantidade->execute();

        echo "<script>
        alert('Entrada registrada com sucesso!')</script>";

        } else {
            $cad_item = $pdo->prepare("INSERT INTO itens_tb(nome_item, qtd_item, cat_item, local_item, status_item) 
        VALUES(:nome_item, :qtd_item, :cat_item, :local_item, :status_item)");
        $cad_item->execute(array(
            ':nome_item'=> $nome_item,
            ':qtd_item'=> $qtd_item,
            ':cat_item'=> $cat_item,
            ':local_item'=> $local_item,
            ':status_item'=> $status_item
        ));

        echo "<script>
        alert('Item cadastrado com sucesso!');
        </script>";
    }
}        
?>