<?php
	include './cnx_museu.php';

    if(!empty($_POST)){

        $idPeca   = $_POST['idPeca'];
		$ficha    = $_POST['ficha'];
        $conn     = getConnection();
        
        switch($operacao){
            case 'fichaTecnica':
                inserirFichaTecnica($conn, $idPeca);
                break;
            case 'fichaCatalografica':
                inserirFichaCatalografica($conn, $idPeca);
                break;
            case 'fichaConservacao':
                inserirFichaConservacao($conn, $idPeca);
                break;
            case 'fichaVisualizacao':
                inserirVisualizacao($conn, $idPeca);
                break;
            case 'fichaEnglish':
                inserirEnglishFields($conn, $idPeca);
                break;
        }

        $conn = null;
    }
	
	function buscarFichaTecnica($conn, $idPeca){
		
		$sql = 'SELECT * FROM ficha_tecnica WHERE idPeca = :idPeca';
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':idPeca', $idPeca);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0){
						
			$result = $stmt->fetchAll();
						
			foreach($result as $row){
				
				//Cria o documento XML e seus respectivos elementos
				$xml = new DOMDocument('1.0');
				$nodoRaiz = $xml->createElement('dados');
				
				//Define o nodo raiz
				$xml->appendChild($nodoRaiz);
				
				//Define os filhos do nodo raiz
				$nodoRaiz->appendChild('status'         , "OK");
				$nodoRaiz->appendChild('idPeca'         , $row['idPeca']);
				$nodoRaiz->appendChild('localizacao'    , $row['localizacao']);
				$nodoRaiz->appendChild('termoDoacao'    , $row['termoDoacao']);
				$nodoRaiz->appendChild('fabricanteAutor', $row['fabricanteAutor']);
				$nodoRaiz->appendChild('dataPeca'       , $row['dataPeca']);
				$nodoRaiz->appendChild('localAquisicao' , $row['localAquisicao']);
				$nodoRaiz->appendChild('tecido'         , $row['tecido']);
				$nodoRaiz->appendChild('composicao'     , $row['composicao']);
				$nodoRaiz->appendChild('bordado'        , $row['bordado']);
				$nodoRaiz->appendChild('tipologia'      , $row['tipologia']);
				$nodoRaiz->appendChild('pintura'        , $row['pintura']);
				$nodoRaiz->appendChild('tecnica'        , $row['tecnica']);
				$nodoRaiz->appendChild('dimensoes'      , $row['dimensoes']);
				$nodoRaiz->appendChild('metodoProducao' , $row['metodoProducao']);
				$nodoRaiz->appendChild('desenhoTecnico' , $row['countImgsDesenhoTecnico']);
				$nodoRaiz->appendChild('fotografia'     , $row['countImgsFotografia']);
				
				//Retorna o resultado ao navegador
				header("Content-type: application/xml");
				echo $xml->saveXML();
				
			}
		}
		else{
			//Cria o documento XML e seus respectivos elementos
			$xml = new DOMDocument('1.0');
			$nodoRaiz = $xml->createElement('dados');
				
			//Define o nodo raiz
			$xml->appendChild($nodoRaiz);
				
			//Define os filhos do nodo raiz
			$nodoRaiz->appendChild('status', "EMPTY");
				
			//Retorna o resultado ao navegador
			header("Content-type: application/xml");
			echo $xml->saveXML();
		}
	}
	
	function buscarFichaCatalografica($conn, $idPeca){
		
		$sql = 'SELECT * FROM ficha_catalografica WHERE idPeca = :idPeca';
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':idPeca', $idPeca);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0){
						
			$result = $stmt->fetchAll();
						
			foreach($result as $row){
				
				//Cria o documento XML e seus respectivos elementos
				$xml = new DOMDocument('1.0');
				$nodoRaiz = $xml->createElement('dados');
				
				//Define o nodo raiz
				$xml->appendChild($nodoRaiz);
				
				//Define os filhos do nodo raiz
				$nodoRaiz->appendChild('status'                      , "OK");
				$nodoRaiz->appendChild('idPeca'                      , $row['idPeca']);
				$nodoRaiz->appendChild('classe'                      , $row['classe']);
				$nodoRaiz->appendChild('subClasse'                   , $row['subClasse']);
				$nodoRaiz->appendChild('tipo'                        , $row['tipo']);
				$nodoRaiz->appendChild('historicoUso'                , $row['historicoUso']);
				$nodoRaiz->appendChild('possiveisUsos'               , $row['possiveisUsos']);
				$nodoRaiz->appendChild('dataAquisicao'               , $row['dataAquisicao']);
				$nodoRaiz->appendChild('tecnicaMaterial'             , $row['tecnicaMaterial']);
				$nodoRaiz->appendChild('forma'                       , $row['forma']);
				$nodoRaiz->appendChild('descricaoPeca'               , $row['descricaoPeca']);
				$nodoRaiz->appendChild('dimensoes'                   , $row['dimensoes']);
				$nodoRaiz->appendChild('descricaoPecasComplementares', $row['descricaoPecasComplementares']);
				$nodoRaiz->appendChild('observacoes'                 , $row['observacoes']);
				$nodoRaiz->appendChild('descricaoDetalhes'           , $row['descricaoDetalhes']);
				$nodoRaiz->appendChild('countImgsDetalhes'           , $row['countImgsDetalhes']);
				
				//Retorna o resultado ao navegador
				header("Content-type: application/xml");
				echo $xml->saveXML();
			}
		}
		else{
			//Cria o documento XML e seus respectivos elementos
			$xml = new DOMDocument('1.0');
			$nodoRaiz = $xml->createElement('dados');
				
			//Define o nodo raiz
			$xml->appendChild($nodoRaiz);
				
			//Define os filhos do nodo raiz
			$nodoRaiz->appendChild('status', "EMPTY");
				
			//Retorna o resultado ao navegador
			header("Content-type: application/xml");
			echo $xml->saveXML();
		}
	}
	
	function buscarFichaConservacao($conn, $idPeca){
		
		$sql = 'SELECT * FROM ficha_conservacao WHERE idPeca = :idPeca';
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':idPeca', $idPeca);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0){
						
			$result = $stmt->fetchAll();
						
			foreach($result as $row){
				
				//Cria o documento XML e seus respectivos elementos
				$xml = new DOMDocument('1.0');
				$nodoRaiz = $xml->createElement('dados');
				
				//Define o nodo raiz
				$xml->appendChild($nodoRaiz);
				
				//Define os filhos do nodo raiz
				$nodoRaiz->appendChild('status'                  , "OK");
				$nodoRaiz->appendChild('idPeca'                  , $row['idPeca']);
				$nodoRaiz->appendChild('numeroRegistro'          , $row['numeroRegistro']);
				$nodoRaiz->appendChild('titulo'                  , $row['titulo']);
				$nodoRaiz->appendChild('classe'                  , $row['classe']);
				$nodoRaiz->appendChild('denominacao'             , $row['denominacao']);
				$nodoRaiz->appendChild('estadoGeralConservacao'  , $row['estadoGeralConservacao']);
				$nodoRaiz->appendChild('dadosVerificados'        , $row['dadosVerificados']);
				$nodoRaiz->appendChild('procedimentosHigiene'    , $row['procedimentosHigiene']);
				$nodoRaiz->appendChild('reparosRealizados'       , $row['reparosRealizados']);
				$nodoRaiz->appendChild('acondicionamento'        , $row['acondicionamento']);
				$nodoRaiz->appendChild('restauracaoConservacao'  , $row['restauracaoConservacao']);
				$nodoRaiz->appendChild('procedimentosConservacao', $row['procedimentosConservacao']);
				$nodoRaiz->appendChild('observacoes'             , $row['observacoes']);
				$nodoRaiz->appendChild('dataPeca'                , $row['dataPeca']);
				$nodoRaiz->appendChild('responsavelPreenchimento', $row['responsavelPreenchimento']);
				
				//Retorna o resultado ao navegador
				header("Content-type: application/xml");
				echo $xml->saveXML();
			}
		}
		else{
			//Cria o documento XML e seus respectivos elementos
			$xml = new DOMDocument('1.0');
			$nodoRaiz = $xml->createElement('dados');
				
			//Define o nodo raiz
			$xml->appendChild($nodoRaiz);
				
			//Define os filhos do nodo raiz
			$nodoRaiz->appendChild('status', "EMPTY");
				
			//Retorna o resultado ao navegador
			header("Content-type: application/xml");
			echo $xml->saveXML();
		}
	}
	
	function buscarFichaVisualizacao($conn, $idPeca){
		
		$sql = 'SELECT * FROM visualizacao WHERE idPeca = :idPeca';
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':idPeca', $idPeca);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0){
						
			$result = $stmt->fetchAll();
						
			foreach($result as $row){
				
				//Cria o documento XML e seus respectivos elementos
				$xml = new DOMDocument('1.0');
				$nodoRaiz = $xml->createElement('dados');
				
				//Define o nodo raiz
				$xml->appendChild($nodoRaiz);
				
				//Define os filhos do nodo raiz
				$nodoRaiz->appendChild('status'                     , "OK");
				$nodoRaiz->appendChild('idPeca'                 	, $row['idPeca']);
				$nodoRaiz->appendChild('tipoAcervo'          		, $row['tipoAcervo']);
				$nodoRaiz->appendChild('numeroRegistro'             , $row['numeroRegistro']);
				$nodoRaiz->appendChild('numeroRegistrosAntigos'     , $row['numeroRegistrosAntigos']);
				$nodoRaiz->appendChild('sala'             			, $row['sala']);
				$nodoRaiz->appendChild('estante'  					, $row['estante']);
				$nodoRaiz->appendChild('prateleira'        			, $row['prateleira']);
				$nodoRaiz->appendChild('embalagem'    				, $row['embalagem']);
				$nodoRaiz->appendChild('classe'       				, $row['classe']);
				$nodoRaiz->appendChild('denominacao'        		, $row['denominacao']);
				$nodoRaiz->appendChild('tipo'  						, $row['tipo']);
				$nodoRaiz->appendChild('titulo'						, $row['titulo']);
				$nodoRaiz->appendChild('autoria'             		, $row['autoria']);
				$nodoRaiz->appendChild('colecao'               		, $row['colecao']);
				$nodoRaiz->appendChild('tipoDataProducao'           , $row['tipoDataProducao']);
				$nodoRaiz->appendChild('dataProducao'               , $row['dataProducao']);
				$nodoRaiz->appendChild('localProducao'          	, $row['localProducao']);
				$nodoRaiz->appendChild('historicoPeca'              , $row['historicoPeca']);
				$nodoRaiz->appendChild('eventosAssociados'          , $row['eventosAssociados']);
				$nodoRaiz->appendChild('largura'             		, $row['largura']);
				$nodoRaiz->appendChild('altura'  					, $row['altura']);
				$nodoRaiz->appendChild('profundidade'        		, $row['profundidade']);
				$nodoRaiz->appendChild('circunferencia'    			, $row['circunferencia']);
				$nodoRaiz->appendChild('tecnica'       				, $row['tecnica']);
				$nodoRaiz->appendChild('material'        			, $row['material']);
				$nodoRaiz->appendChild('etiquetaComposicao'  		, $row['etiquetaComposicao']);
				$nodoRaiz->appendChild('descricaoConteudo'			, $row['descricaoConteudo']);
				$nodoRaiz->appendChild('pecasComplementares'   		, $row['pecasComplementares']);
				$nodoRaiz->appendChild('descricaoPecasComp'    		, $row['descricaoPecasComp']);
				$nodoRaiz->appendChild('pecasRelacionadas'     		, $row['pecasRelacionadas']);
				$nodoRaiz->appendChild('descritores'           		, $row['descritores']);
				$nodoRaiz->appendChild('descritoresGeograficos'		, $row['descritoresGeograficos']);
				$nodoRaiz->appendChild('documentosRelacionados'		, $row['documentosRelacionados']);
				$nodoRaiz->appendChild('notasObservacoes'      		, $row['notasObservacoes']);
				$nodoRaiz->appendChild('valorPeca'             		, $row['valorPeca']);
				$nodoRaiz->appendChild('seguradora'            		, $row['seguradora']);
				$nodoRaiz->appendChild('valorSeguro'           		, $row['valorSeguro']);
				$nodoRaiz->appendChild('formasIncorporacao'    		, $row['formasIncorporacao']);
				$nodoRaiz->appendChild('tipoDataIncorporacao'  		, $row['tipoDataIncorporacao']);
				$nodoRaiz->appendChild('frequencias'           		, $row['frequencias']);
				$nodoRaiz->appendChild('procedencias'          		, $row['procedencias']);
				$nodoRaiz->appendChild('usoAcessoPecaFisica'        , $row['usoAcessoPecaFisica']);
				$nodoRaiz->appendChild('usoAcessoRepresentante'     , $row['usoAcessoRepresentante']);
				$nodoRaiz->appendChild('historicoCirculacao'        , $row['historicoCirculacao']);
				$nodoRaiz->appendChild('direitos'                   , $row['direitos']);
				$nodoRaiz->appendChild('catalogador'                , $row['catalogador']);
				$nodoRaiz->appendChild('dataInicialCatalogacao'     , $row['dataInicialCatalogacao']);
				$nodoRaiz->appendChild('dataFinalCatalogacao'       , $row['dataFinalCatalogacao']);
				$nodoRaiz->appendChild('fontesPesquisaReferencias'  , $row['fontesPesquisaReferencias']);
				$nodoRaiz->appendChild('linkVisao'                  , $row['linkVisao']);
				$nodoRaiz->appendChild('metaKeywords'               , $row['metaKeywords']);
				$nodoRaiz->appendChild('metaDescription'            , $row['metaDescription']);
				$nodoRaiz->appendChild('metaTitle'                  , $row['metaTitle']);
				
				//Retorna o resultado ao navegador
				header("Content-type: application/xml");
				echo $xml->saveXML();
			}
		}
		else{
			//Cria o documento XML e seus respectivos elementos
			$xml = new DOMDocument('1.0');
			$nodoRaiz = $xml->createElement('dados');
				
			//Define o nodo raiz
			$xml->appendChild($nodoRaiz);
				
			//Define os filhos do nodo raiz
			$nodoRaiz->appendChild('status', "EMPTY");
				
			//Retorna o resultado ao navegador
			header("Content-type: application/xml");
			echo $xml->saveXML();
		}
	}
	
	function buscarFichaEnglish($conn, $idPeca){
		
		$sql = 'SELECT * FROM english_fields WHERE idPeca = :idPeca';
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':idPeca', $idPeca);
		$stmt->execute();
		$count = $stmt->rowCount();

		if($count > 0){
						
			$result = $stmt->fetchAll();
						
			foreach($result as $row){
				
				//Cria o documento XML e seus respectivos elementos
				$xml = new DOMDocument('1.0');
				$nodoRaiz = $xml->createElement('dados');
				
				//Define o nodo raiz
				$xml->appendChild($nodoRaiz);
				
				//Define os filhos do nodo raiz
				$nodoRaiz->appendChild('status'               , "OK");
				$nodoRaiz->appendChild('idPeca'               , $row['idPeca']);
				$nodoRaiz->appendChild('tituloIngles'         , $row['tituloIngles']);
				$nodoRaiz->appendChild('autoriaIngles'        , $row['autoriaIngles']);
				$nodoRaiz->appendChild('colecaoIngles'        , $row['colecaoIngles']);
				$nodoRaiz->appendChild('historiaIngles'       , $row['historiaIngles']);
				$nodoRaiz->appendChild('eventosIngles'        , $row['eventosIngles']);
				$nodoRaiz->appendChild('conteudoIngles'       , $row['conteudoIngles']);
				$nodoRaiz->appendChild('pecasCompIngles'      , $row['pecasCompIngles']);
				$nodoRaiz->appendChild('descricaoPecasIngles' , $row['descricaoPecasIngles']);
				$nodoRaiz->appendChild('metaKeywordsIngles'   , $row['metaKeywordsIngles']);
				$nodoRaiz->appendChild('metaDescriptionIngles', $row['metaDescriptionIngles']);
				$nodoRaiz->appendChild('metaTitleIngles'	  , $row['metaTitleIngles']);
				$nodoRaiz->appendChild('disponibilidadePeca'  , $row['disponibilidadePeca']);
				$nodoRaiz->appendChild('destacado'            , $row['destacado']);
				$nodoRaiz->appendChild('fichaConservacao'     , $row['fichaConservacao']);
				
				//Retorna o resultado ao navegador
				header("Content-type: application/xml");
				echo $xml->saveXML();
			}
		}
		else{
			//Cria o documento XML e seus respectivos elementos
			$xml = new DOMDocument('1.0');
			$nodoRaiz = $xml->createElement('dados');
				
			//Define o nodo raiz
			$xml->appendChild($nodoRaiz);
				
			//Define os filhos do nodo raiz
			$nodoRaiz->appendChild('status', "EMPTY");
				
			//Retorna o resultado ao navegador
			header("Content-type: application/xml");
			echo $xml->saveXML();
		}
	}
?>