
<?php
require_once 'c.php';
$prod = $_POST['idprod'];
$val = array();
$idmercado = array();
$preco = array();
$sql1 = $connect -> query("SELECT * FROM valores where id_produto='$prod'");
if($sql1 -> num_rows > 0){
    while ($r = $sql1 -> fetch_assoc()){
        array_push($idmercado,$r['id_mercado']);
        array_push($preco, $r['valor']);
        $val =array_combine($idmercado, $preco);
    }
}


$nome = $_POST['nomeprod'];
$img = $_POST['img'];

$result = $connect -> query("UPDATE produtos SET nome='$nome' , img='$img' WHERE id_produto='$prod'");

foreach($val as $id => $preco){

$sql1 = $connect -> query("UPDATE valores SET valor='$preco' WHERE id_mercado='$id'");
}

if($result === true AND $sql1 === true){
    echo "<a href='alterprod.php'><button>voltar</button></a>";
}
?>