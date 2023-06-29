<?php
    require('../conn.php');

    $numero_chave = $_POST['numero_chave'];
    $sala_chave = $_POST['sala_chave'];
    $status_chave = $_POST['status_chave'];

   
    if(empty($numero_chave) || empty($sala_chave) || empty($status_chave)){
        echo "Os valores não podem ser vazios";
    }else{
        $cad_item = $pdo->prepare("INSERT INTO chaves(numero_chave, sala_chave, status_chave) 
        VALUES(:numero_chave, :sala_chave, :status_chave)");
        $cad_item->execute(array(
            ':numero_chave'=> $numero_chave,
            ':sala_chave'=> $sala_chave,
            ':status_chave'=> $status_chave
        ));

        echo "<script>
        alert('Chave cadastrada com sucesso!');
        </script>";
    }
?>