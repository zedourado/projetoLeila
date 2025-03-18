<?php
ob_start();
session_start();
include ('conexao.php');

	// PARAMS
	$email = strtolower($_POST['email']);
	$senha = md5($_POST['senha']);

	if (empty($_POST['email']) || empty($_POST['senha'])) {
		echo json_encode([
			"success" => false,
			"message" => "Existem campos vazios, verifique!"
		]);
		exit; // Interrompe a execução do script
	}

	$sqlBuscaUser = "SELECT * FROM colaboradores WHERE COLAB_EMAIL = :email AND COLAB_SENHA = :senha";
	$queryBuscaUser = $PDO->prepare($sqlBuscaUser);
	$queryBuscaUser->bindParam(':email', $email);
	$queryBuscaUser->bindParam(':senha', $senha);
	$queryBuscaUser->execute();
	$userData = $queryBuscaUser->fetch(PDO::FETCH_ASSOC);

	// VERIFICAÇÃO DE LOGIN/SENHA
	if ($userData) {

		// Verificação se o cadastro está ativo
		$ativo = $userData['COLAB_ATIVO'];

		if ($ativo == 'N') {

			$response['success'] = false;
			$response['message'] = "O seu Cadastro ainda não está Ativado, Verifique o seu e-mail!";

		} else {

			$response['success'] = true;
			$response['message'] = "Login bem-sucedido!";
			$_SESSION['COLAB_ID'] = $userData['COLAB_ID'];
			$_SESSION['COLAB_NOME'] = $userData['COLAB_NOME'];

		}
	} else {

		$response['status'] = false;
		$response['message'] = "Usuário/Senha Incorreta!";
	}

echo json_encode($response);
?>
