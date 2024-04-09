<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            margin-top: 20px;
        }

        a.button {
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            width: 95%;
        }

        a.button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    require_once "../../c.php";
    session_start();
if($_SESSION['tipo'] == 1){
    if ($_POST) {
        $nome = $_POST['nome'];
        $senha = ($_POST['senha']);
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
            if ($row) {
                echo "Esse nome de usuário ou senha já está sendo usado";
                echo "<a href='../../indexADM.php'><button>OK</button></a>";
            } else {
                // Inserir o registro somente se o valor da chave primária não existir
                $sql = $connect->query("INSERT INTO usuario (id_usuario, nome, login, senha, tipo) VALUES ('null', '$nome', '$email', '$senha', 1)");
            }
            if ($sql === TRUE) {
                echo '<div class="container"<div id="message" class="message" style="display: none;">
                Usuário criado com sucesso!
            </div>
            <div>';
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        } else {
            echo 'Insira uma senha válida.';
        }
    }
    echo '<div class="container">
    <h1>Cadastro de Usuário</h1>
    <form method="POST">
        <input type="text" name="login" placeholder="Login" required><br>
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <button type="submit"> Adicionar </button>
    </form>
    <br><a href="../../indexADM.php" class="button">Voltar</a>
    </div>';
}else{
    echo 'Você não deveria estar aqui<br>
    <a href="../../open/logout.php"><button>Sair</button></a>';
}
    ?>

    
</body>
</html>