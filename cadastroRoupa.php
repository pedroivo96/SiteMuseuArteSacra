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
	
	
		function chamaForm2(){
		
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
		
			<form role="form" id="formulario1" style = "display : block">
			
				<p class="h4 text-center">Ficha Técnica</p>
			
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
					<input type="date" class="form-control" id="data" name="data">
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
				
				<div class="d-flex bd-highlight">
				
					<button type="button" class="btn btn-primary flex-fill mr-5">
						Voltar
					</button>
				
					<button type="button" class="btn btn-primary flex-fill" onclick="chamaForm2();">
						Próxima
					</button>
				</div>
				
			</form>
			
			<form role="form" id="formulario2" style = "display : none">
			
				<p class="h4 text-center">Ficha Catalográfica</p>
			
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
					<input type="date" class="form-control" id="historicoUso" name="historicoUso">
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
				
					<button type="button" class="btn btn-primary flex-fill mr-5">
						Voltar
					</button>
				
					<button type="button" class="btn btn-primary flex-fill" onclick="chamaForm3();">
						Próxima
					</button>
				</div>
				
			</form>
			
			
			<form role="form" id="formulario3" style = "display : none">
			
				<p class="h4 text-center">Ficha de Conservação</p>
			
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
				
					<button type="button" class="btn btn-primary flex-fill mr-5">
						Voltar
					</button>
				
					<button type="button" class="btn btn-primary flex-fill" onclick="chamaForm4();">
						Próxima
					</button>
				</div>
				
			</form>
			

			<form role="form" id="formulario4" style = "display : none">
			
				<p class="h4 text-center">Visualização Vestuário / Têxtil</p>
			
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
					 
					<label for="classe">
						Classe:
					</label>
					<input type="text" class="form-control" id="classe" name="classe">
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
				
					<button type="button" class="btn btn-primary flex-fill mr-5">
						Voltar
					</button>
				
					<button type="button" class="btn btn-primary flex-fill" onclick="chamaForm5();">
						Próxima
					</button>
				</div>
				
			</form>
			
			<form role="form" id="formulario5" style = "display : none">
			
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
				
					<button type="button" class="btn btn-primary flex-fill mr-5">
						Voltar
					</button>
				
					<button type="button" class="btn btn-primary flex-fill" onclick="someForms();">
						Próxima
					</button>
				</div>
				
			</form>
			
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