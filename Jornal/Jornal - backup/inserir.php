<?php
require_once 'conexao.php';

session_start();
date_default_timezone_set('America/Sao_Paulo');
if ($_POST){
    $user = $_SESSION['login'];
    $titulo = $_POST['titu'];
    $noticia = $_POST['noticia'];
    $tempo = date('Y-m-d H:i:s');

    if($_POST['imagem'] != ''){
        $imagem = $_POST['imagem'];
    }else{
        $imagem = $_POST['imagem1'];
    }
    

    $result = $con->query("SELECT * FROM usuario WHERE user = '$user'");
    
    

        move_uploaded_file($imagem , "C:\xampp\htdocs\G1" );

         
    if ($result->num_rows > 0) {
     
        while($row = $result->fetch_assoc()) {
            if($row['user'] == $_SESSION['login']){

    $sql = "INSERT INTO noticia (titulo, noticia, data, user, imagem) VALUES('$titulo', '$noticia', '$tempo','$user','$imagem')";
    }
        }
    }
    
    if($con ->query($sql) === TRUE){
        echo "<p>Noticia cadastrada com sucesso!</p>";
        echo "<a href='site.php'><button>HOME</button></a>";
    }
    else{
        echo "ERRO".$sql.''.$connect -> connect_error;
    }
}

$con -> close();
    
}


?>