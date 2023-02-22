<?php
require_once 'conexao.php';

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$vagas = $_POST['vagas'];

if (empty($nome) || empty($preco) || empty($vagas)) {
    echo "Por favor, preencha o formulário corretamente";
    echo "<a href='../inserircursos.php'><button>CADASTRO</button></a>";
}else{
$sql = "SELECT * FROM cursos WHERE nome = '$nome'";
$resultado = mysqli_query($con, $sql);

if (mysqli_num_rows($resultado) == 0) {
    $sql = "INSERT INTO cursos (id_cursos, nome, vaga, preco)
    VALUES(null,'$nome', '$vagas', '$preco')";

    $resultado = mysqli_query($con, $sql);

if ($resultado) {
    echo "<p>Curso criado com sucesso!</p>";
    echo "<a href='admin_profile.php'><button>HOME</button></a>";
} else {
    echo "Erro ao inserir dados";
    echo "<a href='../inserircursos.php'><button>HOME</button></a>";
}
}else{
    echo "Curso já existe";
    echo "<a href='../inserircursos.php'><button>HOME</button></a>";
}
}

?>