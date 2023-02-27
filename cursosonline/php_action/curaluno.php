<?php
require_once 'conexao.php';
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['nome_aluno'];
$email = $_SESSION['email'];

$id_curso = $_POST['nomecurso'];
$preco = $_POST['preco'];

if($id_curso == ""){
    echo "<p>Selecione uma opção válida!</p>";
    echo "<a href='../cursos.php'><button>Voltar</button></a>";

}else{

//esse resultado vai pegar as informações do aluno com o mesmo id de aluno e id de curso no banco
$resultado1 = $con -> query("SELECT * FROM curso_aluno WHERE id_curso = '$id_curso' and id_aluno = '$id'");

//se o result voltar algo diferente de 0 ou em outras palavras
//se o resultado voltar que tem o mesmo aluno cadastrado no curso, não vai deixar ele entrar no curso
if(mysqli_num_rows($resultado1) != 0){
    echo "<p>Você não pode se cadastrar no mesmo curso mais de uma vez!</p>";
    echo "<a href='../cursos.php'><button>Voltar</button></a>";
}
else
{

$result = $con ->query ("SELECT * FROM cursos WHERE id_cursos = '$id_curso'");

//o fetch_assoc vai colocar as informações do banco em variáveis $row['nome do atributo']
while ($row = mysqli_fetch_assoc($result)){
$nomecur = $row['nome'];
$vagas= $row['vaga'];
    }
    
    //se o número de vagas for igual a 0 o usuário não poderá se cadastrar no curso
    if($vagas == 0){
        echo "<p>Você não pode se cadastrar nesse curso, não tem mais vagas!</p>";
        echo "<a href='../cursos.php'><button>HOME</button></a>"; 
    }
    else{

$sql = "INSERT INTO curso_aluno (id_aluno, id_curso, nome_aluno, email_aluno, nome_curso, preco_curso) 
VALUES ('$id','$id_curso', '$nome', '$email','$nomecur','$preco')";

//esse update atualiza o número de vagas pra diminuir 1 vaga
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
}
?>