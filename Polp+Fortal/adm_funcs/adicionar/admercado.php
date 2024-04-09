<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Adicionar Mercado</title>
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

        $sql = $connect->query("SELECT * FROM mercado WHERE Nome_Mercado LIKE '%$nome%'");
        if ($sql->num_rows > 0) {
            echo "Esse mercado já existe";
        } else {
            $img = $_POST['img'];
            $result = $connect->query("INSERT INTO mercado (Id_mercado, Nome_Mercado, Imagem_Mercado) VALUES (null, '$nome', '$img')");
            if ($result === true) {
                echo "Deu certo";
            }
        }
    }
echo '<div class="container">
<h1>Adicionar Mercado</h1>
<form method="POST">
    <label for="nome">Insira o nome do mercado</label>
    <input type="text" name="nome" id="nome" required>
    <br><br>
    <label for="img">Insira a logo do mercado (O nome do arquivo e a sua extensão)</label>
    <input type="text" name="img" id="img" required>
    <br><br>
    <button type="submit">Adicionar</button>
</form>
<br>
<a href="../../indexADM.php" class="button">Voltar</a>
</div>';
}else{
    echo 'Você não deveria estar aqui<br>
    <a href="../../open/logout.php"><button>Sair</button></a>';
}
    ?>
    
</body>
</html>