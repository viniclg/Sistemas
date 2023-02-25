<?php
require_once 'conexao.php';
//pega as variáveis do sessio
session_start();
$id = $_SESSION['id'];
//pega as variáveis do formulário em ../editaluno.php
$email = $_POST['email'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

//esse result vai pegar as informações do aluno com o email 
$result1 = $con ->query("SELECT email from alunos where email='$email'");

//se o result voltar diferente de 0, quer dizer que já tem um aluno com o email, e não vai deixar mudar
if($result1 -> num_rows != 0){
    echo "<p>Email já casdatrado, escolha um email diferente</p>";
    echo "<a href='../editaluno.php'><button>voltar</button></a>";
}else{

//faz o select em alunos pelo id do aluno
$sql = $con->query("SELECT * FROM alunos WHERE id_aluno ='$id'");

//pega a senha do usuário e coloca na variável $senha_c
while($row = $sql ->fetch_assoc()){
$senha_c = $row['senha'];
}

//se a senha do banco for igual a do formulário, será feito o update com a mesma senha sem criptografia 
// já que ela está criptografada
if($senha_c == $senha){
$senha = $senha_c;

$result = $con ->query("UPDATE alunos SET nome='$nome', senha='$senha', email='$email' WHERE id_aluno = $id");
}
//se a senha não for igual do banco, vai pegar a nova senha e criptografar em md5
else{
    $senha = md5($senha);
}
//faz o update no banco
$result = $con ->query("UPDATE alunos SET nome='$nome', senha='$senha', email='$email' WHERE id_aluno = $id");

//se o $result der certo, ou em outras palavras se o update foi feito no banco, a mensagem será mostrada
if($result === TRUE){
    echo "<p>Perfil mudado com sucesso!</p>";
    echo "<a href='../site.php'><button>HOME</button></a>";
}else{
    echo "<p>Algo deu errado</p>";
    echo "Error: " . $sql . "<br>" . $con->error;
    echo "<a href='../editaluno.php'><button>Voltar</button></a>";
}
}
?>