<?php
require_once "../../c.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Consultar</h1>
<body>
    <form action="consultar.php" method="post">
        <input type="search" name="pesquisa">
        <button>Enviar</button>
    </form>
<table border=1px>
<?php
if($_POST){
$pesquisa = $_POST['pesquisa'];

$result = $connect ->query("SELECT * FROM produtos WHERE nome LIKE '%$pesquisa%'");
if($result -> num_rows > 0){
    echo "<th>Nome</th>
    <th>Imagem</th>";
    while ($row = $result -> fetch_assoc()){
    $nome = $row['nome'];
    $img= $row['img'];
    echo "<tr><td>".$nome."</td><td>".$img."</td></tr>";
    }
}elseif($result -> num_rows == 0){
    $re = $connect ->query("SELECT * FROM usuario WHERE nome LIKE '%$pesquisa%' or login LIKE '%$pesquisa%'");
    if($re -> num_rows > 0){
    echo "<th>Nome</th>
    <th>Login</th>";
    while ($row = $re -> fetch_assoc()){
    $nome = $row['nome'];
    $login= $row['login'];
    echo "<tr><td>".$nome."</td><td>".$login."</td></tr>";
    }
}elseif($re -> num_rows == 0){
    $r = $connect ->query("SELECT * FROM mercado WHERE nome LIKE '%$pesquisa%'");
    if($r -> num_rows > 0){
    echo "<th>Nome</th>
    <th>Imagem</th>";
    while ($row = $r -> fetch_assoc()){
    $nome = $row['nome'];
    $img= $row['img'];
    echo "<tr><td>".$nome."</td><td>".$img."</td></tr>";
    }
}else{
    echo "Isso não Existe";
            }
        }
    }
}
?>
</table>
</body>
</html>