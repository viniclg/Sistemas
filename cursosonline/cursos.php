<legend>Selecione o curso que você quer fazer!</legend>
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

echo "<input type='submit' value='Enviar'>";

?>
</form>
<a href='site.php'><button>Voltar</button></a>

