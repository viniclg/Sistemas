<?php
require_once '../../c.php';
$prod = $_POST['idprod'];
$valor = $_POST['valor'];
$val = array();
$idmercado = array();
$preco = array();
foreach ($valor as $Id_valor => $Preco_Valor) {
    array_push($preco, $Preco_Valor);
}
$sql1 = $connect->query("SELECT * FROM valores where Id_Produto='$prod'");
if ($sql1->num_rows > 0) {
    while ($r = $sql1->fetch_assoc()) {
        array_push($idmercado, $r['Id_Mercado']);
    }
    $val = array_combine($idmercado, $preco);
}

$nome = $_POST['nomeprod'];
$img = $_POST['img'];

$result = $connect->query("UPDATE produtos SET Nome_Produto='$nome', Imagem_Produto='$img' WHERE Id_produto='$prod'");

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .success-message {
            width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: slide-in 0.5s ease-out;
        }

        .success-message h2 {
            margin-top: 0;
        }

        .success-message p {
            margin-bottom: 20px;
        }

        .success-message a {
            display: inline-block;
            padding: 8px 16px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
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
        window.addEventListener('load', function () {
            var successMessage = document.querySelector('.success-message');
            successMessage.classList.add('animated');

            successMessage.addEventListener('animationend', function () {
                successMessage.classList.remove('animated');
            });
        });
    </script>
</head>
<body>
<div class="success-message">
    <?php
    if ($result === true) {
        foreach ($val as $id => $preco) {
            $sql = "UPDATE valores SET Preco_Anterior4 = Preco_Anterior3 WHERE Id_Mercado='$id' AND Id_Produto='$prod' ";
            $connect->query($sql);

            $sql = "UPDATE valores SET Preco_Anterior3 = Preco_Anterior2 WHERE Id_Mercado='$id' AND Id_Produto='$prod'";
            $connect->query($sql);

            $sql = "UPDATE valores SET Preco_Anterior2 = Preco_Anterior1 WHERE Id_Mercado='$id' AND Id_Produto='$prod'";
            $connect->query($sql);

            $sql = "UPDATE valores SET Preco_Anterior1 = Valor WHERE Id_Mercado='$id' AND Id_Produto='$prod'";
            $connect->query($sql);
            $sql1 = $connect->query("UPDATE valores SET Valor='$preco' WHERE Id_Mercado='$id' AND Id_Produto='$prod'");

            if ($sql1 === true) {
            }
        }
    } else {
        echo "<h2>Erro ao mudar</h2>";
    }
    echo "<p>Mudado com sucesso</p>";

    ?>
        <div class="button-container">
        <a href="alterprod.php">Voltar</a>
    </div>
</div>
</body>
</html>