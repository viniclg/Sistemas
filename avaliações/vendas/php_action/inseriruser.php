<?php
require_once 'conexao.php';


$senha = ($_POST['senha']);
$email = $_POST['email'];
$senha = md5($senha);

$query = "SELECT * FROM usuarios WHERE email = '$email'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

/* 
o isset e !empty vai verificar se o que foi inserido no formulário é diferente de nulo
se for nulo não vai deixar o usuário se cadastrar
*/
if (isset($_POST['senha']) && !empty($_POST['email'])) {

    //se a senha ou email estiver já no banco de dados vai mostrar a mensagem
    if($row) {
        echo "Esse nome de usuário já está sendo usado";
        echo "<a href='../login.php'><button>OK</button></a>";
    }
    else{
        // Inserir o registro somente se o valor da chave primária não existir
        $sql = "INSERT INTO usuarios (id, email, senha) VALUES ('null', '$email', '$senha')";
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