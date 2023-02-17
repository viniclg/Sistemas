<?php
require_once 'conexao.php';

session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha = md5($senha);


$result = $con->query("SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'");

while ($row = mysqli_fetch_assoc($result)){
$id = $row['id_aluno']; 
$nome = $row['nome'];
}

if(mysqli_num_rows ($result) > 0 ){
    $_SESSION['id'] = $id;
    $_SESSION['nome_aluno'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header('location:site.php');
}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:index.php');
}

$result1 = $con->query("SELECT * FROM adm WHERE email = '$email' AND senha = '$senha'");


while ($row = mysqli_fetch_assoc($result1)){
    $id = $row['id_adm']; 
    $nome = $row['nome'];
    $senha = $row['senha'];
    }

    if(mysqli_num_rows ($result1) > 0 ){
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('location:siteadm.php');
    }else{
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        header('location:index.php');
    }
?>