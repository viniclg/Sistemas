<form method="POST">
    <select name="prod">
<?php
require_once 'c.php';

$result = $connect -> query("SELECT * FROM produtos");
if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        echo "<option value='".$row['id_produto']."'>".$row['nome']."";
    }
}
?>
</select>
<br><input type='submit' value='Enviar'>
</form>

<form method="POST" action='altprod.php'>
<?php
if($_POST){
    $prod = $_POST['prod'];
$sql = $connect -> query("SELECT * FROM produtos where id_produto='$prod'");
if($sql -> num_rows > 0){
    while($l = $sql -> fetch_assoc()){
        echo "Alterar nome<input type='text' name='nomeprod' value='".$l['nome']."'>";
        echo "<br>Alterar link<input type='text' name='img' value='".$l['img']."'><br>";

    }
}
$valor = array();
$idmer = array();
$sql1 = $connect -> query("SELECT * FROM valores where id_produto='$prod'");
if($sql1 -> num_rows > 0){
    while ($r = $sql1 -> fetch_assoc()){
        $preco = $r['valor'];
        $id = $r['id_mercado'];
        array_push($idmer,$id);
        array_push($valor,$preco);
    }
}
$val= array_combine($idmer, $valor);
echo "<input type='hidden' name='idprod' value='".$prod."'>
<input type='hidden' name='valor[]' value='".$val."'>";
foreach($val as $idmer => $valor){
$sql2 = $connect -> query("SELECT m.nome , val.valor FROM mercado as m, valores as val WHERE m.id_mercado='$idmer' AND val.valor='$valor'");
if($sql2 -> num_rows > 0){
    while ($li = $sql2 -> fetch_assoc()){
        echo "<br>".$li['nome']."<input type='text' name='valor[]' value='".$li['valor']."'>";
    }
}
}
}
?>
<input type="submit" value="Mudar">
</form>