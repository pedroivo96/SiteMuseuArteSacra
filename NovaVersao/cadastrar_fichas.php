<?php

    include './conexao_museu.php';

    if(!empty($_POST)){

        $operacao = $_POST['operacao'];
        $conn = getConnection();
        
        switch($operacao){
            case 'fichas_tecnicas':
                inserirFichaTecnica($conn);
                break;
            case 'fichas_catalograficas':
                inserirFichaCatalografica($conn);
                break;
            case 'fichas_conservacao':
                inserirFichaConservacao($conn);
                break;
            case 'fichas_visualizacao':
                inserirVisualizacao($conn);
                break;
            case 'fichas_english_fields':
                inserirEnglishFields($conn);
                break;
        }

        $conn = null;
    }
	
	function inserirPeca($conn){
		
		$id_peca = $_POST['numero_inventario_museu']."/".$_POST['numero_inventario_projeto'];
		
		$sql0 = 'SELECT * FROM pecas WHERE id_peca = :id_peca';
        $stmt0 = $conn->prepare($sql0);
        $stmt0->bindValue(':id_peca', $id_peca);
        $stmt0->execute();
        $count0 = $stmt0->rowCount();

        if($count0 > 0){
			
			//Já existe uma peça cadastrada com esse ID
			return $id_peca;
			
        }else{
			
			//Pode cadastrar
			$sql = 'INSERT INTO pecas (numero_inventario_museu,
                                       numero_inventario_projeto,
                                       nome_peca,
                                       id_peca,
                                       nome_usuario) VALUES (:numero_inventario_museu,
								                             :numero_inventario_projeto,
													         :nome_peca,
													         :id_peca,
													         :nome_usuario)';
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':numero_inventario_museu'  , $_POST['numero_inventario_museu']);
			$stmt->bindParam(':numero_inventario_projeto', $_POST['numero_inventario_projeto']);
			$stmt->bindParam(':nome_peca'                , $_POST['nome_peca']);
			$stmt->bindParam(':id_peca'                  , $id_peca);
			$stmt->bindParam(':nome_usuario'             , $_POST['nome_usuario']);
			
			if($stmt->execute()){
				
				$sql1 = 'INSERT INTO fichas_tecnicas (id_peca) VALUES (:id_peca)';
				$stmt1 = $conn->prepare($sql1);
				$stmt1->bindParam(':id_peca', $id_peca);
			
				if($stmt1->execute()){
					
					$sql2 = 'INSERT INTO fichas_catalograficas (id_peca) VALUES (:id_peca)';
					$stmt2 = $conn->prepare($sql2);
					$stmt2->bindParam(':id_peca', $id_peca);
			
					if($stmt2->execute()){
						
						$sql3 = 'INSERT INTO fichas_conservacao (id_peca) VALUES (:id_peca)';
						$stmt3 = $conn->prepare($sql3);
						$stmt3->bindParam(':id_peca', $id_peca);
			
						if($stmt3->execute()){
							
							$sql4 = 'INSERT INTO fichas_visualizacao (id_peca) VALUES (:id_peca)';
							$stmt4 = $conn->prepare($sql4);
							$stmt4->bindParam(':id_peca', $id_peca);
			
							if($stmt4->execute()){
								
								$sql5 = 'INSERT INTO fichas_english_fields (id_peca) VALUES (:id_peca)';
								$stmt5 = $conn->prepare($sql5);
								$stmt5->bindParam(':id_peca', $id_peca);
			
								if($stmt5->execute()){
									return $id_peca;
								}
								else{
									return "ERRO";
								}
					
							}
							else{
								return "ERRO";
							}
					
						}
						else{
							return "ERRO";
						}
					}
					else{
						return "ERRO";
					}
				}
				else{
					return "ERRO";
				}
			}
			else{
				return "ERRO";
			}
			
		}
		
	}
	
	function inserirFichaTecnica($conn){
		
		$id_peca = inserirPeca($conn);
		
		if($id_peca == "ERRO"){
			echo "ERRO";
		}else{
			
			$sql = 'UPDATE fichas_tecnicas SET 
					localizacao = :localizacao,
                    termo_doacao = :termo_doacao,
                    fabricante_autor = :fabricante_autor,
                    data = :data,
                    local_aquisicao = :local_aquisicao,
                    tecido = :tecido,
                    composicao = :composicao,
                    bordado = :bordado,
                    tipologia = :tipologia,
                    pintura = :pintura,
                    tecnica = :tecnica,
                    dimensoes = :dimensoes,
				    metodo_producao = :metodo_producao 
					WHERE id_peca = :id_peca ';
			
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':id_peca'           , $id_peca);
			$stmt->bindParam(':localizacao'       , $_POST['localizacao']);
			$stmt->bindParam(':termo_doacao'      , $_POST['termo_doacao']);
			$stmt->bindParam(':fabricante_autor'  , $_POST['fabricante_autor']);
			$stmt->bindParam(':data'              , $_POST['data']);
			$stmt->bindParam(':local_aquisicao'   , $_POST['local_aquisicao']);
			$stmt->bindParam(':tecido'            , $_POST['tecido']);
			$stmt->bindParam(':composicao'        , $_POST['composicao']);
			$stmt->bindParam(':bordado'           , $_POST['bordado']);
			$stmt->bindParam(':tipologia'         , $_POST['tipologia']);
			$stmt->bindParam(':pintura'           , $_POST['pintura']);
			$stmt->bindParam(':tecnica'           , $_POST['tecnica']);
			$stmt->bindParam(':dimensoes'         , $_POST['dimensoes']);
			$stmt->bindParam(':metodo_producao'   , $_POST['metodo_producao']);
		
			if($stmt->execute()){
				echo $id_peca;
			}else{
				echo "ERRO";
			}
			
		}
		
	}
	
	function inserirFichaCatalografica($conn){
		
		$sql = 'UPDATE fichas_catalograficas SET 
				classe = :classe,
				sub_classe = :sub_classe,
				tipo = :tipo,
				historico_uso = :historico_uso,
				possiveis_usos = :possiveis_usos,
				data_aquisicao = :data_aquisicao,
				tecnica_material = :tecnica_material,
				forma = :forma,
				descricao_peca = :descricao_peca,
				dimensoes = :dimensoes,
				descricao_pecas_complementares = :descricao_pecas_complementares,
				observacoes = :observacoes,
				descricao_detalhes = :descricao_detalhes 
				WHERE id_peca = :id_peca ';
										   
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id_peca'                       , $_POST['idPeca']);
		$stmt->bindParam(':classe'                        , $_POST['classe']);
		$stmt->bindParam(':sub_classe'                    , $_POST['sub_classe']);
		$stmt->bindParam(':tipo'                          , $_POST['tipo']);
		$stmt->bindParam(':historico_uso'                 , $_POST['historico_uso']);
		$stmt->bindParam(':possiveis_usos'                , $_POST['possiveis_usos']);
		$stmt->bindParam(':data_aquisicao'                , $_POST['data_aquisicao']);
		$stmt->bindParam(':tecnica_material'              , $_POST['tecnica_material']);
		$stmt->bindParam(':forma'                         , $_POST['forma']);
		$stmt->bindParam(':descricao_peca'                , $_POST['descricao_peca']);
		$stmt->bindParam(':dimensoes'                     , $_POST['dimensoes']);
		$stmt->bindParam(':descricao_pecas_complementares', $_POST['descricao_pecas_complementares']);
		$stmt->bindParam(':observacoes'                   , $_POST['observacoes']);
		$stmt->bindParam(':descricao_detalhes'            , $_POST['descricao_detalhes']);
		
		if($stmt->execute()){
			echo $_POST['idPeca'];
		}else{
			echo "ERRO";
		}
		
	}
	
	function inserirFichaConservacao($conn){
		
		$sql = 'UPDATE fichas_conservacao SET 
				numero_registro = :numero_registro,
				titulo = :titulo,
				classe = :classe,
				denominacao = :denominacao,
				estado_geral_conservacao = :estado_geral_conservacao,
				danos_verificados = :danos_verificados,
				procedimentos_higiene = :procedimentos_higiene,
				reparos_realizados = :reparos_realizados,
				acondicionamento = :acondicionamento,
				restauracao_conservacao = :restauracao_conservacao,
				procedimentos_conservacao = :procedimentos_conservacao,
				observacoes = :observacoes,
				data = :data,
				responsavel_preenchimento = :responsavel_preenchimento 
				WHERE id_peca = :id_peca ';
										   
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':id_peca'                  , $_POST['id_peca']);
		$stmt->bindParam(':numero_registro'          , $_POST['numero_registro']);
		$stmt->bindParam(':titulo'                   , $_POST['titulo'] );
		$stmt->bindParam(':classe'                   , $_POST['classe']);
		$stmt->bindParam(':denominacao'              , $_POST['denominacao']);
		$stmt->bindParam(':estado_geral_conservacao' , $_POST['estado_geral_conservacao']);
		$stmt->bindParam(':danos_verificados'        , $_POST['danos_verificados']);
		$stmt->bindParam(':procedimentos_higiene'    , $_POST['procedimentos_higiene']);
		$stmt->bindParam(':reparos_realizados'       , $_POST['reparos_realizados']);
		$stmt->bindParam(':acondicionamento'         , $_POST['acondicionamento']);
		$stmt->bindParam(':restauracao_conservacao'  , $_POST['restauracao_conservacao']);
		$stmt->bindParam(':procedimentos_conservacao', $_POST['procedimentos_conservacao']);
		$stmt->bindParam(':observacoes'              , $_POST['observacoes']);
		$stmt->bindParam(':data'                     , $_POST['data']);
		$stmt->bindParam(':responsavel_preenchimento', $_POST['responsavel_preenchimento']);
		
		if($stmt->execute()){
			echo $id_peca;
		}else{
			echo "ERRO";
		}
	}
	
	function inserirVisualizacao($conn){
		
		$sql = 'UPDATE fichas_visualizacao SET
                tipo_acervo = :tipo_acervo,
				numero_registro = :numero_registro,
                numero_registros_antigos = :numero_registros_antigos,
				sala = :sala,
				estante = :estante,
                prateleira = :prateleira,
				embalagem = :embalagem,
			    classe = :classe,
				denominacao = :denominacao,
				tipo = :tipo,
				titulo = :titulo,
				autoria = :autoria,
				colecao = :colecao,
				tipo_data_producao = :tipo_data_producao,
				data_producao = :data_producao,
				local_producao = :local_producao,
				historico_peca = :historico_peca ,
				eventos_associados = :eventos_associados,
				largura = :largura,
				altura = :altura,
				profundidade = :profundidade,
				circunferencia = :circunferencia,
				tecnica = :tecnica,
				material = :material,
				etiqueta_composicao = :etiqueta_composicao,
				descricao_conteudo = :descricao_conteudo,
				pecas_complementares = :pecas_complementares,
				descricao_pecas_comp = :descricao_pecas_comp,
				pecas_relacionadas = :pecas_relacionadas,
				descritores = :descritores,
				descritores_geograficos = :descritores_geograficos ,
				documentos_relacionados = :documentos_relacionados,
				notas_observacoes = :notas_observacoes,
				valor_peca = :valor_peca,
				seguradora = :seguradora,
				valor_seguro = :valor_seguro,
				formas_incorporacao = :formas_incorporacao,
				tipo_data_incorporacao = :tipo_data_incorporacao,
				frequencias = :frequencias,
				procedencias = :procedencias,
				uso_acesso_peca_fisica = :uso_acesso_peca_fisica,
				uso_acesso_representante = :uso_acesso_representante,
				historico_circulacao = :historico_circulacao,
				direitos = :direitos,
				catalogador = :catalogador,
				data_inicial_catalogacao = :data_inicial_catalogacao,
				data_final_catalogacao = :data_final_catalogacao ,
				fontes_pesquisa_referencias = :fontes_pesquisa_referencias,
				link_visao = :link_visao,
				meta_keywords = :meta_keywords,
				meta_description = :meta_description,
				meta_title = :meta_title 
				WHERE id_peca = :id_peca';
		
		$stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_peca'                    , $_POST['id_peca']);
		$stmt->bindParam(':tipo_acervo'                , $_POST['tipo_acervo']);
		$stmt->bindParam(':numero_registro'            , $_POST['numero_registro']);
		$stmt->bindParam(':numero_registros_antigos'   , $_POST['numero_registros_antigos']);
		$stmt->bindParam(':sala'                       , $_POST['sala']);
		$stmt->bindParam(':estante'                    , $_POST['estante']);
		$stmt->bindParam(':prateleira'                 , $_POST['prateleira']);
		$stmt->bindParam(':embalagem'                  , $_POST['embalagem']);
		$stmt->bindParam(':classe'                     , $_POST['classe']);
		$stmt->bindParam(':denominacao'                , $_POST['denominacao1']);
		$stmt->bindParam(':tipo'                       , $_POST['tipo1']);
		$stmt->bindParam(':titulo'                     , $_POST['titulo1']);
		$stmt->bindParam(':autoria'                    , $_POST['autoria']);
		$stmt->bindParam(':colecao'                    , $_POST['colecao']);
		$stmt->bindParam(':tipo_data_producao'         , $_POST['tipo_data_producao']);
		$stmt->bindParam(':data_producao'              , $_POST['data_producao']);
		$stmt->bindParam(':local_producao'             , $_POST['local_producao']);
		$stmt->bindParam(':historico_peca'             , $_POST['historico_peca']);
		$stmt->bindParam(':eventos_associados'         , $_POST['eventos_associados']);
		$stmt->bindParam(':largura'                    , $_POST['largura']);
		$stmt->bindParam(':altura'                     , $_POST['altura']);
		$stmt->bindParam(':profundidade'               , $_POST['profundidade']);
		$stmt->bindParam(':circunferencia'             , $_POST['circunferencia']);
		$stmt->bindParam(':tecnica'                    , $_POST['tecnica1']);
		$stmt->bindParam(':material'                   , $_POST['material']);
		$stmt->bindParam(':etiqueta_composicao'        , $_POST['etiqueta_composicao']);
		$stmt->bindParam(':descricao_conteudo'         , $_POST['descricao_conteudo']);
		$stmt->bindParam(':pecas_complementares'       , $_POST['pecas_complementares']);
		$stmt->bindParam(':descricao_pecas_comp'       , $_POST['descricao_pecas_comp']);
		$stmt->bindParam(':pecas_relacionadas'         , $_POST['pecas_relacionadas']);
		$stmt->bindParam(':descritores'                , $_POST['descritores']);
		$stmt->bindParam(':descritores_geograficos'    , $_POST['descritores_geograficos']);
		$stmt->bindParam(':documentos_relacionados'    , $_POST['documentos_relacionados']);
		$stmt->bindParam(':notas_observacoes'          , $_POST['notas_observacoes']);
		$stmt->bindParam(':valor_peca'                 , $_POST['valor_peca']);
		$stmt->bindParam(':seguradora'                 , $_POST['seguradora']);
		$stmt->bindParam(':valor_seguro'               , $_POST['valor_seguro']);
		$stmt->bindParam(':formas_incorporacao'        , $_POST['formas_incorporacao']);
		$stmt->bindParam(':tipo_data_incorporacao'     , $_POST['tipo_data_incorporacao']);
		$stmt->bindParam(':frequencias'                , $_POST['frequencias']);
		$stmt->bindParam(':procedencias'               , $_POST['procedencias']);
		$stmt->bindParam(':uso_acesso_peca_fisica'     , $_POST['uso_acesso_peca_fisica']);
		$stmt->bindParam(':uso_acesso_representante'   , $_POST['uso_acesso_representante']);
		$stmt->bindParam(':historico_circulacao'       , $_POST['historico_circulacao']);
		$stmt->bindParam(':direitos'                   , $_POST['direitos']);
		$stmt->bindParam(':catalogador'                , $_POST['catalogador']);
		$stmt->bindParam(':data_inicial_catalogacao'   , $_POST['data_inicial_catalogacao']);
		$stmt->bindParam(':data_final_catalogacao'     , $_POST['data_final_catalogacao']);
		$stmt->bindParam(':fontes_pesquisa_referencias', $_POST['fontes_pesquisa_referencias']);
		$stmt->bindParam(':link_visao'                 , $_POST['link_visao']);
		$stmt->bindParam(':meta_keywords'              , $_POST['meta_keywords']);
		$stmt->bindParam(':meta_description'           , $_POST['meta_description']);
		$stmt->bindParam(':meta_title'                 , $_POST['meta_title']);
		
        if($stmt->execute()){
            echo $_POST['idPeca'];
        }else{
            echo "ERRO";
        }
		
	}
	
	function inserirEnglishFields($conn){
		
		$sql = 'UPDATE fichas_english_fields SET
                titulo_ingles = :titulo_ingles,
                autoria_ingles = :autoria_ingles,
                colecao_ingles = :colecao_ingles,
                historia_ingles = :historia_ingles,
                eventos_ingles = :eventos_ingles,
                conteudo_ingles = :conteudo_ingles,
                pecas_comp_ingles = :pecas_comp_ingles,
                descricao_pecas_ingles = :descricao_pecas_ingles,
                meta_keywords_ingles = :meta_keywords_ingles,
                meta_description_ingles = :meta_description_ingles,
                meta_title_ingles = :meta_title_ingles,
                disponibilidade_peca = :disponibilidade_peca,
                destacado = :destacado,
                ficha_conservacao = :ficha_conservacao 
				WHERE id_peca = :id_peca';
		
		$stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_peca'                , $_POST['id_peca']);
		$stmt->bindParam(':titulo_ingles'          , $_POST['titulo_ingles']);
		$stmt->bindParam(':autoria_ingles'         , $_POST['autoria_ingles']);
		$stmt->bindParam(':colecao_ingles'         , $_POST['colecao_ingles']);
		$stmt->bindParam(':historia_ingles'        , $_POST['historia_ingles']);
		$stmt->bindParam(':eventos_ingles'         , $_POST['eventos_ingles']);
		$stmt->bindParam(':conteudo_ingles'        , $_POST['conteudo_ingles']);
		$stmt->bindParam(':pecas_comp_ingles'      , $_POST['pecas_comp_ingles']);
		$stmt->bindParam(':descricao_pecas_ingles' , $_POST['descricao_pecas_ingles']);
		$stmt->bindParam(':meta_keywords_ingles'   , $_POST['meta_keywords_ingles']);
		$stmt->bindParam(':meta_description_ingles', $_POST['meta_description_ingles']);
		$stmt->bindParam(':meta_title_ingles'      , $_POST['meta_title_ingles']);
		$stmt->bindParam(':disponibilidade_peca'   , $_POST['disponibilidade_peca']);
		$stmt->bindParam(':destacado'              , $_POST['destacado']);
		$stmt->bindParam(':ficha_conservacao'      , $_POST['ficha_conservacao']);

        if($stmt->execute()){
            echo $_POST['id_peca'];
        }else{
            echo "ERRO";
        }
	}
?>
