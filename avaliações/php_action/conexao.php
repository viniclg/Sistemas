<?php
$localhost = "localhost";
$db="empresa";
$senha="";
$user="root";

$con = new mysqli($localhost, $user,$senha,  $db) or die ("não deu a conexão");
?>