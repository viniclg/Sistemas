<?php
require_once 'conexao.php';

session_start();
$id = $_SESSION['id'];

echo "BEM VINDO AO SITE".$id;
echo "Você está inscrito nos cursos: ";
echo "<table>";

$sql = "SELECT * FROM cursos WHERE id_aluno ='$id'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<h2>".$row['nome_curso']."</h2>";

    }
} 

$con->close();

?> 
  
  <body>  
 <p><a href='cursos.php'><button>Se inscrever em algum curso</button></a></p>
</body>