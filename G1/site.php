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
<a href="noticias.php"><button>Ver Noticias</button></a>
<a href="casdastro.php"><button>Casdastrar Noticias</button></a>
<a href="deslog.php"><button>Deslogar</button></a>
</body>
</html>
