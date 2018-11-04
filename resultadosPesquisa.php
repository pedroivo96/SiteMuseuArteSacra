<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Resultados da pesquisa</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
	
	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
  </head>
  <body>

	<?php
		//include './login.php';
	?>

    <div class="container-fluid">
	
	<div class="row">
	
		<?php include './campoPesquisa.html'; ?>
		
	</div>
	
	<div class="row">
	
		<div class="col-md-9">
		
			<div class="row">
		
			<?php
			include './cnx_museu.php';

			if(!empty($_POST)){

				$pesquisa = $_POST['pesquisa'];
				$conn     = getConnection();
		
				$sql = 'SELECT * FROM pecas where nomePeca LIKE :pesquisa';
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':pesquisa', "%".$pesquisa."%");
				$stmt->execute();
				$count = $stmt->rowCount();

				if($count > 0){
						
					$result = $stmt->fetchAll();
						
					foreach($result as $row){
						$nomePeca = $row['nomePeca'];
						$idPeca   = $row['idPeca'];
						$usuario  = $row['usuario'];
						?>
						<div class="col-sm-4 mb-3">
							<div class="card border-secondary">
							
								<div class="card-header">
									<label for="nomecompleto">Nome do peça:</label>
									<h5 class="card-title" id="nomecompleto" name="nomecompleto">
										<?php echo $nomePeca; ?>
									</h5>
									
									<input type="hidden" id="idPeca" name="idPeca" value="<?php echo $idPeca; ?>">
								</div>
								
								<div class="card-body">
								
									<?php
									$sql1 = 'SELECT * FROM fotografia WHERE idPeca = :idPeca';
									$stmt1 = $conn->prepare($sql1);
									$stmt1->bindValue(':idPeca', $idPeca);
									$stmt1->execute();
									$count1 = $stmt1->rowCount();

									if($count1 > 0){
						
										$result1 = $stmt1->fetchAll();
										
										$active = 0;
										
										?>
										<div id="<?php echo $idPeca; ?>" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner">
										<?php
										foreach($result1 as $row1){
											if($active == 0){
												?>
												<div class="carousel-item active">
													<img class="d-block w-100 img-fluid" src="<?php echo $row1['nomeImagem']; ?>" alt="First slide">
												</div>
												<?php
												$active = 1;
											}
											else{
												?>
												<div class="carousel-item">
													<img class="d-block w-100 img-fluid" src="<?php echo $row1['nomeImagem']; ?>" alt="Second slide">
												</div>
												<?php
											}
										}
										?>
											<a class="carousel-control-prev" href="#<?php echo $idPeca; ?>" role="button" data-slide="prev">
												<span class="carousel-control-prev-icon" aria-hidden="true"></span>
												<span class="sr-only">Previous</span>
											</a>
											<a class="carousel-control-next" href="#<?php echo $idPeca; ?>" role="button" data-slide="next">
												<span class="carousel-control-next-icon" aria-hidden="true"></span>
												<span class="sr-only">Next</span>
											</a>
											
											</div>
										</div>
										<?php
									}
									else{
										?>
										<div class="alert alert-warning" role="alert">
											Não há fotografias dessa peça cadastradas!
										</div>
										<?php
									}
									?>
									<form method="POST" action="paginaRoupa.php">
										<input type="hidden" id="idPeca" name="idPeca" value="<?php echo $idPeca; ?>">
										<button type="submit" class="btn btn-primary btn-block mt-2">Ver conteúdo</button>
									</form>
								</div>
							</div>
						</div>
						<?php
						
					}
				}
			}
			?>
			</div>
			
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