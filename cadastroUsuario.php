<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro Usuário</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
	<script>
	
		function check_pass() {
		
			var senha          = document.getElementById('senha1').value;
			var senhanovamente = document.getElementById('senhaNovamente1').value;
			
			if(senha.length == 0 || senhanovamente.length == 0){
				document.getElementById('senhaNaoIguais').style.display = "block";
			}
			else{
				if (document.getElementById('senha1').value ==
					document.getElementById('senhaNovamente1').value) {
						
					document.getElementById('submit1').disabled = false;
					document.getElementById('senhaNaoIguais').style.display = "none";
				} else {
					
					document.getElementById('submit1').disabled = true;
					document.getElementById('senhaNaoIguais').style.display = "block";
				}
			}
		}
	
	</script>

  </head>
  <body>

		<?php
			include './cadastroUser.php';
		?>

    <div class="container-fluid">
	
	<?php
		include './cabecalho.html';
	?>
	
	<div class="row">
		<?php include './campoPesquisa.html'; ?>
	</div>
	<div class="row">
	
		<div class="col-md-3">
			<?php include './telaLogin.html'; ?>
		</div>
	
		<div class="col-md-7">
		
			<form role="form" class="mx-auto" style="width: 500px;" action="cadastroUsuario.php" method="POST">
			
				<h3 class="text-primary">
					Cadastro de Usuário
				</h3>
			
				<div class="form-group">
					 
					<label for="email">
						Endereço de Email
					</label>
					<input type="email" class="form-control" id="email" name="email">
				</div>
				
				<div class="form-group">
					 
					<label for="nomeUsuario">
						Nome de Usuário
					</label>
					<input type="text" class="form-control" id="nomeUsuario" name="username">
				</div>

				<div class="form-group">
					 
					<label for="senha">
						Senha
					</label>
					<input type="password" class="form-control" id="senha1" name="senha" onkeyup="check_pass()" >
				</div>
				
				<label for="senhaNovamente" class="text-danger" id="senhaNaoIguais">
					As senhas não conferem
				</label><br/>
				
				<label for="senhaNovamente" class="text-danger" id="tamanhoSenha">
					A senha deve ter entre 6 e 25 caracteres
				</label>
				
				<div class="form-group">
				
					<label for="senhaNovamente">
						Digite a senha novamente
					</label>
					<input type="password" class="form-control" id="senhaNovamente1" onkeyup="check_pass()">
				</div>
				
				<!--
				<label for="senhaNovamente">
						Escolha uma pergunta de segurança
				</label>
					
				<div class="btn-group-vertical btn-group-toggle btn-block" data-toggle="buttons">
					<label class="btn btn-secondary active">
						<input type="radio" name="options" id="option1" autocomplete="off" checked> Active
					</label>
					
					<label class="btn btn-secondary">
						<input type="radio" name="options" id="option2" autocomplete="off"> Radio
					</label>
					
					<label class="btn btn-secondary">
						<input type="radio" name="options" id="option3" autocomplete="off"> Radio
					</label><br />
				</div>
				
				<div class="form-group">
					 
					<label for="resposta">
						Digite a resposta da pergunta escolhida
					</label>
					<input type="text" class="form-control" id="resposta" onkeyup="check_pass();">
				</div>
				-->
				
			
				<div class="btn-group btn-group-vertical btn-block" role="group">
				 
					<button class="btn btn-primary" type="submit" id="submit1" disabled>
						Cadastro
					</button> 
				
				</div>
			
			</form>
			
			
		</div>
		
		<div class="col-md-2">
		
		</div>
		
	</div>
	<div class="row">
		<?php include './rodape.html'; ?>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>