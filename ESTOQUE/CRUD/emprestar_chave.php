<?php
    require('../conn.php');

    $id_chave = $_POST['id_chave'];
    $solicitador_chave = $_POST['solicitador_chave'];
    $contato_solicitador_chave = $_POST['contato_solicitador_chave'];
    $status_chave = $_POST['status_chave'];

    if(empty($id_chave) || empty($solicitador_chave) || empty($contato_solicitador_chave) || empty($status_chave)){
        echo "Os valores não podem ser vazios";
    }else{
        $emprestar = $pdo->prepare("UPDATE chaves set 
        id_chave = :id_chave, 
        solicitador_chave = :solicitador_chave,
        contato_solicitador_chave = :contato_solicitador_chave,
        status_chave = :status_chave
        WHERE 
        id_chave = :id_chave;");
    

    $emprestar->execute(array(
        ':id_chave' => $id_chave,
        ':solicitador_chave'=> $solicitador_chave,
        ':contato_solicitador_chave'=> $contato_solicitador_chave,
        ':status_chave'=> $status_chave
    ));

    echo "<script>
        alert('Empréstimo feito com sucesso!')
        window.location.href='../quadro_chaves_emprestadas.php';
        </script>";
        
    }

?>

