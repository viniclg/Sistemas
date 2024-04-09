<!DOCTYPE html>
<html>
<head>
    <style>body {
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

        .form-container {
            width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: slide-in 0.5s ease-out;
        }

        select,
        input[type="submit"],
        input[type="text"] {
            margin-bottom: 10px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @keyframes slide-in {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var formContainer = document.querySelector('.form-container');
            formContainer.classList.add('animated');

            formContainer.addEventListener('animationend', function () {
                formContainer.classList.remove('animated');
            });
        });
    </script>
</head>
<body>
    <div class="form-container">
        <form method="POST">
            <select name="produtos">
                <?php
                require_once "../../c.php";
                session_start();

                if($_SESSION['tipo'] == 1){
                $ResultadoProd = $connect->query("SELECT * FROM produtos");
                if ($ResultadoProd->num_rows > 0) {
                    while ($LinhasProd = $ResultadoProd->fetch_assoc()) {
                        echo '<option value=' . $LinhasProd['Id_produto'] . '>' . $LinhasProd['Nome_Produto'] . '</option>';
                    }
                }
                ?>
            </select>
            <br>
            <?php
            $result = $connect->query("SELECT * from mercado");
            $array = array();
            if ($result->num_rows > 0) {
                while ($l = $result->fetch_assoc()) {
                    $nome = $l['Nome_Mercado'];
                    $id = $l['Id_Mercado'];
                    $new_array = array($nome => $id);
                    $array = array_merge($array, $new_array);
                }
            }
            $idmercado = array();
            foreach ($array as $mercado => $idmer) {
                echo $mercado . ": <input type='text' name='preco[]'><br>";
                array_push($idmercado, $idmer);
            }
        
            ?>
            <button type="submit">Enviar</button>
        </form>

        <?php
        if ($_POST) {
            if (empty($_POST['preco']) || count($_POST['preco']) == 0) {
            }else{
            @$id_prod = $_POST['produtos'];
            @$array2 = array();
            @$mercados = array();
            foreach ($_POST['preco'] as $preco) {
                array_push($array2, $preco);
            }

            $mercados = array_combine($idmercado, $array2);
            foreach ($mercados as $Id_Mercado => $Preco) {
                $SelectValores = $connect->query("SELECT * FROM valores WHERE Id_Produto = '$id_prod' AND Id_Mercado='$Id_Mercado'");
                if ($SelectValores->num_rows > 0) {
                    echo "Produto já está com preços nesses mercados<br>";
                } else {
                    $sql1 = $connect ->query("INSERT INTO valores (Id_Valor, Id_Mercado, Id_Produto, Valor) VALUES ('null', '$Id_Mercado', '$id_prod', '$Preco')");
                    echo "Valores Inseridos com sucesso!<br>";
                    }
                }
            }
        }
    echo '<br>
    <a href="../../indexADM.php"><button>Voltar</button></a>
<br><br>
<a href="adprod.php"><button>Voltar para inserir Produtos</button></a>';
}else{
    echo '</select></form>';
    echo 'Você não deveria estar aqui<br>
    <a href="../../open/logout.php"><button>Sair</button></a>';
}
    
        ?>
        

    </div>
</body>
</html>