<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro Nova Peça</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
	<script>
	
		function formulario1(){
			
			var formulario1 = document.getElementById("formulario1");
			if (formulario1.style.display === "none") {
				formulario1.style.display = "block";
				
				buscarFichaTecnica();
			} else {
				formulario1.style.display = "none";
			}		
		}
		
		function formulario2(){
			
			var formulario2 = document.getElementById("formulario2");
			if (formulario2.style.display === "none") {
				formulario2.style.display = "block";
			} else {
				formulario2.style.display = "none";
			}		
		}
		
		function formulario3(){
			
			var formulario3 = document.getElementById("formulario3");
			if (formulario3.style.display === "none") {
				formulario3.style.display = "block";
			} else {
				formulario3.style.display = "none";
			}		
		}
		
		function formulario4(){
			
			var formulario4 = document.getElementById("formulario4");
			if (formulario4.style.display === "none") {
				formulario4.style.display = "block";
			} else {
				formulario4.style.display = "none";
			}		
		}
		
		function formulario5(){
			
			var formulario5 = document.getElementById("formulario5");
			if (formulario5.style.display === "none") {
				formulario5.style.display = "block";
			} else {
				formulario5.style.display = "none";
			}		
		}
	
		function chamaForm1(){
		
			var form1 = document.getElementById('formulario1');
			var form2 = document.getElementById('formulario2');
			var form3 = document.getElementById('formulario3');
			var form4 = document.getElementById('formulario4');
			var form5 = document.getElementById('formulario5');
			var barraProgresso = document.getElementById('barraProgresso');
			
			form1.style.display = "block";
			form2.style.display = "none";
			form3.style.display = "none";
			form4.style.display = "none";
			form5.style.display = "none";
			
			barraProgresso.style.width = "20%";
			barraProgresso.textContent = "20%";
		}
		
		function chamaForm2(){
		
			salvarFichaTecnica();
		
			/*
			var form1 = document.getElementById('formulario1');
			var form2 = document.getElementById('formulario2');
			var form3 = document.getElementById('formulario3');
			var form4 = document.getElementById('formulario4');
			var form5 = document.getElementById('formulario5');
			var barraProgresso = document.getElementById('barraProgresso');
			
			form2.style.display = "block";
			form1.style.display = "none";
			form3.style.display = "none";
			form4.style.display = "none";
			form5.style.display = "none";
			
			barraProgresso.style.width = "20%";
			barraProgresso.textContent = "20%";
			*/
		}
		
		function chamaForm3(){
		
			var form1 = document.getElementById('formulario1');
			var form2 = document.getElementById('formulario2');
			var form3 = document.getElementById('formulario3');
			var form4 = document.getElementById('formulario4');
			var form5 = document.getElementById('formulario5');
			var barraProgresso = document.getElementById('barraProgresso');
		
			form3.style.display = "block";
			form1.style.display = "none";
			form2.style.display = "none";
			form4.style.display = "none";
			form5.style.display = "none";
			
			barraProgresso.style.width = "40%";
			barraProgresso.textContent = "40%";
		}
		
		function chamaForm4(){
		
			var form1 = document.getElementById('formulario1');
			var form2 = document.getElementById('formulario2');
			var form3 = document.getElementById('formulario3');
			var form4 = document.getElementById('formulario4');
			var form5 = document.getElementById('formulario5');
			var barraProgresso = document.getElementById('barraProgresso');
			
			form4.style.display = "block";
			form1.style.display = "none";
			form2.style.display = "none";
			form3.style.display = "none";
			form5.style.display = "none";
			
			barraProgresso.style.width = "60%";
			barraProgresso.textContent = "60%";
		}
		
		function chamaForm5(){
			
			var form1 = document.getElementById('formulario1');
			var form2 = document.getElementById('formulario2');
			var form3 = document.getElementById('formulario3');
			var form4 = document.getElementById('formulario4');
			var form5 = document.getElementById('formulario5');
			var barraProgresso = document.getElementById('barraProgresso');
			
			form5.style.display = "block";
			form1.style.display = "none";
			form2.style.display = "none";
			form3.style.display = "none";
			form4.style.display = "none";
			
			barraProgresso.style.width = "80%";
			barraProgresso.textContent = "80%";
		}
		
		function someForms(){
		
			var form1 = document.getElementById('formulario1');
			var form2 = document.getElementById('formulario2');
			var form3 = document.getElementById('formulario3');
			var form4 = document.getElementById('formulario4');
			var form5 = document.getElementById('formulario5');
			var barraProgresso = document.getElementById('barraProgresso');
			
			form1.style.display = "none";
			form2.style.display = "none";
			form3.style.display = "none";
			form4.style.display = "none";
			form5.style.display = "none";
			
			barraProgresso.style.width = "100%";
			barraProgresso.textContent = "100%";
		}
		
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
	
		function salvarFichaTecnica(){
			
			alert("entrou");
			
			var nomePeca                   = document.getElementById("nomePeca").value;
			var numeroInventarioMuseu      = document.getElementById("numeroInventarioMuseu").value;
			var numeroInventarioProjeto    = document.getElementById("numeroInventarioProjeto").value;
			var localizacao                = document.getElementById("localizacao").value;
			var termoDoacao                = document.getElementById("termoDoacao").value;
			var fabricanteAutor            = document.getElementById("fabricanteAutor").value;
			var data                       = document.getElementById("data").value;
			var localAquisicao             = document.getElementById("localAquisicao").value;
			var tecido                     = document.getElementById("tecido").value;
			var composicao                 = document.getElementById("composicao").value;
			var bordado                    = document.getElementById("bordado").value;
			var tipologia                  = document.getElementById("tipologia").value;
			var pintura                    = document.getElementById("pintura").value;
			var tecnica                    = document.getElementById("tecnica").value;
			var dimensoes                  = document.getElementById("dimensoes").value;
			var metodoProducao             = document.getElementById("metodoProducao").value;
			//var count_imgs_desenho_tecnico = document.getElementById("desenhoTecnico");
			//var count_imgs_fotografia      = document.getElementById("fotografia");
			var countImgsDesenhoTecnico    = 0;
			var countImgsFotografia        = 0;
			var operacao                   = "ficha_tecnica";
			
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "ERRO"){
								//Deu erro
								alert("Erro!");
								
							}else{
								//Deu certo, então retorno possui o ID da peça
								//Pegar o ID da peça e setar nos HIDDEN
								
								idPeca = document.getElementById("idpeca");
								alert("DEU CERTO");
								idPeca.value = retorno;
							}
						}
						else{
							alert(ajax.statusText);
						}
					}
				}
				
				//Monta a QueryString
				dados = 'nomePeca='+nomePeca+
				       "&numeroInventarioMuseu="+numeroInventarioMuseu+
					   "&numeroInventarioProjeto="+numeroInventarioProjeto+
					   "&localizacao="+localizacao+
					   "&termoDoacao="+termoDoacao+
					   "&fabricanteAutor="+fabricanteAutor+
					   "&dataPeca="+data+
					   "&localAquisicao="+localAquisicao+
					   "&tecido="+tecido+
					   "&composicao="+composicao+
					   "&bordado="+bordado+
					   "&tipologia="+tipologia+
					   "&pintura="+pintura+
					   "&tecnica="+tecnica+
					   "&dimensoes="+dimensoes+
					   "&metodoProducao="+metodoProducao+
					   "&countImgsDesenhoTecnico="+countImgsDesenhoTecnico+
					   "&countImgsFotografia="+countImgsFotografia+
					   "&usuario="+"PEDRO"+
					   "&operacao="+operacao;
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'inserirPecaBD.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function salvarFichaCatalografica(){
			
			var idPeca                       = document.getElementById("idpeca").value;
			var classe                       = document.getElementById("classe").value;
			var subClasse                    = document.getElementById("subClasse").value;
			var tipo                         = document.getElementById("tipo").value;
			var historicoUso                 = document.getElementById("historicoUso").value;
			var possiveisUsos                = document.getElementById("possiveisUsos").value;
			var dataAquisicao                = document.getElementById("dataAquisicao").value;
			var tecnicaMaterial              = document.getElementById("tecnicaMaterial").value;
			var forma                        = document.getElementById("forma").value;
			var descricaoPeca                = document.getElementById("descricaoPeca").value;
			var dimensoes1                   = document.getElementById("dimensoes1").value;
			var descricaoPecasComplementares = document.getElementById("descricaoPecasComplementares").value;
			var fotosDetalhes                = document.getElementById("fotosDetalhes");
			var descricaoDetalhes            = document.getElementById("descricaoDetalhes").value;
			var observacoes1                 = document.getElementById("observacoes1").value;
			var operacao                     = "ficha_catalografica";
			
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "ERRO"){
								//Deu erro
								alert("Erro!");
								
							}else if(retorno == "OK"){
								
							}
						}
						else{
							alert(ajax.statusText);
						}
					}
				}
				
				//Monta a QueryString
				dados = 'idPeca='+idPeca+
				       "&classe="+classe+
					   "&subClasse="+subClasse+
					   "&tipo="+tipo+
					   "&historicoUso="+historicoUso+
					   "&possiveisUsos="+possiveisUsos+
					   "&dataAquisicao="+dataAquisicao+
					   "&tecnicaMaterial="+tecnicaMaterial+
					   "&forma="+forma+
					   "&descricaoPeca="+descricaoPeca+
					   "&dimensoes1="+dimensoes1+
					   "&descricaoPecasComplementares="+descricaoPecasComplementares+
					   "&fotosDetalhes="+fotosDetalhes+
					   "&descricaoDetalhes="+descricaoDetalhes+
					   "&observacoes1="+observacoes1+
					   "&operacao="+operacao;
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'inserirPecaBD.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function salvarFichaConservacao(){
			
			var idPeca                   = document.getElementById("idpeca").value;
			var numeroRegistro           = document.getElementById("numeroRegistro").value;
			var titulo                   = document.getElementById("titulo").value;
			var classe1                  = document.getElementById("classe1").value;
			var denominacao              = document.getElementById("denominacao").value;
			var estadoGeralConservacao   = document.getElementById("estadoGeralConservacao").value;
			var dadosVerificados         = document.getElementById("dadosVerificados").value;
			var procedimentosHigiene     = document.getElementById("procedimentosHigiene").value;
			var reparosRealizados        = document.getElementById("reparosRealizados").value;
			var acondicionamento         = document.getElementById("acondicionamento").value;
			var restauracaoConservacao   = document.getElementById("restauracaoConservacao").value;
			var procedimentosConservacao = document.getElementById("procedimentosConservacao").value;
			var observacoes2             = document.getElementById("observacoes2").value;
			var data1                    = document.getElementById("data1").value;
			var responsavelPreenchimento = document.getElementById("responsavelPreenchimento").value;
			var operacao                 = "ficha_conservacao";
			
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "ERRO"){
								//Deu erro
								alert("Erro!");
								
							}else if(retorno == "OK"){
								
							}
						}
						else{
							alert(ajax.statusText);
						}
					}
				}
				
				//Monta a QueryString
				dados = 'idPeca='+idPeca+
				       "&numeroRegistro="+numeroRegistro+
					   "&titulo="+titulo+
					   "&classe1="+classe1+
					   "&denominacao="+denominacao+
					   "&estadoGeralConservacao="+estadoGeralConservacao+
					   "&dadosVerificados="+dadosVerificados+
					   "&procedimentosHigiene="+procedimentosHigiene+
					   "&reparosRealizados="+reparosRealizados+
					   "&acondicionamento="+acondicionamento+
					   "&restauracaoConservacao="+restauracaoConservacao+
					   "&procedimentosConservacao="+procedimentosConservacao+
					   "&observacoes2="+observacoes2+
					   "&data1="+data1+
					   "&responsavelPreenchimento="+responsavelPreenchimento+
					   "&operacao="+operacao;
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'inserirPecaBD.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function salvarFichaVisualizacao(){
			
			var idPeca                    = document.getElementById("idpeca").value;
			var tipoAcervo                = document.getElementById("tipoAcervo");
			var numeroRegistro            = document.getElementById("numeroRegistro").value;
			var numeroRegistrosAntigos    = document.getElementById("numeroRegistrosAntigos").value;
			var sala                      = document.getElementById("sala").value;
			var estante                   = document.getElementById("estante").value;
			var prateleira                = document.getElementById("prateleira").value;
			var embalagem                 = document.getElementById("embalagem").value;
			var classe2                   = document.getElementById("classe2").value;
			var denominacao1              = document.getElementById("denominacao1").value;
			var tipo1                     = document.getElementById("tipo1").value;
			var titulo1                   = document.getElementById("titulo1").value;
			var autoria                   = document.getElementById("autoria").value;
			var colecao                   = document.getElementById("colecao").value;
			var tipoDataProducao          = document.getElementById("tipoDataProducao").value;
			var dataProducao              = document.getElementById("dataProducao").value;
			var localProducao             = document.getElementById("localProducao").value;
			var historicoPeca             = document.getElementById("historicoPeca").value;
			var eventosAssociados         = document.getElementById("eventosAssociados").value;
			var largura                   = document.getElementById("largura").value;
			var altura                    = document.getElementById("altura").value;
			var profundidade              = document.getElementById("profundidade").value;
			var circunferencia            = document.getElementById("circunferencia").value;
			var tecnica1                  = document.getElementById("tecnica1").value;
			var material                  = document.getElementById("material").value;
			var etiquetaComposicao        = document.getElementById("etiquetaComposicao").value;
			var descricaoConteudo         = document.getElementById("descricaoConteudo").value;
			var pecasComplementares       = document.getElementById("pecasComplementares").value;
			var descricaoPecasComp        = document.getElementById("descricaoPecasComp").value;
			var pecasRelacionadas         = document.getElementById("pecasRelacionadas").value;
			var descritores               = document.getElementById("descritores").value;
			var descritoresGeograficos    = document.getElementById("descritoresGeograficos").value;
			var documentosRelacionados    = document.getElementById("documentosRelacionados").value;
			var notasObservacoes          = document.getElementById("notasObservacoes").value;
			var valorPeca                 = document.getElementById("valorPeca").value;
			var seguradora                = document.getElementById("seguradora").value;
			var formasIncorporacao        = document.getElementById("formasIncorporacao").value;
			var tipoDataIncorporacao      = document.getElementById("tipoDataIncorporacao").value;
			var frequencias               = document.getElementById("frequencias");
			var procedencias              = document.getElementById("procedencias").value;
			var usoAcessoPecaFisica       = document.getElementById("usoAcessoPecaFisica").value;
			var usoAcessoRepresentante    = document.getElementById("usoAcessoRepresentante").value;
			var historicoCirculacao       = document.getElementById("historicoCirculacao").value;
			var direitos                  = document.getElementById("direitos").value;
			var catalogador               = document.getElementById("catalogador").value;
			var dataInicialCatalogacao    = document.getElementById("dataInicialCatalogacao").value;
			var dataFinalCatalogacao      = document.getElementById("dataFinalCatalogacao").value;
			var fontesPesquisaReferencias = document.getElementById("fontesPesquisaReferencias").value;
			var linkVisao                 = document.getElementById("linkVisao").value;
			var metaKeywords              = document.getElementById("metaKeywords").value;
			var metaDescription           = document.getElementById("metaDescription").value;
			var metaTitle                 = document.getElementById("metaTitle").value;
			var operacao                  = "visualizacao";
			
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "ERRO"){
								//Deu erro
								alert("Erro!");
								
							}else if(retorno == "OK"){
								
							}
						}
						else{
							alert(ajax.statusText);
						}
					}
				}
				
				//Monta a QueryString
				dados = 'idPeca='+idPeca+
				       "&tipoAcervo="+tipoAcervo+
					   "&numeroRegistro="+numeroRegistro+
					   "&numeroRegistrosAntigos="+numeroRegistrosAntigos+
					   "&sala="+sala+
					   "&estante="+estante+
					   "&prateleira="+prateleira+
					   "&embalagem="+embalagem+
					   "&classe2="+classe2+
					   "&denominacao1="+denominacao1+
					   "&tipo1="+tipo1+
					   "&titulo1="+titulo1+
					   "&autoria="+autoria+
					   "&colecao="+colecao+
					   "&tipoDataProducao="+tipoDataProducao+
					   "&dataProducao="+dataProducao+
					   "&localProducao="+localProducao+
					   "&historicoPeca="+historicoPeca+
					   "&eventosAssociados="+eventosAssociados+
					   "&largura="+largura+
					   "&altura="+altura+
					   "&profundidade="+profundidade+
					   "&circunferencia="+circunferencia+
					   "&tecnica1="+tecnica1+
					   "&material="+material+
					   "&etiquetaComposicao="+etiquetaComposicao+
					   "&descricaoConteudo="+descricaoConteudo+
					   "&pecasComplementares="+pecasComplementares+
					   "&descricaoPecasComp="+descricaoPecasComp+
					   "&pecasRelacionadas="+pecasRelacionadas+
					   "&descritores="+descritores+
					   "&descritoresGeograficos="+descritoresGeograficos+
					   "&documentosRelacionados="+documentosRelacionados+
					   "&notasObservacoes="+notasObservacoes+
					   "&valorPeca="+valorPeca+
					   "&seguradora="+seguradora+
					   "&formasIncorporacao="+formasIncorporacao+
					   "&tipoDataIncorporacao="+tipoDataIncorporacao+
					   "&frequencias="+frequencias+
					   "&procedencias="+procedencias+
					   "&usoAcessoPecaFisica="+usoAcessoPecaFisica+
					   "&usoAcessoRepresentante="+usoAcessoRepresentante+
					   "&historicoCirculacao="+historicoCirculacao+
					   "&direitos="+direitos+
					   "&catalogador="+catalogador+
					   "&dataInicialCatalogacao="+dataInicialCatalogacao+
					   "&dataFinalCatalogacao="+dataFinalCatalogacao+
					   "&fontesPesquisaReferencias="+fontesPesquisaReferencias+
					   "&linkVisao="+linkVisao+
					   "&metaKeywords="+metaKeywords+
					   "&metaDescription="+metaDescription+
					   "&metaTitle="+metaTitle+
					   "&operacao="+operacao;
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'inserirPecaBD.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function salvarFichaEnglishFields(){
			
			var idPeca                = document.getElementById("idpeca").value;
			var tituloIngles          = document.getElementById("tituloIngles").value;
			var autoriaIngles         = document.getElementById("autoriaIngles").value;
			var colecaoIngles         = document.getElementById("colecaoIngles").value;
			var historiaIngles        = document.getElementById("historiaIngles").value;
			var eventosIngles         = document.getElementById("eventosIngles").value;
			var conteudoIngles        = document.getElementById("conteudoIngles").value;
			var pecasCompIngles       = document.getElementById("pecasCompIngles").value;
			var descricaoPecasIngles  = document.getElementById("descricaoPecasIngles").value;
			var metaKeywordsIngles    = document.getElementById("metaKeywordsIngles").value;
			var metaDescriptionIngles = document.getElementById("metaDescriptionIngles").value;
			var metaTitleIngles       = document.getElementById("metaTitleIngles").value;
			var disponibilidadePeca   = document.getElementById("disponibilidadePeca").value;
			var fichaConservacao      = document.getElementById("fichaConservacao").value;
			var operacao              = "english_fields";
			
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == ""){
								//Deu erro
								alert("Erro!");
								
							}else if(retorno != ""){
								//Deu certo, então retorno possui o ID da peça
								//Pegar o ID da peça e setar nos HIDDEN
								
								idPeca = document.getElementById("idpeca");
								idPeca.value = retorno;
							}
						}
						else{
							alert(ajax.statusText);
						}
					}
				}
				
				//Monta a QueryString
				dados = 'idPeca='+idPeca+
				       "&tituloIngles="+tituloIngles+
					   "&autoriaIngles="+autoriaIngles+
					   "&colecaoIngles="+colecaoIngles+
					   "&historiaIngles="+historiaIngles+
					   "&eventosIngles="+eventosIngles+
					   "&conteudoIngles="+conteudoIngles+
					   "&pecasCompIngles="+pecasCompIngles+
					   "&descricaoPecasIngles="+descricaoPecasIngles+
					   "&metaKeywordsIngles="+metaKeywordsIngles+
					   "&metaDescriptionIngles="+metaDescriptionIngles+
					   "&metaTitleIngles="+metaTitleIngles+
					   "&disponibilidadePeca="+disponibilidadePeca+
					   "&fichaConservacao="+fichaConservacao+
					   "&operacao="+operacao;
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'inserirPecaBD.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}

		function buscarFichaTecnica(){
			var idPeca = document.getElementById("idpeca").value;
			var ficha  = "fichaTecnica";
			
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseXML;
							
							status = retorno.getElementsByTagName('status').item(0).firstChild.data;
							
							if(status == "OK"){
								
								var nomePeca                = retorno.getElementsByTagName('nomePeca').item(0).firstChild.data;
								var numeroInventarioMuseu   = retorno.getElementsByTagName('numeroInventarioMuseu').item(0).firstChild.data;
								var numeroInventarioProjeto = retorno.getElementsByTagName('numeroInventarioProjeto').item(0).firstChild.data;
								var localizacao             = retorno.getElementsByTagName('localizacao').item(0).firstChild.data;
								var termoDoacao             = retorno.getElementsByTagName('termoDoacao').item(0).firstChild.data;
								var fabricanteAutor         = retorno.getElementsByTagName('fabricanteAutor').item(0).firstChild.data;
								var data                    = retorno.getElementsByTagName('data').item(0).firstChild.data;
								var localAquisicao          = retorno.getElementsByTagName('localAquisicao').item(0).firstChild.data;
								var tecido                  = retorno.getElementsByTagName('tecido').item(0).firstChild.data;
								var composicao              = retorno.getElementsByTagName('composicao').item(0).firstChild.data;
								var bordado                 = retorno.getElementsByTagName('bordado').item(0).firstChild.data;
								var tipologia               = retorno.getElementsByTagName('tipologia').item(0).firstChild.data;
								var pintura                 = retorno.getElementsByTagName('pintura').item(0).firstChild.data;
								var tecnica                 = retorno.getElementsByTagName('tecnica').item(0).firstChild.data;
								var dimensoes               = retorno.getElementsByTagName('dimensoes').item(0).firstChild.data;
								var metodoProducao          = retorno.getElementsByTagName('metodoProducao').item(0).firstChild.data;
								var desenhoTecnico          = retorno.getElementsByTagName('desenhoTecnico').item(0).firstChild.data;
								var fotografia              = retorno.getElementsByTagName('fotografia').item(0).firstChild.data;
								
								chamaForm1();
								
								document.getElementById("nomePeca").value                = nomePeca;
								document.getElementById("numeroInventarioMuseu").value   = numeroInventarioMuseu;
								document.getElementById("numeroInventarioProjeto").value = numeroInventarioProjeto;
								document.getElementById("localizacao").value             = localizacao;
								document.getElementById("termoDoacao").value             = termoDoacao;
								document.getElementById("fabricanteAutor").value         = fabricanteAutor;
								document.getElementById("data").value                    = data;
								document.getElementById("localAquisicao").value          = localAquisicao;
								document.getElementById("tecido").value                  = tecido;
								document.getElementById("composicao").value 			 = composicao;
								document.getElementById("bordado").value                 = bordado;
								document.getElementById("tipologia").value               = tipologia;
								document.getElementById("pintura").value                 = pintura;
								document.getElementById("tecnica").value                 = tecnica;
								document.getElementById("dimensoes").value               = dimensoes;
								document.getElementById("metodoProducao").value          = metodoProducao;
								document.getElementById("desenhoTecnico").value          = desenhoTecnico;
								document.getElementById("fotografia").value              = fotografia;
								
							}else if(status != "EMPTY"){
								
								//Sem peça vinculada a tal Ficha
								alert("Vazio!");
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
				ajax.open('POST', 'inserirPecaBD.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function buscarFichaCatalografica(){
			var idPeca = document.getElementById("idpeca").value;
			var ficha  = "fichaCatalografica";
			
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == ""){
								//Deu erro
								alert("Erro!");
								
							}else if(retorno != ""){
								//Deu certo, então retorno possui o ID da peça
								//Pegar o ID da peça e setar nos HIDDEN
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
				ajax.open('POST', 'inserirPecaBD.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function buscarFichaConservacao(){
			var idPeca = document.getElementById("idpeca").value;
			var ficha  = "fichaConservacao";
			
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == ""){
								//Deu erro
								alert("Erro!");
								
							}else if(retorno != ""){
								//Deu certo, então retorno possui o ID da peça
								//Pegar o ID da peça e setar nos HIDDEN
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
				ajax.open('POST', 'inserirPecaBD.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function buscarFichaVisualizacao(){
			var idPeca = document.getElementById("idpeca").value;
			var ficha  = "fichaVisualizacao";
			
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == ""){
								//Deu erro
								alert("Erro!");
								
							}else if(retorno != ""){
								//Deu certo, então retorno possui o ID da peça
								//Pegar o ID da peça e setar nos HIDDEN
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
				ajax.open('POST', 'inserirPecaBD.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function buscarFichaEnglishFields(){
			var idPeca = document.getElementById("idpeca").value;
			var ficha  = "fichaEnglish";
			
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == ""){
								//Deu erro
								alert("Erro!");
								
							}else if(retorno != ""){
								//Deu certo, então retorno possui o ID da peça
								//Pegar o ID da peça e setar nos HIDDEN
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
				ajax.open('POST', 'inserirPecaBD.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function aumentaTextArea(){
			
			var textArea = document.getElementById('textArea');
			var alturaConteudo = textArea.get(0).scrollHeight;
			
			textArea.style.height = alturaConteudo+"px";
		}
		
		$("#nomePeca").on('input', function() {
			var scroll_height = $("#message-box").get(0).scrollHeight;

			$("#nomePeca").css('height', scroll_height + 'px');
		});
		
	</script>

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
		
			<div class="row mt-3">
				<div class="col-md-12">
					<div class="progress">
						<div class="progress-bar" id="barraProgresso" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
							0%
						</div>
					</div>
				</div>
			</div>
			
			</br>
			
			<hidden id="idpeca" name="idpeca"/>
			
			<button type="button" class="btn btn-info btn-block mb-2" onclick="formulario1();">Ficha técnica</button>
			
			<div class="border mb-5 mt-2 p-3" id="formulario1" style="display:block">
			<form role="form" action="">
			
				<p class="h4 text-center">Ficha Técnica</p>
				
				<hidden id="idpeca" name="idpeca"/>
			
				<div class="form-group">
					 
					<label for="nomePeca">
						Nome da peça:
					</label>
					<textarea rows="1" type="text" class="form-control" id="nomePeca" name="nomePeca"></textarea>
				</div>
				
				<div class="form-group">
					 
					<label for="numeroInventarioMuseu">
						Número de inventário ( Museu ):
					</label>
					<input type="number" class="form-control" id="numeroInventarioMuseu" name="numeroInventarioMuseu">
				</div>
				
				<div class="form-group">
					 
					<label for="numeroInventarioProjeto">
						Número de inventário ( Projeto ):
					</label>
					<input type="number" class="form-control" id="numeroInventarioProjeto" name="numeroInventarioProjeto">
				</div>
				
				<div class="form-group">
					 
					<label for="localizacao">
						Localização:
					</label>
					<input type="text" class="form-control" id="localizacao" name="localizacao">
				</div>
				
				<div class="form-group">
					 
					<label for="termoDoacao">
						Termo de doação:
					</label>
					<input type="text" class="form-control" id="termoDoacao" name="termoDoacao">
				</div>
				
				<div class="form-group">
					 
					<label for="fabricanteAutor">
						Fabricante / Autor:
					</label>
					<input type="text" class="form-control" id="fabricanteAutor" name="fabricanteAutor">
				</div>
				
				<div class="form-group">
					 
					<label for="data">
						Data:
					</label>
					<input type="text" class="form-control" id="data" name="data">
				</div>
				
				<div class="form-group">
					 
					<label for="localAquisicao">
						Local de aquisição:
					</label>
					<input type="text" class="form-control" id="localAquisicao" name="localAquisicao">
				</div>
				
				<div class="form-group">
					 
					<label for="tecido">
						Tecido:
					</label>
					<input type="text" class="form-control" id="tecido" name="tecido">
				</div>
				
				<div class="form-group">
					 
					<label for="composicao">
						Composição:
					</label>
					<input type="text" class="form-control" id="composicao" name="composicao">
				</div>
				
				<div class="form-group">
					 
					<label for="bordado">
						Bordado:
					</label>
					<input type="text" class="form-control" id="bordado" name="bordado">
				</div>
				
				<div class="form-group">
					 
					<label for="tipologia">
						Tipologia:
					</label>
					<input type="text" class="form-control" id="tipologia" name="tipologia">
				</div>
				
				<div class="form-group">
					 
					<label for="pintura">
						Pintura:
					</label>
					<input type="text" class="form-control" id="pintura" name="pintura">
				</div>
				
				<div class="form-group">
					 
					<label for="tecnica">
						Técnica:
					</label>
					<input type="text" class="form-control" id="tecnica" name="tecnica">
				</div>
				
				<div class="form-group">
					 
					<label for="dimensoes">
						Dimensões:
					</label>
					<input type="text" class="form-control" id="dimensoes" name="dimensoes">
				</div>

				<div class="form-group">
					 
					 <label for="dimensoes">
						 Método de Produção:
					 </label>
					 <input type="text" class="form-control" id="metodoProducao" name="metodoProducao">
				 </div>
				
				<div class="form-group">
					 
					<label for="desenhoTecnico">
						Desenho técnico (Frente e Costas):
					</label>
					<input type="file" class="form-control" id="desenhoTecnico" name="desenhoTecnico" multiple>
				</div>
				
				<div class="form-group">
					 
					<label for="fotografia">
						Fotografia (Frente e Costas):
					</label>
					<input type="file" class="form-control" id="fotografia" name="fotografia" multiple>
				</div>
				
				<div class="d-flex bd-highlight mx-5">
					<button type="button" class="btn btn-primary flex-fill" onclick="salvarFichaTecnica();">
						Submeter
					</button>
				</div>
				
			</form>
			</div>
			
			<button type="button" class="btn btn-info btn-block mb-2" onclick="formulario2();">Ficha catalográfica</button>
			
			<div class="border mb-5 mt-2 p-3" id="formulario2">
			<form role="form" style = "display:block">
			
				<p class="h4 text-center">Ficha Catalográfica</p>
				
				<hidden id="idpeca" name="idpeca"/>
			
				<div class="form-group">
					 
					<label for="classe">
						Classe:
					</label>
					<input type="text" class="form-control" id="classe" name="classe">
				</div>
				
				<div class="form-group">
					 
					<label for="subClasse">
						Subclasse:
					</label>
					<input type="text" class="form-control" id="subClasse" name="subClasse">
				</div>
				
				<div class="form-group">
					 
					<label for="tipo">
						Tipo:
					</label>
					<input type="text" class="form-control" id="tipo" name="tipo">
				</div>
				
				<div class="form-group">
					 
					<label for="historicoUso">
						Histórico de uso:
					</label>
					<input type="text" class="form-control" id="historicoUso" name="historicoUso">
				</div>
				
				<div class="form-group">
					 
					<label for="possiveisUsos">
						Possíveis usos da peça:
					</label>
					<input type="text" class="form-control" id="possiveisUsos" name="possiveisUsos">
				</div>
				
				<div class="form-group">
					 
					<label for="dataAquisicao">
						Data de aquisição:
					</label>
					<input type="date" class="form-control" id="dataAquisicao" name="dataAquisicao">
				</div>
				
				<div class="form-group">
					 
					<label for="tecnicaMaterial">
						Técnica / Material:
					</label>
					<input type="text" class="form-control" id="tecnicaMaterial" name="tecnicaMaterial">
				</div>
				
				<div class="form-group">
					 
					<label for="forma">
						Forma:
					</label>
					<input type="text" class="form-control" id="forma" name="forma">
				</div>
				
				<div class="form-group">
					 
					<label for="descricaoPeca">
						Descrição da peça:
					</label>
					<input type="text" class="form-control" id="descricaoPeca" name="descricaoPeca">
				</div>
				
				<div class="form-group">
					 
					<label for="dimensoes1">
						Dimensões:
					</label>
					<input type="text" class="form-control" id="dimensoes1" name="dimensoes1">
				</div>
				
				<div class="form-group">
					 
					<label for="descricaoPecasComplementares">
						Descrição de peças complementares:
					</label>
					<input type="text" class="form-control" id="descricaoPecasComplementares" name="descricaoPecasComplementares">
				</div>
				
				<div class="form-group">
					 
					<label for="fotosDetalhes">
						Fotos de detalhes:
					</label>
					<input type="file" class="form-control" id="fotosDetalhes" name="fotosDetalhes" multiple>
				</div>
				
				<div class="form-group">
					 
					<label for="descricaoDetalhes">
						Descrição dos detalhes:
					</label>
					<input type="text" class="form-control" id="descricaoDetalhes" name="descricaoDetalhes">
				</div>
				
				<div class="form-group">
					 
					<label for="observacoes1">
						Observações:
					</label>
					<input type="text" class="form-control" id="observacoes1" name="observacoes1">
				</div>
				
				<div class="d-flex bd-highlight">
					<button type="button" class="btn btn-primary flex-fill">
						Submeter
					</button>
				</div>
				
			</form>
			</div>
			
			<button type="button" class="btn btn-info btn-block mb-2" onclick="formulario3();">Ficha conservação</button>
			
			<div class="border mb-5 mt-2 p-3" id="formulario3" style = "display:block">
			<form role="form">
			
				<p class="h4 text-center">Ficha de Conservação</p>
				
				<hidden id="idpeca" name="idpeca"/>
			
				<div class="form-group">
					 
					<label for="numeroRegistro">
						Número de registro:
					</label>
					<input type="text" class="form-control" id="numeroRegistro" name="numeroRegistro">
				</div>
				
				<div class="form-group">
					 
					<label for="titulo">
						Título:
					</label>
					<input type="text" class="form-control" id="titulo" name="titulo">
				</div>
				
				<div class="form-group">
					 
					<label for="classe1">
						Classe:
					</label>
					<input type="text" class="form-control" id="classe1" name="classe1">
				</div>
				
				<div class="form-group">
					 
					<label for="denominacao">
						Denominação:
					</label>
					<input type="text" class="form-control" id="denominacao" name="denominacao">
				</div>
				
				<div class="form-group">
					 
					<label for="estadoGeralConservacao">
						Estado geral de conservação:
					</label>
					<input type="text" class="form-control" id="estadoGeralConservacao" name="estadoGeralConservacao">
				</div>
				
				<div class="form-group">
					 
					<label for="dadosVerificados">
						Danos verificados:
					</label>
					<input type="text" class="form-control" id="dadosVerificados" name="dadosVerificados">
				</div>
				
				<div class="form-group">
					 
					<label for="procedimentosHigiene">
						Procedimentos de higienização:
					</label>
					<input type="text" class="form-control" id="procedimentosHigiene" name="procedimentosHigiene">
				</div>
				
				<div class="form-group">
					 
					<label for="reparosRealizados">
						Reparos realizados:
					</label>
					<input type="text" class="form-control" id="reparosRealizados" name="reparosRealizados">
				</div>
				
				<div class="form-group">
					 
					<label for="acondicionamento">
						Acondicionamento:
					</label>
					<input type="text" class="form-control" id="acondicionamento" name="acondicionamento">
				</div>
				
				<div class="form-group">
					 
					<label for="restauracaoConservacao">
						Restauração ou conservação preventiva:
					</label>
					<input type="text" class="form-control" id="restauracaoConservacao" name="restauracaoConservacao">
				</div>
				
				<div class="form-group">
					 
					<label for="procedimentosConservacao">
						Procedimentos de conservação preventiva:
					</label>
					<input type="text" class="form-control" id="procedimentosConservacao" name="procedimentosConservacao">
				</div>
				
				<div class="form-group">
					 
					<label for="observacoes2">
						Observações:
					</label>
					<input type="text" class="form-control" id="observacoes2" name="observacoes2">
				</div>
				
				<div class="form-group">
					 
					<label for="data1">
						Data
					</label>
					<input type="date" class="form-control" id="data1" name="data1">
				</div>
				
				<div class="form-group">
					 
					<label for="responsavelPreenchimento">
						Responsável pelo preenchimento:
					</label>
					<input type="text" class="form-control" id="responsavelPreenchimento" name="responsavelPreenchimento">
				</div>
				
				<div class="d-flex bd-highlight">
					<button type="button" class="btn btn-primary flex-fill">
						Submeter
					</button>
				</div>
				
			</form>
			</div>
			
			<button type="button" class="btn btn-info btn-block mb-2" onclick="formulario4();">Ficha visualização</button>
			
			<div class="border mb-5 mt-2 p-3"  id="formulario4" style = "display:block">
			<form role="form">
			
				<p class="h4 text-center">Visualização Vestuário / Têxtil</p>
				
				<hidden id="idpeca" name="idpeca"/>
			
				<div class="form-group">
					 
					<label for="tipoAcervo">
						Tipo de acervo:
					</label>
					<input type="text" class="form-control" id="tipoAcervo" name="tipoAcervo">
				</div>
				
				<div class="form-group">
					 
					<label for="numeroRegistro">
						Número de registro:
					</label>
					<input type="text" class="form-control" id="numeroRegistro" name="numeroRegistro">
				</div>
				
				<div class="form-group">
					 
					<label for="numeroRegistrosAntigos">
						Números de registro antigos:
					</label>
					<input type="text" class="form-control" id="numeroRegistrosAntigos" name="numeroRegistrosAntigos">
				</div>
				
				<div class="form-group">
					 
					<label for="sala">
						Sala:
					</label>
					<input type="text" class="form-control" id="sala" name="sala">
				</div>
				
				<div class="form-group">
					 
					<label for="estante">
						Estante:
					</label>
					<input type="text" class="form-control" id="estante" name="estante">
				</div>
				
				<div class="form-group">
					 
					<label for="prateleira">
						Prateleira:
					</label>
					<input type="text" class="form-control" id="prateleira" name="prateleira">
				</div>
				
				<div class="form-group">
					 
					<label for="embalagem">
						Embalagem:
					</label>
					<input type="text" class="form-control" id="embalagem" name="embalagem">
				</div>
				
				<div class="form-group">
					 
					<label for="classe2">
						Classe:
					</label>
					<input type="text" class="form-control" id="classe2" name="classe2">
				</div>
				
				<div class="form-group">
					 
					<label for="denominacao1">
						Denominação:
					</label>
					<input type="text" class="form-control" id="denominacao1" name="denominacao1">
				</div>
				
				<div class="form-group">
					 
					<label for="tipo1">
						Tipo:
					</label>
					<input type="text" class="form-control" id="tipo1" name="tipo1">
				</div>
				
				<div class="form-group">
					 
					<label for="titulo1">
						Título:
					</label>
					<input type="text" class="form-control" id="titulo1" name="titulo1">
				</div>
				
				<div class="form-group">
					 
					<label for="autoria">
						Autoria:
					</label>
					<input type="text" class="form-control" id="autoria" name="autoria">
				</div>
				
				<div class="form-group">
					 
					<label for="colecao">
						Coleção:
					</label>
					<input type="text" class="form-control" id="colecao" name="colecao">
				</div>
				
				<div class="form-group">
					 
					<label for="tipoDataProducao">
						Tipo de data de produção:
					</label>
					<input type="text" class="form-control" id="tipoDataProducao" name="tipoDataProducao">
				</div>
				
				<div class="form-group">
					 
					<label for="dataProducao">
						Data de produção:
					</label>
					<input type="text" class="form-control" id="dataProducao" name="dataProducao">
				</div>
				
				<div class="form-group">
					 
					<label for="localProducao">
						Local de produção:
					</label>
					<input type="text" class="form-control" id="localProducao" name="localProducao">
				</div>
				
				<div class="form-group">
					 
					<label for="historicoPeca">
						Histórico da peça:
					</label>
					<input type="text" class="form-control" id="historicoPeca" name="historicoPeca">
				</div>
				
				<div class="form-group">
					 
					<label for="eventosAssociados">
						Eventos associados:
					</label>
					<input type="text" class="form-control" id="eventosAssociados" name="eventosAssociados">
				</div>
				
				<div class="form-group">
					 
					<label for="largura">
						Largura:
					</label>
					<input type="text" class="form-control" id="largura" name="largura">
				</div>
				
				<div class="form-group">
					 
					<label for="altura">
						Altura:
					</label>
					<input type="text" class="form-control" id="altura" name="altura">
				</div>
				
				<div class="form-group">
					 
					<label for="profundidade">
						Profundidade:
					</label>
					<input type="text" class="form-control" id="profundidade" name="profundidade">
				</div>
				
				<div class="form-group">
					 
					<label for="circunferencia">
						Circunferência:
					</label>
					<input type="text" class="form-control" id="circunferencia" name="circunferencia">
				</div>
				
				<div class="form-group">
					 
					<label for="tecnica1">
						Técnica:
					</label>
					<input type="text" class="form-control" id="tecnica1" name="tecnica1">
				</div>
				
				<div class="form-group">
					 
					<label for="material">
						Material:
					</label>
					<input type="text" class="form-control" id="material" name="material">
				</div>
				
				<div class="form-group">
					 
					<label for="etiquetaComposicao">
						Etiqueta de composição:
					</label>
					<input type="text" class="form-control" id="etiquetaComposicao" name="etiquetaComposicao">
				</div>
				
				<div class="form-group">
					 
					<label for="descricaoConteudo">
						Descrição / Conteúdo:
					</label>
					<input type="text" class="form-control" id="descricaoConteudo" name="descricaoConteudo">
				</div>
				
				<div class="form-group">
					 
					<label for="pecasComplementares">
						Peças complementares:
					</label>
					<input type="text" class="form-control" id="pecasComplementares" name="pecasComplementares">
				</div>
				
				<div class="form-group">
					 
					<label for="descricaoPecasComp">
						Descrição das peças complementares:
					</label>
					<input type="text" class="form-control" id="descricaoPecasComp" name="descricaoPecasComp">
				</div>
				
				<div class="form-group">
					 
					<label for="pecasRelacionadas">
						Peças relacionadas:
					</label>
					<input type="text" class="form-control" id="pecasRelacionadas" name="pecasRelacionadas">
				</div>
				
				<div class="form-group">
					 
					<label for="descritores">
						Descritores:
					</label>
					<input type="text" class="form-control" id="descritores" name="descritores">
				</div>
				
				<div class="form-group">
					 
					<label for="descritoresGeograficos">
						Descritores geográficos:
					</label>
					<input type="text" class="form-control" id="descritoresGeograficos" name="descritoresGeograficos">
				</div>
				
				<div class="form-group">
					 
					<label for="documentosRelacionados">
						Documentos relacionados:
					</label>
					<input type="text" class="form-control" id="documentosRelacionados" name="documentosRelacionados">
				</div>
				
				<div class="form-group">
					 
					<label for="notasObservacoes">
						Notas e observações:
					</label>
					<input type="text" class="form-control" id="notasObservacoes" name="notasObservacoes">
				</div>
				
				<div class="form-group">
					 
					<label for="valorPeca">
						Valor da peça:
					</label>
					<input type="text" class="form-control" id="valorPeca" name="valorPeca">
				</div>
				
				<div class="form-group">
					 
					<label for="seguradora">
						Seguradora:
					</label>
					<input type="text" class="form-control" id="seguradora" name="seguradora">
				</div>
				
				<div class="form-group">
					 
					<label for="valorSeguro">
						Valor do seguro:
					</label>
					<input type="text" class="form-control" id="valorSeguro" name="valorSeguro">
				</div>
				
				<div class="form-group">
					 
					<label for="formasIncorporacao">
						Formas de incorporação:
					</label>
					<input type="text" class="form-control" id="formasIncorporacao" name="formasIncorporacao">
				</div>
				
				<div class="form-group">
					 
					<label for="tipoDataIncorporacao">
						Tipo de data de incorporação:
					</label>
					<input type="text" class="form-control" id="tipoDataIncorporacao" name="tipoDataIncorporacao">
				</div>
				
				<div class="form-group">
					 
					<label for="frequencias">
						Frequências:
					</label>
					<input type="text" class="form-control" id="frequencias" name="frequencias">
				</div>
				
				<div class="form-group">
					 
					<label for="procedencias">
						Procedências:
					</label>
					<input type="text" class="form-control" id="procedencias" name="procedencias">
				</div>
				
				<div class="form-group">
					 
					<label for="usoAcessoPecaFisica">
						Uso e acesso peça física:
					</label>
					<input type="text" class="form-control" id="usoAcessoPecaFisica" name="usoAcessoPecaFisica">
				</div>
				
				<div class="form-group">
					 
					<label for="usoAcessoRepresentante">
						Uso e acesso representante digital:
					</label>
					<input type="text" class="form-control" id="usoAcessoRepresentante" name="usoAcessoRepresentante">
				</div>
				
				<div class="form-group">
					 
					<label for="historicoCirculacao">
						Histórico de circulação:
					</label>
					<input type="text" class="form-control" id="historicoCirculacao" name="historicoCirculacao">
				</div>
				
				<div class="form-group">
					 
					<label for="direitos">
						Direitos:
					</label>
					<input type="text" class="form-control" id="direitos" name="direitos">
				</div>
				
				<div class="form-group">
					 
					<label for="catalogador">
						Catalogador:
					</label>
					<input type="text" class="form-control" id="catalogador" name="catalogador">
				</div>
				
				<div class="form-group">
					 
					<label for="dataInicialCatalogacao">
						Data inicial de catalogação:
					</label>
					<input type="text" class="form-control" id="dataInicialCatalogacao" name="dataInicialCatalogacao">
				</div>
				
				<div class="form-group">
					 
					<label for="dataFinalCatalogacao">
						Data final de catalogação:
					</label>
					<input type="text" class="form-control" id="dataFinalCatalogacao" name="dataFinalCatalogacao">
				</div>
				
				<div class="form-group">
					 
					<label for="fontesPesquisaReferencias">
						Fontes de pesquisa e referências:
					</label>
					<input type="text" class="form-control" id="fontesPesquisaReferencias" name="fontesPesquisaReferencias">
				</div>
				
				<div class="form-group">
					 
					<label for="linkVisao">
						Link visão 360°:
					</label>
					<input type="text" class="form-control" id="linkVisao" name="linkVisao">
				</div>
				
				<div class="form-group">
					 
					<label for="metaKeywords">
						Meta keywords:
					</label>
					<input type="text" class="form-control" id="metaKeywords" name="metaKeywords">
				</div>
				
				<div class="form-group">
					 
					<label for="metaDescription">
						Meta description:
					</label>
					<input type="text" class="form-control" id="metaDescription" name="metaDescription">
				</div>
				
				<div class="form-group">
					 
					<label for="metaTitle">
						Meta title:
					</label>
					<input type="text" class="form-control" id="metaTitle" name="metaTitle">
				</div>
				
				<div class="d-flex bd-highlight">
					<button type="button" class="btn btn-primary flex-fill">
						Submeter
					</button>
				</div>
				
			</form>
			</div>
			
			<button type="button" class="btn btn-info btn-block mb-2" onclick="formulario5();">Ficha english fields</button>
		
			<div class="border mb-5 mt-2 p-3" id="formulario5" style = "display:block">
			<form role="form">
			
				<p class="h4 text-center">English Fields</p>

			
				<div class="form-group">
					 
					<label for="tituloIngles">
						Título em inglês:
					</label>
					<input type="text" class="form-control" id="tituloIngles" name="tituloIngles">
				</div>
				
				<div class="form-group">
					 
					<label for="autoriaIngles">
						Autoria em inglês:
					</label>
					<input type="text" class="form-control" id="autoriaIngles" name="autoriaIngles">
				</div>
				
				<div class="form-group">
					 
					<label for="colecaoIngles">
						Coleção em inglês:
					</label>
					<input type="text" class="form-control" id="colecaoIngles" name="colecaoIngles">
				</div>
				
				<div class="form-group">
					 
					<label for="historiaIngles">
						História em inglês:
					</label>
					<input type="text" class="form-control" id="historiaIngles" name="historiaIngles">
				</div>
				
				<div class="form-group">
					 
					<label for="eventosIngles">
						Eventos associados em inglês:
					</label>
					<input type="text" class="form-control" id="eventosIngles" name="eventosIngles">
				</div>

				<div class="form-group">
					 
					<label for="conteudoIngles">
						Conteúdos em inglês:
					</label>
					<input type="text" class="form-control" id="conteudoIngles" name="conteudoIngles">
				</div>

				<div class="form-group">
					 
					<label for="pecasCompIngles">
						Peças complementares em inglês:
					</label>
					<input type="text" class="form-control" id="pecasCompIngles" name="pecasCompIngles">
				</div>
				
				<div class="form-group">
					 
					<label for="descricaoPecasIngles">
						Descrição das peças complementares em inglês:
					</label>
					<input type="text" class="form-control" id="descricaoPecasIngles" name="descricaoPecasIngles">
				</div>
				
				<div class="form-group">
					 
					<label for="metaKeywordsIngles">
						Meta keywords em inglês:
					</label>
					<input type="text" class="form-control" id="metaKeywordsIngles" name="metaKeywordsIngles">
				</div>
				
				<div class="form-group">
					 
					<label for="metaDescriptionIngles">
						Meta description em inglês:
					</label>
					<input type="text" class="form-control" id="metaDescriptionIngles" name="metaDescriptionIngles">
				</div>
				
				<div class="form-group">
					 
					<label for="metaTitleIngles">
						Meta title em inglês:
					</label>
					<input type="text" class="form-control" id="metaTitleIngles" name="metaTitleIngles">
				</div>
				
				<div class="form-group">
					 
					<label for="disponibilidadePeca">
						Disponibilidade da peça:
					</label>
					<input type="text" class="form-control" id="disponibilidadePeca" name="disponibilidadePeca">
				</div>
				
				<div class="form-group">
					 
					<label for="fichaConservacao">
						Ficha de conservação:
					</label>
					<input type="text" class="form-control" id="fichaConservacao" name="fichaConservacao">
				</div>
				
				<div class="d-flex bd-highlight">
					<button type="button" class="btn btn-primary flex-fill">
						Submeter
					</button>
				</div>
				
			</form>
			</div>
			
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