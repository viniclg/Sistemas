<?php
require_once "../c.php";
session_start();

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['login'];
$senha = md5($senha);
$tipo = 0;

$stmt = $connect->prepare("SELECT * FROM usuario WHERE nome = ? OR login = ?");
$stmt->bind_param("ss", $nome, $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

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
        $PrepareInsert = $connect->prepare("INSERT INTO usuario (id_usuario, nome, login, senha, tipo) VALUES (NULL, ?, ?, ?, ?)");
        $PrepareInsert->bind_param("sssi", $nome, $email, $senha, $tipo);
        
    }
        if ($PrepareInsert->execute() === TRUE) {
            echo "<p>Usuário criado com sucesso!</p>";
            echo "<a href='in.php'><button>HOME</button></a>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        unset($nome);
        unset($email);
        unset($senha);
    }else {

        echo 'Insira uma senha válida.';
        echo "<br><a href='in.php'><button>CADASTRO</button></a>";
    }

$connect->close();
?>