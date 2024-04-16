<style>
    table,th,td{
        border: 1px solid black;
  border-collapse: collapse;
    }
</style>
<table >
<tr>
<th>Mercado</th>
<th>Soma</th>
<?php
require_once "../c.php";
session_start();
$Array_Preco = array();
$Produtos_Intermed = array();
class Person {
    public $Nome_Produto;
    public $Soma_Preco;
    public $Preco_Normal;
}
if($_POST){
$produtos= isset($_POST['produtos']) ? $_POST['produtos'] : null;
    foreach($produtos as $key_produto => $value_produto){
        $Select_Produtos = $connect->query("SELECT * FROM produtos WHERE Id_produto='$value_produto'");
        if($Select_Produtos -> num_rows > 0){
            while($Resultado_Produtos = $Select_Produtos-> fetch_assoc()){
                array_push($Produtos_Intermed,$Resultado_Produtos['Nome_Produto']);
            }
        }
    }
    $Produtos_Atualizado = array_combine($produtos,$Produtos_Intermed);
    foreach($Produtos_Atualizado as $key_produto => $value_produto){
        $AtualizarPesquisas = $connect ->query("UPDATE produtos SET Pesquisas = Pesquisas + 1 WHERE Id_Produto='$key_produto'");
        }
//Comparação geral
$t=$_SESSION['tipo_de_comparacao'];
if($t==="1"){

        if(count($produtos) < 2){

        $soma = array();
        $sql1 = $connect -> query("SELECT * FROM mercado");
        while($l=  $sql1-> fetch_assoc()){
            $nome1 = $l['Nome_Mercado'];
            $id = $l['Id_Mercado'];
        }
            
$result=$connect->query("SELECT produtos.Nome_Produto,Valor AS soma FROM valores inner join produtos on produtos.Id_produto = valores.Id_Produto WHERE valores.Id_Mercado='$id' and valores.Id_produto='$key_produto' GROUP BY id_mercado");
if($result->num_rows > 0){
            while($linha=$result->fetch_assoc()){
                echo "<td>".$linha['Nome_Produto']."</td>";
                $som = (float) $linha['soma'];
                $new_array = array($nome1=>$som);
                $soma=array_merge($soma, $new_array);
            }
            }   
        
        echo "</tr>
        <tr>";

        foreach ($soma as $nome => $som) {
            echo "<th>".$nome."</th>";
            echo $nome.":". $som."<br>";
          if(min($soma) == $som){
            $nome2 = $nome;
          } 
        
        }
        
    }
    else{
$soma = array();

$sql1 = $connect->query("SELECT * FROM mercado");
while ($l = $sql1->fetch_assoc()) {
    $nome1 = $l['Nome_Mercado'];
    $id = $l['Id_Mercado'];
}
    $total_soma = 0; // Variável para armazenar a soma dos valores

    foreach ($Produtos_Atualizado as $key_produto => $value_produto) {
        $result = $connect->query("SELECT produtos.Nome_Produto,SUM(Valor) AS soma FROM valores inner join produtos on produtos.Id_produto = valores.Id_Produto INNER JOIN mercado on mercado.Id_Mercado = valores.Id_Mercado WHERE valores.Id_Produto='$key_produto' GROUP BY mercado.Id_Mercado");
        if ($result->num_rows > 0) {
            while ($linha = $result->fetch_assoc()) {
                $som = (float) $linha['soma'];
                $total_soma += $som; // Adiciona o valor ao total de soma
                echo "<th>".$linha['Nome_Produto']."</th>";
}
        }
    }
    $soma[$nome1] = $total_soma; // Armazena a soma total no array $soma
}

echo "</tr>";
foreach ($soma as $nome => $som) {
    echo "<tr><td>".$nome . "</td><td>" . $som . "</td>";
    if (min($soma) == $som) {
        $nome2 = $nome;
    }
}
foreach ($Array_Preco as $key) {
echo "<td>".$key."</td>";
}

echo "</tr>o menor preço é: ".min($soma)." do ".$nome2."<br><br>";
}

//Por mercado
/*elseif($t==="2"){

    $mercados=json_decode($_SESSION['mercados']);
    if(count($produtos) < 2){
    
    $soma = array();
    foreach($mercados as $key_mercado => $value_mercado){

        $R=$connect->query("SELECT * FROM mercado WHERE Id_Mercado='$value_mercado'");
        if($R->num_rows > 0){
            while($linha=$R->fetch_assoc()){
                $nome_do_mercado=$linha['Nome_Mercado'];
            }
        }

        $result=$connect->query("SELECT Valor AS soma FROM valores WHERE Id_Mercado='$value_mercado' and Id_produto='$key_produto' GROUP BY Id_Mercado");
        if($result->num_rows > 0){
            while($linha=$result->fetch_assoc()){
                $som = (float) $linha['soma'];
                $new_array = array($nome_do_mercado=>$som);
                $soma=array_merge($soma, $new_array);
            }
            }   
        }
        foreach ($soma as $nome => $som) {
            echo $nome.":". $som."<br>";
          if(min($soma) == $som){
            $nome2 = $nome;
        } 
        
    }   
}
else{
    $soma = array();

$sql1 = $connect->query("SELECT * FROM mercado");
while ($l = $sql1->fetch_assoc()) {
    $nome1 = $l['Nome_Mercado'];
    $id = $l['Id_Mercado'];

    $total_soma = 0; // Variável para armazenar a soma dos valores

    foreach ($Produtos_Atualizado as $key_produto => $value_produto) {
        $result = $connect->query("SELECT SUM(Valor) AS soma FROM valores WHERE Id_Mercado='$id' AND Id_Produto='$key_produto' GROUP BY Id_Mercado");

        if ($result->num_rows > 0) {
            while ($linha = $result->fetch_assoc()) {
                $som = (float) $linha['soma'];
                $total_soma += $som; // Adiciona o valor ao total de soma
            }
        }
    }

    $soma[$nome1] = $total_soma; // Armazena a soma total no array $soma
}

foreach ($soma as $nome => $som) {
    echo $nome . ":" . $som . "<br>";
    if (min($soma) == $som) {
        $nome2 = $nome;
    }
}

echo "</table>o menor preço é: ".min($soma)." do ".$nome2."<br><br>";
    }
}*/
else{
    echo "<style> p { color: red; }</style>
    <p>Você não selecionou nenhum produto</p>";
}
}
?>
<a href='inProd.php'><button type="button">Voltar</button></a>