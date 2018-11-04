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
		
		$html1 = '
				<html>
					<body>
						<h1>Hello Dompdf</h1>';
						
		$html = '<html lang="en">
					<head>
						<meta charset="utf-8">
						<meta http-equiv="X-UA-Compatible" content="IE=edge">
						<meta name="viewport" content="width=device-width, initial-scale=1">

						<title>Página roupa</title>

						<meta name="description" content="Source code generated using layoutit.com">
						<meta name="author" content="LayoutIt!">

						<link href="css/bootstrap.min.css" rel="stylesheet">
						<link href="css/style.css" rel="stylesheet">
	
					</head>
					<body>';
		
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
				
				$html = $html.'<p>1. Peça</p>';
				$html = $html.'<dl>';
				$html = $html.'<dt>Nome da peça</dt>';
				$html = $html.'<dd>'.$nomePeca.'</dd>';
				$html = $html.'<img  class="img-fluid" src="./img/a-origem- totem.png">';
				/*
				$dompdf->loadHtml('<p>1. Peça</p>');
				$dompdf->loadHtml('<dl>');
				$dompdf->loadHtml('<dt>Nome da peça</dt>');
				$dompdf->loadHtml('<dd>'.$nomePeca.'</dd>');
				$dompdf->loadHtml('<dt>Número de inventário(museu)</dt>');
				$dompdf->loadHtml('<dd>'.$numeroInventarioMuseu.'</dd>');
				$dompdf->loadHtml('<dt>Número de inventário(projeto)</dt>');
				$dompdf->loadHtml('<dd>'.$numeroInventarioProjeto.'</dd>');
				$dompdf->loadHtml('<dt>Cadastrada por</dt>');
				$dompdf->loadHtml('<dd>'.$usuario.'</dd>');
				$dompdf->loadHtml('</dl>');
				*/
			}
		}
		
		//Fecha o documento HTML
		$html = $html.'</body></html>';
		
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'portrait');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream("PeçaRoupa.pdf");
		
		echo "OK";
        
    }
?>