<?php
require_once "../../c.php";
session_start();
?>
<form method="POST">
Insira o nome do mercado<input type="text" name="nome"><br><br>
Insira a logo do mercado(O nome do arquivo e a sua extensão)<input type="text" name="img"><br>
<input type="Submit" value="Adicionar">
</form>

<?php
require_once "../../c.php";
if($_POST){
$nome = $_POST['nome'];

$sql = $connect -> query("SELECT * from mercado where Nome_Mercado like '%$nome%'");
if($sql -> num_rows > 0){
    echo "Esse mercado já existe";
}else{
$img = $_POST['img'];
    $result = $connect -> query("INSERT INTO mercado (Id_mercado, Nome_Mercado, Imagem_Mercado)VALUES (null,'$nome', '$img')");
    if($result === true){
        echo "deu certo";
    }
}
}
echo "<br><a href='../../indexADM.php'><button>Voltar</button></a>";
?>