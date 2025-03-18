<?php
ob_start();
session_start();
include ('conexao.php');

$cmd = $_POST['cmd'];

switch($cmd){

    case "addColaborador":

        //Variáveis via POST
        $COLAB_NOME= $_POST['COLAB_NOME'];
        $COLAB_SEXO= $_POST['COLAB_SEXO'];
        $COLAB_NASCIMENTO= $_POST['COLAB_NASCIMENTO'];
        $COLAB_LOGRADOURO= $_POST['COLAB_LOGRADOURO'];
        $COLAB_NUMERO= $_POST['COLAB_NUMERO'];
        $COLAB_COMPLEMENTO= $_POST['COLAB_COMPLEMENTO'];
        $COLAB_BAIRRO= $_POST['COLAB_BAIRRO'];
        $COLAB_CIDADE= $_POST['COLAB_CIDADE'];
        $COLAB_UF= $_POST['COLAB_UF'];
        $COLAB_CEP= $_POST['COLAB_CEP'];
        $COLAB_EMAIL= $_POST['COLAB_EMAIL'];
        $COLAB_TELEFONE= $_POST['COLAB_TELEFONE'];
        $COLAB_CELULAR= $_POST['COLAB_CELULAR'];
        $COLAB_SENHA= md5($_POST['COLAB_SENHA']);
        $COLAB_SENHA2= md5($_POST['COLAB_SENHA2']);
        $COLAB_PERMISSAO= $_POST['COLAB_PERMISSAO'];

        // Validação de senha
        if ($COLAB_SENHA !== $COLAB_SENHA2) {
            $response['success'] = false;
            $response['message'] = "As senhas não coincidem!";
            echo json_encode($response);
            exit;
        }

        //Script para Add o Cliente
        $sqlAddColab = "INSERT INTO colaboradores(COLAB_NOME, COLAB_SEXO, COLAB_NASCIMENTO, COLAB_LOGRADOURO, COLAB_NUMERO, COLAB_COMPLEMENTO, COLAB_BAIRRO, COLAB_CIDADE, COLAB_UF, COLAB_CEP, COLAB_EMAIL, COLAB_TELEFONE, COLAB_CELULAR, COLAB_SENHA)
                            VALUES(:COLAB_NOME, :COLAB_SEXO, :COLAB_NASCIMENTO, :COLAB_LOGRADOURO, :COLAB_NUMERO, :COLAB_COMPLEMENTO, :COLAB_BAIRRO, :COLAB_CIDADE, :COLAB_UF, :COLAB_CEP, :COLAB_EMAIL, :COLAB_TELEFONE, :COLAB_CELULAR, :COLAB_SENHA)";
        $queryAddColab = $PDO->prepare($sqlAddColab);
        $queryAddColab->bindParam(':COLAB_NOME', $COLAB_NOME);
        $queryAddColab->bindParam(':COLAB_SEXO', $COLAB_SEXO);
        $queryAddColab->bindParam(':COLAB_NASCIMENTO', $COLAB_NASCIMENTO);
        $queryAddColab->bindParam(':COLAB_LOGRADOURO', $COLAB_LOGRADOURO);
        $queryAddColab->bindParam(':COLAB_NUMERO', $COLAB_NUMERO);
        $queryAddColab->bindParam(':COLAB_COMPLEMENTO', $COLAB_COMPLEMENTO);
        $queryAddColab->bindParam(':COLAB_BAIRRO', $COLAB_BAIRRO);
        $queryAddColab->bindParam(':COLAB_CIDADE', $COLAB_CIDADE);
        $queryAddColab->bindParam(':COLAB_UF', $COLAB_UF);
        $queryAddColab->bindParam(':COLAB_CEP', $COLAB_CEP);
        $queryAddColab->bindParam(':COLAB_EMAIL', $COLAB_EMAIL);
        $queryAddColab->bindParam(':COLAB_TELEFONE', $COLAB_TELEFONE);
        $queryAddColab->bindParam(':COLAB_CELULAR', $COLAB_CELULAR);
        $queryAddColab->bindParam(':COLAB_SENHA', $COLAB_SENHA);

        if ($queryAddColab->execute()) {
            $response['success'] = true;
            $response['message'] = "Cadastro realizado com sucesso !";
        } else {
            $response['success'] = false;
            $response['message'] = "Erro ao efetuar o Cadastro, Tente novamente mais tarde!";
        }

    break;

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