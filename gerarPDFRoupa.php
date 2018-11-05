<?php

	include './cnx_museu.php';
	
	require_once 'mpdf-6.0.0/mpdf.php';

    if(!empty($_POST)){

        $idPeca = $_POST['idPeca'];
        $conn   = getConnection();
		
		$html = '<html>
					<head>
						<link href="css/style1.css" rel="stylesheet">
					</head>
					<body>';
						
		$html = $html.'<div>';
		$html = $html.'<p>1. Peça</p>';
		$html = $html.'</div>';
		
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
				
				
				$html = $html.'<table>';
				$html = $html.'<tr><th>Nome da peça</th><td>'.$nomePeca.'</td></tr>';
							
				$html = $html.'<tr><th>Número de inventário(museu)</th><td>'.$numeroInventarioMuseu.'</td></tr>';
							
				$html = $html.'<tr><th>Número de inventário(projeto)</th><td>'.$numeroInventarioProjeto.'</td></tr>';
							
				$html = $html.'</table>';
			}
		}
		
		$html = $html.'<div>';
		$html = $html.'<p>2. Ficha técnica</p>';
		$html = $html.'</div>';
		
		//Busca na tabela Ficha Técnica (Buscar as imagens também)
		$sql1 = 'SELECT * FROM ficha_tecnica WHERE idPeca = :idPeca';
		$stmt1 = $conn->prepare($sql1);
		$stmt1->bindValue(':idPeca', $idPeca);
		$stmt1->execute();
		$count1 = $stmt1->rowCount();
					
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
				
				$html = $html.'<table>';
				$html = $html.'<tr><th>Localização</th><td>'.$localizacao.'</td></tr>';
							   
				$html = $html.'<tr><th>Termo de doação</th><td>'.$termoDoacao.'</td></tr>';
							   
				$html = $html.'<tr><th>Fabricante/Autor</th><td>'.$fabricanteAutor.'</td></tr>';
							   
				$html = $html.'<tr><th>Data da peça</th><td>'.$dataPeca.'</td></tr>';
							   
				$html = $html.'<tr><th>Local de aquisição</th><td>'.$localAquisicao.'</td></tr>';
							   
				$html = $html.'<tr><th>Tecido</th><td>'.$tecido.'</td></tr>';
							   
				$html = $html.'<tr><th>Composição</th><td>'.$composicao.'</td></tr>';
						
				$html = $html.'<tr><th>Bordado</th><td>'.$bordado.'</td></tr>';
							   
				$html = $html.'<tr><th>Tipologia</th><td>'.$tipologia.'</td></tr>';
							   
				$html = $html.'<tr><th>Pintura</th><td>'.$pintura.'</td></tr>';
							   
				$html = $html.'<tr><th>Técnica</th><td>'.$tecnica.'</td></tr>';
							   
				$html = $html.'<tr><th>Dimensões</th><td>'.$dimensoes.'</td></tr>';
							   
				$html = $html.'<tr><th>Método de produção</th><td>'.$metodoProducao.'</td></tr>';
							
				$html = $html.'</table>';
							
			}
		}
		
		$html = $html.'<h2 style="border-bottom: 1px solid black;">Desenhos técnicos</h2>';
		
		$sqlA = 'SELECT * FROM desenhos_tecnicos WHERE idPeca = :idPeca';
		$stmtA = $conn->prepare($sqlA);
		$stmtA->bindValue(':idPeca', $idPeca);
		$stmtA->execute();
		$countA = $stmtA->rowCount();
					
		if($countA > 0){
			
			$html = $html.'<div>';
						
			$resultA = $stmtA->fetchAll();
						
			foreach($resultA as $rowA){
				$nomeImagem = $rowA['nomeImagem'];
				
				$html = $html.'<img class="div30" src='.$nomeImagem.'>';
			}
			
			$html = $html.'</div>';
		}
		else{
			$html = $html.'<h4 class="bg-warning text-align-center">Sem desenhos técnicos cadastrados</h4>';
		}
		
		$html = $html.'<h2 style="border-bottom: 1px solid black;">Fotografias</h2>';
		
		$sqlB = 'SELECT * FROM fotografia WHERE idPeca = :idPeca';
		$stmtB = $conn->prepare($sqlB);
		$stmtB->bindValue(':idPeca', $idPeca);
		$stmtB->execute();
		$countB = $stmtB->rowCount();
					
		if($countB > 0){
			
			$html = $html.'<div>';
						
			$resultB = $stmtB->fetchAll();
						
			foreach($resultB as $rowB){
				$nomeImagem = $rowB['nomeImagem'];
				
				$html = $html.'<img class="div30" src='.$nomeImagem.'>';
			}
			
			$html = $html.'</div>';
		}
		else{
			$html = $html.'<h4 class="bg-warning text-align-center">Sem fotografias cadastradas</h4>';
		}
		
		$html = $html.'<div>';
		$html = $html.'<p>3. Ficha catalográfica</p>';
		$html = $html.'</div>';
		
		
		//Buscar na tabela Ficha Catalográfica (Buscar as imagens também)
		$sql2 = 'SELECT * FROM ficha_catalografica WHERE idPeca = :idPeca';
		$stmt2 = $conn->prepare($sql2);
		$stmt2->bindValue(':idPeca', $idPeca);
		$stmt2->execute();
		$count2 = $stmt2->rowCount();

					
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
				
				$html = $html.'<table>';
				
				$html = $html.'<tr><th>Classe</th><td>'.$classe.'</td></tr>';
				
				$html = $html.'<tr><th>Subclasse</th><td>'.$subClasse.'</td></tr>';
				
				$html = $html.'<tr><th>Tipo</th><td>'.$tipo.'</td></tr>';
				
				$html = $html.'<tr><th>Histórico de uso</th><td>'.$historicoUso.'</td></tr>';
				
				$html = $html.'<tr><th>Possíveis usos</th><td>'.$possiveisUsos.'</td></tr>';
				
				$html = $html.'<tr><th>Data de aquisição</th><td>'.$dataAquisicao.'</td></tr>';
				
				$html = $html.'<tr><th>Técnica/Material</th><td>'.$tecnicaMaterial.'</td></tr>';
				
				$html = $html.'<tr><th>Forma</th><td>'.$forma.'</td></tr>';
				
				$html = $html.'<tr><th>Descrição da peça</th><td>'.$descricaoPeca.'</td></tr>';
				
				$html = $html.'<tr><th>Dimensões</th><td>'.$dimensoes.'</td></tr>';
				
				$html = $html.'<tr><th>Descrição das peças complementares</th><td>'.$descricaoPecasComplementares.'</td></tr>';
				
				$html = $html.'<tr><th>Observações</th><td>'.$observacoes.'</td></tr>';
				
				$html = $html.'<tr><th>Descrição dos detalhes</th><td>'.$descricaoDetalhes.'</td></tr>';
				
				$html = $html.'</table>';
							
			}
		}
		
		$html = $html.'<h2 style="border-bottom: 1px solid black;">Fotos dos detalhes</h2>';
		
		$sqlC = 'SELECT * FROM fotos_detalhes WHERE idPeca = :idPeca';
		$stmtC = $conn->prepare($sqlC);
		$stmtC->bindValue(':idPeca', $idPeca);
		$stmtC->execute();
		$countC = $stmtC->rowCount();
					
		if($countC > 0){
			
			$html = $html.'<div>';
						
			$resultC = $stmtC->fetchAll();
						
			foreach($resultC as $rowC){
				$nomeImagem = $rowC['nomeImagem'];
				
				$html = $html.'<img class="div30" src='.$nomeImagem.'>';
			}
			
			$html = $html.'</div>';
		}
		else{
			$html = $html.'<h4 class="bg-warning text-align-center">Sem fotos de detalhes cadastradas</h4>';
		}
		
		$html = $html.'<div>';
		$html = $html.'<p>4. Ficha de conservação</p>';
		$html = $html.'</div>';
		
		//Buscar na tabela Ficha de Conservação
		$sql3 = 'SELECT * FROM ficha_conservacao WHERE idPeca = :idPeca';
		$stmt3 = $conn->prepare($sql3);
		$stmt3->bindValue(':idPeca', $idPeca);
		$stmt3->execute();
		$count3 = $stmt3->rowCount();
					
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
				
				$html = $html.'<table>';
				
				$html = $html.'<tr><th>Número de registro</th><td>'.$numeroRegistro.'</td></tr>';
				
				$html = $html.'<tr><th>Título</th><td>'.$titulo.'</td></tr>';
				
				$html = $html.'<tr><th>Classe</th><td>'.$classe.'</td></tr>';
				
				$html = $html.'<tr><th>Denominação</th><td>'.$denominacao.'</td></tr>';
				
				$html = $html.'<tr><th>Estado geral de conservação</th><td>'.$estadoGeralConservacao.'</td></tr>';
				
				$html = $html.'<tr><th>Dados verificados</th><td>'.$dadosVerificados.'</td></tr>';
				
				$html = $html.'<tr><th>Procedimentos de higiene</th><td>'.$procedimentosHigiene.'</td></tr>';
				
				$html = $html.'<tr><th>Reparos realizados</th><td>'.$reparosRealizados.'</td></tr>';
				
				$html = $html.'<tr><th>Acondicionamento</th><td>'.$acondicionamento.'</td></tr>';
				
				$html = $html.'<tr><th>Restauração e conservação</th><td>'.$restauracaoConservacao.'</td></tr>';
				
				$html = $html.'<tr><th>Procedimentos de conservação</th><td>'.$procedimentosConservacao.'</td></tr>';
				
				$html = $html.'<tr><th>Observações</th><td>'.$observacoes.'</td></tr>';
				
				$html = $html.'<tr><th>Data da peça</th><td>'.$dataPeca.'</td></tr>';
				
				$html = $html.'<tr><th>Responsável pelo preenchimento </th><td>'.$responsavelPreenchimento.'</td></tr>';
				
				$html = $html.'</table>';
							
			}
		}
		
		$html = $html.'<div>';
		$html = $html.'<p>5. Ficha de visualização</p>';
		$html = $html.'</div>';
		
		//Buscar na tabela Ficha de Visualização
		$sql4 = 'SELECT * FROM visualizacao WHERE idPeca = :idPeca';
		$stmt4 = $conn->prepare($sql4);
		$stmt4->bindValue(':idPeca', $idPeca);
		$stmt4->execute();
		$count4 = $stmt4->rowCount();
					
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
				
				$html = $html.'<table>';
				
				$html = $html.'<tr><th>Tipo de acervo</th><td>'.$tipoAcervo.'</td></tr>';
				
				$html = $html.'<tr><th>Número de registro</th><td>'.$numeroRegistro.'</td></tr>';
				
				$html = $html.'<tr><th>Números de registro antigos</th><td>'.$numeroRegistrosAntigos.'</td></tr>';
				
				$html = $html.'<tr><th>Sala</th><td>'.$sala.'</td></tr>';
				
				$html = $html.'<tr><th>Estante</th><td>'.$estante.'</td></tr>';
				
				$html = $html.'<tr><th>Prateleira</th><td>'.$prateleira.'</td></tr>';
				
				$html = $html.'<tr><th>Embalagem</th><td>'.$embalagem.'</td></tr>';
				
				$html = $html.'<tr><th>Classe</th><td>'.$classe.'</td></tr>';
				
				$html = $html.'<tr><th>Denominação</th><td>'.$denominacao.'</td></tr>';
				
				$html = $html.'<tr><th>Tipo</th><td>'.$tipo.'</td></tr>';
				
				$html = $html.'<tr><th>Título</th><td>'.$titulo.'</td></tr>';
				
				$html = $html.'<tr><th>Autoria</th><td>'.$autoria.'</td></tr>';
				
				$html = $html.'<tr><th>Coleção</th><td>'.$colecao.'</td></tr>';
				
				$html = $html.'<tr><th>Tipo de data de produção</th><td>'.$tipoDataProducao.'</td></tr>';
				
				$html = $html.'<tr><th>Data de produção</th><td>'.$dataProducao.'</td></tr>';
				
				$html = $html.'<tr><th>Local de produção</th><td>'.$localProducao.'</td></tr>';
				
				$html = $html.'<tr><th>Histórico da peça</th><td>'.$historicoPeca.'</td></tr>';
				
				$html = $html.'<tr><th>Eventos associados</th><td>'.$eventosAssociados.'</td></tr>';
				
				$html = $html.'<tr><th>Largura</th><td>'.$largura.'</td></tr>';
				
				$html = $html.'<tr><th>Altura</th><td>'.$altura.'</td></tr>';
				
				$html = $html.'<tr><th>Profundidade</th><td>'.$profundidade.'</td></tr>';
				
				$html = $html.'<tr><th>Número de registro</th><td>'.$circunferencia.'</td></tr>';
				
				$html = $html.'<tr><th>Técnica</th><td>'.$tecnica.'</td></tr>';
				
				$html = $html.'<tr><th>Material</th><td>'.$material.'</td></tr>';
				
				$html = $html.'<tr><th>Etiqueta de composição</th><td>'.$etiquetaComposicao.'</td></tr>';
				
				$html = $html.'<tr><th>Descrição / Conteúdo</th><td>'.$descricaoConteudo.'</td></tr>';
				
				$html = $html.'<tr><th>Peças complementares</th><td>'.$pecasComplementares.'</td></tr>';
				
				$html = $html.'<tr><th>Descrição das peças complementares</th><td>'.$descricaoPecasComp.'</td></tr>';
				
				$html = $html.'<tr><th>Peças relacionadas</th><td>'.$pecasRelacionadas.'</td></tr>';
				
				$html = $html.'<tr><th>Descritores</th><td>'.$descritores.'</td></tr>';
				
				$html = $html.'<tr><th>Descritores geográficos</th><td>'.$descritoresGeograficos.'</td></tr>';
				
				$html = $html.'<tr><th>Documentos relacionados</th><td>'.$documentosRelacionados.'</td></tr>';
				
				$html = $html.'<tr><th>Notas e observações</th><td>'.$notasObservacoes.'</td></tr>';
				
				$html = $html.'<tr><th>Valor da peça</th><td>'.$valorPeca.'</td></tr>';
				
				$html = $html.'<tr><th>Seguradora</th><td>'.$seguradora.'</td></tr>';
				
				$html = $html.'<tr><th>Valor do seguro</th><td>'.$valorSeguro.'</td></tr>';
				
				$html = $html.'<tr><th>Formas de incorporação</th><td>'.$formasIncorporacao.'</td></tr>';
				
				$html = $html.'<tr><th>Tipo de data de incorporação</th><td>'.$tipoDataIncorporacao.'</td></tr>';
				
				$html = $html.'<tr><th>Frequências</th><td>'.$frequencias.'</td></tr>';
				
				$html = $html.'<tr><th>Procedências</th><td>'.$procedencias.'</td></tr>';
				
				$html = $html.'<tr><th>Uso e acesso peça física</th><td>'.$usoAcessoPecaFisica.'</td></tr>';
				
				$html = $html.'<tr><th>Uso e acesso representante digital</th><td>'.$usoAcessoRepresentante.'</td></tr>';
				
				$html = $html.'<tr><th>Histórico de circulação</th><td>'.$historicoCirculacao.'</td></tr>';
				
				$html = $html.'<tr><th>Direitos</th><td>'.$direitos.'</td></tr>';
				
				$html = $html.'<tr><th>Catalogador</th><td>'.$catalogador.'</td></tr>';
				
				$html = $html.'<tr><th>Data inicial de catalogação</th><td>'.$dataInicialCatalogacao.'</td></tr>';
				
				$html = $html.'<tr><th>Data final de catalogação</th><td>'.$dataFinalCatalogacao.'</td></tr>';
				
				$html = $html.'<tr><th>Fontes de pesquisa e referências</th><td>'.$fontesPesquisaReferencias.'</td></tr>';
				
				$html = $html.'<tr><th>Link visão 360°</th><td>'.$linkVisao.'</td></tr>';
				
				$html = $html.'<tr><th>Meta keywords</th><td>'.$metaKeywords.'</td></tr>';
				
				$html = $html.'<tr><th>Meta description</th><td>'.$metaDescription.'</td></tr>';
				
				$html = $html.'<tr><th>Meta title</th><td>'.$metaTitle.'</td></tr>';
				
				$html = $html.'</table>';
					
			}
		}
		
		$html = $html.'<div>';
		$html = $html.'<p>6. English fields</p>';
		$html = $html.'</div>';
		
		
		//Buscar na tabela Ficha de English Fields
		$sql5 = 'SELECT * FROM english_fields WHERE idPeca = :idPeca';
		$stmt5 = $conn->prepare($sql5);
		$stmt5->bindValue(':idPeca', $idPeca);
		$stmt5->execute();
		$count5 = $stmt5->rowCount();
					
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
				
				$html = $html.'<table>';
				
				$html = $html.'<tr><th>Título em inglês</th><td>'.$tituloIngles.'</td></tr>';
				
				$html = $html.'<tr><th>Autoria em inglês</th><td>'.$autoriaIngles.'</td></tr>';
				
				$html = $html.'<tr><th>Coleção em inglês</th><td>'.$colecaoIngles.'</td></tr>';
				
				$html = $html.'<tr><th>História em inglês</th><td>'.$historiaIngles.'</td></tr>';
				
				$html = $html.'<tr><th>Eventos associados em inglês</th><td>'.$eventosIngles.'</td></tr>';
				
				$html = $html.'<tr><th>Conteúdos em inglês</th><td>'.$conteudoIngles.'</td></tr>';
				
				$html = $html.'<tr><th>Peças complementares em inglês</th><td>'.$pecasCompIngles.'</td></tr>';
				
				$html = $html.'<tr><th>Descrição das peças complementares em inglês</th><td>'.$descricaoPecasIngles.'</td></tr>';
				
				$html = $html.'<tr><th>Meta keywords em inglês</th><td>'.$metaKeywordsIngles.'</td></tr>';
				
				$html = $html.'<tr><th>Meta description em inglês</th><td>'.$metaDescriptionIngles.'</td></tr>';
				
				$html = $html.'<tr><th>Meta title em inglês</th><td>'.$metaTitleIngles.'</td></tr>';
				
				$html = $html.'<tr><th>Disponibilidade da peça</th><td>'.$disponibilidadePeca.'</td></tr>';
				
				$html = $html.'<tr><th>Destacado</th><td>'.$destacado.'</td></tr>';
				
				$html = $html.'<tr><th>Ficha de conservação</th><td>'.$fichaConservacao.'</td></tr>';
				
				$html = $html.'</table>';
							
			}
		}
	
		//Fecha o documento HTML
		$html = $html.'</body>';
		$html = $html.'</html>';
		
		//MPDF
		$mpdf = new mPDF('c', 'A4');
		//$css = file_get_contents('css/style1.css');
		//$mpdf->writeHTML($css, 1); 
		$mpdf->writeHTML($html, 0); 
		$mpdf->Output('pecaRoupa.pdf', 'I');
		
		echo "OK";
        
    }
?>