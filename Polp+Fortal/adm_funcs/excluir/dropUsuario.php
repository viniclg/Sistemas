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
<body>
    <form action="dropUsuario.php" method="post">
    <table class="table table-success table-striped">
            <th>Nome</th>
            <th>Login</th>
            <th>Senha</th>
            <th>-</th>
            <?php
            if($_SESSION['tipo'] == 1){
            $sql1 = $connect -> query("SELECT * FROM usuario");
            if($sql1->num_rows > 0){
            while($l=  $sql1-> fetch_assoc()){
                $nome = $l['Nome'];
                $id= $l['Id_Usuario'];
                $login= $l['Login'];
                $senha= $l['Senha'];

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
        $stmt = $connect->prepare("DELETE FROM usuario WHERE `usuario`.`Id_Usuario` = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        
        if($sql==TRUE){
            header("location:dropUsuario.php");
        }
        else{
            echo "Erro";
        }
    }
unset($user);
unset($id_usuario);
}
echo "<a href='../../indexADM.php'><button>Voltar</button></a>";
            }else{
                echo '<br>Você não deveria estar aqui<br>
    <a href="../../open/logout.php"><button>Sair</button></a>';
            }
?>