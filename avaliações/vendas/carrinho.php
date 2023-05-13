<!DOCTYPE html>
<html lang="pt-br">
<head>
	
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a id="navTitle" class="navbar-brand" href="index.html"></a>
	    </div>
	  </div>
	</nav>

<button>

	<?php
	$prec = $_POST['preço'];
	$qtd = $_POST['quant'];
	$nome = $_POST['prod'];

	echo "<input type='hidden' id='quant' value='".$qtd."'><br>";
	
	?>

	<form method="POST">

	<div class="container-fluid">
		<div class="form-inline">
			<div class="form-group">
				<?php
				echo '<input type="text" class="form-control" name="nome" id="desc" value="'.$nome.'" placeholder="Descrição" readonly>';
				?>
			</div>
			<div class="form-group">

			<input type='button' name='mais' id='mais' value='+'/>
				<input type="number" class="form-control" id="qtd" placeholder="Quantidade" value="0">
				<input type='button' name='menos' id='menos' value='-'/>
				
				<script type="text/javascript" href="js/main.js">
function id( el ){
		return document.getElementById( el );
}
window.onload = function(){
		id('mais').onclick = function(){
			if(id('qtd').value != id('quant').value){
				id('qtd').value = parseInt( id('qtd').value )+1;
			}
			
			else if(id('qtd').value == id('quant').value){
			id('total').value = 1+id('qtd').value;
				id('mais').display = 'none';
			}
		}
		
		id('menos').onclick = function(){
				if( id('qtd').value>0 )
						id('qtd').value = parseInt( id('qtd').value )-1;
				else if(id('qtd').value == 0)
				id('total').value = 1+id('qtd').value;
					id('menos').display='none';

				
		}
	}
</script>
			</div>

			<div class="form-group">
				<?php
				echo '<input type="number" class="form-control" name="preco" id="valor" value="'.$prec.'"  max="'.$prec.'" min="'.$prec.'" readonly>';
				?>
			</div>
			
</form>
			<span id="btnUpdate" style="display: none;">
				<span id="inputIDUpdate"></span>
				<button onclick="updateData();" class="btn btn-default">Salvar</button>
				<button onclick="resetForm();" class="btn btn-default">Cancelar</button>
			</span>
			<span id="btnAdd">
				<button onclick="addData();" class="btn btn-default">Adicionar</button>
				<button onclick="resetForm();" class="btn btn-default">Reiniciar</button>
				<button onclick="deleteList();" class="btn btn-default">Deletar</button>
			</span>
		</div>

		<div id="errors" style="display: none;"></div>

		<table id="listTable" class="table">
			<td></td>
		
		</table>
	</div>

	<nav class="navbar navbar-default navbar-fixed-bottom">
		<div class="container">
			<h4 class="text-center text-success">Total: <span id="totalValue">R$ 0,00</span></h4>
		</div>
	</nav>

	<script type="text/javascript" src="js/config.js">
		
	</script>
	<script type="text/javascript" src="js/main.js"></script>

	