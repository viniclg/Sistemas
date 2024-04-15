<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
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
        $_SESSION['nomeprod'] = $_POST['produto'];
        $nome = $_POST['produto'];
        $img = $_POST['img'];
        $stmt = $connect->prepare("SELECT * FROM produtos WHERE Nome_Produto = ?");
        $stmt->bind_param("s", $nome);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Produto já cadastrado";
        } elseif ($nome == null) {
            echo "Insira um produto válido";
        } else {
            $stmt = $connect->prepare("INSERT INTO produtos (Id_produto, Nome_Produto, Imagem_Produto) VALUES (NULL, ?, ?)");
            $stmt->bind_param("ss", $nome, $img);
            
            if ($stmt->execute() === true) {
                unset($nome);
                unset($img);
                header("location:adval.php");
            }
        }
    }
echo '<div class="container">
<h1>Adicionar Produto</h1>
<form method="POST">
    <label for="produto">Insira um produto</label>
    <input type="text" name="produto" id="produto" required>
    <br><br>
    <label for="img">Insira uma imagem para o produto</label>
    <input type="text" name="img" id="img" required>
    <br><br>
    <button type="submit">Enviar</button>
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