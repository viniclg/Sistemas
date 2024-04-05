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
    <title>Comparador de Preços</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #33cc33;
            text-align: center;
            padding-top: 20px;
        }

        form {
            background-color: #ffffff;
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form span {
            display: block;
            color: #555555;
            font-size: 14px;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #dddddd;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        form button {
            background-color: #33cc33;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
        }

        .register-form {
            display: none;
            animation: slide-in 0.5s forwards;
        }

        @keyframes slide-in {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .back-button {
            background-color: #dddddd;
            color: #555555;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form id="login-form" action="ope.php" method="post">
        <span>Login</span>
        <input type="text" name="login">
        <span>Senha</span>
        <input type="password" name="senha">
        <button type="submit">Enviar</button>
        <button id="register-button" class="back-button" type="button">Cadastro</button>
    </form>
    <form id="register-form" class="register-form" action="inseriruser.php" method="post">
        <span>Nome</span>
        <input type="text" name="nome">
        <span>Login</span>
        <input type="text" name="login">
        <span>Senha</span>
        <input type="password" name="senha">
        <button type="submit">Registrar</button>
        <button id="back-button" class="back-button" type="button">Voltar</button>
    </form>

    <script>
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const registerButton = document.getElementById('register-button');
        const backButton = document.getElementById('back-button');

        registerButton.addEventListener('click', function () {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
        });

        backButton.addEventListener('click', function () {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
        });
    </script>
</body>
</html>