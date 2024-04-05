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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<a href="drop.php"><button>Voltar</button></a>
<form action="dropMercado.php" method="post">
    <table class="table table-success table-striped">
            <th>Nome</th>
            <th>-</th>
            <?php
            $sql1 = $connect -> query("SELECT * FROM mercado");
            if($sql1->num_rows > 0){
            while($l=  $sql1-> fetch_assoc()){
                $nome = $l['nome'];
                $id= $l['id_mercado'];

                echo "<tr><td>".$nome."</td><td><input type='checkbox' name='mercad[]' value=".$id."></td></tr>";
            }
        }else{
            echo "Sem Produtos";
        }
            ?>
        </table>
        <button>Exluir</button>
    </form>
</body>
</html>
<?php
if($_POST){
    $mercad= isset($_POST['mercad']) ? $_POST['mercad'] : null;

    foreach($mercad as $key_mercad => $value_mercad){
        $sql= $connect->query("SELECT * FROM valores WHERE id_mercado='$value_mercad'");
        while($l=  $sql-> fetch_assoc()){
            $id_valor=$l['id_valor'];

            $sqli= $connect->query("DELETE FROM valores WHERE `valores`.`id_valor` = '$id_valor'");
            if($sqli==TRUE){
            }
            else{
                echo "Erro";
            }
        }
        $sqle= $connect->query("DELETE FROM mercado WHERE `mercado`.`id_mercado` = '$value_mercad'");
        if($sqle==TRUE){
            header("location:dropMercado.php");
        }
        else{
            echo "Erro";
        }
    }
}
echo "<a href='../../indexADM.php'><button>Voltar</button></a>";
?>