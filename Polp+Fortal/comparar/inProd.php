<?php
require_once "../c.php";
session_start();

if($_POST){
    $mercados= isset($_POST['mercados']) ? $_POST['mercados'] : null;
    $_SESSION['mercados']= json_encode($mercados);
   /*if($mercados != null){
        foreach($mercados as $key => $value){
            echo $mercados;
        }
    }*/
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
    <a href='in1.php'><button type="button">Voltar</button></a>
</head>
<body>
    <?php
    if($_SESSION['tipo_de_comparacao']==="2"){
        if($mercados === null){
            header("location:in1.php");
        }
    }
    ?>
    <h2>Selecione o(s) produtos</h2>
    <form method="post" action="comparacao.php">
        <?php
        $resultado=$connect->query("SELECT * FROM produtos");
        if($resultado->num_rows > 0){
            while($linha=$resultado->fetch_assoc()){
                $nome_produto=$linha['nome'];
                $id=$linha["id_produto"];
    
                echo "<input type='checkbox' name='produtos[]' value=".$id.">".$nome_produto."<br>";
            }
        }
        ?>
        <button>Enviar</button>
        </form>
</body>
</html>