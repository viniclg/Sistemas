<?php
require_once 'conexao.php';
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['nome_aluno'];
$email = $_SESSION['email'];

$id_curso = $_POST['nomecurso'];

$sql1 = "SELECT * FROM curso_aluno WHERE id_curso = '$id_curso' and id_aluno = '$id'";
$resultado1 = mysqli_query($con, $sql1);
if(mysqli_num_rows($resultado1) != 0){
    echo "<p>Você não pode se cadastrar no mesmo curso mais de uma vez!</p>";
    echo "<a href='../cursos.php'><button>HOME</button></a>";
}else{

$result = $con ->query ("SELECT * FROM cursos WHERE id_cursos = '$id_curso'");
while ($row = mysqli_fetch_assoc($result)){
$nomecur = $row['nome'];
$vagas= $row['vaga'];
    }

    if($vagas == 0){
        echo "<p>Você não pode se cadastrar nesse curso, não tem mais vagas!</p>";
        echo "<a href='../cursos.php'><button>HOME</button></a>"; 
    }else{

$sql = "INSERT INTO curso_aluno (id_aluno, id_curso, nome_aluno, email_aluno, nome_curso) 
VALUES ('$id','$id_curso', '$nome', '$email','$nomecur')";

$update = "UPDATE cursos SET vaga = vaga -1 WHERE id_cursos = '$id_curso'";
$resultado = mysqli_query($con, $update);

        if ($con->query($sql) === TRUE) {
            echo "<p>êxito em entrar no curso!</p>";
            echo "<a href='../site.php'><button>HOME</button></a>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>