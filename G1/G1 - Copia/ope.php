<?php
require_once 'conexao.php';

session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];

$senha = md5($senha);


$result = $con->query("SELECT * FROM usuario WHERE user = '$login' AND senha = '$senha'");

if(mysqli_num_rows ($result) > 0 ){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:site.php');
}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:index.php');
}
?>