<?php
// Inicia sessões
session_start();
ob_start();  
// Verifica se existe os dados da sessão de login
if(!isset($_SESSION['CLIENTE_ID'])){
session_unset();
session_destroy();
session_start();
echo ('<script>');
$_SESSION['alertOK'] = "S";
echo ("window.location.href='login.php'");
echo ('</script>');
exit;
    }
$timezone = "America/Sao_Paulo";
date_default_timezone_set($timezone);
?>