<?php
require_once 'conexao.php';

session_start();
$login = $_POST['login'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

$sql1 = $con -> query("SELECT * FROM adm WHERE nome_adm='$nome' AND senha_adm='$senha' AND login_adm='$login'");

if($sql1-> num_rows >0){
    while($row = $sql1->fetch_assoc()){
    $_SESSION['id'] = $row['id_adm'];
    $_SESSION['login'] = $login;
    $_SESSION['nome'] = $nome;
    $_SESSION['senha'] = $senha;
    header('location:../admin_profile.php');
    }
}else{

if($nome == ""){
        echo 'Você esqueceu de inserir algum campo.';
        echo "<a href='../index.php'><button>Voltar</button></a>";
    }

$result = $con->query("SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha' AND nome ='$nome'"); 



while ($row = $result -> fetch_assoc()){
$id = $row['id']; 
$nome = $row['nome'];
$telefone = $row['telefone'];
}


if($result -> num_rows > 0 ){
    $_SESSION['id'] = $id;
    $_SESSION['login'] = $login;
    $_SESSION['nome'] = $nome;
    $_SESSION['senha'] = $senha;
    $_SESSION['telefone'] = $telefone;
    header('location:../site.php');
}
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:../index.php');
}
}

$con ->close();
?>