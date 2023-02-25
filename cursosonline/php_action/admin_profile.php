
<?php

require_once 'conexao.php';

echo"<p>Todos os registros de alunos</p>";

echo "<table border='1px'>";
 echo "<th>Id do aluno</th>";
 echo "<th>Nome do aluno</th>";
 echo "<th>Email do aluno</th>";

$sql = "SELECT * FROM alunos";
$result = $con->query($sql);

//o if vai verificar se tem registros no banco de dados, se tiver vai imprimir
if ($result->num_rows > 0) {
    
    //o fetch_assoc vai colocar as informações do banco em variáveis $row['nome do atributo']
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id_aluno']."</td>";
        echo "<td>".$row['nome']."</td>";
        echo "<td>".$row['email']."R$</td>";
        echo "</tr>";

    }
} 
echo "</table><br>";

echo "Todos registros de cursos";

$sql1 = "SELECT * FROM cursos";
$result1 = $con->query($sql1);

 echo "<table border='1px'>";
 echo "<th>Id do curso</th>";
 echo "<th>Nome do curso</th>";
 echo "<th>Vagas disponíveis</th>";
 echo "<th>Preço do curso</th>";

 //o if vai verificar se tem registros no banco de dados, se tiver vai imprimir
if ($result1->num_rows > 0) {

    //o fetch_assoc vai colocar as informações do banco em variáveis $row['nome do atributo']
    while($row = $result1->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id_cursos']."</td>";
        echo "<td>".$row['nome']."</td>";
        echo "<td>".$row['vaga']."</td>";
        echo "<td>".$row['preco']."R$</td>";
        echo "</tr>";
    }
} 
echo "</table>";

$con->close();

?> 
  
  <body>  
 <p><a href='../inserircursos.php'><button>Inserir algum curso</button></a></p>
 <p><a href='deslog.php'><button>Logout</button></a></p>
 <p><a href='../editarcurso.php'><button>Editar algum curso</button></a></p>

</body>