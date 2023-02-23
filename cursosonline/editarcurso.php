<form method ="POST" action="edit.php">
    <legend>Selecione o que você quer mudar</legend>
<?php
require_once 'php_action/conexao.php';
echo "<select name='select'>";

$result = $con->query("SELECT * FROM cursos");

if($result -> num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
 
    echo "<option name='select'>".$row['nome']."</option>";

    }
}
echo "</select>";
?>
<br><input type="submit" value="Enviar">

</form>