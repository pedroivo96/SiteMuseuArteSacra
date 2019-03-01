<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
  
	<?php
		session_start();
		if(isset($_SESSION["nome_usuario"])) { 
				header("Location: pagina_usuario.php");
		}
	?>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Museu de Arte Sacra</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css3/bootstrap.min.css" rel="stylesheet">
    <link href="css3/style.css" rel="stylesheet">
	
	<script>

		document.onkeyup=function(e){
			if(e.which == 13){
				if(! document.getElementById('botao_login').disabled){
					processa();
				}
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
		
		function checar(){
	
			var campo_usuario = document.getElementById('nome_usuario');
			var campo_senha = document.getElementById('senha');
			var botao_login = document.getElementById('botao_login');
	
			if(campo_usuario.value != "" && campo_senha.value != ""){
				
				document.getElementById('botao_login').disabled = false;
			}
			else{
				document.getElementById('botao_login').disabled = true;
			}
		}
	
		function processa(){
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "ERRO"){
								
								document.getElementById("erro").className = "alert alert-warning w-100 d-block mt-4";
								
							}else if(retorno == "OK"){
								
								window.location = "pagina_usuario.php";

							}
						}
						else{
							alert(ajax.statusText);
						}
						
					}
				}
				
				nome_usuario = document.getElementById("nome_usuario").value;
				senha        = document.getElementById("senha").value;
				
				//Monta a QueryString
				dados = 'nome_usuario='+nome_usuario+"&senha="+senha;
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'logar_usuario.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
	
	</script>

  </head>
  <body class="d-flex flex-column h-100 bg-light">

	<?php include "./cabecalho.php"; ?>
	  
	<main role="main" class="flex-shrink-0">

		<div class="container-fluid">
			
			<div class="row mt-5">
				
				<div class="col-md-4">
				
				</div>
				
				<div class="col-md-4">
					<div class="alert alert-warning w-100 d-none" align="center" role="alert" id="erro">
						Usuário não cadastrado
					</div>
					
					
				</div>
				
				<div class="col-md-4">
				
				</div>
			</div>
			
			<div class="row mt-5 mb-5">
			
				<div class="col-md-4">
				
				</div>
			
				<div class="col-md-4">

					<div class="border shadow bg-white rounded">

						<form class="mt-5 mr-5 ml-5 mb-5">
							<div class="form-group">
								<label class="font-weight-bold" for="nome_usuario">Nome de usuário</label>
								<input type="text" class="form-control" id="nome_usuario" onkeyup="checar();" required autofocus>
							</div>
							
							<div class="form-group">
								<label class="font-weight-bold" for="senha">Senha</label>
								<input type="password" class="form-control" id="senha" onkeyup="checar();" required>
							</div>

							<div class="checkbox mb-3">
								<label>
								<input type="checkbox" value="remember-me" checked> Lembre-se de mim
								</label>
							</div>
							
							<button type="button" id="botao_login" class="btn btn-success w-100 mb-1" onclick="processa()" disabled>
								Login
							</button>
							
							<a href="cadastro_usuario.php" class="btn btn-default w-100">Não possui cadastro?</a>
						</form>
					</div>
				</div>
				
				<div class="col-md-4 h-100">
				
				</div>
				
			</div>
		</div>

	</main>

	<?php include "./rodape.html"; ?>
  
</body>
</html>