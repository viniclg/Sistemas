<?php
require_once "../c.php";
session_start();

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['login'];
$senha = md5($senha);

$query = "SELECT * FROM usuario WHERE nome ='$nome' or login = '$email'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);

/* 
o isset e !empty vai verificar se o que foi inserido no formulário é diferente de nulo
se for nulo não vai deixar o usuário se cadastrar
*/
if (isset($_POST['senha']) && !empty($_POST['login'])) {

    //se a senha ou email estiver já no banco de dados vai mostrar a mensagem
    if($row) {
        echo "Esse nome de usuário ou senha já está sendo usado";
        echo "<a href='cad.php'><button>OK</button></a>";
    }
    else{
        // Inserir o registro somente se o valor da chave primária não existir
        $sql = "INSERT INTO usuario (id_usuario, nome, login, senha, tipo) VALUES ('null', '$nome', '$email', '$senha', 0)";
    }
        if ($connect->query($sql) === TRUE) {
            echo "<p>Usuário criado com sucesso!</p>";
            echo "<a href='in.php'><button>HOME</button></a>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }else {

        echo 'Insira uma senha válida.';
        echo "<br><a href='in.php'><button>CADASTRO</button></a>";
    }

$connect->close();
?>