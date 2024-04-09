<?php
require_once "../../c.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        input[type="search"] {
            padding: 10px;
            width: 300px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        #piechart {
            width: 600px;
            height: 400px;
            margin: 0 auto;
        }

        .index-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <table>
        <?php
        if($_SESSION['tipo'] == 1){
            echo '<h1>Consultar</h1>
            <form action="consultar.php" method="post">
                    <input type="search" name="pesquisa">
                    <button type="submit">Enviar</button>
        
            </form>';
        if ($_POST) {
            $pesquisa = $_POST['pesquisa'];
            $dataArray = array(
                array('Produto', 'Total de Pesquisas')
            );

            $result = $connect->query("SELECT * FROM produtos WHERE Nome_Produto LIKE '%$pesquisa%'");
            if ($result->num_rows > 0) {
                echo "<tr><th>Nome</th><th>Imagem</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $Nome_Produto = $row['Nome_Produto'];
                    $Img_Produto = $row['Imagem_Produto'];
                    $Pesquisas_Produto = intval($row['Pesquisas']);
                    $data = array($Nome_Produto, $Pesquisas_Produto);
                    array_push($dataArray, $data);
                    echo "<tr><td>" . $Nome_Produto . "</td><td><img src='" . $Img_Produto . "'></td></tr>";
                }
                $dataJSON = json_encode($dataArray);
            }
        }
        ?>
    </table>
    <div id="piechart"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo $dataJSON; ?>);

            var options = {
                title: 'Total de Pesquisas de Produtos',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <?php
    echo '<a href="../../IndexADM.php"><button>Index</button></a>';
        }else{
            echo 'Você não deveria estar aqui<br>
    <a href="../../open/logout.php"><button>Sair</button></a>';
        }
    ?>

</body>
</html>