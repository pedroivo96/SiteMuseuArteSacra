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
	
	
		function processa(){
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "Erro"){
								
								alert("ERRO");
								
							}else if(retorno == "OK"){
								//window.location = "paginausuario.php";
								alert("OK");
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
				<div class="alert alert-warning w-100" align="center" role="alert">
					Usuário não cadastrado
				</div>
			</div>
			
			<div class="col-md-4">
			
			</div>
		</div>
		
		<div class="row">
		
			<div class="col-md-4">
			
			</div>
		
			<div class="col-md-4">
				<form class="mt-1">
					<div class="form-group">
						<label for="nome_usuario">Nome de usuário</label>
						<input type="text" class="form-control" id="nome_usuario" onkeyup="checar();">
					</div>
					
					<div class="form-group">
						<label for="senha">Senha</label>
						<input type="password" class="form-control" id="senha" onkeyup="checar();">
					</div>
					
					<button type="button" id="botao_login" class="btn btn-success w-100 mb-1" onclick="processa()" disabled>Submit</button>
					
					<button type="button" class="btn btn-light w-100">Ainda não é cadastrado ?</button>
				</form>
			</div>
			
			<div class="col-md-4">
			
			</div>
			
		</div>
		
		<div class="row">
			<?php include "./rodape.html"; ?>
		</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>