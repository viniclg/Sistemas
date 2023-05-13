<?php
require_once 'conexao.php';

$data = $_POST['data'];
$nomeusu = $_POST['usu'];
$emp = $_POST['empr'];
$nota = $_POST['fb'];
$coment = $_POST['ava'];
$id=0;

$sql = $con ->query("SELECT * FROM avaliacoes WHERE nome_usuario = '$nomeusu' AND nome_empresa='$emp'");

// Verifica se ocorreu algum erro na conexão
if ($con->connect_error) {
    die("Erro de conexão: " . $con->connect_error);
}

// Prepara a query SQL para inserir a avaliação no banco de dados
$stmt = $con->prepare("INSERT INTO avaliacoes (nome_usuario, nome_empresa, id, nota, comentario, data) VALUES (?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("ssiis", $nomeusu, $emp, $id, $nota, $coment);

if($sql -> num_rows == 0){
// Executa a query SQL
if ($stmt->execute()) {
    echo "Avaliação realizada com sucesso!";
            echo "<a href='../site.php'><button>Voltar</button></a>";
}
} else {
    echo "Você não pode realizar mais de uma avaliação! " . $con->error;
    echo "<a href='../site.php'><button>Voltar</button></a>";
}


// Fecha a conexão com o banco de dados
$stmt->close();
$con->close();
?>