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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
    <h1>Selecione o(s) que deseja excluir</h1>
</head>
<a href="drop.php"><button>Voltar</button></a>
<body>
    <form action="dropUsuario.php" method="post">
    <table class="table table-success table-striped">
            <th>Nome</th>
            <th>Login</th>
            <th>Senha</th>
            <th>-</th>
            <?php
            $sql1 = $connect -> query("SELECT * FROM usuario");
            if($sql1->num_rows > 0){
            while($l=  $sql1-> fetch_assoc()){
                $nome = $l['nome'];
                $id= $l['id_usuario'];
                $login= $l['login'];
                $senha= $l['senha'];

                echo "<tr><td>".$nome."</td><td>".$login."</td><td>".$senha."</td><td><input type='checkbox' name='user[]' value=".$id."></td></tr>";
            }
        }else{
            echo "Sem usuários";
        }
            ?>
        </table>
        <button>Exluir</button>
    </form>
</body>
</html>
<?php
if($_POST){
    $user= isset($_POST['user']) ? $_POST['user'] : null;

    foreach($user as $key_user => $value_user){
        $id_usuario= $value_user;
        $sql= $connect->query("DELETE FROM usuario WHERE `usuario`.`id_usuario` = '$id_usuario'");
        if($sql==TRUE){
            header("location:dropUsuario.php");
        }
        else{
            echo "Erro";
        }
    }
}
?>