<?php
require_once "../../c.php";
session_start();
?>
<form method="POST">
    <select name="produtos">
<?php
$ResultadoProd = $connect -> query("SELECT * FROM produtos");
if($ResultadoProd -> num_rows > 0 ){
    while($LinhasProd = $ResultadoProd -> fetch_assoc()){
echo '<option value='.$LinhasProd['Id_produto'].'>'.$LinhasProd['Nome_Produto'].'</option>';
    }
}
echo "</select><br>";
$result = $connect -> query("SELECT * from mercado");
$array = array();
    if($result -> num_rows > 0){
        while($l = $result -> fetch_assoc()){
            $nome = $l['Nome_Mercado']; $id = $l['Id_Mercado'];
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
    <button type="submit">enviar</button>
</form>

<?php
if($_POST){
@$id_prod = $_POST['produtos'];
@$array2 = array();
@$mercados = array();
foreach ($_POST['preco'] as $preco) {
array_push($array2,$preco);

}

$mercados = array_combine($idmercado,$array2);
foreach ($mercados as $id => $preco) {
    
        $sql1 = "INSERT INTO valores (Id_Valor, Id_Mercado, Id_Produto, Valor) VALUES ('null', '$id', '$id_prod', '$preco')";
    }
    
 if($connect -> query($sql1) === true){
echo "Produto inserido com sucesso";
 }
   
}

echo "<a href='../../indexADM.php'><button>Voltar</button></a>";

?>
<br><a href="adprod.php"><button>Voltar Para inserir Produtos</button></a>