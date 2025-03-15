<?php
ob_start();
session_start();
include ('conexao.php');

	// PARAMS
	$email = strtolower($_POST['email']);
	$senha = md5($_POST['senha']);

	$sqlBuscaUser = "SELECT * FROM clientes WHERE CLIENTE_EMAIL = :email AND CLIENTE_SENHA = :senha";
	$queryBuscaUser = $PDO->prepare($sqlBuscaUser);
	$queryBuscaUser->bindParam(':email', $email);
	$queryBuscaUser->bindParam(':senha', $senha);
	$queryBuscaUser->execute();
	$userData = $queryBuscaUser->fetch(PDO::FETCH_ASSOC);

	// VERIFICAÇÃO DE LOGIN/SENHA
	if ($userData) {

		// Verificação se o cadastro está ativo
		$ativo = $userData['ativo'];

		if ($ativo == 'N') {
			$response['status'] = "error";
			$response['message'] = "O seu Cadastro ainda não está Ativado, Verifique o seu e-mail!";
		} else {

			$response['status'] = "success";
			$response['message'] = "Login bem-sucedido!";
			$_SESSION['CLIENTE_ID'] = $userData['CLIENTE_ID'];
			$_SESSION['CLIENTE_NOME'] = $userData['CLIENTE_NOME'];

		}
	} else {

		$response['status'] = "error";
		$response['message'] = "Usuário/Senha Incorreta!";
	}

echo json_encode($response);
?>
