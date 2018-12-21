<!DOCTYPE html>
<html lang="en">
  <head>
  
	<?php
		session_start(); 
 
		// Verifica se existe os dados da sessão de login 
		if(!isset($_SESSION["nome_usuario"])) { 
			// Usuário não logado! Redireciona para a página de login 
			header("Location: index.php"); 
			exit; 
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
		
		
	
	</script>

  </head>
  <body>

    <div class="container-fluid">
	
		<div class="row">
			<?php include "./cabecalho.html"; ?>
		</div>
		
		<?php include "./campo_pesquisa.html"?>
		
		<div class="row">
		
			<!-- ÁREA PRINCIPAL -->
			
			<div class="col-md-4">
			
				<button type="button" class="btn btn-success w-100">Cadastrar nova peça</button>
			</div>
			
			<div class="col-md-8">
			
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