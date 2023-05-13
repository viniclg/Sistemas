<?php
require_once "../c.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Login</h1>
<body>
    <form action="ope.php" method="post">
        <span>Login</span>
        <input type="text" name="login">
        <span>Senha</span>
        <input type="text" name="senha">
        <button>Enviar</button>
</body>
</html>