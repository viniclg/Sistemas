<link rel="stylesheet" href="css/cursos.css">
<link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">

<div id="container">
<div id="header">
<span>Selecione o curso que você quer fazer!</span>

</div>

<?php

echo "<form method='POST' action='php_action/curaluno.php' id='formlogin' name='formlogin'>";

require_once 'php_action/conexao.php';

//pega os dados no banco
$result = $con -> query("SELECT * FROM cursos");

    //o fetch_assoc vai colocar as informações do banco em variáveis $row['nome do atributo']
   while ($row = $result -> fetch_assoc()) {
   echo "<p><input type='radio' name='nomecurso' value='" . $row['id_cursos'] . "'>" . $row['nome'] ."<br>"."Vagas:".$row['vaga']."<br>";
   echo "Preço: <input type='number'  min = ".$row['preco']." max =".$row['preco']." name='preco' value=".$row['preco']."><br>";
}

echo "<button id='new'>Entrar</button>";

?>
</form>
<br><a href='site.php'><button id="new">Voltar</button></a>
</div>

