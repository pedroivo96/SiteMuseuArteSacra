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

function inserirFichaTecnica($conn){

    $sql = 'UPDATE ficha_tecnica SET

            localizacao = \''.$_POST['localizacao'].'\',
            termoDoacao = \''.$_POST['termoDoacao'].'\',
            fabricanteAutor = \''.$_POST['fabricanteAutor'].'\',
            data_peca = \''.$_POST['data'].'\',
            localAquisicao = \''.$_POST['localAquisicao'].'\',
            tecido = \''.$_POST['tecido'].'\',
            composicao = \''.$_POST['composicao'].'\',
            bordado = \''.$_POST['bordado'].'\',
            tipologia = \''.$_POST['tipologia'].'\',
            pintura = \''.$_POST['pintura'].'\',
            tecnica = \''.$_POST['tecnica'].'\',
            dimensoes = \''.$_POST['dimensoes'].'\',
            count_imgs_desenho_tecnico = \''.$_POST['count_imgs_desenho_tecnico'].'\',
            count_imgs_fotografia = \''.$_POST['count_imgs_fotografia'].'\'

        WHERE id_peca = \''.$_POST['id_peca'].'\'';

    if($conn->exec($sql) > 0){
        return true;
    }
    
    return false;
}

function inserirFichaCatalografica($conn){
   
    $sql = 'UPDATE ficha_catalografica SET

        classe = \''.$_POST['classe'].'\',
        subClasse = \''.$_POST['subClasse'].'\',
        tipo = \''.$_POST['tipo'].'\',
        historicoUso = \''.$_POST['historicoUso'].'\',
        possiveisUsos = \''.$_POST['possiveisUsos'].'\',
        dataAquisicao = \''.$_POST['dataAquisicao'].'\',
        tecnicaMaterial = \''.$_POST['tecnicaMaterial'].'\',
        forma = \''.$_POST['forma'].'\',
        descricaoPeca = \''.$_POST['descricaoPeca'].'\',
        dimensoes = \''.$_POST['dimensoes1'].'\',
        descricaoPecasComplementares = \''.$_POST['descricaoPecasComplementares'].'\',
        observacoes = \''.$_POST['observacoes'].'\',
        descricaoDetalhes = \''.$_POST['descricaoDetalhes'].'\',
        count_imgs_detalhes = \''.$_POST['count_imgs_detalhes'].'\'
        
        WHERE id_peca = \''.$_POST['id_peca'].'\'';

    if($conn->exec($sql) > 0){
        return true;
    }
    
    return false;
}

function inserirFichaConservacao($conn){
   
    $sql = 'UPDATE ficha_conservacao SET
         
        numeroRegistro = \''.$_POST['numeroRegistro'].'\',
        titulo = \''.$_POST['titulo'].'\',
        classe = \''.$_POST['classe1'].'\',
        denominacao = \''.$_POST['denominacao'].'\',
        estadoGeralConservacao = \''.$_POST['estadoGeralConservacao'].'\',
        dadosVerificados = \''.$_POST['dadosVerificados'].'\',
        procedimentosHigiene = \''.$_POST['procedimentosHigiene'].'\',
        reparosRealizados = \''.$_POST['reparosRealizados'].'\',
        acondicionamento = \''.$_POST['acondicionamento'].'\',
        restauracaoConservacao = \''.$_POST['restauracaoConservacao'].'\',
        procedimentosConservacao = \''.$_POST['procedimentosConservacao'].'\',
        observacoes = \''.$_POST['observacoes2'].'\',
        data_peca = \''.$_POST['data1'].'\',
        responsavelPreenchimento = \''.$_POST['responsavelPreenchimento'].'\'
    
    WHERE id_peca = \''.$_POST['id_peca'].'\'';

    if($conn->exec($sql) > 0)
        return true;
    
    return false;
}

function inserirVisualizacao($conn){
    
    $sql = 'UPDATE visualizacao SET
         
        tipoAcervo = \''.$_POST['tipoAcervo'].'\', 
        numeroRegistro = \''.$_POST['numeroRegistro'].'\',
        numeroRegistrosAntigos = \''.$_POST['numeroRegistrosAntigos'].'\', 
        sala = \''.$_POST['sala'].'\', 
        estante = \''.$_POST['estante'].'\',
        prateleira = \''.$_POST['prateleira'].'\', 
        embalagem = \''.$_POST['embalagem'].'\', 
        classe = \''.$_POST['classe2'].'\',
        denominacao = \''.$_POST['denominacao1'].'\', 
        tipo = \''.$_POST['tipo1'].'\', 
        titulo = \''.$_POST['titulo1'].'\',
        autoria = \''.$_POST['autoria'].'\', 
        colecao = \''.$_POST['colecao'].'\', 
        tipoDataProducao = \''.$_POST['tipoDataProducao'].'\',
        dataProducao = \''.$_POST['dataProducao'].'\', 
        localProducao = \''.$_POST['localProducao'].'\', 
        historicoPeca = \''.$_POST['historicoPeca'].'\',
        eventosAssociados = \''.$_POST['eventosAssociados'].'\', 
        largura = \''.$_POST['largura'].'\', 
        altura = \''.$_POST['altura'].'\',
        profundidade = \''.$_POST['profundidade'].'\', 
        circunferencia = \''.$_POST['circunferencia'].'\', 
        tecnica = \''.$_POST['tecnica1'].'\',
        material = \''.$_POST['material'].'\', 
        etiquetaComposicao = \''.$_POST['etiquetaComposicao'].'\', 
        descricaoConteudo = \''.$_POST['descricaoConteudo'].'\',
        pecasComplementares = \''.$_POST['pecasComplementares'].'\', 
        descricaoPecasComp = \''.$_POST['descricaoPecasComp'].'\', 
        pecasRelacionadas = \''.$_POST['pecasRelacionadas'].'\',
        descritores = \''.$_POST['descritores'].'\', 
        descritoresGeograficos = \''.$_POST['descritoresGeograficos'].'\', 
        documentosRelacionados = \''.$_POST['documentosRelacionados'].'\',
        notasObservacoes = \''.$_POST['notasObservacoes'].'\', 
        valorPeca = \''.$_POST['valorPeca'].'\', 
        seguradora = \''.$_POST['seguradora'].'\',
        valorSeguro = \''.$_POST['valorSeguro'].'\', 
        formasIncorporacao = \''.$_POST['formasIncorporacao'].'\', 
        tipoDataIncorporacao = \''.$_POST['tipoDataIncorporacao'].'\',
        frequencias = \''.$_POST['frequencias'].'\', 
        procedencias = \''.$_POST['procedencias'].'\', 
        usoAcessoPecaFisica = \''.$_POST['usoAcessoPecaFisica'].'\',
        usoAcessoRepresentante = \''.$_POST['usoAcessoRepresentante'].'\', 
        historicoCirculacao = \''.$_POST['historicoCirculacao'].'\', 
        direitos = \''.$_POST['direitos'].'\',
        catalogador = \''.$_POST['catalogador'].'\', 
        dataInicialCatalogacao = \''.$_POST['dataInicialCatalogacao'].'\', 
        dataFinalCatalogacao = \''.$_POST['dataFinalCatalogacao'].'\',
        fontesPesquisaReferencias = \''.$_POST['fontesPesquisaReferencias'].'\', 
        linkVisao = \''.$_POST['linkVisao'].'\', 
        metaKeywords = \''.$_POST['metaKeywords'].'\',
        metaDescription = \''.$_POST['metaDescription'].'\', 
        metaTitle = \''.$_POST['metaTitle'].'\'
    
    WHERE id_peca = \''.$_POST['id_peca'].'\'';

    if($conn->exec($sql) > 0)
        return true;
    
    return false;
}

function inserirEnglishFields($conn){
    
    $sql = 'UPDATE english_fields SET
    
        tituloIngles = \''.$_POST['tituloIngles'].'\',
        autoriaIngles = \''.$_POST['autoriaIngles'].'\',
        colecaoIngles = \''.$_POST['colecaoIngles'].'\',
        historiaIngles = \''.$_POST['historiaIngles'].'\',
        eventosIngles = \''.$_POST['eventosIngles'].'\',
        conteudoIngles = \''.$_POST['conteudoIngles'].'\',
        pecasCompIngles = \''.$_POST['pecasCompIngles'].'\',
        descricaoPecasIngles = \''.$_POST['descricaoPecasIngles'].'\',
        metaKeywordsIngles = \''.$_POST['metaKeywordsIngles'].'\',
        metaDescriptionIngles = \''.$_POST['metaDescriptionIngles'].'\',
        metaTitleIngles = \''.$_POST['metaTitleIngles'].'\',
        disponibilidadePeca = \''.$_POST['disponibilidadePeca'].'\',
        destacado = \''.$_POST['destacado'].'\',
        fichaConservacao = \''.$_POST['fichaConservacao'].'\'
    
    WHERE id_peca = \''.$_POST['id_peca'].'\'';

    if($conn->exec($sql) > 0)
        return true;
    
    return false;
}

?>