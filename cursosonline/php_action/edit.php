<?php
require_once 'conexao.php';

$nome = $_POST['nome'];
$vagas = $_POST['vagas'];
$preco = $_POST['preco'];
$id = $_POST['id'];

$result = $con->query("UPDATE cursos SET nome='$nome', vaga='$vagas', preco='$preco' WHERE id_cursos = $id");

if ($result === TRUE) {
    echo "<p>Tabela mudada com sucesso!</p>";
    echo "<a href='admin_profile.php'><button>HOME</button></a>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

?>