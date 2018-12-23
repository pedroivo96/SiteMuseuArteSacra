<!DOCTYPE html>
<html lang="en">
  <head>
  
	<?php
		session_start(); 
		include './conexao_museu.php';
 
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
			
			<div class="col-md-3">
			
				<button type="button" class="btn btn-success w-100 mb-1" onclick="location.href = 'cadastro_peca.php';">
					Cadastrar nova peça
				</button>
				
				<button type="button" class="btn btn-success w-100 mb-1">
					Configurações de conta
				</button>
				
				<button type="button" class="btn btn-danger w-100 mb-1">Sair</button>
			</div>
			
			<div class="col-md-9">
				
				<p class="h2 w-100 text-center">Minhas peças</p>
				
				<div class="row">
				
				<?php
				
				$conn = getConnection();
				
				$sql = 'SELECT * FROM pecas WHERE nome_usuario = :nome_usuario';
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':nome_usuario', $_SESSION["nome_usuario"]);
				$stmt->execute();
				$count = $stmt->rowCount();
		
				if($count > 0){
					$result = $stmt->fetchAll();
			
					foreach($result as $row){
						?>
						<div class="col-sm-4 mb-3">
							<div class="card border-secondary">
							
								<div class="card-header">
												
									<label for="nomecompleto">Nome da peça:</label>
									<h5 class="card-title" id="nomecompleto" name="nomecompleto">
										<?php echo $row['nome_peca']; ?>
									</h5>
								</div>
								
								<div class="card-body">

								
								</div>

								<form method="POST" action="pagina_peca.php">
										
									<input type="text" name="id_peca" value="<?php echo $row['id_peca']; ?>">
									<input type="text" name="nome_peca" value="<?php echo $row['nome_peca']; ?>">

									<button type="submit" class="btn btn-success btn-block" style="padding: 0.75rem 1.25rem;border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);">
										Ver peça
									</button>

								</form>
							</div>
						</div>
						<?php
					}
				}
				else{
					?>
					<div class="alert alert-warning w-100" role="alert">
						Você não tem peças cadastradas.
					</div>
					<?php
				}
				
				?>
				
				</div>
			
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