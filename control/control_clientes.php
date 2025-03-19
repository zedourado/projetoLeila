<?php
ob_start();
session_start();
include ('conexao.php');

$cmd = $_POST['cmd'];

switch($cmd){

    case "addCliente":

        //Variáveis via POST
        $CLIENTE_NOME= $_POST['CLIENTE_NOME'];
        $CLIENTE_SEXO= $_POST['CLIENTE_SEXO'];
        $CLIENTE_NASCIMENTO= $_POST['CLIENTE_NASCIMENTO'];
        $CLIENTE_LOGRADOURO= $_POST['CLIENTE_LOGRADOURO'];
        $CLIENTE_NUMERO= $_POST['CLIENTE_NUMERO'];
        $CLIENTE_COMPLEMENTO= $_POST['CLIENTE_COMPLEMENTO'];
        $CLIENTE_BAIRRO= $_POST['CLIENTE_BAIRRO'];
        $CLIENTE_CIDADE= $_POST['CLIENTE_CIDADE'];
        $CLIENTE_UF= $_POST['CLIENTE_UF'];
        $CLIENTE_CEP= $_POST['CLIENTE_CEP'];
        $CLIENTE_EMAIL= $_POST['CLIENTE_EMAIL'];
        $CLIENTE_TELEFONE= $_POST['CLIENTE_TELEFONE'];
        $CLIENTE_CELULAR= $_POST['CLIENTE_CELULAR'];
        $CLIENTE_SENHA= md5($_POST['CLIENTE_SENHA']);
        $CLIENTE_SENHA2= md5($_POST['CLIENTE_SENHA2']);

        // Validação de senha
        if ($CLIENTE_SENHA !== $CLIENTE_SENHA2) {
            $response['success'] = false;
            $response['message'] = "As senhas não coincidem!";
            echo json_encode($response);
            exit;
        }

        //Script para Add o Cliente
        $sqlAddCliente = "INSERT INTO CLIENTES(CLIENTE_NOME, CLIENTE_SEXO, CLIENTE_NASCIMENTO, CLIENTE_LOGRADOURO, CLIENTE_NUMERO, CLIENTE_COMPLEMENTO, CLIENTE_BAIRRO, CLIENTE_CIDADE, CLIENTE_UF, CLIENTE_CEP, CLIENTE_EMAIL, CLIENTE_TELEFONE, CLIENTE_CELULAR, CLIENTE_SENHA)
                            VALUES(:CLIENTE_NOME, :CLIENTE_SEXO, :CLIENTE_NASCIMENTO, :CLIENTE_LOGRADOURO, :CLIENTE_NUMERO, :CLIENTE_COMPLEMENTO, :CLIENTE_BAIRRO, :CLIENTE_CIDADE, :CLIENTE_UF, :CLIENTE_CEP, :CLIENTE_EMAIL, :CLIENTE_TELEFONE, :CLIENTE_CELULAR, :CLIENTE_SENHA)";
        $queryAddCliente = $PDO->prepare($sqlAddCliente);
        $queryAddCliente->bindParam(':CLIENTE_NOME', $CLIENTE_NOME);
        $queryAddCliente->bindParam(':CLIENTE_SEXO', $CLIENTE_SEXO);
        $queryAddCliente->bindParam(':CLIENTE_NASCIMENTO', $CLIENTE_NASCIMENTO);
        $queryAddCliente->bindParam(':CLIENTE_LOGRADOURO', $CLIENTE_LOGRADOURO);
        $queryAddCliente->bindParam(':CLIENTE_NUMERO', $CLIENTE_NUMERO);
        $queryAddCliente->bindParam(':CLIENTE_COMPLEMENTO', $CLIENTE_COMPLEMENTO);
        $queryAddCliente->bindParam(':CLIENTE_BAIRRO', $CLIENTE_BAIRRO);
        $queryAddCliente->bindParam(':CLIENTE_CIDADE', $CLIENTE_CIDADE);
        $queryAddCliente->bindParam(':CLIENTE_UF', $CLIENTE_UF);
        $queryAddCliente->bindParam(':CLIENTE_CEP', $CLIENTE_CEP);
        $queryAddCliente->bindParam(':CLIENTE_EMAIL', $CLIENTE_EMAIL);
        $queryAddCliente->bindParam(':CLIENTE_TELEFONE', $CLIENTE_TELEFONE);
        $queryAddCliente->bindParam(':CLIENTE_CELULAR', $CLIENTE_CELULAR);
        $queryAddCliente->bindParam(':CLIENTE_SENHA', $CLIENTE_SENHA);

        if ($queryAddCliente->execute()) {
            $response['success'] = true;
            $response['message'] = "Cadastro realizado com sucesso, Realize o Login para continuar!";
        } else {
            $response['success'] = false;
            $response['message'] = "Erro ao efetuar seu Cadastro, Tente novamente mais tarde!";
        }

    break;

    case "listClientes":
    
        $sqlListClientes = "SELECT * FROM clientes";
        $queryListClientes = $PDO->prepare($sqlListClientes);
        $queryListClientes->execute();
        $clientes = $queryListClientes->fetchAll(PDO::FETCH_ASSOC);

        $response['clientes'] = $clientes;
    
    break;

    case "viewCliente":
    
        $CLIENTE_ID = $_POST['CLIENTE_ID'];
        $sqlViewCliente = "SELECT * FROM clientes WHERE CLIENTE_ID = :CLIENTE_ID";
        $queryViewCliente = $PDO->prepare($sqlViewCliente);
        $queryViewCliente->bindParam(':CLIENTE_ID', $CLIENTE_ID);
        $queryViewCliente->execute();
        $cliente = $queryViewCliente->fetch(PDO::FETCH_ASSOC);

        $response['cliente'] = $cliente;
    
    break;

    case "editCliente":
    
        $CLIENTE_ID = $_POST['CLIENTE_ID'];
        $CLIENTE_NOME= $_POST['CLIENTE_NOME'];
        $CLIENTE_SEXO= $_POST['CLIENTE_SEXO'];
        $CLIENTE_NASCIMENTO= $_POST['CLIENTE_NASCIMENTO'];
        $CLIENTE_LOGRADOURO= $_POST['CLIENTE_LOGRADOURO'];
        $CLIENTE_NUMERO= $_POST['CLIENTE_NUMERO'];
        $CLIENTE_COMPLEMENTO= $_POST['CLIENTE_COMPLEMENTO'];
        $CLIENTE_BAIRRO= $_POST['CLIENTE_BAIRRO'];
        $CLIENTE_CIDADE= $_POST['CLIENTE_CIDADE'];
        $CLIENTE_UF= $_POST['CLIENTE_UF'];
        $CLIENTE_CEP= $_POST['CLIENTE_CEP'];
        $CLIENTE_EMAIL= $_POST['CLIENTE_EMAIL'];
        $CLIENTE_TELEFONE= $_POST['CLIENTE_TELEFONE'];
        $CLIENTE_CELULAR= $_POST['CLIENTE_CELULAR'];

        if (empty($CLIENTE_NOME) || empty($CLIENTE_EMAIL)) {
            $response['success'] = false;
            $response['message'] = "Nome e E-mail são obrigatórios!";
            echo json_encode($response);
            exit;
        }

        $sqlEditCliente = "
        UPDATE clientes 
        SET 
            CLIENTE_NOME = :CLIENTE_NOME,
            CLIENTE_SEXO = :CLIENTE_SEXO,
            CLIENTE_NASCIMENTO = :CLIENTE_NASCIMENTO,
            CLIENTE_LOGRADOURO = :CLIENTE_LOGRADOURO,
            CLIENTE_NUMERO = :CLIENTE_NUMERO,
            CLIENTE_COMPLEMENTO = :CLIENTE_COMPLEMENTO,
            CLIENTE_BAIRRO = :CLIENTE_BAIRRO,
            CLIENTE_CIDADE = :CLIENTE_CIDADE,
            CLIENTE_UF = :CLIENTE_UF,
            CLIENTE_CEP = :CLIENTE_CEP,
            CLIENTE_EMAIL = :CLIENTE_EMAIL,
            CLIENTE_TELEFONE = :CLIENTE_TELEFONE,
            CLIENTE_CELULAR = :CLIENTE_CELULAR
        WHERE 
            CLIENTE_ID = :CLIENTE_ID";

        $queryEditCliente = $PDO->prepare($sqlEditCliente);
        $queryEditCliente->bindParam(':CLIENTE_ID', $CLIENTE_ID);
        $queryEditCliente->bindParam(':CLIENTE_NOME', $CLIENTE_NOME);
        $queryEditCliente->bindParam(':CLIENTE_SEXO', $CLIENTE_SEXO);
        $queryEditCliente->bindParam(':CLIENTE_NASCIMENTO', $CLIENTE_NASCIMENTO);
        $queryEditCliente->bindParam(':CLIENTE_LOGRADOURO', $CLIENTE_LOGRADOURO);
        $queryEditCliente->bindParam(':CLIENTE_NUMERO', $CLIENTE_NUMERO);
        $queryEditCliente->bindParam(':CLIENTE_COMPLEMENTO', $CLIENTE_COMPLEMENTO);
        $queryEditCliente->bindParam(':CLIENTE_BAIRRO', $CLIENTE_BAIRRO);
        $queryEditCliente->bindParam(':CLIENTE_CIDADE', $CLIENTE_CIDADE);
        $queryEditCliente->bindParam(':CLIENTE_UF', $CLIENTE_UF);
        $queryEditCliente->bindParam(':CLIENTE_CEP', $CLIENTE_CEP);
        $queryEditCliente->bindParam(':CLIENTE_EMAIL', $CLIENTE_EMAIL);
        $queryEditCliente->bindParam(':CLIENTE_TELEFONE', $CLIENTE_TELEFONE);
        $queryEditCliente->bindParam(':CLIENTE_CELULAR', $CLIENTE_CELULAR);
        
        if ($queryEditCliente->execute()) {
            $response['success'] = true;
            $response['message'] = "Cadastro alterado com sucesso !";
        } else {
            $response['success'] = false;
            $response['message'] = "Erro ao alterar o Cadastro, Tente novamente mais tarde!";
        }

    break;

}

echo json_encode($response);

?>