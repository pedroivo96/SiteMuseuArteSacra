<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Site da Moda</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
	
	<link href="css3/bootstrap.css" rel="stylesheet">
    <link href="css3/bootstrap.min.css" rel="stylesheet">
    <link href="css3/style.css" rel="stylesheet">
	
	<script>
	
		function checar(){
	
			var campoUser = document.getElementById('username');
			var campoSenha = document.getElementById('senha');
			var botaoEntrar = document.getElementById('entrar');
	
			if(campoUser.value != "" && campoSenha.value != ""){
				document.getElementById('entrar').disabled = false;
			}
			else{
				document.getElementById('entrar').disabled = true;
			}
		}
	
		function iniciaAjax(){
			
			var ajax;
			
			if(window.XMLHttpRequest){       //Mozilla, Safari ...
				ajax = new XMLHttpRequest();
			} else if(windows.ActiveXObject){ //Internet Explorer
				ajax = new ActiveXObject("Msxml2.XMLHTTP");
				
				if(!ajax){
					ajax = new ActiveXObject("Microsoft.XMLHTTP");
				}
			}
			else{
				alert("Seu navegador não possui suporte a essa aplicação.");
			}
			
			return ajax;
		}
		
		function processa(){
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "Erro1"){
								
								divErro = document.getElementById("erro");
								divErro.className = "alert alert-danger d-block";
								
							}else if(retorno == "OK"){
								window.location = "paginausuario.php";
							}
						}
						else{
							alert(ajax.statusText);
						}
						
					}
				}
				
				username = document.getElementById("username").value;
				senha    = document.getElementById("senha").value;
				
				//Monta a QueryString
				dados = 'username='+username+"&senha="+senha;
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'login.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
	
	</script>
	
  </head>
  <body>

	<?php
		include './login.php';
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
		
		</div>
	
		<div class="col-md-6">
		
			<div class="alert alert-danger d-none" role="alert" id="erro">
				As informações não correspondem a um usuário cadastrado.
			</div>
		
			<form role="form" action="" method="POST">
			
				<div class="form-group">
					 
					<label for="username">
						Nome de Usuário
					</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Nome de usuário" onkeyup="checar()">
				</div>
				
				<div class="form-group">
					 
					<label for="senha">
						Senha
					</label>
					<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" onkeyup="checar()">
				</div>
				
				<div class="btn-group btn-group-vertical btn-block" role="group">
				 
					<button class="btn btn-primary mb-1" type="button" id="entrar" onclick="processa();" disabled>
						Entrar
					</button> 
				 
					<button class="btn btn-warning mb-3" type="button">
						Esqueci Minha Senha
					</button> 
					
					<button class="btn btn-primary" type="button" onclick="location.href = 'cadastroUsuario.php';">
						Cadastro
					</button> 
				
				</div>
				
			</form>
			
		</div>
		
		<div class="col-md-3">
		
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