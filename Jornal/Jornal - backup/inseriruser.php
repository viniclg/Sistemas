<?php
require_once 'conexao.php';


    $username = $_POST['loginuser'];
    $password = md5($_POST['senhauser']);
    

    // Verificar se o valor da chave primária já existe
    $query = "SELECT * FROM usuario WHERE user = '$username' OR senha = '$password'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    if (isset($_POST['password']) && !empty($_POST['password'])) {

    if($row) {
        echo "Esse nome de usuário ou senha já está sendo usado";
        echo "<a href='cadastrouser.php'><button>OK</button></a>";
    }
    else{
        // Inserir o registro somente se o valor da chave primária não existir
        $sql = "INSERT INTO usuario (user, senha) VALUES ('$username', '$password')";
    }
        if ($con->query($sql) === TRUE) {
            echo "<p>Usuário criado com sucesso!</p>";
            echo "<a href='index.php'><button>HOME</button></a>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }else {

        echo 'Please enter a valid password.';
        echo "<a href='inseriruser.php'><button>CADASTRO</button></a>";
    }



$con->close();



?>