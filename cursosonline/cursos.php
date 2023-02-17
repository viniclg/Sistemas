
Selecione o curso que você quer fazer!
<?php

echo "<form method='POST' action='curaluno.php' id='formlogin' name='formlogin'>";

require_once 'conexao.php';

$sql = "SELECT * FROM cursos";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($result)) {
   echo "<p><input type='radio' name='nomecurso' value='" . $row['id_cursos'] . "'>" . $row['nome'] . "<p><br>";

}

echo "<input type='submit' value='Enviar'>";
?>
</form>

