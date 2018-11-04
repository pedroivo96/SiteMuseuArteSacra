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
	
  </head>
  <body>

    <div class="container-fluid">
	
	<div class="row">
		<?php include './campoPesquisa.html'; ?>
	</div>
	
	<div class="row">
	
		<div class="col-md-2">
		</div>
		<div class="col-md-6 px-5">

			<?php
				include './cnx_museu.php';
			
				if(!empty($_POST)){
					
					$conn = getConnection();
		
					$idPeca = $_POST['idPeca'];
		
					echo $idPeca;
					
					//Buscar na tabela Peças
					$sql = 'SELECT * FROM pecas WHERE idPeca = :idPeca';
					$stmt = $conn->prepare($sql);
					$stmt->bindValue(':idPeca', $idPeca);
					$stmt->execute();
					$count = $stmt->rowCount();

					?>
					<p class="h4">1. Peça</p>
					<?php
					
					if($count > 0){
						
						$result = $stmt->fetchAll();
						
						foreach($result as $row){
							$numeroInventarioMuseu   = $row['numeroInventarioMuseu'];
							$numeroInventarioProjeto = $row['numeroInventarioProjeto'];
							$nomePeca                = $row['nomePeca'];
							$usuario                 = $row['usuario'];
							
							?>
							<dl class="row">
								<dt class="col-sm-3">Nome da peça</dt>
								<dd class="col-sm-9"><?php echo $nomePeca; ?></dd>
								
								<dt class="col-sm-3">Número de inventário(museu)</dt>
								<dd class="col-sm-9"><?php echo $numeroInventarioMuseu; ?></dd>
								
								<dt class="col-sm-3">Número de inventário(projeto)</dt>
								<dd class="col-sm-9"><?php echo $numeroInventarioProjeto; ?></dd>
								
								<dt class="col-sm-3">Cadastrada por</dt>
								<dd class="col-sm-9"><?php echo $usuario; ?></dd>
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
					<p class="h4">2. Ficha técnica</p>
					<?php
					
					if($count1 > 0){
						
						$result1 = $stmt1->fetchAll();
						
						foreach($result1 as $row1){
							
							$localizacao             = $row1['localizacao'];
							$termoDoacao             = $row1['termoDoacao'];
							$fabricanteAutor         = $row1['fabricanteAutor'];
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
								<dt class="col-sm-3">Localização</dt>
								<dd class="col-sm-9"><?php echo $localizacao; ?></dd>
								
								<dt class="col-sm-3">Termo de doação</dt>
								<dd class="col-sm-9"><?php echo $termoDoacao; ?></dd>
								
								<dt class="col-sm-3">Fabricante/Autor</dt>
								<dd class="col-sm-9"><?php echo $fabricanteAutor; ?></dd>
								
								<dt class="col-sm-3">Data</dt>
								<dd class="col-sm-9"><?php echo $dataPeca; ?></dd>
								
								<dt class="col-sm-3">Local de aquisição</dt>
								<dd class="col-sm-9"><?php echo $localAquisicao; ?></dd>
								
								<dt class="col-sm-3">Tecido</dt>
								<dd class="col-sm-9"><?php echo $tecido; ?></dd>
								
								<dt class="col-sm-3">Composição</dt>
								<dd class="col-sm-9"><?php echo $composicao; ?></dd>
								
								<dt class="col-sm-3">Bordado</dt>
								<dd class="col-sm-9"><?php echo $bordado; ?></dd>
								
								<dt class="col-sm-3">Tipologia</dt>
								<dd class="col-sm-9"><?php echo $tipologia; ?></dd>
								
								<dt class="col-sm-3">Pintura</dt>
								<dd class="col-sm-9"><?php echo $pintura; ?></dd>
								
								<dt class="col-sm-3">Técnica</dt>
								<dd class="col-sm-9"><?php echo $tecnica; ?></dd>
								
								<dt class="col-sm-3">Dimensões</dt>
								<dd class="col-sm-9"><?php echo $dimensoes; ?></dd>
								
								<dt class="col-sm-3">Método de Produção</dt>
								<dd class="col-sm-9"><?php echo $metodoProducao; ?></dd>
							</dl>
							<?php
						}
					}
					
					//Buscar na tabela Ficha Catalográfica (Buscar as imagens também)
					$sql2 = 'SELECT * FROM ficha_catalografica WHERE idPeca = :idPeca';
					$stmt2 = $conn->prepare($sql2);
					$stmt2->bindValue(':idPeca', $idPeca);
					$stmt2->execute();
					$count2 = $stmt2->rowCount();

					?>
					<p class="h4">3. Ficha catalográfica</p>
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
							$observacoes                  = $row2['observacoes'];
							$descricaoDetalhes            = $row2['descricaoDetalhes'];
							$countImgsDetalhes            = $row2['countImgsDetalhes'];
							
							?>
							<dl class="row">
								<dt class="col-sm-3">Classe</dt>
								<dd class="col-sm-9"><?php echo $classe; ?></dd>
								
								<dt class="col-sm-3">Subclasse</dt>
								<dd class="col-sm-9"><?php echo $subClasse; ?></dd>
								
								<dt class="col-sm-3">Tipo</dt>
								<dd class="col-sm-9"><?php echo $tipo; ?></dd>
								
								<dt class="col-sm-3">Histórico de uso</dt>
								<dd class="col-sm-9"><?php echo $historicoUso; ?></dd>
								
								<dt class="col-sm-3">Possíveis usos da peça</dt>
								<dd class="col-sm-9"><?php echo $possiveisUsos; ?></dd>
								
								<dt class="col-sm-3">Data de aquisição</dt>
								<dd class="col-sm-9"><?php echo $dataAquisicao; ?></dd>
								
								<dt class="col-sm-3">Técnica / Material</dt>
								<dd class="col-sm-9"><?php echo $tecnicaMaterial; ?></dd>
								
								<dt class="col-sm-3">Forma</dt>
								<dd class="col-sm-9"><?php echo $forma; ?></dd>
								
								<dt class="col-sm-3">Descrição da peça</dt>
								<dd class="col-sm-9"><?php echo $descricaoPeca; ?></dd>
								
								<dt class="col-sm-3">Dimensões</dt>
								<dd class="col-sm-9"><?php echo $dimensoes; ?></dd>
								
								<dt class="col-sm-3">Descrição de peças complementares</dt>
								<dd class="col-sm-9"><?php echo $descricaoPecasComplementares; ?></dd>
								
								<dt class="col-sm-3">Descrição dos detalhes</dt>
								<dd class="col-sm-9"><?php echo $descricaoDetalhes; ?></dd>
								
								<dt class="col-sm-3">Observações</dt>
								<dd class="col-sm-9"><?php echo $observacoes; ?></dd>
							</dl>
							<?php
						}
					}
					
					//Buscar na tabela Ficha de Conservação
					$sql3 = 'SELECT * FROM ficha_conservacao WHERE idPeca = :idPeca';
					$stmt3 = $conn->prepare($sql3);
					$stmt3->bindValue(':idPeca', $idPeca);
					$stmt3->execute();
					$count3 = $stmt3->rowCount();

					?>
					<p class="h4">4. Ficha de conservação</p>
					<?php
					
					if($count3 > 0){
						
						$result3 = $stmt3->fetchAll();
						
						foreach($result3 as $row3){
							
							$numeroRegistro           = $row3['numeroRegistro'];
							$titulo                   = $row3['titulo'];
							$classe                   = $row3['classe'];
							$denominacao              = $row3['denominacao'];
							$estadoGeralConservacao   = $row3['estadoGeralConservacao'];
							$dadosVerificados         = $row3['dadosVerificados'];
							$procedimentosHigiene     = $row3['procedimentosHigiene'];
							$reparosRealizados        = $row3['reparosRealizados'];
							$acondicionamento         = $row3['acondicionamento'];
							$restauracaoConservacao   = $row3['restauracaoConservacao'];
							$procedimentosConservacao = $row3['procedimentosConservacao'];
							$observacoes              = $row3['observacoes'];
							$dataPeca                 = $row3['dataPeca'];
							$responsavelPreenchimento = $row3['responsavelPreenchimento'];
							
							?>
							<dl class="row">
								<dt class="col-sm-3">Número de registro</dt>
								<dd class="col-sm-9"><?php echo $numeroRegistro; ?></dd>
								
								<dt class="col-sm-3">Título</dt>
								<dd class="col-sm-9"><?php echo $titulo; ?></dd>
								
								<dt class="col-sm-3">Classe</dt>
								<dd class="col-sm-9"><?php echo $classe; ?></dd>
								
								<dt class="col-sm-3">Denominação</dt>
								<dd class="col-sm-9"><?php echo $denominacao; ?></dd>
								
								<dt class="col-sm-3">Estado geral de conservação</dt>
								<dd class="col-sm-9"><?php echo $estadoGeralConservacao; ?></dd>
								
								<dt class="col-sm-3">Danos verificados</dt>
								<dd class="col-sm-9"><?php echo $dadosVerificados; ?></dd>
								
								<dt class="col-sm-3">Procedimentos de higienização</dt>
								<dd class="col-sm-9"><?php echo $procedimentosHigiene; ?></dd>
								
								<dt class="col-sm-3">Reparos realizados</dt>
								<dd class="col-sm-9"><?php echo $reparosRealizados; ?></dd>
								
								<dt class="col-sm-3">Acondicionamento</dt>
								<dd class="col-sm-9"><?php echo $acondicionamento; ?></dd>
								
								<dt class="col-sm-3">Restauração ou conservação preventiva</dt>
								<dd class="col-sm-9"><?php echo $restauracaoConservacao; ?></dd>
								
								<dt class="col-sm-3">Procedimentos de conservação preventiva</dt>
								<dd class="col-sm-9"><?php echo $procedimentosConservacao; ?></dd>
								
								<dt class="col-sm-3">Observações</dt>
								<dd class="col-sm-9"><?php echo $observacoes; ?></dd>
								
								<dt class="col-sm-3">Data</dt>
								<dd class="col-sm-9"><?php echo $dataPeca; ?></dd>
								
								<dt class="col-sm-3">Responsável pelo preenchimento</dt>
								<dd class="col-sm-9"><?php echo $responsavelPreenchimento; ?></dd>
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
					<p class="h4">5. Ficha de visualização</p>
					<?php
					
					if($count4 > 0){
						
						$result4 = $stmt4->fetchAll();
						
						foreach($result4 as $row4){ 
						
							$tipoAcervo                = $row4['tipoAcervo'];
							$numeroRegistro            = $row4['numeroRegistro'];
							$numeroRegistrosAntigos    = $row4['numeroRegistrosAntigos'];
							$sala                      = $row4['sala'];
							$estante                   = $row4['estante'];
							$prateleira                = $row4['prateleira'];
							$embalagem                 = $row4['embalagem'];
							$classe                    = $row4['classe'];
							$denominacao               = $row4['denominacao'];
							$tipo                      = $row4['tipo'];
							$titulo                    = $row4['titulo'];
							$autoria                   = $row4['autoria'];
							$colecao                   = $row4['colecao'];
							$tipoDataProducao          = $row4['tipoDataProducao'];
							$dataProducao              = $row4['dataProducao'];
							$localProducao             = $row4['localProducao'];
							$historicoPeca             = $row4['historicoPeca'];
							$eventosAssociados         = $row4['eventosAssociados'];
							$largura                   = $row4['largura'];
							$altura                    = $row4['altura'];
							$profundidade              = $row4['profundidade'];
							$circunferencia            = $row4['circunferencia'];
							$tecnica                   = $row4['tecnica'];
							$material                  = $row4['material'];
							$etiquetaComposicao        = $row4['etiquetaComposicao'];
							$descricaoConteudo         = $row4['descricaoConteudo'];
							$pecasComplementares       = $row4['pecasComplementares'];
							$descricaoPecasComp        = $row4['descricaoPecasComp'];
							$pecasRelacionadas         = $row4['pecasRelacionadas'];
							$descritores               = $row4['descritores'];
							$descritoresGeograficos    = $row4['descritoresGeograficos'];
							$documentosRelacionados    = $row4['documentosRelacionados'];
							$notasObservacoes          = $row4['notasObservacoes'];
							$valorPeca                 = $row4['valorPeca'];
							$seguradora                = $row4['seguradora'];
							$valorSeguro               = $row4['valorSeguro'];
							$formasIncorporacao        = $row4['formasIncorporacao'];
							$tipoDataIncorporacao      = $row4['tipoDataIncorporacao'];
							$frequencias               = $row4['frequencias'];
							$procedencias              = $row4['procedencias'];
							$usoAcessoPecaFisica       = $row4['usoAcessoPecaFisica'];
							$usoAcessoRepresentante    = $row4['usoAcessoRepresentante'];
							$historicoCirculacao       = $row4['historicoCirculacao'];
							$direitos                  = $row4['direitos'];
							$catalogador               = $row4['catalogador'];
							$dataInicialCatalogacao    = $row4['dataInicialCatalogacao'];
							$dataFinalCatalogacao      = $row4['dataFinalCatalogacao'];
							$fontesPesquisaReferencias = $row4['fontesPesquisaReferencias'];
							$linkVisao                 = $row4['linkVisao'];
							$metaKeywords              = $row4['metaKeywords'];
							$metaDescription           = $row4['metaDescription'];
							$metaTitle                 = $row4['metaTitle'];
							
							?>
							<dl class="row">
								<dt class="col-sm-3">Tipo de acervo</dt>
								<dd class="col-sm-9"><?php echo $tipoAcervo; ?></dd>
								
								<dt class="col-sm-3">Número de registro</dt>
								<dd class="col-sm-9"><?php echo $numeroRegistro; ?></dd>
								
								<dt class="col-sm-3">Números de registro antigos</dt>
								<dd class="col-sm-9"><?php echo $numeroRegistrosAntigos; ?></dd>
								
								<dt class="col-sm-3">Sala</dt>
								<dd class="col-sm-9"><?php echo $sala; ?></dd>
								
								<dt class="col-sm-3">Estante</dt>
								<dd class="col-sm-9"><?php echo $estante; ?></dd>
								
								<dt class="col-sm-3">Prateleira</dt>
								<dd class="col-sm-9"><?php echo $prateleira; ?></dd>
								
								<dt class="col-sm-3">Embalagem</dt>
								<dd class="col-sm-9"><?php echo $embalagem; ?></dd>
								
								<dt class="col-sm-3">Classe</dt>
								<dd class="col-sm-9"><?php echo $classe; ?></dd>
								
								<dt class="col-sm-3">Denominação</dt>
								<dd class="col-sm-9"><?php echo $denominacao; ?></dd>
								
								<dt class="col-sm-3">Tipo</dt>
								<dd class="col-sm-9"><?php echo $tipo; ?></dd>
								
								<dt class="col-sm-3">Título</dt>
								<dd class="col-sm-9"><?php echo $titulo; ?></dd>
								
								<dt class="col-sm-3">Autoria</dt>
								<dd class="col-sm-9"><?php echo $autoria; ?></dd>
								
								<dt class="col-sm-3">Coleção</dt>
								<dd class="col-sm-9"><?php echo $colecao; ?></dd>
								
								<dt class="col-sm-3">Tipo de data de produção</dt>
								<dd class="col-sm-9"><?php echo $tipoDataProducao; ?></dd>
								
								<dt class="col-sm-3">Data de produção</dt>
								<dd class="col-sm-9"><?php echo $dataProducao; ?></dd>
								
								<dt class="col-sm-3">Local de produção</dt>
								<dd class="col-sm-9"><?php echo $localProducao; ?></dd>
								
								<dt class="col-sm-3">Histórico da peça</dt>
								<dd class="col-sm-9"><?php echo $historicoPeca; ?></dd>
								
								<dt class="col-sm-3">Eventos associados</dt>
								<dd class="col-sm-9"><?php echo $eventosAssociados; ?></dd>
								
								<dt class="col-sm-3">Largura</dt>
								<dd class="col-sm-9"><?php echo $largura; ?></dd>
								
								<dt class="col-sm-3">Altura</dt>
								<dd class="col-sm-9"><?php echo $altura; ?></dd>
								
								<dt class="col-sm-3">Profundidade</dt>
								<dd class="col-sm-9"><?php echo $profundidade; ?></dd>
								
								<dt class="col-sm-3">Circunferência</dt>
								<dd class="col-sm-9"><?php echo $circunferencia; ?></dd>
								
								<dt class="col-sm-3">Técnica</dt>
								<dd class="col-sm-9"><?php echo $tecnica; ?></dd>
								
								<dt class="col-sm-3">Material</dt>
								<dd class="col-sm-9"><?php echo $material; ?></dd>
								
								<dt class="col-sm-3">Etiqueta de composição</dt>
								<dd class="col-sm-9"><?php echo $etiquetaComposicao; ?></dd>
								
								<dt class="col-sm-3">Descrição / Conteúdo</dt>
								<dd class="col-sm-9"><?php echo $descricaoConteudo; ?></dd>
								
								<dt class="col-sm-3">Peças complementares</dt>
								<dd class="col-sm-9"><?php echo $pecasComplementares; ?></dd>
								
								<dt class="col-sm-3">Descrição das peças complementares</dt>
								<dd class="col-sm-9"><?php echo $descricaoPecasComp; ?></dd>
								
								<dt class="col-sm-3">Peças relacionadas</dt>
								<dd class="col-sm-9"><?php echo $pecasRelacionadas; ?></dd>
								
								<dt class="col-sm-3">Descritores</dt>
								<dd class="col-sm-9"><?php echo $descritores; ?></dd>
								
								<dt class="col-sm-3">Descritores geográficos</dt>
								<dd class="col-sm-9"><?php echo $descritoresGeograficos; ?></dd>
								
								<dt class="col-sm-3">Documentos relacionados</dt>
								<dd class="col-sm-9"><?php echo $documentosRelacionados; ?></dd>
								
								<dt class="col-sm-3">Notas e observações</dt>
								<dd class="col-sm-9"><?php echo $notasObservacoes; ?></dd>
								
								<dt class="col-sm-3">Valor da peça</dt>
								<dd class="col-sm-9"><?php echo $valorPeca; ?></dd>
								
								<dt class="col-sm-3">Seguradora</dt>
								<dd class="col-sm-9"><?php echo $seguradora; ?></dd>
								
								<dt class="col-sm-3">Valor do seguro</dt>
								<dd class="col-sm-9"><?php echo $valorSeguro; ?></dd>
								
								<dt class="col-sm-3">Formas de incorporação</dt>
								<dd class="col-sm-9"><?php echo $formasIncorporacao; ?></dd>
								
								<dt class="col-sm-3">Tipo de data de incorporação</dt>
								<dd class="col-sm-9"><?php echo $tipoDataIncorporacao; ?></dd>
								
								<dt class="col-sm-3">Frequências</dt>
								<dd class="col-sm-9"><?php echo $frequencias; ?></dd>
								
								<dt class="col-sm-3">Procedências</dt>
								<dd class="col-sm-9"><?php echo $procedencias; ?></dd>
								
								<dt class="col-sm-3">Uso e acesso peça física</dt>
								<dd class="col-sm-9"><?php echo $usoAcessoPecaFisica; ?></dd>
								
								<dt class="col-sm-3">Uso e acesso representante digital</dt>
								<dd class="col-sm-9"><?php echo $usoAcessoRepresentante; ?></dd>
								
								<dt class="col-sm-3">Histórico de circulação</dt>
								<dd class="col-sm-9"><?php echo $historicoCirculacao; ?></dd>
								
								<dt class="col-sm-3">Direitos</dt>
								<dd class="col-sm-9"><?php echo $direitos; ?></dd>
								
								<dt class="col-sm-3">Catalogador</dt>
								<dd class="col-sm-9"><?php echo $catalogador; ?></dd>
								
								<dt class="col-sm-3">Data inicial de catalogação</dt>
								<dd class="col-sm-9"><?php echo $dataInicialCatalogacao; ?></dd>
								
								<dt class="col-sm-3">Data final de catalogação</dt>
								<dd class="col-sm-9"><?php echo $dataFinalCatalogacao; ?></dd>
								
								<dt class="col-sm-3">Fontes de pesquisa e referências</dt>
								<dd class="col-sm-9"><?php echo $fontesPesquisaReferencias; ?></dd>
								
								<dt class="col-sm-3">Link visão 360°</dt>
								<dd class="col-sm-9"><?php echo $linkVisao; ?></dd>
								
								<dt class="col-sm-3">Meta keywords</dt>
								<dd class="col-sm-9"><?php echo $metaKeywords; ?></dd>
								
								<dt class="col-sm-3">Meta description</dt>
								<dd class="col-sm-9"><?php echo $metaDescription; ?></dd>
								
								<dt class="col-sm-3">Meta title</dt>
								<dd class="col-sm-9"><?php echo $metaTitle; ?></dd>
								
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
					<p class="h4">6. English fields</p>
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
								<dt class="col-sm-3">Título em inglês</dt>
								<dd class="col-sm-9"><?php echo $tituloIngles; ?></dd>
								
								<dt class="col-sm-3">Autoria em inglês</dt>
								<dd class="col-sm-9"><?php echo $autoriaIngles; ?></dd>
								
								<dt class="col-sm-3">Coleção em inglês</dt>
								<dd class="col-sm-9"><?php echo $colecaoIngles; ?></dd>
								
								<dt class="col-sm-3">História em inglês</dt>
								<dd class="col-sm-9"><?php echo $historiaIngles; ?></dd>
								
								<dt class="col-sm-3">Eventos associados em inglês</dt>
								<dd class="col-sm-9"><?php echo $eventosIngles; ?></dd>
								
								<dt class="col-sm-3">Conteúdos em inglês</dt>
								<dd class="col-sm-9"><?php echo $conteudoIngles; ?></dd>
								
								<dt class="col-sm-3">Peças complementares em inglês</dt>
								<dd class="col-sm-9"><?php echo $pecasCompIngles; ?></dd>
								
								<dt class="col-sm-3">Descrição das peças complementares em inglês</dt>
								<dd class="col-sm-9"><?php echo $descricaoPecasIngles; ?></dd>
								
								<dt class="col-sm-3">Meta keywords em inglês</dt>
								<dd class="col-sm-9"><?php echo $metaKeywordsIngles; ?></dd>
								
								<dt class="col-sm-3">Meta description em inglês</dt>
								<dd class="col-sm-9"><?php echo $metaDescriptionIngles; ?></dd>
								
								<dt class="col-sm-3">Meta title em inglês</dt>
								<dd class="col-sm-9"><?php echo $metaTitleIngles; ?></dd>
								
								<dt class="col-sm-3">Disponibilidade da peça</dt>
								<dd class="col-sm-9"><?php echo $disponibilidadePeca; ?></dd>
								
								<dt class="col-sm-3">Ficha de conservação</dt>
								<dd class="col-sm-9"><?php echo $fichaConservacao; ?></dd>
								
								<dt class="col-sm-3">Destacado</dt>
								<dd class="col-sm-9"><?php echo $destacado; ?></dd>
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
		
			<div class="btn-group btn-group-vertical btn-block" role="group">
				 
				<button class="btn btn-primary mb-1" type="button">
					Cadastrar Nova Peça
				</button> 
				<button class="btn btn-primary mb-1" type="button">
					Configurações de Conta
				</button> 
				<button class="btn btn-primary" type="button">
					Sair
				</button>
				<button class="btn btn-primary" type="button">
					Gerar PDF
				</button> 
				
			</div>
			
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