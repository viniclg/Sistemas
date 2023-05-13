<?php
require_once 'php_action/conexao.php';

session_start();
if(!isset($_SESSION["id"]) || !isset($_SESSION["nome"]))
{
// Usuário não logado! Redireciona para a página de login
header("Location: index.php");
exit;
}

echo "Você não deveria estar aqui
  <a href='index.php'><button>Voltar</button></a>";

?>