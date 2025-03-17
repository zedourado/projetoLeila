<?php
ob_start();
session_start();
include ('conexao.php');

$cmd = $_POST['cmd'];

switch($cmd){

    case "addEvento":
    
        $CLIENTE_ID = $_POST['CLIENTE_ID'];
        $EVENTO_SERVICOS = isset($_POST['EVENTO_SERVICOS']) ? implode(', ', $_POST['EVENTO_SERVICOS']) : '';
        $EVENTO_DATA = $_POST['EVENTO_DATA'];
        $EVENTO_HORA = $_POST['EVENTO_HORA'];
    
        $sqlAddEvento = "INSERT INTO agenda (EVENTO_CLIENTE_ID, EVENTO_SERVICOS, EVENTO_DATA, EVENTO_HORA) 
                         VALUES (:EVENTO_CLIENTE_ID, :EVENTO_SERVICOS, :EVENTO_DATA, :EVENTO_HORA)";
    
        $queryAddEvento = $PDO->prepare($sqlAddEvento);
        $queryAddEvento->bindParam(':EVENTO_CLIENTE_ID', $CLIENTE_ID);
        $queryAddEvento->bindParam(':EVENTO_SERVICOS', $EVENTO_SERVICOS);
        $queryAddEvento->bindParam(':EVENTO_DATA', $EVENTO_DATA);
        $queryAddEvento->bindParam(':EVENTO_HORA', $EVENTO_HORA);
    
        if ($queryAddEvento->execute()) {
            $response['success'] = true;
            $response['message'] = "Agendamento Solicitado, Aguarde Confirmação!";
        } else {
            $response['success'] = false;
            $response['message'] = "Erro ao efetuar o Agendamento, Tente novamente mais tarde!";
        }
    
    break;
    
    case "listEventosCliente":

        $CLIENTE_ID = $_POST['CLIENTE_ID'];
        $sqlListEventosCliente = "SELECT * FROM agenda WHERE EVENTO_CLIENTE_ID = :CLIENTE_ID";
        $queryListEventosCliente = $PDO->prepare($sqlListEventosCliente);
        $queryListEventosCliente->bindParam(':CLIENTE_ID', $CLIENTE_ID);
        $queryListEventosCliente->execute();
        $eventos = $queryListEventosCliente->fetchAll(PDO::FETCH_ASSOC);

        $response['eventos'] = $eventos;

    break;

}

echo json_encode($response);
?>