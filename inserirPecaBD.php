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

        $id_peca = $_POST['numeroInventarioMuseu'].'/'.$_POST['numeroInventarioProjeto'];

        $sql = 'INSERT INTO Pecas (
                numeroInventarioMuseu,
                numeroInventarioMuseu,
                nomePeca,
                id_peca,
                usuario 
            ) VALUES (
                '.$_POST['numeroInventarioMuseu'].',
                '.$_POST['numeroInventarioMuseu'].',
                '.$_POST['nomePeca'].',
                '.$id_peca.',
                '.$_POST['usuario'].'
            )';

        return $id_peca;
    }

    function inserirFichaTecnica($conn){

        $id_peca = inserirPeca($conn);

        $sql = 'INSERT INTO ficha_tecnica (
                id_peca,
                localizacao,
                termoDoacao,
                fabricanteAutor,
                data_peca,
                localAquisicao,
                tecido,
                composicao,
                bordado,
                tipologia,
                pintura,
                tecnica,
                dimensoes,
				metodo_producao,
                count_imgs_desenho_tecnico,
                count_imgs_fotografia
            ) VALUES(
                '.$id_peca.',
                '.$_POST['localizacao'].',
                '.$_POST['termoDoacao'].',
                '.$_POST['fabricanteAutor'].',
                '.$_POST['data'].',
                '.$_POST['localAquisicao'].',
                '.$_POST['tecido'].',
                '.$_POST['composicao'].',
                '.$_POST['bordado'].',
                '.$_POST['tipologia'].',
                '.$_POST['pintura'].',
                '.$_POST['tecnica'].',
                '.$_POST['dimensoes'].',
				'.$_POST['metodoProducao'].',
                '.$_POST['count_imgs_desenho_tecnico'].',
                '.$_POST['count_imgs_fotografia'].'
            )';

        if($conn->exec($sql) > 0){
            echo $id_peca;
        }
        
        echo "";
    }

    function inserirFichaCatalografica($conn){
       
        $sql = 'INSERT INTO ficha_catalografica (
            id_peca,
            classe,
            subClasse,
            tipo,
            historicoUso,
            possiveisUsos,
            dataAquisicao,
            tecnicaMaterial,
            forma,
            descricaoPeca,
            dimensoes,
            descricaoPecasComplementares,
            observacoes,
            descricaoDetalhes,
            count_imgs_detalhes
        ) VALUES(
            '.$_POST['id_peca'].',
            '.$_POST['classe'].',
            '.$_POST['subClasse'].',
            '.$_POST['tipo'].',
            '.$_POST['historicoUso'].',
            '.$_POST['possiveisUsos'].',
            '.$_POST['dataAquisicao'].',
            '.$_POST['tecnicaMaterial'].',
            '.$_POST['forma'].',
            '.$_POST['descricaoPeca'].',
            '.$_POST['dimensoes1'].',
            '.$_POST['descricaoPecasComplementares'].',
            '.$_POST['observacoes'].',
            '.$_POST['descricaoDetalhes'].',
            '.$_POST['count_imgs_detalhes'].'
        )';

        if($conn->exec($sql) > 0)
            echo "OK";
        
        echo "ERRO";
    }

    function inserirFichaConservacao($conn){
       
        $sql = 'INSERT INTO ficha_conservacao (
            id_peca,
            numeroRegistro,
            titulo,
            classe,
            denominacao,
            estadoGeralConservacao,
            dadosVerificados,
            procedimentosHigiene,
            reparosRealizados,
            acondicionamento,
            restauracaoConservacao,
            procedimentosConservacao,
            observacoes,
            data_peca,
            responsavelPreenchimento
        ) VALUES(
            '.$_POST['id_peca'].',
            '.$_POST['numeroRegistro'].',
            '.$_POST['titulo'].',
            '.$_POST['classe1'].',
            '.$_POST['denominacao'].',
            '.$_POST['estadoGeralConservacao'].',
            '.$_POST['dadosVerificados'].',
            '.$_POST['procedimentosHigiene'].',
            '.$_POST['reparosRealizados'].',
            '.$_POST['acondicionamento'].',
            '.$_POST['restauracaoConservacao'].',
            '.$_POST['procedimentosConservacao'].',
            '.$_POST['observacoes2'].',
            '.$_POST['data1'].',
            '.$_POST['responsavelPreenchimento'].'
        )';

        if($conn->exec($sql) > 0)
            echo "OK";
        
        echo "";
    }

    function inserirVisualizacao($conn){
        
        $sql = 'INSERT INTO visualizacao (
            id_peca, tipoAcervo, numeroRegistro,
            numeroRegistrosAntigos, sala, estante,
            prateleira, embalagem, classe,
            denominacao, tipo, titulo,
            autoria, colecao, tipoDataProducao,
            dataProducao, localProducao, historicoPeca,
            eventosAssociados, largura, altura,
            profundidade, circunferencia, tecnica,
            material, etiquetaComposicao, descricaoConteudo,
            pecasComplementares, descricaoPecasComp, pecasRelacionadas,
            descritores, descritoresGeograficos, documentosRelacionados,
            notasObservacoes, valorPeca, seguradora,
            valorSeguro, formasIncorporacao, tipoDataIncorporacao,
            frequencias, procedencias, usoAcessoPecaFisica,
            usoAcessoRepresentante, historicoCirculacao, direitos,
            catalogador, dataInicialCatalogacao, dataFinalCatalogacao,
            fontesPesquisaReferencias, linkVisao, metaKeywords,
            metaDescription, metaTitle
        ) VALUES(
            '.$_POST['id_peca'].', '.$_POST['tipoAcervo'].', '.$_POST['numeroRegistro'].',
            '.$_POST['numeroRegistrosAntigos'].', '.$_POST['sala'].', '.$_POST['estante'].',
            '.$_POST['prateleira'].', '.$_POST['embalagem'].', '.$_POST['classe'].',
            '.$_POST['denominacao1'].', '.$_POST['tipo1'].', '.$_POST['titulo1'].',
            '.$_POST['autoria'].', '.$_POST['colecao'].', '.$_POST['tipoDataProducao'].',
            '.$_POST['dataProducao'].', '.$_POST['localProducao'].', '.$_POST['historicoPeca'].',
            '.$_POST['eventosAssociados'].', '.$_POST['largura'].', '.$_POST['altura'].',
            '.$_POST['profundidade'].', '.$_POST['circunferencia'].', '.$_POST['tecnica1'].',
            '.$_POST['material'].', '.$_POST['etiquetaComposicao'].', '.$_POST['descricaoConteudo'].',
            '.$_POST['pecasComplementares'].', '.$_POST['descricaoPecasComp'].', '.$_POST['pecasRelacionadas'].',
            '.$_POST['descritores'].', '.$_POST['descritoresGeograficos'].', '.$_POST['documentosRelacionados'].',
            '.$_POST['notasObservacoes'].', '.$_POST['valorPeca'].', '.$_POST['seguradora'].',
            '.$_POST['valorSeguro'].', '.$_POST['formasIncorporacao'].', '.$_POST['tipoDataIncorporacao'].',
            '.$_POST['frequencias'].', '.$_POST['procedencias'].', '.$_POST['usoAcessoPecaFisica'].',
            '.$_POST['usoAcessoRepresentante'].', '.$_POST['historicoCirculacao'].', '.$_POST['direitos'].',
            '.$_POST['catalogador'].', '.$_POST['dataInicialCatalogacao'].', '.$_POST['dataFinalCatalogacao'].',
            '.$_POST['fontesPesquisaReferencias'].', '.$_POST['linkVisao'].', '.$_POST['metaKeywords'].',
            '.$_POST['metaDescription'].', '.$_POST['metaTitle'].'
        )';

        if($conn->exec($sql) > 0)
            return true;
        
        return false;
    }

    function inserirEnglishFields($conn){
        
        $sql = 'INSERT INTO english_fields (
            id_peca,
            tituloIngles,
            autoriaIngles,
            colecaoIngles,
            historiaIngles,
            eventosIngles,
            conteudoIngles,
            pecasCompIngles,
            descricaoPecasIngles,
            metaKeywordsIngles,
            metaDescriptionIngles,
            metaTitleIngles,
            disponibilidadePeca,
            destacado,
            fichaConservacao
        ) VALUES(
            '.$_POST['id_peca'].',
            '.$_POST['tituloIngles'].',
            '.$_POST['autoriaIngles'].',
            '.$_POST['colecaoIngles'].',
            '.$_POST['historiaIngles'].',
            '.$_POST['eventosIngles'].',
            '.$_POST['conteudoIngles'].',
            '.$_POST['pecasCompIngles'].',
            '.$_POST['descricaoPecasIngles'].',
            '.$_POST['metaKeywordsIngles'].',
            '.$_POST['metaDescriptionIngles'].',
            '.$_POST['metaTitleIngles'].',
            '.$_POST['disponibilidadePeca'].',
            '.$_POST['destacado'].',
            '.$_POST['fichaConservacao'].'
        )';

        if($conn->exec($sql) > 0)
            return true;
        
        return false;
    }

?>