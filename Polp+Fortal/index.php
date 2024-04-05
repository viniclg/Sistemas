<?php
require_once "c.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparador de Preços</title>
    <style>
        body {
            background-image: url("background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #ff6600;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .buttons a {
            margin-bottom: 10px;
        }

        .buttons button {
            background-color: #ff6600;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .buttons button:hover {
            background-color: #ff8533;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="buttons">
            <h1>Bem-Vindo ao Comparador de Preços</h1>
            <a href="comparar/in1.php"><button>Comparar</button></a>
            <a href="open/logout.php"><button>Sair</button></a>
        </div>
    </div>
</body>
</html>