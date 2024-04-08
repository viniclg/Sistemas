<?php
require_once "../c.php";
session_start();

$Select_Precos = $connect->query("SELECT * FROM valores inner join produtos on produtos.Id_produto = valores.Id_Produto");
if($Select_Precos -> num_rows > 0){
    while($Resultado_Precos = $Select_Precos -> fetch_assoc()){
        $nomes_produtos[] = $Resultado_Precos['Nome_Produto'];
        $dados_precos_anteriores[] = (float) $Resultado_Precos['Valor'];
    }
    $dados_json = json_encode($dados_precos_anteriores);
    $nomes_produtos_json = json_encode($nomes_produtos);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Produto');
    data.addColumn('number', 'Preço');
    
    // Inserir os dados do banco de dados no gráfico
    var dados = <?php echo $dados_json; ?>;
    var nomesProdutos = <?php echo $nomes_produtos_json; ?>;
    data.addRows(dados.length);
    for (var i = 0; i < dados.length; i++) {
        data.setCell(i, 0, nomesProdutos[i]);
        data.setCell(i, 1, dados[i]);
    }

    var options = {
        title: 'Preços Anteriores dos Produtos',
        seriesType: 'bars', // Define o tipo de série para barras
        series: {1: {type: 'line'}} // Define o tipo de série para a linha (segunda série)
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
    </script>
    <h1>Polp+Fortal</h1>
</head>
<body>
    <h2>Selecione quem deseja comparar</h2>
    <form method="post" action="in1.php">
    <select name="comparacao" class="form-select">
        <option value="0">-</option>
        <option value="1">Comparar todos os mercados</option>
        <option value="2">Selecionar mercados que quero comparar</option>
    </select>
    <button>Enviar</button>
</form>

<?php
@$comparacao=$_POST['comparacao'];
@$_SESSION['tipo_de_comparacao']=$comparacao;

if($comparacao==="2"){
    echo "<hr>
    <h3>Selecione os mercados que deseja: </h3>
    <form method='post' action='inProd.php'>";
    $resultado=$connect->query("SELECT * FROM mercado");
    if($resultado->num_rows > 0){
        while($linha=$resultado->fetch_assoc()){
            $nome_mercado=$linha['Nome_Mercado'];
            $id=$linha["Id_Mercado"];

            echo "<input type='checkbox' name='mercados[]' value=".$id.">".$nome_mercado."<br>";
        }}
    echo "<button id='enviar'>Enviar</button>
    </form>";
}
elseif($comparacao==="1"){
    header("location:inProd.php");
}
elseif($comparacao==="0"){
    echo "<h3>Selecione uma das alternativas</h3>";
}
?>
<?php
if($_SESSION['tipo'] == 1){
    echo '<br><a href="../indexADM.php"><button>Index</button></a><br><br>';
}else{
    echo '<br><a href="../index.php"><button>Index</button></a><br><br>';
}
?>
<a href="../open/logout.php"><button>Sair</button></a>
<div id="chart_div" style="width: 100%; height: 400px;"></div>
</body>
</html>