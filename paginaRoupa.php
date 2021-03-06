<!DOCTYPE html>
<html lang="en">
  <head>
  
	<?php
		session_start();
	?>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Página roupa</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
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
	
	
		function gerarPDF(idPeca){
			
			ajax = iniciaAjax();	
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "OK"){
								alert(retorno);
							}else{
								
							}
						}
						else{
							alert(ajax.statusText);
						}
					}
				}
				
				//Monta a QueryString
				dados = 'idPeca='+idPeca;
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'gerarPDFRoupa.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
	</script>
	
  </head>
  <body>

    <div class="container-fluid">
	
	<?php
		include './cabecalho.html';
	?>
	
	<div class="row">
		<?php include './campoPesquisa.html'; ?>
	</div>
	
	<div class="row">
	
		<div class="col-md-1">
		</div>
		<div class="col-md-7 px-5">

			<?php
				include './cnx_museu.php';
			
				if(!empty($_POST)){
					
					$conn = getConnection();
		
					$idPeca = $_POST['idPeca'];
		
					//echo $idPeca;
					
					//Buscar na tabela Peças
					$sql = 'SELECT * FROM pecas WHERE idPeca = :idPeca';
					$stmt = $conn->prepare($sql);
					$stmt->bindValue(':idPeca', $idPeca);
					$stmt->execute();
					$count = $stmt->rowCount();

					?>
					<div class="d-flex justify-content-center border mb-3 bg-light">
						<p class="h4">1. Peça</p>
					</div>
					<?php
					
					if($count > 0){
						
						$result = $stmt->fetchAll();
						
						foreach($result as $row){
							
							$numeroInventarioMuseu   = !isset($_COOKIE['username']) ? "Confidencial" : $row['numeroInventarioMuseu'];
							$numeroInventarioProjeto = !isset($_COOKIE['username']) ? "Confidencial" : $row['numeroInventarioProjeto'];
							$nomePeca                = $row['nomePeca'];
							$usuario                 = !isset($_COOKIE['username']) ? "Confidencial" : $row['usuario'];
							
							?>
							<dl class="row">
								<dt class="col-sm-6">Nome da peça</dt>
								<dd class="col-sm-6"><?php echo $nomePeca; ?></dd>
								
								<dt class="col-sm-6">Número de inventário(museu)</dt>
								<dd class="col-sm-6"><?php echo $numeroInventarioMuseu; ?></dd>
								
								<dt class="col-sm-6">Número de inventário(projeto)</dt>
								<dd class="col-sm-6"><?php echo $numeroInventarioProjeto; ?></dd>
								
								<dt class="col-sm-6">Cadastrada por</dt>
								<dd class="col-sm-6"><?php echo $usuario; ?></dd>
							</dl>
							<?php
						}
					}
					
					//Busca na tabela Ficha Técnica (Buscar as imagens também)
					$sql1 = 'SELECT * FROM ficha_tecnica WHERE idPeca = :idPeca';
					$stmt1 = $conn->prepare($sql1);
					$stmt1->bindValue(':idPeca', $idPeca);
					$stmt1->execute();
					$count1 = $stmt1->rowCount();

					?>
					<div class="d-flex justify-content-center border mb-3 bg-light">
						<p class="h4">2. Ficha técnica</p>
					</div>
					<?php
					
					if($count1 > 0){
						
						$result1 = $stmt1->fetchAll();
						
						foreach($result1 as $row1){
							
							$localizacao             = !isset($_COOKIE['username']) ? "Confidencial" : $row1['localizacao'];
							$termoDoacao             = $row1['termoDoacao'];
							$fabricanteAutor         = !isset($_COOKIE['username']) ? "Confidencial" : $row1['fabricanteAutor'];
							$dataPeca                = $row1['dataPeca'];
							$localAquisicao          = $row1['localAquisicao'];
							$tecido                  = $row1['tecido'];
							$composicao              = $row1['composicao'];
							$bordado                 = $row1['bordado'];
							$tipologia               = $row1['tipologia'];
							$pintura                 = $row1['pintura'];
							$tecnica                 = $row1['tecnica'];
							$dimensoes               = $row1['dimensoes'];
							$countImgsDesenhoTecnico = $row1['countImgsDesenhoTecnico'];
							$countImgsFotografia     = $row1['countImgsFotografia'];
							$metodoProducao          = $row1['metodoProducao'];
							
							?>
							<dl class="row">
								<dt class="col-sm-6">Localização</dt>
								<dd class="col-sm-6"><?php echo $localizacao; ?></dd>
								
								<dt class="col-sm-6">Termo de doação</dt>
								<dd class="col-sm-6"><?php echo $termoDoacao; ?></dd>
								
								<dt class="col-sm-6">Fabricante/Autor</dt>
								<dd class="col-sm-6"><?php echo $fabricanteAutor; ?></dd>
								
								<dt class="col-sm-6">Data</dt>
								<dd class="col-sm-6"><?php echo $dataPeca; ?></dd>
								
								<dt class="col-sm-6">Local de aquisição</dt>
								<dd class="col-sm-6"><?php echo $localAquisicao; ?></dd>
								
								<dt class="col-sm-6">Tecido</dt>
								<dd class="col-sm-6"><?php echo $tecido; ?></dd>
								
								<dt class="col-sm-6">Composição</dt>
								<dd class="col-sm-6"><?php echo $composicao; ?></dd>
								
								<dt class="col-sm-6">Bordado</dt>
								<dd class="col-sm-6"><?php echo $bordado; ?></dd>
								
								<dt class="col-sm-6">Tipologia</dt>
								<dd class="col-sm-6"><?php echo $tipologia; ?></dd>
								
								<dt class="col-sm-6">Pintura</dt>
								<dd class="col-sm-6"><?php echo $pintura; ?></dd>
								
								<dt class="col-sm-6">Técnica</dt>
								<dd class="col-sm-6"><?php echo $tecnica; ?></dd>
								
								<dt class="col-sm-6">Dimensões</dt>
								<dd class="col-sm-6"><?php echo $dimensoes; ?></dd>
								
								<dt class="col-sm-6">Método de Produção</dt>
								<dd class="col-sm-6"><?php echo $metodoProducao; ?></dd>
							</dl>
							<?php
						}
					}
					
					?>
					<p class="h5">Desenhos técnicos</p>
					<div class="row">
					
					<?php
					$sqlA = 'SELECT * FROM desenhos_tecnicos WHERE idPeca = :idPeca';
					$stmtA = $conn->prepare($sqlA);
					$stmtA->bindValue(':idPeca', $idPeca);
					$stmtA->execute();
					$countA = $stmtA->rowCount();
					
					if($countA > 0){
						
						$resultA = $stmtA->fetchAll();
						
						foreach($resultA as $rowA){
							$nomeImagem = $rowA['nomeImagem'];
							?>
							<div class="col-sm-4 mb-3">
								<img src="<?php echo $nomeImagem; ?>" class="img-fluid" alt="Responsive image">
							</div>
							<?php
						}
					}
					else{
						?>
						
						<div class="alert alert-warning w-100 center" role="alert">
							Não há desenhos técnicos cadastrados associados a esta peça.
						</div>
						
						<?php
					}
					?>
					
					</div>
					
					<p class="h5">Fotografia</p>
					<div class="row">
					
					<?php
					$sqlB = 'SELECT * FROM fotografia WHERE idPeca = :idPeca';
					$stmtB = $conn->prepare($sqlB);
					$stmtB->bindValue(':idPeca', $idPeca);
					$stmtB->execute();
					$countB = $stmtB->rowCount();
					
					if($countB > 0){
						
						$resultB = $stmtB->fetchAll();
						
						foreach($resultB as $rowB){
							$nomeImagem = $rowB['nomeImagem'];
							?>
							<div class="col-sm-4 mb-3">
								<img src="<?php echo $nomeImagem; ?>" class="img-fluid" alt="Responsive image">
							</div>
							<?php
						}
					}
					else{
						?>
						<div class="alert alert-warning" role="alert">
							Não há fotografias cadastradas associadas a esta peça.
						</div>
						<?php
					}
					?>
					
					</div>
					<?php
					
					//Buscar na tabela Ficha Catalográfica (Buscar as imagens também)
					$sql2 = 'SELECT * FROM ficha_catalografica WHERE idPeca = :idPeca';
					$stmt2 = $conn->prepare($sql2);
					$stmt2->bindValue(':idPeca', $idPeca);
					$stmt2->execute();
					$count2 = $stmt2->rowCount();

					?>
					<div class="d-flex justify-content-center border mb-3 bg-light">
						<p class="h4">3. Ficha catalográfica</p>
					</div>
					<?php
					
					if($count2 > 0){
						
						$result2 = $stmt2->fetchAll();
						
						foreach($result2 as $row2){
							
							$classe                       = $row2['classe'];
							$subClasse                    = $row2['subClasse'];
							$tipo                         = $row2['tipo'];
							$historicoUso                 = $row2['historicoUso'];
							$possiveisUsos                = $row2['possiveisUsos'];
							$dataAquisicao                = $row2['dataAquisicao'];
							$tecnicaMaterial              = $row2['tecnicaMaterial'];
							$forma                        = $row2['forma'];
							$descricaoPeca                = $row2['descricaoPeca'];
							$dimensoes                    = $row2['dimensoes'];
							$descricaoPecasComplementares = $row2['descricaoPecasComplementares'];
							$observacoes                  = !isset($_COOKIE['username']) ? "Confidencial" : $row2['observacoes'];
							$descricaoDetalhes            = $row2['descricaoDetalhes'];
							$countImgsDetalhes            = $row2['countImgsDetalhes'];
							
							?>
							<dl class="row">
								<dt class="col-sm-6">Classe</dt>
								<dd class="col-sm-6"><?php echo $classe; ?></dd>
								
								<dt class="col-sm-6">Subclasse</dt>
								<dd class="col-sm-6"><?php echo $subClasse; ?></dd>
								
								<dt class="col-sm-6">Tipo</dt>
								<dd class="col-sm-6"><?php echo $tipo; ?></dd>
								
								<dt class="col-sm-6">Histórico de uso</dt>
								<dd class="col-sm-6"><?php echo $historicoUso; ?></dd>
								
								<dt class="col-sm-6">Possíveis usos da peça</dt>
								<dd class="col-sm-6"><?php echo $possiveisUsos; ?></dd>
								
								<dt class="col-sm-6">Data de aquisição</dt>
								<dd class="col-sm-6"><?php echo $dataAquisicao; ?></dd>
								
								<dt class="col-sm-6">Técnica / Material</dt>
								<dd class="col-sm-6"><?php echo $tecnicaMaterial; ?></dd>
								
								<dt class="col-sm-6">Forma</dt>
								<dd class="col-sm-6"><?php echo $forma; ?></dd>
								
								<dt class="col-sm-6">Descrição da peça</dt>
								<dd class="col-sm-6"><?php echo $descricaoPeca; ?></dd>
								
								<dt class="col-sm-6">Dimensões</dt>
								<dd class="col-sm-6"><?php echo $dimensoes; ?></dd>
								
								<dt class="col-sm-6">Descrição de peças complementares</dt>
								<dd class="col-sm-6"><?php echo $descricaoPecasComplementares; ?></dd>
								
								<dt class="col-sm-6">Descrição dos detalhes</dt>
								<dd class="col-sm-6"><?php echo $descricaoDetalhes; ?></dd>
								
								<dt class="col-sm-6">Observações</dt>
								<dd class="col-sm-6"><?php echo $observacoes; ?></dd>
							</dl>
							<?php
						}
					}
					
					?>
					
					<p class="h5">Fotos de detalhes</p>
					<div class="row">
					
					<?php
					$sqlC = 'SELECT * FROM fotos_detalhes WHERE idPeca = :idPeca';
					$stmtC = $conn->prepare($sqlC);
					$stmtC->bindValue(':idPeca', $idPeca);
					$stmtC->execute();
					$countC = $stmtC->rowCount();
					
					if($countC > 0){
						
						$resultC = $stmtC->fetchAll();
						
						foreach($resultB as $rowB){
							$nomeImagem = $rowC['nomeImagem'];
							?>
							<div class="col-sm-4 mb-3">
								<img src="<?php echo $nomeImagem; ?>" class="img-fluid" alt="Responsive image">
							</div>
							<?php
						}
					}
					else{
						?>
						<div class="alert alert-warning" role="alert">
							Não há fotos de detalhes cadastradas associadas a esta peça.
						</div>
						<?php
					}
					?>
					
					</div>
					<?php
					
					//Buscar na tabela Ficha de Conservação
					$sql3 = 'SELECT * FROM ficha_conservacao WHERE idPeca = :idPeca';
					$stmt3 = $conn->prepare($sql3);
					$stmt3->bindValue(':idPeca', $idPeca);
					$stmt3->execute();
					$count3 = $stmt3->rowCount();

					?>
					<div class="d-flex justify-content-center border mb-3 bg-light">
						<p class="h4">4. Ficha de conservação</p>
					</div>
					<?php
					
					if($count3 > 0){
						
						$result3 = $stmt3->fetchAll();
						
						foreach($result3 as $row3){
							
							$numeroRegistro           = !isset($_COOKIE['username']) ? "Confidencial" : $row3['numeroRegistro'];
							$titulo                   = !isset($_COOKIE['username']) ? "Confidencial" : $row3['titulo'];
							$classe                   = !isset($_COOKIE['username']) ? "Confidencial" : $row3['classe'];
							$denominacao              = !isset($_COOKIE['username']) ? "Confidencial" : $row3['denominacao'];
							$estadoGeralConservacao   = !isset($_COOKIE['username']) ? "Confidencial" : $row3['estadoGeralConservacao'];
							$dadosVerificados         = !isset($_COOKIE['username']) ? "Confidencial" : $row3['dadosVerificados'];
							$procedimentosHigiene     = !isset($_COOKIE['username']) ? "Confidencial" : $row3['procedimentosHigiene'];
							$reparosRealizados        = !isset($_COOKIE['username']) ? "Confidencial" : $row3['reparosRealizados'];
							$acondicionamento         = !isset($_COOKIE['username']) ? "Confidencial" : $row3['acondicionamento'];
							$restauracaoConservacao   = !isset($_COOKIE['username']) ? "Confidencial" : $row3['restauracaoConservacao'];
							$procedimentosConservacao = !isset($_COOKIE['username']) ? "Confidencial" : $row3['procedimentosConservacao'];
							$observacoes              = !isset($_COOKIE['username']) ? "Confidencial" : $row3['observacoes'];
							$dataPeca                 = !isset($_COOKIE['username']) ? "Confidencial" : $row3['dataPeca'];
							$responsavelPreenchimento = !isset($_COOKIE['username']) ? "Confidencial" : $row3['responsavelPreenchimento'];
							
							?>
							<dl class="row">
								<dt class="col-sm-6">Número de registro</dt>
								<dd class="col-sm-6"><?php echo $numeroRegistro; ?></dd>
								
								<dt class="col-sm-6">Título</dt>
								<dd class="col-sm-6"><?php echo $titulo; ?></dd>
								
								<dt class="col-sm-6">Classe</dt>
								<dd class="col-sm-6"><?php echo $classe; ?></dd>
								
								<dt class="col-sm-6">Denominação</dt>
								<dd class="col-sm-6"><?php echo $denominacao; ?></dd>
								
								<dt class="col-sm-6">Estado geral de conservação</dt>
								<dd class="col-sm-6"><?php echo $estadoGeralConservacao; ?></dd>
								
								<dt class="col-sm-6">Danos verificados</dt>
								<dd class="col-sm-6"><?php echo $dadosVerificados; ?></dd>
								
								<dt class="col-sm-6">Procedimentos de higienização</dt>
								<dd class="col-sm-6"><?php echo $procedimentosHigiene; ?></dd>
								
								<dt class="col-sm-6">Reparos realizados</dt>
								<dd class="col-sm-6"><?php echo $reparosRealizados; ?></dd>
								
								<dt class="col-sm-6">Acondicionamento</dt>
								<dd class="col-sm-6"><?php echo $acondicionamento; ?></dd>
								
								<dt class="col-sm-6">Restauração ou conservação preventiva</dt>
								<dd class="col-sm-6"><?php echo $restauracaoConservacao; ?></dd>
								
								<dt class="col-sm-6">Procedimentos de conservação preventiva</dt>
								<dd class="col-sm-6"><?php echo $procedimentosConservacao; ?></dd>
								
								<dt class="col-sm-6">Observações</dt>
								<dd class="col-sm-6"><?php echo $observacoes; ?></dd>
								
								<dt class="col-sm-6">Data</dt>
								<dd class="col-sm-6"><?php echo $dataPeca; ?></dd>
								
								<dt class="col-sm-6">Responsável pelo preenchimento</dt>
								<dd class="col-sm-6"><?php echo $responsavelPreenchimento; ?></dd>
							</dl>
							<?php
						}
					}
					
					//Buscar na tabela Ficha de Visualização
					$sql4 = 'SELECT * FROM visualizacao WHERE idPeca = :idPeca';
					$stmt4 = $conn->prepare($sql4);
					$stmt4->bindValue(':idPeca', $idPeca);
					$stmt4->execute();
					$count4 = $stmt4->rowCount();

					?>
					<div class="d-flex justify-content-center border mb-3 bg-light">
						<p class="h4">5. Ficha de visualização</p>
					</div>
					<?php
					
					if($count4 > 0){
						
						$result4 = $stmt4->fetchAll();
						
						foreach($result4 as $row4){ 
						
							$tipoAcervo                = !isset($_COOKIE['username']) ? "Confidencial" : $row4['tipoAcervo'];
							$numeroRegistro            = !isset($_COOKIE['username']) ? "Confidencial" : $row4['numeroRegistro'];
							$numeroRegistrosAntigos    = !isset($_COOKIE['username']) ? "Confidencial" : $row4['numeroRegistrosAntigos'];
							$sala                      = !isset($_COOKIE['username']) ? "Confidencial" : $row4['sala'];
							$estante                   = !isset($_COOKIE['username']) ? "Confidencial" : $row4['estante'];
							$prateleira                = !isset($_COOKIE['username']) ? "Confidencial" : $row4['prateleira'];
							$embalagem                 = !isset($_COOKIE['username']) ? "Confidencial" : $row4['embalagem'];
							$classe                    = !isset($_COOKIE['username']) ? "Confidencial" : $row4['classe'];
							$denominacao               = !isset($_COOKIE['username']) ? "Confidencial" : $row4['denominacao'];
							$tipo                      = !isset($_COOKIE['username']) ? "Confidencial" : $row4['tipo'];
							$titulo                    = !isset($_COOKIE['username']) ? "Confidencial" : $row4['titulo'];
							$autoria                   = !isset($_COOKIE['username']) ? "Confidencial" : $row4['autoria'];
							$colecao                   = !isset($_COOKIE['username']) ? "Confidencial" : $row4['colecao'];
							$tipoDataProducao          = !isset($_COOKIE['username']) ? "Confidencial" : $row4['tipoDataProducao'];
							$dataProducao              = !isset($_COOKIE['username']) ? "Confidencial" : $row4['dataProducao'];
							$localProducao             = !isset($_COOKIE['username']) ? "Confidencial" : $row4['localProducao'];
							$historicoPeca             = !isset($_COOKIE['username']) ? "Confidencial" : $row4['historicoPeca'];
							$eventosAssociados         = !isset($_COOKIE['username']) ? "Confidencial" : $row4['eventosAssociados'];
							$largura                   = !isset($_COOKIE['username']) ? "Confidencial" : $row4['largura'];
							$altura                    = !isset($_COOKIE['username']) ? "Confidencial" : $row4['altura'];
							$profundidade              = !isset($_COOKIE['username']) ? "Confidencial" : $row4['profundidade'];
							$circunferencia            = !isset($_COOKIE['username']) ? "Confidencial" : $row4['circunferencia'];
							$tecnica                   = !isset($_COOKIE['username']) ? "Confidencial" : $row4['tecnica'];
							$material                  = !isset($_COOKIE['username']) ? "Confidencial" : $row4['material'];
							$etiquetaComposicao        = !isset($_COOKIE['username']) ? "Confidencial" : $row4['etiquetaComposicao'];
							$descricaoConteudo         = !isset($_COOKIE['username']) ? "Confidencial" : $row4['descricaoConteudo'];
							$pecasComplementares       = !isset($_COOKIE['username']) ? "Confidencial" : $row4['pecasComplementares'];
							$descricaoPecasComp        = !isset($_COOKIE['username']) ? "Confidencial" : $row4['descricaoPecasComp'];
							$pecasRelacionadas         = !isset($_COOKIE['username']) ? "Confidencial" : $row4['pecasRelacionadas'];
							$descritores               = !isset($_COOKIE['username']) ? "Confidencial" : $row4['descritores'];
							$descritoresGeograficos    = !isset($_COOKIE['username']) ? "Confidencial" : $row4['descritoresGeograficos'];
							$documentosRelacionados    = !isset($_COOKIE['username']) ? "Confidencial" : $row4['documentosRelacionados'];
							$notasObservacoes          = !isset($_COOKIE['username']) ? "Confidencial" : $row4['notasObservacoes'];
							$valorPeca                 = !isset($_COOKIE['username']) ? "Confidencial" : $row4['valorPeca'];
							$seguradora                = !isset($_COOKIE['username']) ? "Confidencial" : $row4['seguradora'];
							$valorSeguro               = !isset($_COOKIE['username']) ? "Confidencial" : $row4['valorSeguro'];
							$formasIncorporacao        = !isset($_COOKIE['username']) ? "Confidencial" : $row4['formasIncorporacao'];
							$tipoDataIncorporacao      = !isset($_COOKIE['username']) ? "Confidencial" : $row4['tipoDataIncorporacao'];
							$frequencias               = !isset($_COOKIE['username']) ? "Confidencial" : $row4['frequencias'];
							$procedencias              = !isset($_COOKIE['username']) ? "Confidencial" : $row4['procedencias'];
							$usoAcessoPecaFisica       = !isset($_COOKIE['username']) ? "Confidencial" : $row4['usoAcessoPecaFisica'];
							$usoAcessoRepresentante    = !isset($_COOKIE['username']) ? "Confidencial" : $row4['usoAcessoRepresentante'];
							$historicoCirculacao       = !isset($_COOKIE['username']) ? "Confidencial" : $row4['historicoCirculacao'];
							$direitos                  = !isset($_COOKIE['username']) ? "Confidencial" : $row4['direitos'];
							$catalogador               = !isset($_COOKIE['username']) ? "Confidencial" : $row4['catalogador'];
							$dataInicialCatalogacao    = !isset($_COOKIE['username']) ? "Confidencial" : $row4['dataInicialCatalogacao'];
							$dataFinalCatalogacao      = !isset($_COOKIE['username']) ? "Confidencial" : $row4['dataFinalCatalogacao'];
							$fontesPesquisaReferencias = !isset($_COOKIE['username']) ? "Confidencial" : $row4['fontesPesquisaReferencias'];
							$linkVisao                 = !isset($_COOKIE['username']) ? "Confidencial" : $row4['linkVisao'];
							$metaKeywords              = !isset($_COOKIE['username']) ? "Confidencial" : $row4['metaKeywords'];
							$metaDescription           = !isset($_COOKIE['username']) ? "Confidencial" : $row4['metaDescription'];
							$metaTitle                 = !isset($_COOKIE['username']) ? "Confidencial" : $row4['metaTitle'];
							
							?>
							<dl class="row">
								<dt class="col-sm-6">Tipo de acervo</dt>
								<dd class="col-sm-6"><?php echo $tipoAcervo; ?></dd>
								
								<dt class="col-sm-6">Número de registro</dt>
								<dd class="col-sm-6"><?php echo $numeroRegistro; ?></dd>
								
								<dt class="col-sm-6">Números de registro antigos</dt>
								<dd class="col-sm-6"><?php echo $numeroRegistrosAntigos; ?></dd>
								
								<dt class="col-sm-6">Sala</dt>
								<dd class="col-sm-6"><?php echo $sala; ?></dd>
								
								<dt class="col-sm-6">Estante</dt>
								<dd class="col-sm-6"><?php echo $estante; ?></dd>
								
								<dt class="col-sm-6">Prateleira</dt>
								<dd class="col-sm-6"><?php echo $prateleira; ?></dd>
								
								<dt class="col-sm-6">Embalagem</dt>
								<dd class="col-sm-6"><?php echo $embalagem; ?></dd>
								
								<dt class="col-sm-6">Classe</dt>
								<dd class="col-sm-6"><?php echo $classe; ?></dd>
								
								<dt class="col-sm-6">Denominação</dt>
								<dd class="col-sm-6"><?php echo $denominacao; ?></dd>
								
								<dt class="col-sm-6">Tipo</dt>
								<dd class="col-sm-6"><?php echo $tipo; ?></dd>
								
								<dt class="col-sm-6">Título</dt>
								<dd class="col-sm-6"><?php echo $titulo; ?></dd>
								
								<dt class="col-sm-6">Autoria</dt>
								<dd class="col-sm-6"><?php echo $autoria; ?></dd>
								
								<dt class="col-sm-6">Coleção</dt>
								<dd class="col-sm-6"><?php echo $colecao; ?></dd>
								
								<dt class="col-sm-6">Tipo de data de produção</dt>
								<dd class="col-sm-6"><?php echo $tipoDataProducao; ?></dd>
								
								<dt class="col-sm-6">Data de produção</dt>
								<dd class="col-sm-6"><?php echo $dataProducao; ?></dd>
								
								<dt class="col-sm-6">Local de produção</dt>
								<dd class="col-sm-6"><?php echo $localProducao; ?></dd>
								
								<dt class="col-sm-6">Histórico da peça</dt>
								<dd class="col-sm-6"><?php echo $historicoPeca; ?></dd>
								
								<dt class="col-sm-6">Eventos associados</dt>
								<dd class="col-sm-6"><?php echo $eventosAssociados; ?></dd>
								
								<dt class="col-sm-6">Largura</dt>
								<dd class="col-sm-6"><?php echo $largura; ?></dd>
								
								<dt class="col-sm-6">Altura</dt>
								<dd class="col-sm-6"><?php echo $altura; ?></dd>
								
								<dt class="col-sm-6">Profundidade</dt>
								<dd class="col-sm-6"><?php echo $profundidade; ?></dd>
								
								<dt class="col-sm-6">Circunferência</dt>
								<dd class="col-sm-6"><?php echo $circunferencia; ?></dd>
								
								<dt class="col-sm-6">Técnica</dt>
								<dd class="col-sm-6"><?php echo $tecnica; ?></dd>
								
								<dt class="col-sm-6">Material</dt>
								<dd class="col-sm-6"><?php echo $material; ?></dd>
								
								<dt class="col-sm-6">Etiqueta de composição</dt>
								<dd class="col-sm-6"><?php echo $etiquetaComposicao; ?></dd>
								
								<dt class="col-sm-6">Descrição / Conteúdo</dt>
								<dd class="col-sm-6"><?php echo $descricaoConteudo; ?></dd>
								
								<dt class="col-sm-6">Peças complementares</dt>
								<dd class="col-sm-6"><?php echo $pecasComplementares; ?></dd>
								
								<dt class="col-sm-6">Descrição das peças complementares</dt>
								<dd class="col-sm-6"><?php echo $descricaoPecasComp; ?></dd>
								
								<dt class="col-sm-6">Peças relacionadas</dt>
								<dd class="col-sm-6"><?php echo $pecasRelacionadas; ?></dd>
								
								<dt class="col-sm-6">Descritores</dt>
								<dd class="col-sm-6"><?php echo $descritores; ?></dd>
								
								<dt class="col-sm-6">Descritores geográficos</dt>
								<dd class="col-sm-6"><?php echo $descritoresGeograficos; ?></dd>
								
								<dt class="col-sm-6">Documentos relacionados</dt>
								<dd class="col-sm-6"><?php echo $documentosRelacionados; ?></dd>
								
								<dt class="col-sm-6">Notas e observações</dt>
								<dd class="col-sm-6"><?php echo $notasObservacoes; ?></dd>
								
								<dt class="col-sm-6">Valor da peça</dt>
								<dd class="col-sm-6"><?php echo $valorPeca; ?></dd>
								
								<dt class="col-sm-6">Seguradora</dt>
								<dd class="col-sm-6"><?php echo $seguradora; ?></dd>
								
								<dt class="col-sm-6">Valor do seguro</dt>
								<dd class="col-sm-6"><?php echo $valorSeguro; ?></dd>
								
								<dt class="col-sm-6">Formas de incorporação</dt>
								<dd class="col-sm-6"><?php echo $formasIncorporacao; ?></dd>
								
								<dt class="col-sm-6">Tipo de data de incorporação</dt>
								<dd class="col-sm-6"><?php echo $tipoDataIncorporacao; ?></dd>
								
								<dt class="col-sm-6">Frequências</dt>
								<dd class="col-sm-6"><?php echo $frequencias; ?></dd>
								
								<dt class="col-sm-6">Procedências</dt>
								<dd class="col-sm-6"><?php echo $procedencias; ?></dd>
								
								<dt class="col-sm-6">Uso e acesso peça física</dt>
								<dd class="col-sm-6"><?php echo $usoAcessoPecaFisica; ?></dd>
								
								<dt class="col-sm-6">Uso e acesso representante digital</dt>
								<dd class="col-sm-6"><?php echo $usoAcessoRepresentante; ?></dd>
								
								<dt class="col-sm-6">Histórico de circulação</dt>
								<dd class="col-sm-6"><?php echo $historicoCirculacao; ?></dd>
								
								<dt class="col-sm-6">Direitos</dt>
								<dd class="col-sm-6"><?php echo $direitos; ?></dd>
								
								<dt class="col-sm-6">Catalogador</dt>
								<dd class="col-sm-6"><?php echo $catalogador; ?></dd>
								
								<dt class="col-sm-6">Data inicial de catalogação</dt>
								<dd class="col-sm-6"><?php echo $dataInicialCatalogacao; ?></dd>
								
								<dt class="col-sm-6">Data final de catalogação</dt>
								<dd class="col-sm-6"><?php echo $dataFinalCatalogacao; ?></dd>
								
								<dt class="col-sm-6">Fontes de pesquisa e referências</dt>
								<dd class="col-sm-6"><?php echo $fontesPesquisaReferencias; ?></dd>
								
								<dt class="col-sm-6">Link visão 360°</dt>
								<dd class="col-sm-6"><?php echo $linkVisao; ?></dd>
								
								<dt class="col-sm-6">Meta keywords</dt>
								<dd class="col-sm-6"><?php echo $metaKeywords; ?></dd>
								
								<dt class="col-sm-6">Meta description</dt>
								<dd class="col-sm-6"><?php echo $metaDescription; ?></dd>
								
								<dt class="col-sm-6">Meta title</dt>
								<dd class="col-sm-6"><?php echo $metaTitle; ?></dd>
								
							</dl>
							<?php
						}
					}
					
					//Buscar na tabela Ficha de English Fields
					$sql5 = 'SELECT * FROM english_fields WHERE idPeca = :idPeca';
					$stmt5 = $conn->prepare($sql5);
					$stmt5->bindValue(':idPeca', $idPeca);
					$stmt5->execute();
					$count5 = $stmt5->rowCount();

					?>
					<div class="d-flex justify-content-center border mb-3 bg-light">
						<p class="h4">6. English fields</p>
					</div>
					<?php
					
					if($count5 > 0){
						
						$result5 = $stmt5->fetchAll();
						
						foreach($result5 as $row5){
							
							$tituloIngles          = $row5['tituloIngles'];
							$autoriaIngles         = $row5['autoriaIngles'];
							$colecaoIngles         = $row5['colecaoIngles'];
							$historiaIngles        = $row5['historiaIngles'];
							$eventosIngles         = $row5['eventosIngles'];
							$conteudoIngles        = $row5['conteudoIngles'];
							$pecasCompIngles       = $row5['pecasCompIngles'];
							$descricaoPecasIngles  = $row5['descricaoPecasIngles'];
							$metaKeywordsIngles    = $row5['metaKeywordsIngles'];
							$metaDescriptionIngles = $row5['metaDescriptionIngles'];
							$metaTitleIngles       = $row5['metaTitleIngles'];
							$disponibilidadePeca   = $row5['disponibilidadePeca'];
							$destacado             = $row5['destacado'];
							$fichaConservacao      = $row5['fichaConservacao'];
							
							?>
							<dl class="row">
								<dt class="col-sm-6">Título em inglês</dt>
								<dd class="col-sm-6"><?php echo $tituloIngles; ?></dd>
								
								<dt class="col-sm-6">Autoria em inglês</dt>
								<dd class="col-sm-6"><?php echo $autoriaIngles; ?></dd>
								
								<dt class="col-sm-6">Coleção em inglês</dt>
								<dd class="col-sm-6"><?php echo $colecaoIngles; ?></dd>
								
								<dt class="col-sm-6">História em inglês</dt>
								<dd class="col-sm-6"><?php echo $historiaIngles; ?></dd>
								
								<dt class="col-sm-6">Eventos associados em inglês</dt>
								<dd class="col-sm-6"><?php echo $eventosIngles; ?></dd>
								
								<dt class="col-sm-6">Conteúdos em inglês</dt>
								<dd class="col-sm-6"><?php echo $conteudoIngles; ?></dd>
								
								<dt class="col-sm-6">Peças complementares em inglês</dt>
								<dd class="col-sm-6"><?php echo $pecasCompIngles; ?></dd>
								
								<dt class="col-sm-6">Descrição das peças complementares em inglês</dt>
								<dd class="col-sm-6"><?php echo $descricaoPecasIngles; ?></dd>
								
								<dt class="col-sm-6">Meta keywords em inglês</dt>
								<dd class="col-sm-6"><?php echo $metaKeywordsIngles; ?></dd>
								
								<dt class="col-sm-6">Meta description em inglês</dt>
								<dd class="col-sm-6"><?php echo $metaDescriptionIngles; ?></dd>
								
								<dt class="col-sm-6">Meta title em inglês</dt>
								<dd class="col-sm-6"><?php echo $metaTitleIngles; ?></dd>
								
								<dt class="col-sm-6">Disponibilidade da peça</dt>
								<dd class="col-sm-6"><?php echo $disponibilidadePeca; ?></dd>
								
								<dt class="col-sm-6">Ficha de conservação</dt>
								<dd class="col-sm-6"><?php echo $fichaConservacao; ?></dd>
								
								<dt class="col-sm-6">Destacado</dt>
								<dd class="col-sm-6"><?php echo $destacado; ?></dd>
							</dl>
							<?php
						}
					}
				}
			?>
		</div>
		
		<div class="col-md-1">
		</div>
		
		<div class="col-md-3" align="center">
		
			<?php include './menuUsuario.html'; ?>
			
			<form method="POST" action="gerarPDFRoupa.php" class="btn btn-primary w-100" target="_blank">
				<input type="hidden" id="idPeca" name="idPeca" value="<?php echo $_POST['idPeca']; ?>">
					
				<button class="btn btn-primary" type="submit">
					Gerar PDF
				</button> 
			</form>
			
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
