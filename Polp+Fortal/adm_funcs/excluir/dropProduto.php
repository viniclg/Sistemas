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
<form action="dropProduto.php" method="post">
    <table class="table table-success table-striped">
            <th>Nome</th>
            <th>-</th>
            <?php
            if($_SESSION['tipo'] == 1){
            $sql1 = $connect -> query("SELECT * FROM produtos");
            if($sql1->num_rows > 0){
            while($l=  $sql1-> fetch_assoc()){
                $nome = $l['Nome_Produto'];
                $id= $l['Id_produto'];

                echo "<tr><td>".$nome."</td><td><input type='checkbox' name='produt[]' value=".$id."></td></tr>";
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
    $produt= isset($_POST['produt']) ? $_POST['produt'] : null;

    foreach($produt as $key_produt => $value_produt){
        $sql= $connect->query("SELECT * FROM valores WHERE Id_Produto='$value_produt'");
        while($l=  $sql-> fetch_assoc()){
            $id_valor=$l['Id_Valor'];

            $sqli= $connect->query("DELETE FROM valores WHERE `valores`.`Id_Valor` = '$id_valor'");
            if($sqli==TRUE){
            }
            else{
                echo "Erro";
            }
        }
        $sqle= $connect->query("DELETE FROM produtos WHERE `produtos`.`id_produto` = '$value_produt'");
        if($sqle==TRUE){
            header("location:dropProduto.php");
        }
        else{
            echo "Erro";
        }
    }
}
echo "<a href='../../indexADM.php'><button>Voltar</button></a>";
            }else{
                echo 'Você não deveria estar aqui<br>
    <a href="../../open/logout.php"><button>Sair</button></a>';
            }
?>