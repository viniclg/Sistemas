<?php
require_once "../../c.php";
session_start();
if($_SESSION['tipo'] == 1){
if($_POST){
    $Id_Mercado = strip_tags($_POST['Id_Mercado']);
    $Nome_Mercado = strip_tags($_POST['Nome_Mercado']);
    $Imagem_Mercado = strip_tags($_POST['Imagem_Mercado']);
    
    $stmt = $connect->prepare("UPDATE mercado SET Nome_Mercado = ?, Imagem_Mercado = ? WHERE Id_Mercado = ?");
    
    $stmt->bind_param("ssi", $Nome_Mercado, $Imagem_Mercado, $Id_Mercado);

    if($stmt->execute() === true){
        echo "<a href='altermercado.php'><button>Voltar</button></a>";
    }
unset($Id_Mercado);
unset($Nome_Mercado);
unset($Imagem_Mercado);
}
echo '<br><a href="../../indexADM.php"><button>Index</button></a>';
}else{
    echo 'Você não deveria estar aqui<br>
    <a href="../../open/logout.php"><button>Sair</button></a>';
}
?>