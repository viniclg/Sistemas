<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="site.php">Voltar à avaliar</span></a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ver todas as avaliações de
          </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item">Empresas por média  <span class="sr-only">(current)</span></a></li>
            <li><a class="dropdown-item" href="tdsava.php">Usuários com comentários</a></li>
          </ul>
          <li class="nav-item">
        <a class="nav-link" href="php_action/deslogar.php">Logout</a>
      </li>
      </ul>
  </div>
</nav>

<?php
require_once 'php_action/conexao.php';

session_start();
if(!isset($_SESSION["id"]) || !isset($_SESSION["nome"]))
{
// Usuário não logado! Redireciona para a página de login
header("Location: index.php");
exit;
}

$login = $_SESSION['login'];
$nome = $_SESSION['nome'];

$sql1 = $con ->query("SELECT * FROM adm WHERE nome_adm ='$nome' AND login_adm ='$login'");


// Verifica se ocorreu algum erro na conexão
if ($con->connect_error) {
    die("Erro de conexão: " . $con->connect_error);
}

while ($row1 = $sql1 -> fetch_assoc()) {
  $nomep = $row1['nome_adm'];
  $loginp = $row1['login_adm'];
 }
 
 if($login == $loginp && $nome == $nomep){
// Prepara a query SQL para obter a média de notas de cada empresa
$sql = "SELECT nome_empresa, AVG(nota) AS media FROM avaliacoes GROUP BY nome_empresa ORDER BY media DESC";

// Executa a query SQL
$result = $con->query($sql);

// Exibe a tabela com as médias de notas por empresa
if ($result->num_rows > 0) {
    echo "<h3>Relatório de média de notas em ordem decrescente de todas as empresas</h3>";
    echo "<table>";
    echo "<tr><th>Empresa</th><th>Média de notas</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nome_empresa"] . "</td><td>" . number_format($row["media"], 2) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum resultado encontrado.";
}
}else{
  header("location: aviso.php");
}
// Fecha a conexão com o banco de dados
$con->close();
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
