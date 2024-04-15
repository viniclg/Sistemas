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
        $stmt = $connect->prepare("SELECT * FROM valores WHERE Id_Produto = ?");
        $stmt->bind_param("i", $value_produt);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($l=  $result-> fetch_assoc()){
            $id_valor=$l['Id_Valor'];

            $Prepara_DeleteValor= $connect->prepare("DELETE FROM valores WHERE `valores`.`Id_Valor` = ?");
            $Prepara_DeleteValor->bind_param("i",$id_valor);
            if($Prepara_DeleteValor->execute()==TRUE){
            }
            else{
                echo "Erro";
            }
        }
        $Prepara_DeleteProduto = $connect->prepare("DELETE FROM produtos WHERE `produtos`.`id_produto` = ?");
        $Prepara_DeleteProduto->bind_param("i",$value_produt);
        if($Prepara_DeleteProduto->execute()==TRUE){
            header("location:dropProduto.php");
        }
        else{
            echo "Erro";
        }
    }
unset($id_valor);
}
echo "<a href='../../indexADM.php'><button>Voltar</button></a>";
            }else{
                echo 'Você não deveria estar aqui<br>
    <a href="../../open/logout.php"><button>Sair</button></a>';
            }
?>