<body>
Selecione o curso que você quer fazer!

<?php

require_once 'conexao.php';

$sql = "SELECT * FROM cursos";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($result)) {
   echo "<input type='radio' name='" . $row['nome'] . "' value='" . $row['preco'] . "'>" . $row['vagas'] . "<br>";
}


?>
</body>