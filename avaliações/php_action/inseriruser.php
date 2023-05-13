<?php
require_once 'conexao.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$login = $_POST['login'];
$tel = $_POST['tel'];

$query = "SELECT * FROM usuarios WHERE nome = '$nome'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);


if (isset($_POST['senha']) && !empty($_POST['nome'])) {

    if($row) {
        echo "Esse nome de usuário já está sendo usado";
        echo "<a href='../login.php'><button>OK</button></a>";
    }
    else{
        $sql = "INSERT INTO usuarios (id, login, senha, nome, telefone) VALUES ('null', '$login', '$senha', '$nome', '$tel')";
    }
        if ($con->query($sql) === TRUE) {
            echo "<p>Usuário criado com sucesso!</p>";
            echo "<a href='../index.php'><button>HOME</button></a>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }else {

        echo 'Insira uma senha válida.';
        echo "<br><a href='../index.php'><button>CADASTRO</button></a>";
    }

$con->close();
?>