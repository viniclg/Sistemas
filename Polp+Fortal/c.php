<?php
$localhost="localhost";
$username="root";
$password="";
$dbname="polp";

$connect=new mysqli($localhost, $username, $password, $dbname);

if(!$connect->connect_error){

}else{
    echo "Erro na conexão";
}

?>