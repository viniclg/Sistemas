<?php
require_once 'conexao.php';

session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];

$query_admin = $con->query("SELECT * FROM adm WHERE email_adm = '$email' AND senha = '$senha'");

while ($row = mysqli_fetch_assoc($query_admin)){
    $id_adm = $row['id_adm']; 
    $nome = $row['nome'];
    $email_adm = $row['email_adm'];
}
if($email == $email_adm){
    if($query_admin-> num_rows > 0) {
        $_SESSION['id'] = $id_adm;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email; 
        header("Location: admin_profile.php");
    }
}else{ $senha = md5($senha);

if($email == "" || $senha == ""){
    echo 'Você esqueceu de inserir algum campo.';
    echo "<a href='../index.php'><button>Voltar</button></a>";
    }

$result = $con->query("SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'"); 



while ($row = mysqli_fetch_assoc($result)){
$id = $row['id_aluno']; 
$nome = $row['nome'];
}


if($result -> num_rows > 0 ){
    $_SESSION['id'] = $id;
    $_SESSION['nome_aluno'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header('location:../site.php');
}

elseif($query_admin-> num_rows > 0) {
    $_SESSION['id'] = $id_adm;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email; 
    header("Location: admin_profile.php");
}
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:../index.php');
}
}

$con ->close();
?>