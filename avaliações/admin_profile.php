<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link">Home <span class="sr-only">(current)</span></a>
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ver todas as avaliações de
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="tdsava1.php">Empresas por média</a></li>
            <li><a class="dropdown-item" href="tdsava.php">Usuários com comentários</a></li>
            <li><a class="dropdown-item" href="tdsava2.php">Suas próprias avaliações</a></li>
          </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="php_action/deslogar.php">Logout</a>
</li>
</ul>
  </div>
</nav>

<form method="POST" action="avaliacao.php">
    <label>Escolha a empresa que será avaliada</label>
<?php
require_once 'php_action/conexao.php';

session_start();
$nome = $_SESSION['nome'];
$log = $_SESSION['login'];
$id = $_SESSION['id'];

$result = $con -> query("SELECT * FROM empresas");
echo '<select name="empresa">';
if($result -> num_rows > 0){
    while ($row = $result -> fetch_assoc()) {
        echo "<option value='".$row['nome']."'>".$row['nome']."</option><br>";
    }
}
?>
</select>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</br><input type="submit" value="Avaliar"><br>
