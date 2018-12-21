<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Página Usuário</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
    
    <?php 
		echo $_COOKIE['username'];
		include './cnx_museu.php';
	?>
	
	<?php
		include './cabecalho.html';
	?>
	
	<div class="row">
		<?php include './campoPesquisa.html'; ?>
	</div>
	<div class="row px-4">
	
		<div class="col-md-3">
		
			<div class="btn-group btn-group-vertical btn-block" role="group">
				 
				<button class="btn btn-primary mb-1" type="button" onclick="location.href = 'cadastroRoupa.php';">
					Cadastrar Nova Peça
				</button> 
				<button class="btn btn-primary mb-1" type="button">
					Configurações de Conta
				</button> 
				<button class="btn btn-danger" type="button" onclick="location.href = 'sair.php';">
					Sair
				</button> 
				
			</div>
			
		</div>
	
		<div class="col-md-8">
		
			<div class="row">
			
				<?php
					$conn = getConnection();
		
					$sql = 'SELECT idPeca, nomePeca  FROM pecas WHERE usuario = :usuario';
					$stmt = $conn->prepare($sql);
					$stmt->bindValue(':usuario', $_COOKIE['username']);
					$stmt->execute();
					$count = $stmt->rowCount();
		
					if($count > 0){
						$result = $stmt->fetchAll();
			
						foreach($result as $row){
							?>
							<div class="col-sm-4 mb-3">
								
									<div class="card">
									
										<?php
										$sql1 = 'SELECT nomeImagem FROM fotografia WHERE idPeca = :idPeca';
										$stmt1 = $conn->prepare($sql1);
										$stmt1->bindValue(':idPeca', $row['idPeca']);
										$stmt1->execute();
										$count1 = $stmt1->rowCount();
		
										if($count1 > 0){
											$result1 = $stmt1->fetchAll();
			
											foreach($result1 as $row1){
												?>
												<img class="card-img-top" alt="Bootstrap Thumbnail First" src="<?php echo $row1['nomeImagem']; ?>">
												<?php
											}
										}
										
										?>
									
										<div class="card-block">
											<h5 class="card-title">
												<?php echo $row['nomePeca']; ?>
											</h5>
											<p>
												<a class="btn btn-primary" href="#">Action</a> 
											</p>
										</div>
									</div>
								
							</div>
							
							<?php
						}
					}
					else{
						?>
						<div class="alert alert-warning w-100 text-center" role="alert">
							<b>Você não cadastrou nenhuma peça.</b>
						</div>
						<?php
					}
				
				?>
			
			</div>
		</div>
		
		<div class="col-md-1"></div>
		
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
