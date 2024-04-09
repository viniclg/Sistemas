<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <select name="Mercado_Select">
<?php
require_once "../../c.php";
session_start();
if($_SESSION['tipo'] == 1){
$Select_Mercados = $connect -> query("SELECT * FROM mercado");
if($Select_Mercados -> num_rows > 0){
    while($Result_Mercados = $Select_Mercados -> fetch_assoc()){
        echo "<option value=".$Result_Mercados['Id_Mercado'].">".$Result_Mercados['Nome_Mercado']."</option>";
    }
}
?>
</select>
<br><br><input type="Submit" Value="Enviar">
   </form>
   
   <?php
   if($_POST){
    echo "<form action='AltermercadoBackEnd.php' METHOD='post'>";
    $Id_Mercado = $_POST['Mercado_Select'];

    $Select_Mudanca = $connect -> query("SELECT * FROM mercado WHERE Id_Mercado='$Id_Mercado'");
    if($Select_Mudanca -> num_rows > 0){
        while($Result_Mudanca = $Select_Mudanca -> fetch_assoc()){
            echo "<input type='text' name='Nome_Mercado' value=".$Result_Mudanca['Nome_Mercado'].">";
            echo "<br><input type='text' name='Imagem_Mercado' value=".$Result_Mudanca['Imagem_Mercado'].">";
            echo "<br><input type='submit' value='Mudar'>";
        }
    }

   
   echo "<input type='hidden' name='Id_Mercado' value='".$Id_Mercado."'>";
   echo '</form>
   <br><a href="../../indexADM.php"><button>Index</button></a>
   ';
}
}else{
    echo '</select>
    Você não deveria estar aqui<br>
    <a href="../../open/logout.php"><button>Sair</button></a>';  
}
   ?>
</body>
</html>