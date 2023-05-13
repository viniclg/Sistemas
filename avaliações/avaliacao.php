<form method="POST" action="php_action/inserirava.php">
<link rel="stylesheet" href="css/avaliacao.css">
<?php
require_once 'php_action/conexao.php';
session_start();
$nomeusu = $_SESSION['nome'];
$emp = $_POST['empresa'];
$data = date("d/m/Y");

echo "Usuário: <input type='text' value='".$nomeusu."' name='usu' readonly><br>";
echo "Empresa: <input type='text' value='".$emp."' name='empr' readonly><br>";
echo "Data: <input type='text' value='".$data."' name='data' readonly><br>";
?>

<label>Deixe sua avaliação aqui:</label><br>

<textarea id="w3review" name="ava" rows="4" cols="50">
</textarea>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<div class="estrelas">
  <input type="radio" id="cm_star-empty" name="fb" checked/>
  <label for="cm_star-1"><i class="fa"></i></label>
  <input type="radio" id="cm_star-1" name="fb" value="1"/>
  <label for="cm_star-2"><i class="fa"></i></label>
  <input type="radio" id="cm_star-2" name="fb" value="2"/>
  <label for="cm_star-3"><i class="fa"></i></label>
  <input type="radio" id="cm_star-3" name="fb" value="3"/>
  <label for="cm_star-4"><i class="fa"></i></label>
  <input type="radio" id="cm_star-4" name="fb" value="4"/>
  <label for="cm_star-5"><i class="fa"></i></label>
  <input type="radio" id="cm_star-5" name="fb" value="5"/>
<br>

  <input type="submit" value="Enviar">
</div>