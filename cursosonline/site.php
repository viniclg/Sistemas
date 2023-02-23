<?php
require_once 'php_action/conexao.php';

session_start();
$nome = $_SESSION['nome_aluno'];
$id = $_SESSION['id'];

echo "BEM VINDO AO SITE </br>".$nome."</br>";
echo "</br>Você está inscrito nos cursos: ";

echo "<table border='1px'>";

$sql = "SELECT * FROM curso_aluno WHERE id_aluno ='$id'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['nome_curso']."</td>";
        echo "</tr>";

    }
} 
echo "</table>";

$con->close();

?> 
  
  <body>  
 <p><a href='cursos.php'><button>Se inscrever em algum curso</button></a></p>
 <p><a href='php_action/deslog.php'><button>Logout</button></a></p>
</body>