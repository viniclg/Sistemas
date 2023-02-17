<?php
require_once 'conexao.php';

session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha = md5($senha);


$result = $con->query("SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'");

$query_admin = "SELECT * FROM adm WHERE email_adm = '$email' AND senha = '$senha'"; 
$result_admin = mysqli_query($con, $query_admin);

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
}
elseif (mysqli_num_rows($result_admin) == 0) {
    $row = mysqli_fetch_assoc($result_admin); 
    $_SESSION['email'] = $email; 
    header("Location: admin_profile.php");
    exit();
}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:index.php');
}
?>