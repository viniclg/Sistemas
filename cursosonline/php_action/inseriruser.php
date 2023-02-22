<?php
require_once 'conexao.php';

$nome = $_POST['loginuser'];
$senha = ($_POST['senhauser']);
$email = $_POST['email'];

$query = "SELECT * FROM alunos WHERE email = '$email' or senha = '$senha'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if (isset($_POST['senhauser']) && !empty($_POST['email'])) {

    if($row) {
        echo "Esse nome de usuário ou senha já está sendo usado";
        echo "<a href='../cadastrouser.php'><button>OK</button></a>";
    }
    else{
        // Inserir o registro somente se o valor da chave primária não existir
        $sql = "INSERT INTO alunos (id_aluno, nome, senha, email) VALUES ('null', '$nome', '$senha', '$email')";
    }
        if ($con->query($sql) === TRUE) {
            echo "<p>Usuário criado com sucesso!</p>";
            echo "<a href='../index.php'><button>HOME</button></a>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }else {

        echo 'Insira uma senha válida.';
        echo "<a href='../cadastrouser.php'><button>CADASTRO</button></a>";
    }

$con->close();
?>