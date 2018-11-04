<?php

	include './cnx_museu.php';
	
	// include autoloader
	require_once 'dompdf/autoload.inc.php';
	
	// reference the Dompdf namespace
	use Dompdf\Dompdf;

    if(!empty($_POST)){

        $idPeca = $_POST['idPeca'];
        $conn   = getConnection();
		
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		
		$dompdf->set_base_path("./css");
		
		//Cria toda a estrutura do HTML
		
		$dompdf->loadHtml('<html lang="en">');
		$dompdf->loadHtml('<head>');
		$dompdf->loadHtml('<meta charset="utf-8">');
		$dompdf->loadHtml('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
		$dompdf->loadHtml('<meta name="viewport" content="width=device-width, initial-scale=1">');
		$dompdf->loadHtml('<title>Página roupa</title>');
		$dompdf->loadHtml('<meta name="description" content="Source code generated using layoutit.com">');
		$dompdf->loadHtml('<meta name="author" content="LayoutIt!">');
		$dompdf->loadHtml('<link href="css/bootstrap.min.css" rel="stylesheet">');
		$dompdf->loadHtml('</head>');
		$dompdf->loadHtml('<body>');
		$dompdf->loadHtml('<div class="container-fluid">');
		$dompdf->loadHtml('<div class="row">');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		
		//Buscar na tabela Peças
		$sql = 'SELECT * FROM pecas WHERE idPeca = :idPeca';
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':idPeca', $idPeca);
		$stmt->execute();
		$count = $stmt->rowCount();
					
		if($count > 0){
						
			$result = $stmt->fetchAll();
						
			foreach($result as $row){
				$numeroInventarioMuseu   = $row['numeroInventarioMuseu'];
				$numeroInventarioProjeto = $row['numeroInventarioProjeto'];
				$nomePeca                = $row['nomePeca'];
				$usuario                 = $row['usuario'];
				
				$dompdf->loadHtml('<p class="h4">1. Peça</p>');
				$dompdf->loadHtml('<dl class="row">');
				$dompdf->loadHtml('<dt class="col-sm-6">Nome da peça</dt>');
				$dompdf->loadHtml('<dd class="col-sm-6"><?php echo $nomePeca; ?></dd>');
				$dompdf->loadHtml('<dt class="col-sm-6">Número de inventário(museu)</dt>');
				$dompdf->loadHtml('<dd class="col-sm-6"><?php echo $numeroInventarioMuseu; ?></dd>');
				$dompdf->loadHtml('<dt class="col-sm-6">Número de inventário(projeto)</dt>');
				$dompdf->loadHtml('<dd class="col-sm-6"><?php echo $numeroInventarioProjeto; ?></dd>');
				$dompdf->loadHtml('<dt class="col-sm-6">Cadastrada por</dt>');
				$dompdf->loadHtml('<dd class="col-sm-6"><?php echo $usuario; ?></dd>');
				$dompdf->loadHtml('</dl>');
			}
		}
		
		//Fecha a estrutura do HTML
		/*
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		$dompdf->loadHtml('');
		*/

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'portrait');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream("PeçaRoupa.pdf");
		
		echo "OK";
        
    }
?>