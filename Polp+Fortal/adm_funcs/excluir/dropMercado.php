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
<form action="dropMercado.php" method="post">
    <table class="table table-success table-striped">
            <th>Nome</th>
            <th>-</th>
            <?php
            if($_SESSION['tipo'] == 1){
            $sql1 = $connect -> query("SELECT * FROM mercado");
            if($sql1->num_rows > 0){
            while($l=  $sql1-> fetch_assoc()){
                $nome = $l['Nome_Mercado'];
                $id= $l['Id_Mercado'];

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
        $stmt = $connect->prepare("SELECT * FROM valores WHERE Id_Mercado = ?");
        $stmt->bind_param("i", $value_mercad);
        $stmt->execute();
        $result = $stmt->get_result();
        while($l=  $result-> fetch_assoc()){
            $id_valor=$l['Id_Valor'];

            $stmt = $connect->prepare("DELETE FROM valores WHERE `Valores`.`Id_Valor` = ?");
            $stmt->bind_param("i", $id_valor);
            $stmt->execute();

            if ($stmt->affected_rows > 0){}
            else{
                echo "Erro";
            }
        }
        $stmt = $connect->prepare("DELETE FROM mercado WHERE `mercado`.`Id_Mercado` = ?");
        $stmt->bind_param("i", $value_mercad);
        if($stmt->execute()==TRUE){
            header("location:../../indexADM.php");
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