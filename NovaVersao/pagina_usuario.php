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

	<body class="d-flex flex-column h-100 bg-light">

		<?php include "./cabecalho.php"; ?>

		<main role="main" class="flex-shrink-0">

			<div class="container-fluid">

				<div class="row mt-5 mb-5">
				</div>
				
				<div class="row mt-5 mb-5">
				
					<!-- ÁREA PRINCIPAL -->
					
					<div class="col-md-1">
					</div>
					
					<div class="col-md-10 border shadow-sm bg-white">

						<?php
							$conn = getConnection();
												
							$sql = 'SELECT * FROM pecas WHERE nome_usuario = :nome_usuario';
							$stmt = $conn->prepare($sql);
							$stmt->bindValue(':nome_usuario', $_SESSION["nome_usuario"]);
							$stmt->execute();
							$count = $stmt->rowCount();
						?>
						<div class="row">
							<div class="col-md-4 text-left">
								<div class="dropdown">
									<button class="btn btn-link text-secondary border mt-5 mb-5 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Todas
									</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="#">Todas</a>
										<a class="dropdown-item" href="#">Peças com cadastro completo</a>
										<a class="dropdown-item" href="#">Peças parcialmente cadastradas</a>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<p class="h2 w-100 text-center text-secondary mt-5 mb-5">Minhas Peças (<?php echo $count; ?>)</p>
							</div>
							<div class="col-md-4 text-center">
								<a name="" id="" class="btn btn-outline-success border-3 mt-5 mb-5" href="cadastro_peca.php" role="button">Cadastrar nova peça</a>
							</div>
						</div>

						<div class="row mt-0 mb-3 ml-1 mr-1">
						
							<?php
							if($count > 0){
								$result = $stmt->fetchAll();
							?>

								<?php
								$max_cards_linha = 4;
								$quant_linha = 0;
								foreach($result as $row){
								?>

									<?php
										if($quant_linha == 0){
											echo '<div class="card-deck">';
										}
									?>
										
										<div class="card border shadow-sm mb-4">
										
											<div class="card-header border-0">
												<h5 class="card-title text-secondary text-center font-weight-bold" id="nomecompleto" name="nomecompleto">
													<?php echo $row['nome_peca']; ?>
												</h5>
											</div>
											
											<div class="card-body bg-black-50">
												<img src="img/roupateste.jpg" class="img-fluid" alt="Imagem da peça"/>
											</div>

											<form method="POST" action="pagina_peca.php">
												<!--<input type="text" name="id_peca" value="<?php echo $row['id_peca']; ?>">
												<input type="text" name="nome_peca" value="<?php echo $row['nome_peca']; ?>">-->
												<button type="submit" class="btn btn-light text-success btn-block" style="padding: 0.75rem 1.25rem;border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);">
													Ver detalhes
												</button>
											</form>

										</div>
										
										<?php
											$quant_linha = $quant_linha + 1;
											if($quant_linha == $max_cards_linha){
												echo "</div>";
												$quant_linha = 0;
											}
										?>

								<?php
								}

								if($quant_linha < $max_cards_linha){
									for ( ; $quant_linha < $max_cards_linha; $quant_linha++) {
										echo '<div class="card border-0"></div>';
									}
								}

								?>
									</div>
							<?php
							}else{
							?>
								<div class="alert alert-warning w-100" role="alert">
									Você ainda não tem peças cadastradas.
								</div>
							<?php
							}
							?>
						
						</div>
					</div>

					<div class="col-md-1">
					</div>
					
				</div>
			</div>
		</main>

		<?php 
		if($count == 0)
			include "./rodape_fixed.html"; 
		else
			include "./rodape.html"; 
		?>

  </body>
</html>