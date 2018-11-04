<?php
    include './cnx_museu.php';

    if(!empty($_POST)){

        $operacao = $_POST['operacao'];
        $conn = getConnection();
        
        switch($operacao){
            case 'ficha_tecnica':
                inserirFichaTecnica($conn);
                break;
            case 'ficha_catalografica':
                inserirFichaCatalografica($conn);
                break;
            case 'ficha_conservacao':
                inserirFichaConservacao($conn);
                break;
            case 'visualizacao':
                inserirVisualizacao($conn);
                break;
            case 'english_fields':
                inserirEnglishFields($conn);
                break;
        }

        $conn = null;
    }

    function inserirPeca($conn){

        $idPeca = $_POST['numeroInventarioMuseu'].'/'.$_POST['numeroInventarioProjeto'];

        $sql = 'INSERT INTO pecas (numeroInventarioMuseu,
                                   numeroInventarioProjeto,
                                   nomePeca,
                                   idPeca,
                                   usuario) VALUES (:numeroInventarioMuseu,
								                    :numeroInventarioProjeto,
													:nomePeca,
													:idPeca,
													:usuario)';
		$stmt = $conn->prepare($sql);
        $stmt->bindParam(':numeroInventarioMuseu'   , $_POST['numeroInventarioMuseu']);
		$stmt->bindParam(':numeroInventarioProjeto' , $_POST['numeroInventarioProjeto']);
		$stmt->bindParam(':nomePeca'                , $_POST['nomePeca']);
		$stmt->bindParam(':idPeca'                  , $idPeca);
		$stmt->bindParam(':usuario'                 , $_POST['usuario']);
			
		if($stmt->execute()){
			
			$sql1 = 'INSERT INTO ficha_tecnica (idPeca) VALUES (:idPeca)';
			$stmt1 = $conn->prepare($sql1);
			$stmt1->bindParam(':idPeca', $idPeca);
			
			if($stmt1->execute()){
				
				$sql2 = 'INSERT INTO ficha_catalografica (idPeca) VALUES (:idPeca)';
				$stmt2 = $conn->prepare($sql2);
				$stmt2->bindParam(':idPeca', $idPeca);
				
				if($stmt2->execute()){
					
					$sql3 = 'INSERT INTO ficha_conservacao (idPeca) VALUES (:idPeca)';
					$stmt3 = $conn->prepare($sql3);
					$stmt3->bindParam(':idPeca', $idPeca);
				
					if($stmt3->execute()){
						
						$sql4 = 'INSERT INTO visualizacao (idPeca) VALUES (:idPeca)';
						$stmt4 = $conn->prepare($sql4);
						$stmt4->bindParam(':idPeca', $idPeca);
				
						if($stmt4->execute()){
							
							$sql5 = 'INSERT INTO english_fields (idPeca) VALUES (:idPeca)';
							$stmt5 = $conn->prepare($sql5);
							$stmt5->bindParam(':idPeca', $idPeca);
				
							if($stmt5->execute()){
								echo $idPeca;
								return $idPeca;
							}
							else{
								echo "";
							}
						}
						else{
							echo "";
						}	
					}
					else{
						echo "";
					}
				}
				else{
					echo "";
				}
			}else{
				echo "";
			}
        }else{
            echo "";
        }
    }

    function inserirFichaTecnica($conn){

        $idPeca = inserirPeca($conn);

        $sql = 'UPDATE ficha_tecnica SET localizacao = :localizacao,
                                         termoDoacao = :termoDoacao,
                                         fabricanteAutor = :fabricanteAutor,
                                         dataPeca = :dataPeca,
                                         localAquisicao = :localAquisicao,
                                         tecido = :tecido,
                                         composicao = :composicao,
                                         bordado = :bordado,
                                         tipologia = :tipologia,
                                         pintura = :pintura,
                                         tecnica = :tecnica,
                                         dimensoes = :dimensoes,
				                         metodoProducao = :metodoProducao WHERE idPeca = :idPeca ';
			
		$stmt = $conn->prepare($sql);
        $stmt->bindParam(':idPeca'                    , $idPeca);
		$stmt->bindParam(':localizacao'               , $_POST['localizacao']);
		$stmt->bindParam(':termoDoacao'               , $_POST['termoDoacao']);
		$stmt->bindParam(':fabricanteAutor'           , $_POST['fabricanteAutor']);
		$stmt->bindParam(':dataPeca'                  , $_POST['dataPeca']);
		$stmt->bindParam(':localAquisicao'            , $_POST['localAquisicao']);
		$stmt->bindParam(':tecido'                    , $_POST['tecido']);
		$stmt->bindParam(':composicao'                , $_POST['composicao']);
		$stmt->bindParam(':bordado'                   , $_POST['bordado']);
		$stmt->bindParam(':tipologia'                 , $_POST['tipologia']);
		$stmt->bindParam(':pintura'                   , $_POST['pintura']);
		$stmt->bindParam(':tecnica'                   , $_POST['tecnica']);
		$stmt->bindParam(':dimensoes'                 , $_POST['dimensoes']);
		$stmt->bindParam(':metodoProducao'            , $_POST['metodoProducao']);
		
		if($stmt->execute()){
            return $idPeca;
        }else{
            return "ERRO";
        }
    }

    function inserirFichaCatalografica($conn){
       
        $sql = 'UPDATE ficha_catalografica SET
				classe = :classe,
				subClasse = :subClasse,
				tipo = :tipo,
				historicoUso = :historicoUso,
				possiveisUsos = :possiveisUsos,
				dataAquisicao = :dataAquisicao,
				tecnicaMaterial = :tecnicaMaterial,
				forma = :forma,
				descricaoPeca = :descricaoPeca,
				dimensoes = :dimensoes1,
				descricaoPecasComplementares = :descricaoPecasComplementares,
				observacoes = :observacoes,
				descricaoDetalhes = :descricaoDetalhes,
				countImgsDetalhes = :countImgsDetalhes WHERE idPeca = :idPeca';

		$stmt = $conn->prepare($sql);
        $stmt->bindParam(':idPeca'                      , $_POST['idPeca']);
		$stmt->bindParam(':classe'                      , $_POST['classe']);
		$stmt->bindParam(':subClasse'                   , $_POST['subClasse']);
		$stmt->bindParam(':tipo'                        , $_POST['tipo']);
		$stmt->bindParam(':historicoUso'                , $_POST['historicoUso']);
		$stmt->bindParam(':possiveisUsos'               , $_POST['possiveisUsos']);
		$stmt->bindParam(':dataAquisicao'               , $_POST['dataAquisicao']);
		$stmt->bindParam(':tecnicaMaterial'             , $_POST['tecnicaMaterial']);
		$stmt->bindParam(':forma'                       , $_POST['forma']);
		$stmt->bindParam(':descricaoPeca'               , $_POST['descricaoPeca']);
		$stmt->bindParam(':dimensoes1'                  , $_POST['dimensoes1']);
		$stmt->bindParam(':descricaoPecasComplementares', $_POST['descricaoPecasComplementares']);
		$stmt->bindParam(':observacoes'                 , $_POST['observacoes']);
		$stmt->bindParam(':descricaoDetalhes'           , $_POST['descricaoDetalhes']);
		$stmt->bindParam(':countImgsDetalhes'           , $_POST['countImgsdetalhes']);
		
		if($stmt->execute()){
            echo "OK";
        }else{
            echo "ERRO";
        }
    }

    function inserirFichaConservacao($conn){
       
        $sql = 'UPDATE ficha_conservacao SET
				numeroRegistro = :numeroRegistro,
				titulo = :titulo,
				classe = :classe,
				denominacao = :denominacao,
				estadoGeralConservacao = :estadoGeralConservacao,
				dadosVerificados = :dadosVerificados,
				procedimentosHigiene = :procedimentosHigiene,
				reparosRealizados = :reparosRealizados,
				acondicionamento = :acondicionamento,
				restauracaoConservacao = :restauracaoConservacao,
				procedimentosConservacao = :procedimentosConservacao,
				observacoes = :observacoes,
				dataPeca = :dataPeca,
				responsavelPreenchimento = :responsavelPreenchimento WHERE idPeca = :idPeca';
		
		$stmt = $conn->prepare($sql);
        $stmt->bindParam(':idPeca'                  , $_POST['idPeca']);
		$stmt->bindParam(':numeroRegistro'          , $_POST['numeroRegistro']);
		$stmt->bindParam(':titulo'                  , $_POST['titulo']);
		$stmt->bindParam(':classe'                  , $_POST['classe1']);
		$stmt->bindParam(':denominacao'             , $_POST['denominacao']);
		$stmt->bindParam(':estadoGeralConservacao'  , $_POST['estadoGeralConservacao']);
		$stmt->bindParam(':dadosVerificados'        , $_POST['dadosVerificados']);
		$stmt->bindParam(':procedimentosHigiene'    , $_POST['procedimentosHigiene']);
		$stmt->bindParam(':reparosRealizados'       , $_POST['reparosRealizados']);
		$stmt->bindParam(':acondicionamento'        , $_POST['acondicionamento']);
		$stmt->bindParam(':restauracaoConservacao'  , $_POST['restauracaoConservacao']);
		$stmt->bindParam(':procedimentosConservacao', $_POST['procedimentosConservacao']);
		$stmt->bindParam(':observacoes'             , $_POST['observacoes2']);
		$stmt->bindParam(':dataPeca'                , $_POST['data1']);
		$stmt->bindParam(':responsavelPreenchimento', $_POST['responsavelPreenchimento']);

        if($stmt->execute()){
            echo "OK";
        }else{
            echo "ERRO";
        }
    }

    function inserirVisualizacao($conn){
        
        $sql = 'UPDATE visualizacao SET
                tipoAcervo = :tipoAcervo                               , numeroRegistro = :numeroRegistro,
                numeroRegistrosAntigos = :numeroRegistrosAntigos       , sala = :sala                      , estante = :estante,
                prateleira = :prateleira                               , embalagem = :embalagem,
			    classe = :classe                                       , denominacao = :denominacao,
				tipo = :tipo                                           , titulo = :titulo,
				autoria = :autoria                                     , colecao = :colecao,
				tipoDataProducao = :tipoDataProducao                   , dataProducao = :dataProducao,
				localProducao = :localProducao                         , historicoPeca = :historicoPeca ,
				eventosAssociados = :eventosAssociados                 , largura = :largura,
				altura = :altura                                       , profundidade = :profundidade,
				circunferencia = :circunferencia                       , tecnica = :tecnica,
				material = :material                                   , etiquetaComposicao = :etiquetaComposicao,
				descricaoConteudo = :descricaoConteudo                 , pecasComplementares = :pecasComplementares,
				descricaoPecasComp = :descricaoPecasComp               , pecasRelacionadas = :pecasRelacionadas,
				descritores = :descritores                             , descritoresGeograficos = :descritoresGeograficos ,
				documentosRelacionados = :documentosRelacionados       , notasObservacoes = :notasObservacoes,
				valorPeca = :valorPeca                                 , seguradora = :seguradora,
				valorSeguro = :valorSeguro                             , formasIncorporacao = :formasIncorporacao,
				tipoDataIncorporacao = :tipoDataIncorporacao           , frequencias = :frequencias,
				procedencias = :procedencias                           , usoAcessoPecaFisica = :usoAcessoPecaFisica,
				usoAcessoRepresentante = :usoAcessoRepresentante       , historicoCirculacao = :historicoCirculacao,
				direitos = :direitos                                   , catalogador = :catalogador,
				dataInicialCatalogacao = :dataInicialCatalogacao       , dataFinalCatalogacao = :dataFinalCatalogacao ,
				fontesPesquisaReferencias = :fontesPesquisaReferencias , linkVisao = :linkVisao,
				metaKeywords = :metaKeywords                           , metaDescription = :metaDescription,
				metaTitle = :metaTitle WHERE idPeca = :idPeca';
		
		$stmt = $conn->prepare($sql);
        $stmt->bindParam(':idPeca'                   , $_POST['idPeca']);
		$stmt->bindParam(':tipoAcervo'               , $_POST['tipoAcervo']);
		$stmt->bindParam(':numeroRegistro'           , $_POST['numeroRegistro']);
		$stmt->bindParam(':numeroRegistrosAntigos'   , $_POST['numeroRegistrosAntigos']);
		$stmt->bindParam(':sala'                     , $_POST['sala']);
		$stmt->bindParam(':estante'                  , $_POST['estante']);
		$stmt->bindParam(':prateleira'               , $_POST['prateleira']);
		$stmt->bindParam(':embalagem'                , $_POST['embalagem']);
		$stmt->bindParam(':classe'                   , $_POST['classe']);
		$stmt->bindParam(':denominacao'              , $_POST['denominacao1']);
		$stmt->bindParam(':tipo'                     , $_POST['tipo1']);
		$stmt->bindParam(':titulo'                   , $_POST['titulo1']);
		$stmt->bindParam(':autoria'                  , $_POST['autoria']);
		$stmt->bindParam(':colecao'                  , $_POST['colecao']);
		$stmt->bindParam(':tipoDataProducao'         , $_POST['tipoDataProducao']);
		$stmt->bindParam(':dataProducao'             , $_POST['dataProducao']);
		$stmt->bindParam(':localProducao'            , $_POST['localProducao']);
		$stmt->bindParam(':historicoPeca'            , $_POST['historicoPeca']);
		$stmt->bindParam(':eventosAssociados'        , $_POST['eventosAssociados']);
		$stmt->bindParam(':largura'                  , $_POST['largura']);
		$stmt->bindParam(':altura'                   , $_POST['altura']);
		$stmt->bindParam(':profundidade'             , $_POST['profundidade']);
		$stmt->bindParam(':circunferencia'           , $_POST['circunferencia']);
		$stmt->bindParam(':tecnica'                  , $_POST['tecnica1']);
		$stmt->bindParam(':material'                 , $_POST['material']);
		$stmt->bindParam(':etiquetaComposicao'       , $_POST['etiquetaComposicao']);
		$stmt->bindParam(':descricaoConteudo'        , $_POST['descricaoConteudo']);
		$stmt->bindParam(':pecasComplementares'      , $_POST['pecasComplementares']);
		$stmt->bindParam(':descricaoPecasComp'       , $_POST['descricaoPecasComp']);
		$stmt->bindParam(':pecasRelacionadas'        , $_POST['pecasRelacionadas']);
		$stmt->bindParam(':descritores'              , $_POST['descritores']);
		$stmt->bindParam(':descritoresGeograficos'   , $_POST['descritoresGeograficos']);
		$stmt->bindParam(':documentosRelacionados'   , $_POST['documentosRelacionados']);
		$stmt->bindParam(':notasObservacoes'         , $_POST['notasObservacoes']);
		$stmt->bindParam(':valorPeca'                , $_POST['valorPeca']);
		$stmt->bindParam(':seguradora'               , $_POST['seguradora']);
		$stmt->bindParam(':valorSeguro'              , $_POST['valorSeguro']);
		$stmt->bindParam(':formasIncorporacao'       , $_POST['formasIncorporacao']);
		$stmt->bindParam(':tipoDataIncorporacao'     , $_POST['tipoDataIncorporacao']);
		$stmt->bindParam(':frequencias'              , $_POST['frequencias']);
		$stmt->bindParam(':procedencias'             , $_POST['procedencias']);
		$stmt->bindParam(':usoAcessoPecaFisica'      , $_POST['usoAcessoPecaFisica']);
		$stmt->bindParam(':usoAcessoRepresentante'   , $_POST['usoAcessoRepresentante']);
		$stmt->bindParam(':historicoCirculacao'      , $_POST['historicoCirculacao']);
		$stmt->bindParam(':direitos'                 , $_POST['direitos']);
		$stmt->bindParam(':catalogador'              , $_POST['catalogador']);
		$stmt->bindParam(':dataInicialCatalogacao'   , $_POST['dataInicialCatalogacao']);
		$stmt->bindParam(':dataFinalCatalogacao'     , $_POST['dataFinalCatalogacao']);
		$stmt->bindParam(':fontesPesquisaReferencias', $_POST['fontesPesquisaReferencias']);
		$stmt->bindParam(':linkVisao'                , $_POST['linkVisao']);
		$stmt->bindParam(':metaKeywords'             , $_POST['metaKeywords']);
		$stmt->bindParam(':metaDescription'          , $_POST['metaDescription']);
		$stmt->bindParam(':metaTitle'                , $_POST['metaTitle']);
		
        if($stmt->execute()){
            echo "OK";
        }else{
            echo "ERRO";
        }
    }

    function inserirEnglishFields($conn){
        
        $sql = 'UPDATE english_fields SET
                tituloIngles = :tituloIngles,
                autoriaIngles = :autoriaIngles,
                colecaoIngles = :colecaoIngles,
                historiaIngles = :historiaIngles,
                eventosIngles = :eventosIngles,
                conteudoIngles = :conteudoIngles,
                pecasCompIngles = :pecasCompIngles,
                descricaoPecasIngles = :descricaoPecasIngles,
                metaKeywordsIngles = :metaKeywordsIngles,
                metaDescriptionIngles = :metaDescriptionIngles,
                metaTitleIngles = :metaTitleIngles,
                disponibilidadePeca = :disponibilidadePeca,
                destacado = :destacado,
                fichaConservacao = :fichaConservacao WHERE idPeca = :idPeca';
		
		$stmt = $conn->prepare($sql);
        $stmt->bindParam(':idPeca'               , $_POST['idPeca']);
		$stmt->bindParam(':tituloIngles'         , $_POST['tituloIngles']);
		$stmt->bindParam(':autoriaIngles'        , $_POST['autoriaIngles']);
		$stmt->bindParam(':colecaoIngles'        , $_POST['colecaoIngles']);
		$stmt->bindParam(':historiaIngles'       , $_POST['historiaIngles']);
		$stmt->bindParam(':eventosIngles'        , $_POST['eventosIngles']);
		$stmt->bindParam(':conteudoIngles'       , $_POST['conteudoIngles']);
		$stmt->bindParam(':pecasCompIngles'      , $_POST['pecasCompIngles']);
		$stmt->bindParam(':descricaoPecasIngles' , $_POST['descricaoPecasIngles']);
		$stmt->bindParam(':metaKeywordsIngles'   , $_POST['metaKeywordsIngles']);
		$stmt->bindParam(':metaDescriptionIngles', $_POST['metaDescriptionIngles']);
		$stmt->bindParam(':metaTitleIngles'      , $_POST['metaTitleIngles']);
		$stmt->bindParam(':disponibilidadePeca'  , $_POST['disponibilidadePeca']);
		$stmt->bindParam(':destacado'            , $_POST['destacado']);
		$stmt->bindParam(':fichaConservacao'     , $_POST['fichaConservacao']);

        if($stmt->execute()){
            echo "OK";
        }else{
            echo "ERRO";
        }
    }

?>