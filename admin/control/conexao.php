<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$base = "projetoLeila";

#CONEXÃO VIA PDO

try{
    $PDO = new PDO("mysql:host=$servidor;dbname=$base", $usuario, $senha,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }catch(PDOexception $err){
        echo "Erro de Conexão " . $err->getMessage() . "\n";
        exit;
    }
	
?>