<?php
require_once 'conexao.php';

session_start();
$user = $_SESSION['login'];
?>



<html>
<head>
</head>
<body style="background: transparent url(https://i.ytimg.com/vi/FFaUaFSOOuY/maxresdefault.jpg) center right no-repeat; margin: 20px auto; padding: 45px 10px 20px; width: 90%; ">
<?php
echo "BEM VINDO ".$user;
?>
<h1>G1 Oficial!!!</h1>
<a href="casdastro.php"><button>Cadastrar Noticias</button></a>
<a href="deslog.php"><button>Deslogar</button></a>
<a href="all.php"><button>Veja todas as noticias</button></a>

<?php
echo "<table>";

$sql = "SELECT * FROM noticia WHERE user ='$user'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<h2>".$row['titulo']."</h2>";
        echo "<p>".$row['noticia']."</p>";
        echo "<p>".$row['data']."</p>";
        echo "<p><img src=".$row['imagem']."</p></img>";
    }
} 

$con->close();

?> 
  
  <body>
 <p><a href='site.php'><button>VOLTAR PARA O SITE</button></a></p>
</body>
</body>
</html>

