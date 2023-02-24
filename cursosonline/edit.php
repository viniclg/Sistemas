<form method ="POST" action="php_action/edit.php">
<?php
require_once 'php_action/conexao.php';

$nome = $_POST['select'];

//pega os dados no banco
$result = $con->query("SELECT * FROM cursos where nome ='$nome'");

//se estiver alguma informação no banco vai ser feito o que está dentro do while
if($result -> num_rows > 0){
    
    //o fetch_assoc vai colocar as informações do banco em variáveis $row['nome do atributo']
    while($row = mysqli_fetch_assoc($result)){
    
    //o value="" faz com que o input já seja preenchido com o que está dentro do value    
    echo "Id: <input type='number' name= 'id' value=".$row['id_cursos']." min = ".$row['id_cursos']." max =".$row['id_cursos']." style='border:none;'><br>";    

    echo "Nome: <input type='text' name='nome' value=".$row['nome']."><br>";

    echo "Vagas: <input type='text' name='vagas' value=".$row['vaga']."><br>";
    
    echo "Preço: <input type='text' name='preco' value=".$row['preco']."><br>";

    }
}
?>
<br><input type="submit" value="Enviar">
</form>
<br><a href='editarcurso.php'><button>Voltar</button></a>