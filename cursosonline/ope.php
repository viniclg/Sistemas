<?php
require_once 'conexao.php';

session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha = md5($senha);


$result = $con->query("SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'");

while ($row = mysqli_fetch_assoc($result)){
$id = $row['id_aluno']; 
}

if(mysqli_num_rows ($result) > 0 ){
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:site.php');
}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:index.php');
}
?>