<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <title>Mall</title>
</head>

<a href="carrinho.php"><button>Carrinho</button></a>
<a href="php_action/destruir.php"><button>Sair da sessão</button></a>


<form method="POST" action="carrinho.php">

<body>
    <div>
      
    <?php
session_start();
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];


if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
  header('location:site.php');
}

    require_once 'php_action/conexao.php';

    $result = $con -> query("SELECT * FROM produtos");

    if($result -> num_rows > 0){

        while($row = $result -> fetch_assoc()){
        
            echo '<div class="container">';
            echo "<img src='fotos/".$row['foto']."'class='image' 'width='150px' height='100px'>";
echo'<div class="middle">';

echo '<div class="text"><input type="radio" value="'.$row['nome_prod'].'" name="prod">'.$row['nome_prod'].'</input><br>

Preço: <input type="hidden" value="'.$row['preco'].'" name="preço">'.$row['preco'].'<br>

Quantidade em estoque: <input type="hidden" value="'.$row['quantidade'].'" name="quant">'.$row['quantidade'].'<br>
<input type="submit" value="Adicionar ao carrinho">
</div>
</div>
</div>';
} 
}
    else{
      echo "Nada a mostrar";
    }
  

    ?>
    </div>
    <div>
</div>
</form>
    </table>
</body>
</html>