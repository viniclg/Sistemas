<?php
session_start();
if ($_SESSION['tipo'] == 1) {
echo '<!DOCTYPE html>
<html lang="en">
<head>
<style>
/* Style The Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
  margin-right: 10px; /* Adiciona margem entre os dropdowns */
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}

/* Style the menu */
.menu {
  background-color: #333333;
  color: #ffffff;
  display: flex;
  justify-content: center; /* Adiciona espaçamento entre os dropdowns e o botão de logout */
  align-items: center;
  padding: 10px;
}

.logout-button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="menu">
    <div>
        <div class="dropdown">
            <button class="dropbtn">Adicionar</button>
            <div class="dropdown-content">
                <a href="adm_funcs/adicionar/adadmin.php">Administradores</a>
                <a href="adm_funcs/adicionar/admercado.php">Mercados</a>
                <a href="adm_funcs/adicionar/adprod.php">Produtos</a>
                <a href="adm_funcs/adicionar/adval.php">Valores</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Excluir</button>
            <div class="dropdown-content">
            <a href="adm_funcs/excluir/drop.php">Administradores</a>
            <a href="adm_funcs/excluir/dropMercado.php">Mercados</a>
            <a href="adm_funcs/excluir/dropProduto.php">Produtos</a>
            <a href="adm_funcs/excluir/dropUsuario.php">Valores</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Alterar</button>
            <div class="dropdown-content">
                <a href="">Link 7</a>
                <a href="adm_funcs/alterar/alterprod.php">Produto e valores</a>
                <a href="#">Link 9</a>
            </div>
        </div>
    </div>

    <div>
        <a href="open/logout.php"><button class="logout-button">Logout</button></a>
    </div>
    <div>
    <a href="comparar/in1.php"><button class="logout-button">Comparar</button></a>
    </div>
</div>

</body>
</html>';
} else {
    echo 'Você não deveria estar aqui<br>
    <a href="open/logout.php"><button>Sair</button></a>';
}
?>

