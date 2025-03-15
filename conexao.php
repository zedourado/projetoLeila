<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$base = "projetoLeila";

#CONEXÃO VIA MYSQLI
$conn = mysqli_connect($servidor,$usuario,$senha,$base);
if(!$conn){
	echo "Erro ao conectar servidor".mysqli_connect_error();
};
mysqli_set_charset($conn,'utf8');

//------------------------------------------------------------------------------//

#CONEXÃO VIA PDO

#CONEXÃO BASE INSIGHT07
try{
    $PDO = new PDO("mysql:host=$servidor;dbname=$base", $usuario, $senha,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }catch(PDOexception $err){
        echo "Erro de Conexão " . $err->getMessage() . "\n";
        exit;
    }
	
/*
#CONEXÃO BASE SIG

$servidorSIG = "insight-ti.ddns.com.br:1306";
$usuarioSIG = "root";
$senhaSIG = "";
$baseSIG = "sig";

try{
    $PDO_SIG = new PDO("mysql:host=$servidorSIG;dbname=$baseSIG", $usuarioSIG, $senhaSIG,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }catch(PDOexception $err){
        echo "Erro de Conexão " . $err->getMessage() . "\n";
        exit;
    }
*/

?>