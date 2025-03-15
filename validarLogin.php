<?php
	ob_start();
	session_start();
	include ('conexao.php');

		$login = strtolower($_POST['login']);
		$senha = md5($_POST['senha']);
		$result = mysqli_query($conn, "SELECT * FROM colaboradores WHERE login = '$login' and senha = '$senha'");
		$resultado_field = mysqli_fetch_array($result);
		
		if(isset($resultado_field)){
		$ativo = $resultado_field[27];
		}else{
			$ativo = null;
		}
		if(mysqli_num_rows ($result) > 0 AND $ativo === 'S' ){
			
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$_SESSION['permissao'] = $resultado_field[30];
			$_SESSION['nome'] = $resultado_field[1];
			$_SESSION['Id'] = $resultado_field[0];
			$_SESSION['foto']= $resultado_field[31];
			$_SESSION['setor'] = $resultado_field[21];
			$_SESSION['setor2'] = $resultado_field[23];
			$_SESSION['alertOK'] = null;
			header("location:index.php");

		}elseif($ativo === 'N'){
			
			$_SESSION['alertOK'] = "UI";
			header("location:login.php");
			
		}else{
			
			$_SESSION['alertOK'] = "SI";
			header("location:login.php");
		}
?>