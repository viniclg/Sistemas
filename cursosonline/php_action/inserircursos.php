<?php
require_once 'conexao.php';

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$vagas = $_POST['vagas'];

// se nome do curso ou preço ou vagas estiver vazio, não vai deixar cadastrar o curso
if (empty($nome) || empty($preco) || empty($vagas)) {
    echo "<p>Por favor, preencha o formulário corretamente<p>";
    echo "<a href='../inserircursos.php'><button>Voltar</button></a>";
}else{
$resultado = $con ->query("SELECT * FROM cursos WHERE nome = '$nome'");

//o if vai verificar se o $resultado vai devolver algo, se devolver quer dizer que o curso já está cadastrado
// e não vai deixar inserir o curso
if (mysqli_num_rows($resultado) == 0) {
    $sql = "INSERT INTO cursos (id_cursos, nome, vaga, preco)
    VALUES(null,'$nome', '$vagas', '$preco')";

    $resultado = mysqli_query($con, $sql);

if ($resultado === TRUE) {
    echo "<p>Curso criado com sucesso!</p>";
    echo "<a href='admin_profile.php'><button>HOME</button></a>";
} else {
    echo "<p>Erro ao inserir dados<p>";
    echo "<a href='../inserircursos.php'><button>Voltar</button></a>";
}
}else{
    echo "<p>Curso já existe<p>";
    echo "<a href='../inserircursos.php'><button>Voltar</button></a>";
}
}

?>