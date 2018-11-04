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
						?>
						<h4><?php echo $nomePeca; ?></h4>
						<?php
					}
				}
			}
		?>
			
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