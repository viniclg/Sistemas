<?php
require_once "../../c.php";
session_start();
?>
<a href="adprod.php"><button>Voltar</button></a>
<form method="POST">
<?php

@$nomeprod = $_SESSION['nomeprod'];

$result = $connect -> query("SELECT * from mercado");
$array = array();
    if($result -> num_rows > 0){
        while($l = $result -> fetch_assoc()){
            $nome = $l['nome']; $id = $l['id_mercado'];
            $new_array = array($nome => $id);
            $array=array_merge($array, $new_array);
        }
    }
    $idmercado = array();
foreach ($array as $mercado => $idmer) {
    echo $mercado."<input type='text' name='preco[]'><br>";
    array_push($idmercado,$idmer);
}
    
    ?>
    <button>enviar</button>
</form>
<?php
@$array2 = array();
@$mercados = array();
foreach ($_POST['preco'] as $preco) {
array_push($array2,$preco);
}
if($_POST){
$sql = $connect -> query("SELECT * FROM produtos WHERE nome='$nomeprod'");
if($sql -> num_rows > 0){
    while ($row = $sql -> fetch_assoc()){
        $id_prod= $row['id_produto'];
    }
}
$mercados = array_combine($idmercado,$array2);
foreach ($mercados as $id => $preco) {
    
        $sql1 = "INSERT INTO valores (id_valor, id_mercado, id_produto, valor) VALUES ('null', '$id', '$id_prod', '$preco')";
    }
    
 if($connect -> query($sql1) === true){
echo "Produto inserido com sucesso
<button><a href='in1.php'></a></button>";
 }
   
}

?>