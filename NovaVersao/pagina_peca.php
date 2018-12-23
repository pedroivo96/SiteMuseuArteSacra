<!DOCTYPE html>
<html lang="en">
  <head>
  
	<?php
		session_start(); 
		include './conexao_museu.php';
 
		// Verifica se existe os dados da sessão de login 
		/*if(!isset($_SESSION["nome_usuario"])) { 
			// Usuário não logado! Redireciona para a página de login 
			header("Location: index.php"); 
			exit; 
		} */
		
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
			
				<button type="button" class="btn btn-success w-100 mb-1">Voltar</button>
				
				<button type="button" class="btn btn-danger w-100 mb-1">Sair</button>
				
			</div>
			
			<div class="col-md-6">

				<?php

				$conn = getConnection();

        		$sql = 'SELECT * FROM pecas WHERE id_peca = :id_peca';
        		$stmt = $conn->prepare($sql);
        		$stmt->bindValue(':id_peca', $_POST['id_peca']);
        		$stmt->execute();
        		$count = $stmt->rowCount();

        		if($count > 0){
			
					//Existe uma peça referente a este ID

					$result = $stmt->fetchAll();
			
					foreach($result as $row){
						?>
						<dl class="row">
							<dt class="col-sm-6">Nome da peça</dt>
  							<dd class="col-sm-6"><?php echo $row['nome_peca']; ?></dd>
						</dl>
						<?php

						if(isset($_SESSION['nome_usuario'])){
							?>
							<dl class="row">
								<dt class="col-sm-6">Número de inventário (Museu)</dt>
  								<dd class="col-sm-6"><?php echo $row['numero_inventario_museu']; ?></dd>
							</dl>

							<dl class="row">
								<dt class="col-sm-6">Número de inventário (Projeto)</dt>
  								<dd class="col-sm-6"><?php echo $row['numero_inventario_projeto']; ?></dd>
							</dl>							
						<?php
						}

						?>
						<p>Ficha técnica</p>
						<?php

						$sql1 = 'SELECT * FROM fichas_tecnicas WHERE id_peca = :id_peca';
        				$stmt1 = $conn->prepare($sql1);
        				$stmt1->bindValue(':id_peca', $_POST['id_peca']);
        				$stmt1->execute();
        				$count1 = $stmt1->rowCount();

        				if($count1 > 0){

							$result1 = $stmt1->fetchAll();
			
							foreach($result1 as $row1){
								
								//Localização - A
								if(isset($_SESSION['nome_usuario'])){
									?>
									<dl class="row">
										<dt class="col-sm-6">Localização</dt>
  										<dd class="col-sm-6"><?php echo $row1['localizacao']; ?></dd>
									</dl>
									<?php		
								}

								//Termo de doação - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Termo de doação</dt>
  									<dd class="col-sm-6"><?php echo $row1['termo_doacao']; ?></dd>
								</dl>	
								<?php

								//Fabricante/Autor - A

								//Data - U

								//Local de aquisição - U

								//Tecido - U

								//Composição - U

								//Bordado - U

								//Tipologia - U

								//Pintura - U

								//Técnica - U

								//Dimensões - U

								//Desenha técnico - U

								//Fotografia - U

							}
						}

						<p>Ficha catalográfica</p>

						$sql2 = 'SELECT * FROM fichas_catalograficas WHERE id_peca = :id_peca';
        				$stmt2 = $conn->prepare($sql2);
        				$stmt2->bindValue(':id_peca', $_POST['id_peca']);
        				$stmt2->execute();
        				$count2 = $stmt2->rowCount();

        				if($count2 > 0){

							$result2 = $stmt2->fetchAll();
			
							foreach($result2 as $row2){

								//Classe - U

								//Subclasse - U

								//Tipo - U

								//Histórico de uso - U

								//Possíveis usos da peça - U

								//Data de aquisição - U

								//Técnica/material - U

								//Forma - U

								//Descrição da peça - U

								//Dimensões - U

								//Descrição de peças complementares - U

								//Observações - A

								//Fotos dos detalhes (imagens) - U

								//Descrição dos detalhes - U

							}
						}

						<p>Ficha de conservação</p>

						$sql3 = 'SELECT * FROM fichas_conservacao WHERE id_peca = :id_peca';
        				$stmt3 = $conn->prepare($sql3);
        				$stmt3->bindValue(':id_peca', $_POST['id_peca']);
        				$stmt3->execute();
        				$count3 = $stmt3->rowCount();

        				if($count3 > 0){

							$result3 = $stmt3->fetchAll();
			
							foreach($result3 as $row3){

							}
						}

						<p>Ficha de visualização</p>

						$sql4 = 'SELECT * FROM fichas_visualizacao WHERE id_peca = :id_peca';
        				$stmt4 = $conn->prepare($sql4);
        				$stmt4->bindValue(':id_peca', $_POST['id_peca']);
        				$stmt4->execute();
        				$count4 = $stmt4->rowCount();

        				if($count4 > 0){

							$result4 = $stmt4->fetchAll();
			
							foreach($result4 as $row4){

							}
						}
						
						<p>Ficha de english fields</p>	

						$sql5 = 'SELECT * FROM fichas_english_fields WHERE id_peca = :id_peca';
        				$stmt5 = $conn->prepare($sql5);
        				$stmt5->bindValue(':id_peca', $_POST['id_peca']);
        				$stmt5->execute();
        				$count5 = $stmt5->rowCount();

        				if($count5 > 0){

							$result5 = $stmt5->fetchAll();
			
							foreach($result5 as $row5){

							}
						}

					}

        		}else{
        			//Não existe nenhuma peça referente a este ID
        		}

				?>
			</div>
			
			<div class="col-md-3">
			
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