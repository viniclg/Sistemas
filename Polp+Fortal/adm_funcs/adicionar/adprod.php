<?php
require_once "../../c.php";
session_start();
?>
<form method="POST">
    
    Insira um produto<input type="text" name="produto"><br>
    Insira uma imagem pro produto<input type="text" name="img">
    <button>Enviar</button>
<?php
if($_POST){
    $_SESSION['nomeprod'] = $_POST['produto'];
        $nome = $_POST['produto'];
        $img = $_POST['img'];
    $result = $connect -> query("SELECT * FROM produtos WHERE nome='$nome'");
    if($result -> num_rows > 0){
        
echo "Produto já cadastrado";
    }elseif($nome == null){

echo "Insira um produto válido";
    }else{

$sql2 = $connect -> query("INSERT INTO produtos(id_produto, nome, img) VALUES (null, '$nome', '$img')");
if($sql2 === true){
header("location:adval.php");
}
}
}

?>