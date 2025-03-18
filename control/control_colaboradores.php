<?php
ob_start();
session_start();
include ('conexao.php');

$cmd = $_POST['cmd'];

switch($cmd){

    case "listColaboradores":
    
        $sqlListColaboradores = "SELECT * FROM colaboradores";
        $queryListColaboradores = $PDO->prepare($sqlListColaboradores);
        $queryListColaboradores->execute();
        $colaboradores = $queryListColaboradores->fetchAll(PDO::FETCH_ASSOC);

        $response['colaboradores'] = $colaboradores;
    
    break;

    case "viewColaborador":
    
        $COLAB_ID = $_POST['COLAB_ID'];
        $sqlViewColab = "SELECT * FROM colaboradores WHERE COLAB_ID = :COLAB_ID";
        $queryViewColab = $PDO->prepare($sqlViewColab);
        $queryViewColab->bindParam(':COLAB_ID', $COLAB_ID);
        $queryViewColab->execute();
        $colaborador = $queryViewColab->fetch(PDO::FETCH_ASSOC);

        $response['colaborador'] = $colaborador;
    
    break;

}

echo json_encode($response);

?>