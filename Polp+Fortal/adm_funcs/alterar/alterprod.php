<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
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
</head>
<body>
    <div class="form-container">
        <form method="POST">
            <select name="prod">
                <?php
                require_once '../../c.php';

                $result = $connect->query("SELECT * FROM produtos");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Id_produto'] . "'>" . $row['Nome_Produto'];
                    }
                }
                ?>
            </select>
            <br>
            <input type='submit' value='Enviar'>
        </form>

        <form method="POST" action='altprod.php'>
            <?php
            if ($_POST) {
                $prod = $_POST['prod'];
                $sql = $connect->query("SELECT * FROM produtos where Id_produto='$prod'");
                if ($sql->num_rows > 0) {
                    while ($l = $sql->fetch_assoc()) {
                        echo "Alterar nome<input type='text' name='nomeprod' value='" . $l['Nome_Produto'] . "'>";
                        echo "<br>Alterar link<input type='text' name='img' value='" . $l['Imagem_Produto'] . "'><br>";
                    }
                }
                $valor = array();
                $idmer = array();
                $sql1 = $connect->query("SELECT * FROM valores where Id_Produto='$prod'");
                if ($sql1->num_rows > 0) {
                    while ($r = $sql1->fetch_assoc()) {
                        $preco = $r['Valor'];
                        $id = $r['Id_Mercado'];
                        array_push($idmer, $id);
                        array_push($valor, $preco);
                    }
                }
                $val = array_combine($idmer, $valor);
                echo "<input type='hidden' name='idprod' value='" . $prod . "'>";
                foreach ($val as $idmer => $valor) {
                    $sql2 = $connect->query("SELECT m.Nome_Mercado, val.Id_Produto, val.Valor FROM mercado AS m JOIN valores AS val ON m.Id_Mercado = val.Id_Mercado WHERE m.Id_Mercado = '$idmer' AND val.Id_Produto = '$prod'");
                    if ($sql2->num_rows > 0) {
                        while ($li = $sql2->fetch_assoc()) {
                        echo "<br>" . $li['Nome_Mercado'] . "<input type='text' name='valor[]' value='" . $li['Valor'] . "'>";
                        }
                    }
                }
            }
            ?>
            <br>
            <input type="submit" value="Mudar">
        </form>
        <form method="POST" action="../../indexADM.php">
    <input type="submit" value="Voltar">
</form>
    </div>
    </div>

    <script>
        var formContainer = document.querySelector('.form-container');
        formContainer.classList.add('animated');

        formContainer.addEventListener('animationend', function() {
            formContainer.classList.remove('animated');
        });
    </script>
</body>
</html>