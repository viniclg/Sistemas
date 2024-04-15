<?php
require_once '../c.php';
session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

if (isset($_POST['login']) || isset($_POST['senha'])) {
    echo "Insira um nome de usuário ou senha válidos
    <button><a href=in.php>Voltar</button></a>";
}

$senha = md5($senha);

$stmt = $connect->prepare("SELECT * FROM usuario WHERE Login = ? AND Senha = ?");
$stmt->bind_param("ss", $login, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION['id'] = $row['Id_usuario'];
        $_SESSION['login'] = $row['Login'];
        $_SESSION['senha'] = $row['Senha'];
        $_SESSION['tipo'] = $row['Tipo'];

        if ($row['Tipo'] == '1') {
            header("location: ../indexADM.php");
        } else {
            header("location: ../index.php");
        }
    }
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header("location: in.php");
}

$connect->close();
?>