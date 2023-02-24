<form method="POST" action ="php_action/editaluno.php">
    <legend>Mudar seus dados</legend>
<?php

require_once 'php_action/conexao.php';
session_start();
$id = $_SESSION['id'];

//pega os dados no banco
$sql = $con ->query("SELECT * FROM alunos WHERE id_aluno = '$id'");

//se estiver alguma informação no banco vai ser feito o que está dentro do while
if($sql -> num_rows > 0){
    //o fetch_assoc vai colocar as informações do banco em variáveis $row['nome do atributo']
    while($row = $sql->fetch_assoc()){

echo "<br>Email: <input type='text' name='email' value=".$row['email'].">";
echo "<br>Nome:  <input type='text' name='nome' value=".$row['nome'].">";
echo "<br>Senha: <input type='text' name='senha' value=".$row['senha'].">";
}
}
?>
<br><input type="submit" value="Enviar">
</form>