<!DOCTYPE html>
<html lang="en">
  <head>
  
	<?php
		session_start();
		
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
	
	
		function cadastrarUsuario(){
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "ERRO1"){
								
								//erro1 = Nome de usuário ou email já cadastrados
								document.getElementById("erro1").className = "alert alert-warning w-100 d-block";
								
							}else if(retorno == "ERRO"){
								
								alert("Falha no banco de dados.");
								
							}else if(retorno == "OK"){
								
								window.location = "pagina_usuario.php";
							}
						}
						else{
							alert(ajax.statusText);
						}
						
					}
				}
				
				campo_email           = document.getElementById("email");
				campo_nome_usuario    = document.getElementById("nome_usuario");
				campo_senha           = document.getElementById("senha");
				campo_senha_novamente = document.getElementById("senha_novamente");
				
				var ha_erro = 0;
				
				if(campo_senha.value != campo_senha_novamente.value){
					//erro2 = As senhas não coincidem
					document.getElementById("erro2").className = "alert alert-warning w-100 d-block";
					ha_erro = 1;
				}
				
				if(ha_erro == 0){
					
					//Monta a QueryString
					dados = 'email='+email+
					        "&nome_usuario="+nome_usuario+
							"&senha="+senha;
				
					//Faz a requisição e envio pelo método POST
					ajax.open('POST', 'cadastrar_usuario.php', true);
					ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
					ajax.send(dados);
				}
			}
		}
		
		function mostrarOcultarSenha(){
			
			var campo_senha = document.getElementById("senha");
			var botao_ver_senha = document.getElementById("ver_senha");
			
			if(campo_senha.type == "password"){
				campo_senha.type = "text";
				botao_ver_senha.src = "icons/icons8-invisible-32.png";
			}
			else{
				campo_senha.type = "password";
				botao_ver_senha.src = "icons/icons8-eye-32.png";
			}
		}
		
		function mostrarOcultarSenhaNovamente(){
			
			var campo_senha_novamente = document.getElementById("senha_novamente");
			var botao_ver_senha_novamente = document.getElementById("ver_senha_novamente");
			
			if(campo_senha_novamente.type == "password"){
				campo_senha_novamente.type = "text";
				botao_ver_senha_novamente.src = "icons/icons8-invisible-32.png";
			}
			else{
				campo_senha_novamente.type = "password";
				botao_ver_senha_novamente.src = "icons/icons8-eye-32.png";
			}
		}
		
		function avaliarCampos(){
			
			campo_email           = document.getElementById("email");
			campo_nome_usuario    = document.getElementById("nome_usuario");
			campo_senha           = document.getElementById("senha");
			campo_senha_novamente = document.getElementById("senha_novamente");
			botao_cadastro        = document.getElementById("botao_cadastro");
			
			//Casos um dos campos esteja vazio, desativa o botão de Cadastro
			if(campo_email.value == "" || campo_nome_usuario.value == "" || campo_senha.value == "" || campo_senha_novamente.value == ""){
				
				botao_cadastro.disabled = true;
				
				//erro3 = Alguns dos campos está vazio
				document.getElementById("erro3").className = "alert alert-warning w-100 d-block";
			}
			
			//Caso todos os campos estejam preenchidos
			if(campo_email.value != "" && campo_nome_usuario.value != "" && campo_senha.value != "" && campo_senha_novamente.value != ""){
			
				//erro3 = Alguns dos campos está vazio
				document.getElementById("erro3").className = "alert alert-warning w-100 d-none";
			
				//Caso senha e senha_novamente sejam diferentes
				if(campo_senha.value != campo_senha_novamente.value){
						
					//erro2 =  As senhas não coincidem
					document.getElementById("erro2").className = "alert alert-warning w-100 d-block";
				}
				//Caso senha e senha_novamente sejam iguais, os avisos somem e o botão Cadastro é ativado
				else{
						
					//erro2 =  As senhas não coincidem
					document.getElementById("erro2").className = "alert alert-warning w-100 d-none";
						
					botao_cadastro.disabled = false;
				}
				
			}
		}
	
	</script>

  </head>
  <body>

    <div class="container-fluid">
	
		<div class="row">
			<?php include "./cabecalho.html"; ?>
		</div>
		
		<?php include "./campo_pesquisa.html"?>
		
		<div class="row">
			
			<div class="col-md-4">
			
			</div>
			
			<div class="col-md-4">
			
			</div>
		</div>
		
		<div class="row mb-5">
		
			<div class="col-md-4">
			
			</div>
		
			<div class="col-md-4">
			
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-warning w-100 d-none" align="center" role="alert" id="erro1">
							Nome de usuário ou Email já cadastrado.
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-warning w-100 d-none" align="center" role="alert" id="erro2">
							As senhas não coincidem.
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-warning w-100 d-block" align="center" role="alert" id="erro3">
							Algum dos campos está vazio.
						</div>
					</div>
				</div>
				
				
			
				<form>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" onkeyup="avaliarCampos()">

					</div>
					
					<div class="form-group">
						<label for="nome_usuario">Nome de usuário</label>
						<input type="text" class="form-control" id="nome_usuario" onkeyup="avaliarCampos()">
					</div>
					
					
					<div class="form-group">
						<label for="senha">Digite a senha</label>
						
						<div class="row">
							<div class="col-md-10">
								<input type="password" class="form-control" id="senha" onkeyup="avaliarCampos()">
							</div>
							
							<div class="col-md-2">
								<img src="icons/icons8-eye-32.png" class="btn btn-success img-fluid w-100 h-100" onclick="mostrarOcultarSenha()" id="ver_senha">
							</div>
						</div>
					</div>
					
					
					<div class="form-group">
						<label for="senha_novamente">Digite a senha novamente</label>
						
						<div class="row">
							<div class="col-md-10">
								<input type="password" class="form-control" id="senha_novamente" onkeyup="avaliarCampos()">
							</div>
							
							<div class="col-md-2">
								<img src="icons/icons8-eye-32.png" class="btn btn-success img-fluid w-100 h-100" onclick="mostrarOcultarSenhaNovamente()" id="ver_senha_novamente">
							</div>
						</div>
					</div>
					
					<button type="button" class="btn btn-success w-100" onclick="cadastrarUsuario()"  id="botao_cadastro" disabled>
						Cadastrar
					</button>
				</form>
				
			</div>
			
			<div class="col-md-4">
			
			</div>
			
		</div>
		
		<div class="row">
			<?php include "./rodape1.html"; ?>
		</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>