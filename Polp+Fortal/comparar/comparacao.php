<?php
require_once "../c.php";
session_start();

if($_POST){
 
$produtos= isset($_POST['produtos']) ? $_POST['produtos'] : null;

//Comparação geral
$t=$_SESSION['tipo_de_comparacao'];
if($t==="1"){
foreach($produtos as $key_produto => $value_produto){
    }
        if(count($produtos) < 2){

        $soma = array();
        $sql1 = $connect -> query("SELECT * FROM mercado");
        while($l=  $sql1-> fetch_assoc()){
            $nome1 = $l['nome'];
            $id = $l['id_mercado'];
        
$result=$connect->query("SELECT valor AS soma FROM valores WHERE id_mercado='$id' and id_produto='$value_produto' GROUP BY id_mercado");
if($result->num_rows > 0){
            while($linha=$result->fetch_assoc()){
                $som = $linha['soma'];
                $new_array = array($nome1=>$som);
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
        $sql1 = $connect -> query("SELECT * FROM mercado");
        while($l=  $sql1-> fetch_assoc()){
            $nome1 = $l['nome'];
$id = $l['id_mercado'];
        
$result=$connect->query("SELECT SUM(valor) AS soma FROM valores WHERE id_mercado='$id' GROUP BY id_mercado");
        if($result->num_rows > 0){
            while($linha=$result->fetch_assoc()){
                $som = $linha['soma'];
                $new_array = array($nome1=>$som);
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


echo "o menor preço é: ".min($soma)." do ".$nome2."<br><br>";
}

//Por mercado
elseif($t==="2"){

    foreach($produtos as $key_produto => $value_produto){
        //echo $value_produto."<br>";
    }
    $mercados=json_decode($_SESSION['mercados']);
    if(count($produtos) < 2){
    
    $soma = array();
    foreach($mercados as $key_mercado => $value_mercado){

        $R=$connect->query("SELECT * FROM mercado WHERE id_mercado='$value_mercado'");
        if($R->num_rows > 0){
            while($linha=$R->fetch_assoc()){
                $nome_do_mercado=$linha['nome'];
            }
        }

        $result=$connect->query("SELECT valor AS soma FROM valores WHERE id_mercado='$value_mercado' and id_produto='$value_produto' GROUP BY id_mercado");
        if($result->num_rows > 0){
            while($linha=$result->fetch_assoc()){
                $som = $linha['soma'];
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
    $sql1 = $connect -> query("SELECT * FROM mercado");
    while($l=  $sql1-> fetch_assoc()){
        $nome1 = $l['nome'];
$id = $l['id_mercado'];
    
$result=$connect->query("SELECT SUM(valor) AS soma FROM valores WHERE id_mercado='$id' GROUP BY id_mercado");
    if($result->num_rows > 0){
        while($linha=$result->fetch_assoc()){
            $som = $linha['soma'];
            $new_array = array($nome1=>$som);
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

echo "o menor preço é: ".min($soma)." do ".$nome2."<br><br>";
        /*
        if($value_mercado>0){
        $resultado=$connect->query("SELECT valor AS soma FROM valores WHERE id_mercado='$value_mercado' and id_produto='$value_produto' GROUP BY id_mercado");
        if($resultado->num_rows > 0){
            $soma=0;
            while($linha=$resultado->fetch_assoc()){
                $valor=$linha['valor'];
                $soma+=$valor;
                echo $soma."<br>";
                    }
                    echo $value_produto."<br>";
                }
            }*/
    }
}
else{
    echo "<style> p { color: red; }</style>
    <p>Você não selecionou nenhum produto</p>";
}

?>
<a href='inProd.php'><button type="button">Voltar</button></a>