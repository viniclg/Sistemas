<?php
require_once 'conexao.php';

$nome = $_POST['nome'];
$vagas = $_POST['vagas'];
$preco = $_POST['preco'];
$id = $_POST['id'];

//Esse result está pegando os dados do curso com mesmo nome
$result1 = $con->query("SELECT nome FROM cursos WHERE nome ='$nome'");

//se o resultado voltar diferente de 0, significando que já tem um curso com mesmo nome, não vai deixar cadastrar
if($result1 -> num_rows != 0){
    echo "<p>Nome de curso já está cadastrado!</p>";
    echo "<a href='../editarcurso.php'><button>Voltar</button></a>";
}else{

//aqui vai atualizar a tabela com os dados inseridos no formulário
$result = $con->query("UPDATE cursos SET nome='$nome', vaga='$vagas', preco='$preco' WHERE id_cursos = $id");

if ($result === TRUE) {
    echo "<p>Tabela mudada com sucesso!</p>";
    echo "<a href='admin_profile.php'><button>HOME</button></a>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
}

?>