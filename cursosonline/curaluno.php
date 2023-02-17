<?php
require_once 'conexao.php';
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['nome_aluno'];
$email = $_SESSION['email'];

$id_curso = $_POST['nomecurso'];

$result = $con ->query ("SELECT * FROM cursos WHERE id_cursos = '$id_curso'");
while ($row = mysqli_fetch_assoc($result)){
$nomecur = $row['nome'];
    }

$sql = "INSERT INTO curso_aluno (id_aluno, id_curso, nome_aluno, email_aluno, nome_curso) 
VALUES ('$id','$id_curso', '$nome', '$email','$nomecur')";

        if ($con->query($sql) === TRUE) {
            echo "<p>êxito em entrar no curso!</p>";
            echo "<a href='site.php'><button>HOME</button></a>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
?>