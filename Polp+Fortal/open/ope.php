<?php
require_once '../c.php';
session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

if(isset($_POST['login']) or isset($_POST['senha'])){
    echo "Insira um nome de usuario ou senha válidos
    <button><a href=index.php>Voltar</button></a>";
}
$senha = md5($senha);

$result = $connect ->query("SELECT * FROM usuario where login ='$login' and senha ='$senha'");

if($result -> num_rows > 0){
    while ($row = $result -> fetch_assoc()){
$_SESSION['id'] = $row['id_usuario'];
$_SESSION['login'] = $row['login'];
$_SESSION['senha'] = $row['senha'];
$_SESSION['tipo'] = $row['tipo'];
header("location:../index.php");
    }
}else{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
header("location:in.php");
}

$con ->close();
?>