<?php
require_once 'conexao.php';

session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];

if($email == ""){
        echo 'Você esqueceu de inserir algum campo.';
        echo "<a href='../index.php'><button>Voltar</button></a>";
    }else{ 
        $senha = md5($senha);

$result = $con->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"); 



while ($row = mysqli_fetch_assoc($result)){
$id = $row['id']; 
$nome = $row['nome'];
}


if($result -> num_rows > 0 ){
    $_SESSION['id'] = $id;
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
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