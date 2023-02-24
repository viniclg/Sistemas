<?php
require_once 'conexao.php';

$sql = "SELECT * FROM alunos";
$result = $con->query($sql);

$data = array();

//o if vai verificar se tem registros no banco de dados, se tiver vai imprimir
if ($result->num_rows > 0) {
    
    //o fetch_assoc vai colocar as informações do banco em variáveis $row['nome do atributo']
    while($row = $result->fetch_assoc()) {
        foreach ($variable as $key => $value) {
            # code...
        }
        $data = $row['nome'];
        $data = $row['email'];
    }
}

$file = fopen("data.txt","w");
fwrite($file, json_encode($data));
fclose($file); 
?>