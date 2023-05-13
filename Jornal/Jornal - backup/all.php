<?php
require_once 'conexao.php';
echo "<table>";

$sql = "SELECT * FROM noticia order by data desc"; 
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
?>