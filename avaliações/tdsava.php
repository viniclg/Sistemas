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
            <li><a class="dropdown-item" href="tdsava1.php">Empresas por média</a></li>
            <li><a class="dropdown-item">Usuários com comentários  <span class="sr-only">(current)</span></a></li>
          </ul>
          <li class="nav-item">
        <a class="nav-link" href="php_action/deslogar.php">Logout</a>
      </li>
      </ul>
  </div>
</nav>
<form method="post">
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

$sql2 = $con ->query("SELECT * FROM adm WHERE nome_adm ='$nome' AND login_adm ='$login'");
while ($row1 = $sql2 -> fetch_assoc()) {
 $nomep = $row1['nome_adm'];
 $loginp = $row1['login_adm'];
}

if($login == $loginp && $nome == $nomep){
$sql1= $con ->query("SELECT * FROM empresas");

echo "<select name='v'>";

if($sql1->num_rows > 0){
  while($row = $sql1 -> fetch_assoc()){
    echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
  }
}
echo "</select>
<br><input type='submit' value='Enviar'>
</form>";

// Verifica se ocorreu algum erro na conexão
if ($con->connect_error) {
    die("Erro de conexão: " . $con->connect_error);
}

if($_POST){
  $nm = $_POST['v'];
}

// Prepara a query SQL para obter todas as avaliações ordenadas por empresa e nota
$sql = "SELECT nome_empresa, nota, comentario, nome_usuario FROM avaliacoes WHERE nome_empresa='$nm' ORDER BY nome_empresa, nota DESC";

// Executa a query SQL
$result = $con->query($sql);

// Exibe a tabela com todas as notas por empresa, com os comentários e nome dos usuários
if ($result->num_rows > 0) {
    echo "<h3>Relatório de todas as notas em ordem decrescente por empresa com os comentários e nome dos usuários</h3>";
    $last_empresa = "";
    while($row = $result->fetch_assoc()) {
        if ($row["nome_empresa"] != $last_empresa) {
            echo "<h2>" . $row["nome_empresa"] . "</h2>";
            echo "<table>";
            echo "<tr><th>Nota</th><th>Comentário</th><th>Usuário</th></tr>";
        }
        echo "<tr><td>" . $row["nota"] . "</td><td>" . $row["comentario"] . "</td><td>" . $row["nome_usuario"] . "</td></tr>";
        $last_empresa = $row["nome_empresa"];
    }
    echo "</table>";
} else {
    echo "Nenhum resultado encontrado.";
}
}
else{
  header("location: aviso.php");
}

// Fecha a conexão com o banco de dados
$con->close();
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
