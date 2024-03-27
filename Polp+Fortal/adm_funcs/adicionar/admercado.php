<?php
require_once "../../c.php";
session_start();
?>
<form method="POST">
Insira o nome do mercado<input type="text" name="nome">
Insira a logo do mercado<input type="text" name="img">
<input type="Submit" value="Adicionar">
</form>

<?php
require_once "../../c.php";
if($_POST){
$nome = $_POST['nome'];

$sql = $connect -> query("SELECT * from mercado where nome like '%$nome%'");
if($sql -> num_rows > 0){
    echo "Esse mercado já existe";
}else{
$img = $_POST['img'];
    $result = $connect -> query("INSERT INTO mercado (id_mercado, nome, img)VALUES (null,'$nome', '$img')");
    if($result === true){
        echo "deu certo";
    }
}
}
?>