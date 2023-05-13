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
   <h2>Selecione o que deseja fazer</h2>
   <form action="drop.php" method="post">
    <input type="submit" value="Excluir Usuário" name="opcao">
    <input type="submit" value="Excluir Produto" name="opcao">
    <input type="submit" value="Excluir Mercado" name="opcao">
   </form> 
</body>
</html>
<?php
if($_POST){
    $opcao=$_POST['opcao'];

    if($opcao==="Excluir Usuário"){
        header('location:dropUsuario.php');
    }
    elseif($opcao==="Excluir Produto"){
        header('location:dropProduto.php');
    }
    elseif($opcao==="Excluir Mercado"){
        header('location:dropMercado.php');
    }
    else{
        echo"Selecione uma opção";
    }
}
?>