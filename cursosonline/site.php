<link rel="stylesheet" href="css/index.css">
<link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">

<?php
require_once 'php_action/conexao.php';

session_start();
$nome = $_SESSION['nome_aluno'];
$id = $_SESSION['id'];

echo "<div class='container'>
<div class='header'>
<span>BEM VINDO AO SITE </br>".$nome."</br></span>
<body>
  
  </div>";
  ?>

<?php
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
?>
</thead>
<tbody>
</tbody>
</table>
<ul>
<br><p><a href ="cursos.php"><button id="new">Se inscrever em algum curso</button></a></p>

<br><button id ="new" onclick="openModal1()">Editar seus dados</button><br>

<br><a href="php_action/deslog.php"><p><button id="new">Logout</button></a></p>

</ul>
</div>
</div>


<?php
require_once 'php_action/conexao.php';

$sql = $con -> query("SELECT * FROM alunos WHERE id_aluno ='$id'");
if ($sql->num_rows > 0) {
  while($row = $sql -> fetch_assoc()) {


echo "<div class='modal-container'>
<div class='modal'>
  <form method='POST' action='php_action/editaluno.php'>
    <label for='m-nome'>Nome</label>";
    echo "<input id='m-nome' type='text' name='nome' value=".$row['nome'].">";

    echo "<label for='m-funcao'>Email</label>";
    echo "<input id='m-funcao' type='text' name='email' value=".$row['email'].">";

echo "<label for='m-salario'>Senha</label>";

    echo "<input type='password' name='senha' id='m-salario' value=".$row['senha'].">";
    echo "<button id='btnSalvar'>Editar</button>
  </form>
</div>
</div>";
}
}


$con->close();

?> 
</body>
<script src="js/cursos.js"></script>
  