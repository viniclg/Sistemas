<?php
require_once 'php_action/conexao.php';

session_start();
$nome = $_SESSION['nome_aluno'];
$id = $_SESSION['id'];

echo "BEM VINDO AO SITE </br>".$nome."</br>";
echo "<br>Você está inscrito nos cursos: ";

echo "</br><table border='1px'>";

echo "<th>Cursos</th>";

//pega os dados no banco
$result = $con ->query("SELECT * FROM curso_aluno WHERE id_aluno ='$id'");

//se estiver alguma informação no banco vai ser feito o que está dentro do while
if ($result->num_rows > 0) {
    //o fetch_assoc vai colocar as informações do banco em variáveis $row['nome do atributo']
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
 <p><a href='editaluno.php'><button>Editar seus dados</button></a></p>
</body>