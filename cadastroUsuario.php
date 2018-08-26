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
			if (document.getElementById('senha').value ==
				document.getElementById('senhaNovamente').value) {
				document.getElementById('submit').disabled = false;
				document.getElementById('senhaNaoIguais').style.display = "none";
			} else {
				document.getElementById('submit').disabled = true;
				document.getElementById('senhaNaoIguais').style.display = "block";
			}
			
			var senha = document.getElementById('senha').value;
			
			if(senha.length < 6 || senha.length > 25){
				document.getElementById('tamanhoSenha').style.display = "block";
			}
			else{
				document.getElementById('tamanhoSenha').style.display = "none";
			}
		}
	
	</script>

  </head>
  <body class="bg-dark">

		<?php
			include './cadastroUser.php';
		?>

    <div class="container-fluid">
	<div class="row">
		<?php include './campoPesquisa.html'; ?>
	</div>
	<div class="row">
		<div class="col-md-9">
		
		
			<form role="form" class="mx-auto" style="width: 500px;" action="cadastroUsuario.php" method="POST">
			
				<h3 class="text-info">
					Cadastro de Usuário
				</h3>
			
				<div class="form-group">
					 
					<label for="email" class="text-white">
						Endereço de Email
					</label>
					<input type="email" class="form-control" id="email" name="email">
				</div>
				
				<div class="form-group">
					 
					<label for="nomeUsuario" class="text-white">
						Nome de Usuário
					</label>
					<input type="text" class="form-control" id="nomeUsuario" name="username">
				</div>

				<div class="form-group">
					 
					<label for="senha" class="text-white">
						Senha
					</label>
					<input type="password" class="form-control" id="senha" name="senha" onkeyup="check_pass();" >
				</div>
				
				<label for="senhaNovamente" class="text-danger" id="senhaNaoIguais">
					As senhas não conferem
				</label>
				
				<label for="senhaNovamente" class="text-danger" id="tamanhoSenha">
					A senha deve ter entre 6 e 25 caracteres
				</label>
				
				<div class="form-group">
				
					 
					<label for="senhaNovamente" class="text-white">
						Digite a senha novamente
					</label>
					<input type="password" class="form-control" id="senhaNovamente" onkeyup="check_pass();">
				</div>
				
				<label for="senhaNovamente" class="text-white">
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
					 
					<label for="resposta" class="text-white">
						Digite a resposta da pergunta escolhida
					</label>
					<input type="text" class="form-control" id="resposta" onkeyup="check_pass();">
				</div>
				
			
				<div class="btn-group btn-group-vertical btn-block" role="group">
				 
					<button class="btn btn-primary" type="submit" id="submit" disabled>
						Cadastro
					</button> 
				
				</div>
			
			</form>
			
			
		</div>
		
		<div class="col-md-3">
			<?php include './telaLogin.html'; ?>
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