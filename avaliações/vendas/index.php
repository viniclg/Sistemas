<link rel="stylesheet" href="css/login.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>


<div class="container">
    <div class="header">
      <span>BEM VINDO AO MALL</span>
    </div>

<form class="formulario" method="post" action="php_action/ope.php" id="formlogin" name="formlogin">

    <fieldset id="fie">
        <legend>Login</legend><br/>
        <label>Email : </label>
        <input type="text" name="email" required/><br/>
        <label>Senha :</label>
        <input type="password" name="senha" required/><br/>
        <button id='new'>Logar</button>
        
        
</fieldset>
</form>
<br>
<br><button id = "new" onclick="openModal()">Sem conta? Faça uma agora!</button>

<div class="modal-container">
      <div class="modal">
        <form method="POST" action="php_action/inseriruser.php">

          <label for="m-funcao">Email</label>
          <input id="m-funcao" type="text" name="email" required />
  
          <label for="m-salario">Senha</label>
          <input type="password" name="senha" id="m-salario" required>
          <button id='btnSalvar'>Cadastrar</button>
        </form>
        <script src="js/login.js"></script>
      </div>
</div>
</div>
