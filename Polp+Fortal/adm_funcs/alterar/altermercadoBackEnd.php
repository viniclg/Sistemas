<?php
require_once "../../c.php";
if($_POST){
    $Id_Mercado = $_POST['Id_Mercado'];
    $Nome_Mercado = $_POST['Nome_Mercado'];
    $Imagem_Mercado = $_POST['Imagem_Mercado'];
    $Alterar_Mercado = $connect->query("Update mercado SET Nome_Mercado='$Nome_Mercado', Imagem_Mercado='$Imagem_Mercado' WHERE Id_Mercado='$Id_Mercado'");

    if($Alterar_Mercado === true){
        echo "<a href='altermercado.php'><button>Voltar</button></a>";
    }
}
?>