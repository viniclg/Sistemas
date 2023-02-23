<form method ="POST" action="php_action/edit.php">
<?php
require_once 'php_action/conexao.php';

$nome = $_POST['select'];

$result = $con->query("SELECT * FROM cursos where nome ='$nome'");

if($result -> num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
 
    echo "Id: <input type='number' name= 'id' value=".$row['id_cursos']." min = ".$row['id_cursos']." max =".$row['id_cursos']." style='border:none;'><br>";    

    echo "Nome: <input type='text' name='nome' value=".$row['nome']."><br>";

    echo "Vagas: <input type='text' name='vagas' value=".$row['vaga']."><br>";
    
    echo "Preço: <input type='text' name='preco' value=".$row['preco']."><br>";

    }
}
?>
<br><input type="submit" value="Enviar">
</form>
<br><a href='php_action/admin_profile.php'><button>Voltar</button></a>