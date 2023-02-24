<form method ="POST" action="edit.php">
    <legend>Selecione o que você quer mudar</legend>
<?php
require_once 'php_action/conexao.php';
echo "<select name='select'>";

//pega os dados no banco
$result = $con->query("SELECT * FROM cursos");

//se estiver alguma informação no banco vai ser feito o que está dentro do while
if($result -> num_rows > 0){
    //o fetch_assoc vai colocar as informações do banco em variáveis $row['nome do atributo']
    while($row = mysqli_fetch_assoc($result)){
 
    echo "<label>Mudar</label>";    
    echo "<option>".$row['nome']."</option>";

    }
}
echo "</select>";
?>
<br><input type="submit" value="Mudar">

</form>
<br><a href='php_action/admin_profile.php'><button>Voltar</button></a>