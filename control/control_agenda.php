<?php
ob_start();
session_start();
include ('conexao.php');
date_default_timezone_set('America/Sao_Paulo');

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

    case "addEventoAdmin":
    
        $EVENTO_SERVICOS = isset($_POST['EVENTO_SERVICOS']) ? implode(', ', $_POST['EVENTO_SERVICOS']) : '';
        $EVENTO_DATA = $_POST['EVENTO_DATA'];
        $EVENTO_HORA = $_POST['EVENTO_HORA'];
        $EVENTO_RESPONSAVEL = $_POST['EVENTO_RESPONSAVEL'];
        $EVENTO_CLIENTE = $_POST['EVENTO_CLIENTE'];
        $EVENTO_STATUS = "CONFIRMADO";
        
    
        $sqlAddEvento = "INSERT INTO agenda (EVENTO_CLIENTE_ID, EVENTO_SERVICOS, EVENTO_DATA, EVENTO_HORA, EVENTO_RESPONSAVEL, EVENTO_STATUS) 
                         VALUES (:EVENTO_CLIENTE_ID, :EVENTO_SERVICOS, :EVENTO_DATA, :EVENTO_HORA, :EVENTO_RESPONSAVEL, :EVENTO_STATUS)";
    
        $queryAddEvento = $PDO->prepare($sqlAddEvento);
        $queryAddEvento->bindParam(':EVENTO_CLIENTE_ID', $EVENTO_CLIENTE);
        $queryAddEvento->bindParam(':EVENTO_SERVICOS', $EVENTO_SERVICOS);
        $queryAddEvento->bindParam(':EVENTO_DATA', $EVENTO_DATA);
        $queryAddEvento->bindParam(':EVENTO_HORA', $EVENTO_HORA);
        $queryAddEvento->bindParam(':EVENTO_RESPONSAVEL', $EVENTO_RESPONSAVEL);
        $queryAddEvento->bindParam(':EVENTO_STATUS', $EVENTO_STATUS);
    
        if ($queryAddEvento->execute()) {
            $response['success'] = true;
            $response['message'] = "Agendamento realizado!";
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

    case "listEventosAdmin":

        $COLAB_ID = $_POST['COLAB_ID'];
    
        // Buscar permissão do colaborador
        $sqlBuscaPermissao = "SELECT COLAB_PERMISSAO FROM colaboradores WHERE COLAB_ID = :COLAB_ID";
        $queryBuscaPermissao = $PDO->prepare($sqlBuscaPermissao);
        $queryBuscaPermissao->bindParam(':COLAB_ID', $COLAB_ID);
        $queryBuscaPermissao->execute();
        $permissao = $queryBuscaPermissao->fetch(PDO::FETCH_ASSOC);
    
        if ($permissao && $permissao['COLAB_PERMISSAO'] == 'USUARIO') {
            $sqlListEventosAdmin = "SELECT * FROM agenda WHERE EVENTO_RESPONSAVEL = :COLAB_ID ORDER BY EVENTO_STATUS ASC";
            $queryListEventosAdmin = $PDO->prepare($sqlListEventosAdmin);
            $queryListEventosAdmin->bindParam(':COLAB_ID', $COLAB_ID);
        } else {
            $sqlListEventosAdmin = "SELECT * FROM agenda ORDER BY EVENTO_STATUS ASC";
            $queryListEventosAdmin = $PDO->prepare($sqlListEventosAdmin);
        }
    
        $queryListEventosAdmin->execute();
        $eventos = $queryListEventosAdmin->fetchAll(PDO::FETCH_ASSOC);
    
        $response['eventos'] = $eventos;
    
    break;
    
    case "viewEvento":
    
        $EVENTO_ID = $_POST['EVENTO_ID'];

        $sqlBuscaEvento = "
        SELECT a.*, c.COLAB_NOME 
        FROM agenda a
        LEFT JOIN colaboradores c ON a.EVENTO_RESPONSAVEL = c.COLAB_ID
        WHERE a.EVENTO_ID = :EVENTO_ID
        ";

        $queryBuscaEvento = $PDO->prepare($sqlBuscaEvento);
        $queryBuscaEvento->bindParam(':EVENTO_ID', $EVENTO_ID);
        $queryBuscaEvento->execute();
        $evento = $queryBuscaEvento->fetch(PDO::FETCH_ASSOC);

        $response['evento'] = $evento;
    
    break;

    case "cancelarEvento":
        
        $EVENTO_ID = $_POST['EVENTO_ID'];
        $sqlCancelarEvento = "UPDATE agenda SET EVENTO_STATUS = 'CANCELADO' WHERE EVENTO_ID = :EVENTO_ID";
        $queryCancelarEvento= $PDO->prepare($sqlCancelarEvento);
        $queryCancelarEvento->bindParam(':EVENTO_ID', $EVENTO_ID);

        if($queryCancelarEvento->execute()){

            $response['success'] = true;
            $response['message'] = "Agendamento Cancelado";

        }else{

            $response['success'] = false;
            $response['message'] = "Ocorreu um Erro ao Cancelar Agendamento...";
        }


    break;

    case "cancelarEventoAdmin":
        
        $EVENTO_ID = $_POST['EVENTO_ID'];
        $sqlCancelarEvento = "UPDATE agenda SET EVENTO_STATUS = 'CANCELADO' WHERE EVENTO_ID = :EVENTO_ID";
        $queryCancelarEvento= $PDO->prepare($sqlCancelarEvento);
        $queryCancelarEvento->bindParam(':EVENTO_ID', $EVENTO_ID);

        if($queryCancelarEvento->execute()){

            $response['success'] = true;
            $response['message'] = "Agendamento Cancelado";

        }else{

            $response['success'] = false;
            $response['message'] = "Ocorreu um Erro ao Cancelar Agendamento...";
        }

    break;

    case "findEventosWeek":
    
        $CLIENTE_ID= $_POST['CLIENTE_ID'];
        $EVENTO_DATA = $_POST['EVENTO_DATA'];

        $sqlFindEventosWeek = "SELECT * FROM agenda WHERE EVENTO_CLIENTE_ID = :EVENTO_CLIENTE_ID AND WEEK(EVENTO_DATA) = WEEK(:EVENTO_DATA) ORDER BY EVENTO_DATA ASC LIMIT 1";
        $queryFindEventosWeek = $PDO->prepare($sqlFindEventosWeek);
        $queryFindEventosWeek->bindParam(':EVENTO_CLIENTE_ID', $CLIENTE_ID);
        $queryFindEventosWeek->bindParam(':EVENTO_DATA', $EVENTO_DATA);
        $queryFindEventosWeek->execute();
        $eventoWeek = $queryFindEventosWeek->fetch(PDO::FETCH_ASSOC);

        $response['eventoWeek'] = $eventoWeek;
    
    break;

    case "updateEventoWeek":
    
        $EVENTO_ID = $_POST['EVENTO_ID'];
        $EVENTO_SERVICOS = $_POST['EVENTO_SERVICOS'];

        $sqlUpdateEventoWeek = "UPDATE agenda SET EVENTO_SERVICOS = :EVENTO_SERVICOS WHERE EVENTO_ID = :EVENTO_ID";
        $queryUpdateEventoWeek = $PDO->prepare($sqlUpdateEventoWeek);
        $queryUpdateEventoWeek->bindParam(':EVENTO_ID', $EVENTO_ID);
        $queryUpdateEventoWeek->bindParam(':EVENTO_SERVICOS',$EVENTO_SERVICOS);
        
        if($queryUpdateEventoWeek->execute()){

            $response['success'] = true;
            $response['eventoData'] = $_POST['EVENTO_DATA'];
            $response['eventoHora'] = $_POST['EVENTO_HORA'];

        }
        
    break;
}

echo json_encode($response);
?>