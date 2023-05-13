<link rel="stylesheet" href="css/login.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

<div class="container">
    <div class="header">
      <span>BEM VINDO AO SITE AVALIAÇÕES.COM</span>
    </div>

<form class="formulario" method="post" action="php_action/ope.php" id="formlogin" name="formlogin">

    <fieldset id="fie">
        <legend>Login</legend><br/>
        <label>Login : </label>
        <input type="text" name="login" required/><br/>
        <label>Nome : </label>
        <input type="text" name="nome" required/><br/>
        <label>Senha :</label>
        <input type="password" name="senha" required/><br/>
        <button id='new'>Logar</button>
    
</fieldset>
</form>
<br><button id = "new" onclick="openModal()">Sem conta? Faça uma agora!</button>
<br>
<br>
<div class="modal-container">
      <div class="modal">
        <form method="POST" action="php_action/inseriruser.php">

          <label for="m-funcao">Login</label>
          <input id="m-funcao" type="text" name="login" required />

          <label for="m-funcao">Nome</label>
          <input id="m-funcao" type="text" name="nome" required />
  
          <label for="m-salario">Telefone</label>
          <input type="text" name="tel" id="m-salario" required>

          <label for="m-salario">Senha</label>
          <input type="password" name="senha" id="m-salario" required>
          <button id='btnSalvar'>Cadastrar</button>
        </form>
        <script src="js/login.js"></script>
      </div>
</div>
</div>
