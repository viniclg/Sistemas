<head>
<link rel="stylesheet" href="css/site.css">
</head>
<?php
require_once 'php_action/conexao.php';

session_start();
$nome = $_SESSION['nome_aluno'];
$id = $_SESSION['id'];

echo "<div class='container'>
<body>
  
BEM VINDO AO SITE </br>".$nome."</br>
<ul>
<p><a href='cursos.php'><button id='new'>Se inscrever em algum curso</button></a></p>
<br><p><a href='php_action/deslog.php'><button id='new'>Logout</button></a></p>
<br><p><a href='editaluno.php'><button id='new'>Editar seus dados</button></a></p>
</ul>

<div class='header'>
  </div>";


echo "<br>Você está inscrito nos cursos: ";

echo "<div class='divTable'>";
echo "</br><table border='1px'>";
echo "<thead>";

echo "<th>Cursos</th>";
echo "<th>Preço</th>";

//pega os dados no banco
$result = $con ->query("SELECT * FROM curso_aluno WHERE id_aluno ='$id'");

//se estiver alguma informação no banco vai ser feito o que está dentro do while
if ($result->num_rows > 0) {
    //o fetch_assoc vai colocar as informações do banco em variáveis $row['nome do atributo']
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['nome_curso']."</td>";
        echo "<td>R$".$row['preco_curso']."</td>";
        echo "</tr>";

    }
} 
echo "</thead>
<tbody>
</tbody>
</table>
</div>
</div>
</body>";

$con->close();

?> 
  