<?php
require_once "../c.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
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
            $nome_mercado=$linha['nome'];
            $id=$linha["id_mercado"];

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
</body>
</html>