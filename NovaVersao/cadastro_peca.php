<!DOCTYPE html>
<html lang="en">
  <head>
  
	<?php
		session_start(); 
		include './conexao_museu.php';
 
		// Verifica se existe os dados da sessão de login 
		if(!isset($_SESSION["nome_usuario"])) { 
			// Usuário não logado! Redireciona para a página de login 
			header("Location: index.php"); 
			exit; 
		} 
		
	?>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Museu de Arte Sacra</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css3/bootstrap.min.css" rel="stylesheet">
    <link href="css3/style.css" rel="stylesheet">
	
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
		
		function mostrarOcultarFichaTecnica(){
			
			if(document.getElementById("ficha_tecnica").className == "d-block mb-2"){
				document.getElementById("ficha_tecnica").className = "d-none mb-2";
			}
			else{
				document.getElementById("ficha_tecnica").className = "d-block mb-2";
			}
		}
		
		function mostrarOcultarFichaCatalografica(){
			
			if(document.getElementById("ficha_catalografica").className == "d-block mb-2"){
				document.getElementById("ficha_catalografica").className = "d-none mb-2";
			}
			else{
				document.getElementById("ficha_catalografica").className = "d-block mb-2";
			}
		}
		
		function mostrarOcultarFichaConservacao(){
			
			if(document.getElementById("ficha_conservacao").className == "d-block mb-2"){
				document.getElementById("ficha_conservacao").className = "d-none mb-2";
			}
			else{
				document.getElementById("ficha_conservacao").className = "d-block mb-2";
			}
		}
		
		function mostrarOcultarFichaVisualização(){
			
			if(document.getElementById("ficha_visualizacao").className == "d-block mb-2"){
				document.getElementById("ficha_visualizacao").className = "d-none mb-2";
			}
			else{
				document.getElementById("ficha_visualizacao").className = "d-block mb-2";
			}
		}
		
		function mostrarOcultarFichaEnglishFields(){
			
			if(document.getElementById("ficha_english_fields").className == "d-block mb-2"){
				document.getElementById("ficha_english_fields").className = "d-none mb-2";
			}
			else{
				document.getElementById("ficha_english_fields").className = "d-block mb-2";
			}
		}
		
		function salvarFichaTecnica(){
			
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "ERRO"){
								
								alert("ERRO");
								
							}else{
								
								id_peca = retorno;
								
								document.getElementById("id_peca").value = retorno;
								document.getElementById("id_peca1").value = retorno;
							}
						}
						else{
							alert(ajax.statusText);
						}
						
					}
				}
				
				nome_usuario              = document.getElementById("nome_usuario").value;
				operacao = "fichas_tecnicas";
				
				nome_peca                 = document.getElementById("nome_peca").value;
				numero_inventario_museu   = document.getElementById("numero_inventario_museu").value;
				numero_inventario_projeto = document.getElementById("numero_inventario_projeto").value;
				localizacao               = document.getElementById("localizacao").value;
				termo_doacao              = document.getElementById("termo_doacao").value;
				fabricante_autor          = document.getElementById("fabricante_autor").value;
				data                      = document.getElementById("data").value;
				local_aquisicao           = document.getElementById("local_aquisicao").value;
				tecido                    = document.getElementById("tecido").value;
				composicao                = document.getElementById("composicao").value;
				bordado                   = document.getElementById("bordado").value;
				tipologia                 = document.getElementById("tipologia").value;
				pintura                   = document.getElementById("pintura").value;
				tecnica                   = document.getElementById("tecnica").value;
				dimensoes                 = document.getElementById("dimensoes").value;
				metodo_producao           = document.getElementById("metodo_producao").value;
				
				
				//Monta a QueryString
				dados = 'nome_usuario='+nome_usuario+
				        "&operacao="+operacao+
						"&nome_peca="+nome_peca+
						"&numero_inventario_museu="+numero_inventario_museu+
						"&numero_inventario_projeto="+numero_inventario_projeto+
						"&localizacao="+localizacao+
						"&termo_doacao="+termo_doacao+
						"&fabricante_autor="+fabricante_autor+
						"&data="+data+
						"&local_aquisicao="+local_aquisicao+
						"&tecido="+tecido+
						"&composicao="+composicao+
						"&bordado="+bordado+
						"&tipologia="+tipologia+
						"&pintura="+pintura+
						"&tecnica="+tecnica+
						"&dimensoes="+dimensoes+
						"&metodo_producao="+metodo_producao;
						
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'cadastrar_fichas.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function salvarFichaCatalografica(){
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "ERRO"){
								
								alert("ERRO");
								
							}else{
								
								id_peca = retorno;
								
								document.getElementById("id_peca").value = retorno;
							}
						}
						else{
							alert(ajax.statusText);
						}
						
					}
				}
				
				id_peca  = document.getElementById("id_peca").value;
				operacao = "fichas_catalograficas";
				
				classe                          = document.getElementById("classe").value;
				sub_classe                      = document.getElementById("sub_classe").value;
				tipo                            = document.getElementById("tipo").value;
				historico_uso                   = document.getElementById("historico_uso").value;
				possiveis_usos                  = document.getElementById("possiveis_usos").value;
				data_aquisicao                  = document.getElementById("data_aquisicao").value;
				tecnica_material                = document.getElementById("tecnica_material").value;
				forma                           = document.getElementById("forma").value;
				descricao_peca                  = document.getElementById("descricao_peca").value;
				dimensoes                       = document.getElementById("dimensoes1").value;
				descricao_pecas_complementares  = document.getElementById("descricao_pecas_complementares").value;
				observacoes                     = document.getElementById("observacoes").value;
				descricao_detalhes              = document.getElementById("descricao_detalhes").value;
				
				//Monta a QueryString
				dados = 'id_peca='+id_peca+
				        "&operacao="+operacao+
						"&classe="+classe+
						"&sub_classe="+sub_classe+
						"&tipo="+tipo+
						"&historico_uso="+historico_uso+
						"&possiveis_usos="+possiveis_usos+
						"&data_aquisicao="+data_aquisicao+
						"&tecnica_material="+tecnica_material+
						"&forma="+forma+
						"&descricao_peca="+descricao_peca+
						"&dimensoes="+dimensoes+
						"&descricao_pecas_complementares="+descricao_pecas_complementares+
						"&observacoes="+observacoes+
						"&descricao_detalhes="+descricao_detalhes;
						
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'cadastrar_fichas.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function salvarFichaConservacao(){
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "ERRO"){
								
								alert("ERRO");
								
							}else{
								
								id_peca = retorno;
								
								document.getElementById("id_peca").value = retorno;
							}
						}
						else{
							alert(ajax.statusText);
						}
						
					}
				}
				
				id_peca  = document.getElementById("id_peca").value;
				operacao = "fichas_conservacao";
				
				numero_registro            = document.getElementById("numero_registro").value;
				titulo                     = document.getElementById("titulo").value;
				classe                     = document.getElementById("classe1").value;
				denominacao                = document.getElementById("denominacao").value;
				estado_geral_conservacao   = document.getElementById("estado_geral_conservacao").value;
				danos_verificados          = document.getElementById("danos_verificados").value;
				procedimentos_higiene      = document.getElementById("procedimentos_higiene").value;
				reparos_realizados         = document.getElementById("reparos_realizados").value;
				acondicionamento           = document.getElementById("acondicionamento").value;
				restauracao_conservacao    = document.getElementById("restauracao_conservacao").value;
				procedimentos_conservacao  = document.getElementById("procedimentos_conservacao").value;
				observacoes                = document.getElementById("observacoes1").value;
				data                       = document.getElementById("data1").value;
				responsavel_preenchimento  = document.getElementById("responsavel_preenchimento").value;
				
				//Monta a QueryString
				dados = 'id_peca='+id_peca+
				        "&operacao="+operacao+
						"&numero_registro="+numero_registro+
						"&titulo="+titulo+
						"&classe="+classe+
						"&denominacao="+denominacao+
						"&estado_geral_conservacao="+estado_geral_conservacao+
						"&danos_verificados="+danos_verificados+
						"&procedimentos_higiene="+procedimentos_higiene+
						"&reparos_realizados="+reparos_realizados+
						"&acondicionamento="+acondicionamento+
						"&restauracao_conservacao="+restauracao_conservacao+
						"&procedimentos_conservacao="+procedimentos_conservacao+
						"&observacoes="+observacoes+
						"&data="+data+
						"&responsavel_preenchimento="+responsavel_preenchimento;
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'cadastrar_fichas.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function salvarFichaVisualizacao(){
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "ERRO"){
								
								alert("ERRO");
								
							}else{
								
								id_peca = retorno;
								
								document.getElementById("id_peca").value = retorno;
							}
						}
						else{
							alert(ajax.statusText);
						}
						
					}
				}
				
				id_peca  = document.getElementById("id_peca").value;
				operacao = "fichas_visualizacao";
				
				tipo_acervo                  = document.getElementById("tipo_acervo").value;
				numero_registro              = document.getElementById("numero_registro").value;
				numero_registros_antigos     = document.getElementById("numero_registros_antigos").value;
				sala                         = document.getElementById("sala").value;
				estante                      = document.getElementById("estante").value;
				prateleira                   = document.getElementById("prateleira").value;
				embalagem                    = document.getElementById("embalagem").value;
				classe                       = document.getElementById("classe2").value;
				denominacao                  = document.getElementById("denominacao1").value;
				tipo                         = document.getElementById("tipo1").value;
				titulo                       = document.getElementById("titulo1").value;
				autoria                      = document.getElementById("autoria").value;
				colecao                      = document.getElementById("colecao").value;
				tipo_data_producao           = document.getElementById("tipo_data_producao").value;
				data_producao                = document.getElementById("data_producao").value;
				local_producao               = document.getElementById("local_producao").value;
				historico_peca               = document.getElementById("historico_peca").value;
				eventos_associados           = document.getElementById("eventos_associados").value;
				largura                      = document.getElementById("largura").value;
				altura                       = document.getElementById("altura").value;
				profundidade                 = document.getElementById("profundidade").value;
				circunferencia               = document.getElementById("circunferencia").value;
				tecnica                      = document.getElementById("tecnica1").value;
				material                     = document.getElementById("material").value;
				etiqueta_composicao          = document.getElementById("etiqueta_composicao").value;
				descricao_conteudo           = document.getElementById("descricao_conteudo").value;
				pecas_complementares         = document.getElementById("pecas_complementares").value;
				descricao_pecas_comp         = document.getElementById("descricao_pecas_comp").value;
				pecas_relacionadas           = document.getElementById("pecas_relacionadas").value;
				descritores                  = document.getElementById("descritores").value;
				descritores_geograficos      = document.getElementById("descritores_geograficos").value;
				documentos_relacionados      = document.getElementById("documentos_relacionados").value;
				notas_observacoes            = document.getElementById("notas_observacoes").value;
				valor_peca                   = document.getElementById("valor_peca").value;
				seguradora                   = document.getElementById("seguradora").value;
				valor_seguro                 = document.getElementById("valor_seguro").value;
				formas_incorporacao          = document.getElementById("formas_incorporacao").value;
				tipo_data_incorporacao       = document.getElementById("tipo_data_incorporacao").value;
				frequencias                  = document.getElementById("frequencias").value;
				procedencias                 = document.getElementById("procedencias").value;
				uso_acesso_peca_fisica       = document.getElementById("uso_acesso_peca_fisica").value;
				uso_acesso_representante     = document.getElementById("uso_acesso_representante").value;
				historico_circulacao         = document.getElementById("historico_circulacao").value;
				direitos                     = document.getElementById("direitos").value;
				catalogador                  = document.getElementById("catalogador").value;
				data_inicial_catalogacao     = document.getElementById("data_inicial_catalogacao").value;
				data_final_catalogacao       = document.getElementById("data_final_catalogacao").value;
				fontes_pesquisa_referencias  = document.getElementById("fontes_pesquisa_referencias").value;
				link_visao                   = document.getElementById("link_visao").value;
				meta_keywords                = document.getElementById("meta_keywords").value;
				meta_description             = document.getElementById("meta_description").value;
				meta_title                   = document.getElementById("meta_title").value;
				
				//Monta a QueryString
				dados = 'id_peca='+id_peca+
				        "&operacao="+operacao+
						"&tipo_acervo="+tipo_acervo+
						"&numero_registro="+numero_registro+
						"&numero_registros_antigos="+numero_registros_antigos+
						"&sala="+sala+
						"&estante="+estante+
						"&prateleira="+prateleira+
						"&embalagem="+embalagem+
						"&classe="+classe+
						"&denominacao="+denominacao+
						"&tipo="+tipo+
						"&titulo="+titulo+
						"&autoria="+autoria+
						"&colecao="+colecao+
						"&tipo_data_producao="+tipo_data_producao+
						"&data_producao="+data_producao+
						"&local_producao="+local_producao+
						"&historico_peca="+historico_peca+
						"&eventos_associados="+eventos_associados+
						"&largura="+largura+
						"&altura="+altura+
						"&profundidade="+profundidade+
						"&circunferencia="+circunferencia+
						"&tecnica="+tecnica+
						"&material="+material+
						"&etiqueta_composicao="+etiqueta_composicao+
						"&descricao_conteudo="+descricao_conteudo+
						"&pecas_complementares="+pecas_complementares+
						"&descricao_pecas_comp="+descricao_pecas_comp+
						"&pecas_relacionadas="+pecas_relacionadas+
						"&descritores="+descritores+
						"&descritores_geograficos="+descritores_geograficos+
						"&documentos_relacionados="+documentos_relacionados+
						"&notas_observacoes="+notas_observacoes+
						"&valor_peca="+valor_peca+
						"&seguradora="+seguradora+
						"&valor_seguro="+valor_seguro+
						"&formas_incorporacao="+formas_incorporacao+
						"&tipo_data_incorporacao="+tipo_data_incorporacao+
						"&frequencias="+frequencias+
						"&procedencias="+procedencias+
						"&uso_acesso_peca_fisica="+uso_acesso_peca_fisica+
						"&uso_acesso_representante="+uso_acesso_representante+
						"&historico_circulacao="+historico_circulacao+
						"&direitos="+direitos+
						"&catalogador="+catalogador+
						"&data_inicial_catalogacao="+data_inicial_catalogacao+
						"&data_final_catalogacao="+data_final_catalogacao+
						"&fontes_pesquisa_referencias="+fontes_pesquisa_referencias+
						"&link_visao="+link_visao+
						"&meta_keywords="+meta_keywords+
						"&meta_description="+meta_description+
						"&meta_title="+meta_title;
						
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'cadastrar_fichas.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}
		
		function salvarFichaEnglishFields(){
			ajax = iniciaAjax();
			
			if(ajax){
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4){
						if(ajax.status == 200){
							retorno = ajax.responseText;
							
							if(retorno == "ERRO"){
								
								alert("ERRO");
								
							}else{
								
								id_peca = retorno;
								
								document.getElementById("id_peca").value = retorno;
							}
						}
						else{
							alert(ajax.statusText);
						}
						
					}
				}
				
				id_peca  = document.getElementById("id_peca").value;
				operacao = "fichas_english_fields";
				
				titulo_ingles            = document.getElementById("titulo_ingles").value;
				autoria_ingles           = document.getElementById("autoria_ingles").value;
				colecao_ingles           = document.getElementById("colecao_ingles").value;
				historia_ingles          = document.getElementById("historia_ingles").value;
				eventos_ingles           = document.getElementById("eventos_ingles").value;
				conteudo_ingles          = document.getElementById("conteudo_ingles").value;
				pecas_comp_ingles        = document.getElementById("pecas_comp_ingles").value;
				descricao_pecas_ingles   = document.getElementById("descricao_pecas_ingles").value;
				meta_keywords_ingles     = document.getElementById("meta_keywords_ingles").value;
				meta_description_ingles  = document.getElementById("meta_description_ingles").value;
				meta_title_ingles        = document.getElementById("meta_title_ingles").value;
				disponibilidade_peca     = document.getElementById("disponibilidade_peca").value;
				destacado                = document.getElementById("destacado").value;
				publica_documento        = document.getElementById("publica_documento").value;
				ficha_conservacao        = document.getElementById("ficha_conservacao1").value;
				
				//Monta a QueryString
				dados = 'id_peca='+id_peca+
				        "&operacao="+operacao+
						"&titulo_ingles="+titulo_ingles+
						"&autoria_ingles="+autoria_ingles+
						"&colecao_ingles="+colecao_ingles+
						"&historia_ingles="+historia_ingles+
						"&eventos_ingles="+eventos_ingles+
						"&conteudo_ingles="+conteudo_ingles+
						"&pecas_comp_ingles="+pecas_comp_ingles+
						"&descricao_pecas_ingles="+descricao_pecas_ingles+
						"&meta_keywords_ingles="+meta_keywords_ingles+
						"&meta_description_ingles="+meta_description_ingles+
						"&meta_title_ingles="+meta_title_ingles+
						"&disponibilidade_peca="+disponibilidade_peca+
						"&destacado="+destacado+
						"&publica_documento="+publica_documento+
						"&ficha_conservacao="+ficha_conservacao;
						
				
				//Faz a requisição e envio pelo método POST
				ajax.open('POST', 'cadastrar_fichas.php', true);
				ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				ajax.send(dados);
			}
		}

		function salvarImagens(){

			// Captura os dados do formulário
			var formulario = document.getElementById('formulario_imagens');
 
			// Instância o FormData passando como parâmetro o formulário
			var formData = new FormData(formulario);
 
			// Envia O FormData através da requisição AJAX
			$.ajax({
		   		url: "salvar_imagens.php",
		   		type: "POST",
		   		data: formData,
		   		dataType: 'json',
		   		processData: false,  
		   		contentType: false,
		   		success: function(retorno){
	   				if (retorno.status == '1'){
	   					alert(retorno.mensagem)
	   				}else{
	   					alert(retorno.mensagem)
	   				}
	   	   		}
			});
		}
		
	
	</script>

  </head>
  <body>

    <div class="container-fluid">
	
		<div class="row">
			<?php include "./cabecalho.html"; ?>
		</div>
		
		<?php include "./campo_pesquisa.html"?>
		
		<div class="row">
		
			<!-- ÁREA PRINCIPAL -->
			
			<div class="col-md-3">
			
				<button type="button" class="btn btn-success w-100 mb-1">Voltar</button>
				
				<button type="button" class="btn btn-danger w-100 mb-1">Sair</button>
				
			</div>
			
			<div class="col-md-6">
			
				
				<!--ID da Peça-->
				<input type="text" id="id_peca">
				
				<!--Nome de usuário -->
				<input type="text" id="nome_usuario" value="<?php echo $_SESSION["nome_usuario"]; ?>">
				
				
				<!--Ficha Técnica -->
				<button type="button" class="btn btn-success w-100 mb-1" onclick="mostrarOcultarFichaTecnica();">
					Ficha técnica
				</button>
				
				<form class="d-block mb-2" id="ficha_tecnica">
				
					<div class="form-group">
						<label for="nome_peca">Nome da peça</label>
						<input type="text" class="form-control" id="nome_peca">
					</div>
					
					<div class="form-group">
						<label for="numero_inventario_museu">Número de inventário (Museu)</label>
						<input type="text" class="form-control" id="numero_inventario_museu">
					</div>
					
					<div class="form-group">
						<label for="numero_inventario_projeto">Número de inventário (Projeto)</label>
						<input type="text" class="form-control" id="numero_inventario_projeto">
					</div>
					
					<div class="form-group">
						<label for="localizacao">Localização</label>
						<input type="text" class="form-control" id="localizacao">
					</div>
					
					<div class="form-group">
						<label for="termo_doacao">Termo de doação</label>
						<input type="text" class="form-control" id="termo_doacao">
					</div>
					
					<div class="form-group">
						<label for="fabricante_autor">Fabricante/Autor</label>
						<input type="text" class="form-control" id="fabricante_autor">
					</div>
					
					<div class="form-group">
						<label for="data">Data</label>
						<input type="date" class="form-control" id="data">
					</div>
					
					<div class="form-group">
						<label for="local_aquisicao">Local de aquisição</label>
						<input type="text" class="form-control" id="local_aquisicao">
					</div>
					
					<div class="form-group">
						<label for="tecido">Tecido</label>
						<input type="text" class="form-control" id="tecido">
					</div>
					
					<div class="form-group">
						<label for="composicao">Composição</label>
						<input type="text" class="form-control" id="composicao">
					</div>
					
					<div class="form-group">
						<label for="bordado">Bordado</label>
						<input type="text" class="form-control" id="bordado">
					</div>
					
					<div class="form-group">
						<label for="tipologia">Tipologia</label>
						<input type="text" class="form-control" id="tipologia">
					</div>
					
					<div class="form-group">
						<label for="pintura">Pintura</label>
						<input type="text" class="form-control" id="pintura">
					</div>
					
					<div class="form-group">
						<label for="tecnica">Técnica</label>
						<input type="text" class="form-control" id="tecnica">
					</div>
					
					<div class="form-group">
						<label for="dimensoes">Dimensões</label>
						<input type="text" class="form-control" id="dimensoes">
					</div>
					
					<div class="form-group">
						<label for="metodo_producao">Método de produção</label>
						<input type="text" class="form-control" id="metodo_producao">
					</div>
					
					<div align="center">
						<button type="button" class="btn btn-primary w-50" onclick="salvarFichaTecnica()">
							Cadastrar ficha
						</button>
					</div>
					
				</form>
				
				
				<!--Ficha Catalográfica -->
				<button type="button" class="btn btn-success w-100 mb-1" onclick="mostrarOcultarFichaCatalografica()">
					Ficha catalográfica
				</button>
				
				<form class="d-block mb-2" id="ficha_catalografica">
				
					<div class="form-group">
						<label for="classe">Classe</label>
						<input type="text" class="form-control" id="classe">
					</div>
					
					<div class="form-group">
						<label for="sub_classe">Subclasse</label>
						<input type="text" class="form-control" id="sub_classe">
					</div>
					
					<div class="form-group">
						<label for="tipo">Tipo</label>
						<input type="text" class="form-control" id="tipo">
					</div>
					
					<div class="form-group">
						<label for="historico_uso">Histórico de uso</label>
						<input type="text" class="form-control" id="historico_uso">
					</div>
					
					<div class="form-group">
						<label for="possiveis_usos">Possíveis usos</label>
						<input type="text" class="form-control" id="possiveis_usos">
					</div>
					
					<div class="form-group">
						<label for="data_aquisicao">Data de aquisição</label>
						<input type="text" class="form-control" id="data_aquisicao">
					</div>
					
					<div class="form-group">
						<label for="tecnica_material">Técnica/Material</label>
						<input type="text" class="form-control" id="tecnica_material">
					</div>
					
					<div class="form-group">
						<label for="forma">Forma</label>
						<input type="text" class="form-control" id="forma">
					</div>
					
					<div class="form-group">
						<label for="descricao_peca">Descrição da peça</label>
						<input type="text" class="form-control" id="descricao_peca">
					</div>
					
					<div class="form-group">
						<label for="dimensoes1">Dimensões</label>
						<input type="text" class="form-control" id="dimensoes1">
					</div>
					
					<div class="form-group">
						<label for="descricao_pecas_complementares">Descrição das peças complementares</label>
						<input type="text" class="form-control" id="descricao_pecas_complementares">
					</div>
					
					<div class="form-group">
						<label for="observacoes">Observações</label>
						<input type="text" class="form-control" id="observacoes">
					</div>
					
					<div class="form-group">
						<label for="descricao_detalhes">Descrição dos detalhes</label>
						<input type="text" class="form-control" id="descricao_detalhes">
					</div>
					
					<div align="center">
						<button type="button" class="btn btn-primary w-50" onclick="salvarFichaCatalografica()">
							Cadastrar ficha
						</button>
					</div>
					
				</form>
				
				
				<!--Ficha de Conservação -->
				<button type="button" class="btn btn-success w-100 mb-1" onclick="mostrarOcultarFichaConservacao()">
					Ficha de conservação
				</button>
				
				<form class="d-block mb-2" id="ficha_conservacao">
					
					<div class="form-group">
						<label for="numero_registro">Número de registro</label>
						<input type="text" class="form-control" id="numero_registro">
					</div>
					
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" class="form-control" id="titulo">
					</div>
					
					<div class="form-group">
						<label for="classe1">Classe</label>
						<input type="text" class="form-control" id="classe1">
					</div>
					
					<div class="form-group">
						<label for="denominacao">Denominação</label>
						<input type="text" class="form-control" id="denominacao">
					</div>
					
					<div class="form-group">
						<label for="estado_geral_conservacao">Estado geral de conservação</label>
						<input type="text" class="form-control" id="estado_geral_conservacao">
					</div>
					
					<div class="form-group">
						<label for="danos_verificados">Danos verificados</label>
						<input type="text" class="form-control" id="danos_verificados">
					</div>
					
					<div class="form-group">
						<label for="procedimentos_higiene">Procedimentos de higienização</label>
						<input type="text" class="form-control" id="procedimentos_higiene">
					</div>
					
					<div class="form-group">
						<label for="reparos_realizados">Reparos realizados</label>
						<input type="text" class="form-control" id="reparos_realizados">
					</div>
					
					<div class="form-group">
						<label for="acondicionamento">Acondicionamento</label>
						<input type="text" class="form-control" id="acondicionamento">
					</div>
					
					<div class="form-group">
						<label for="restauracao_conservacao">Restauração ou conservação preventiva</label>
						<input type="text" class="form-control" id="restauracao_conservacao">
					</div>
					
					<div class="form-group">
						<label for="procedimentos_conservacao">Procedimentos de conservação preventiva</label>
						<input type="text" class="form-control" id="procedimentos_conservacao">
					</div>
					
					<div class="form-group">
						<label for="observacoes1">Observações</label>
						<input type="text" class="form-control" id="observacoes1">
					</div>
					
					<div class="form-group">
						<label for="data1">Data</label>
						<input type="date" class="form-control" id="data1">
					</div>
					
					<div class="form-group">
						<label for="responsavel_preenchimento">Responsável pelo preenchimento</label>
						<input type="text" class="form-control" id="responsavel_preenchimento">
					</div>
					
					<div align="center">
						<button type="button" class="btn btn-primary w-50" onclick="salvarFichaConservacao()">
							Cadastrar ficha
						</button>
					</div>
					
				</form>
				
				<!--Ficha de Visualização -->
				<button type="button" class="btn btn-success w-100 mb-1" onclick="mostrarOcultarFichaVisualização()">
					Ficha de visualização
				</button>
				
				<form class="d-block mb-2" id="ficha_visualizacao">
					
					<div class="form-group">
						<label for="tipo_acervo">Tipo de acervo</label>
						<input type="text" class="form-control" id="tipo_acervo">
					</div>
					
					<div class="form-group">
						<label for="numero_registro">Número de registro</label>
						<input type="text" class="form-control" id="numero_registro">
					</div>
					
					<div class="form-group">
						<label for="numero_registros_antigos">Número de registros antigos</label>
						<input type="text" class="form-control" id="numero_registros_antigos">
					</div>
					
					<div class="form-group">
						<label for="sala">Sala</label>
						<input type="text" class="form-control" id="sala">
					</div>
					
					<div class="form-group">
						<label for="estante">Estante</label>
						<input type="text" class="form-control" id="estante">
					</div>
					
					<div class="form-group">
						<label for="prateleira">Prateleira</label>
						<input type="text" class="form-control" id="prateleira">
					</div>
					
					<div class="form-group">
						<label for="embalagem">Embalagem</label>
						<input type="text" class="form-control" id="embalagem">
					</div>
					
					<div class="form-group">
						<label for="classe2">Classe</label>
						<input type="text" class="form-control" id="classe2">
					</div>
					
					<div class="form-group">
						<label for="denominacao1">Denominação</label>
						<input type="text" class="form-control" id="denominacao1">
					</div>
					
					<div class="form-group">
						<label for="tipo1">Tipo</label>
						<input type="text" class="form-control" id="tipo1">
					</div>
					
					<div class="form-group">
						<label for="titulo1">Título</label>
						<input type="text" class="form-control" id="titulo1">
					</div>
					
					<div class="form-group">
						<label for="autoria">Autoria</label>
						<input type="text" class="form-control" id="autoria">
					</div>
					
					<div class="form-group">
						<label for="colecao">Coleção</label>
						<input type="text" class="form-control" id="colecao">
					</div>
					
					<div class="form-group">
						<label for="tipo_data_producao">Tipo de data de produção</label>
						<input type="text" class="form-control" id="tipo_data_producao">
					</div>
					
					<div class="form-group">
						<label for="data_producao">Data de produção</label>
						<input type="date" class="form-control" id="data_producao">
					</div>
					
					<div class="form-group">
						<label for="local_producao">Local de produção</label>
						<input type="text" class="form-control" id="local_producao">
					</div>
					
					<div class="form-group">
						<label for="historico_peca">Histórico da peça</label>
						<input type="text" class="form-control" id="historico_peca">
					</div>
					
					<div class="form-group">
						<label for="eventos_associados">Eventos associados</label>
						<input type="text" class="form-control" id="eventos_associados">
					</div>
					
					<div class="form-group">
						<label for="largura">Largura</label>
						<input type="text" class="form-control" id="largura">
					</div>
					
					<div class="form-group">
						<label for="altura">Altura</label>
						<input type="text" class="form-control" id="altura">
					</div>
					
					<div class="form-group">
						<label for="profundidade">Profundidade</label>
						<input type="text" class="form-control" id="profundidade">
					</div>
					
					<div class="form-group">
						<label for="circunferencia">Circunferência</label>
						<input type="text" class="form-control" id="circunferencia">
					</div>
					
					<div class="form-group">
						<label for="tecnica1">Técnica</label>
						<input type="text" class="form-control" id="tecnica1">
					</div>
					
					<div class="form-group">
						<label for="material">Material</label>
						<input type="text" class="form-control" id="material">
					</div>
					
					<div class="form-group">
						<label for="etiqueta_composicao">Etiqueta de composição</label>
						<input type="text" class="form-control" id="etiqueta_composicao">
					</div>
					
					<div class="form-group">
						<label for="descricao_conteudo">Descrição de conteúdo</label>
						<input type="text" class="form-control" id="descricao_conteudo">
					</div>
					
					<div class="form-group">
						<label for="pecas_complementares">Peças complementares</label>
						<input type="text" class="form-control" id="pecas_complementares">
					</div>
					
					<div class="form-group">
						<label for="descricao_pecas_comp">Descrição de peças complementares</label>
						<input type="text" class="form-control" id="descricao_pecas_comp">
					</div>
					
					<div class="form-group">
						<label for="pecas_relacionadas">Peças relacionadas</label>
						<input type="text" class="form-control" id="pecas_relacionadas">
					</div>
					
					<div class="form-group">
						<label for="descritores">Descritores</label>
						<input type="text" class="form-control" id="descritores">
					</div>
					
					<div class="form-group">
						<label for="descritores_geograficos">Descritores geográficos</label>
						<input type="text" class="form-control" id="descritores_geograficos">
					</div>
					
					<div class="form-group">
						<label for="documentos_relacionados">Documentos relacionados</label>
						<input type="text" class="form-control" id="documentos_relacionados">
					</div>
					
					<div class="form-group">
						<label for="notas_observacoes">Notas e observações</label>
						<input type="text" class="form-control" id="notas_observacoes">
					</div>
					
					<div class="form-group">
						<label for="valor_peca">Valor da peça</label>
						<input type="text" class="form-control" id="valor_peca">
					</div>
					
					<div class="form-group">
						<label for="seguradora">Seguradora</label>
						<input type="text" class="form-control" id="seguradora">
					</div>
					
					<div class="form-group">
						<label for="valor_seguro">Valor do seguro</label>
						<input type="text" class="form-control" id="valor_seguro">
					</div>
					
					<div class="form-group">
						<label for="formas_incorporacao">Formas de incorporação</label>
						<input type="text" class="form-control" id="formas_incorporacao">
					</div>
					
					<div class="form-group">
						<label for="tipo_data_incorporacao">Tipo de data de incorporação</label>
						<input type="text" class="form-control" id="tipo_data_incorporacao">
					</div>
					
					<div class="form-group">
						<label for="frequencias">Frequências</label>
						<input type="text" class="form-control" id="frequencias">
					</div>
					
					<div class="form-group">
						<label for="procedencias">Procedências</label>
						<input type="text" class="form-control" id="procedencias">
					</div>
					
					<div class="form-group">
						<label for="uso_acesso_peca_fisica">Uso e acesso peça física</label>
						<input type="text" class="form-control" id="uso_acesso_peca_fisica">
					</div>
					
					<div class="form-group">
						<label for="uso_acesso_representante">Uso e acesso representante digital</label>
						<input type="text" class="form-control" id="uso_acesso_representante">
					</div>
					
					<div class="form-group">
						<label for="historico_circulacao">Histórico de circulação</label>
						<input type="text" class="form-control" id="historico_circulacao">
					</div>
					
					<div class="form-group">
						<label for="direitos">Direitos</label>
						<input type="text" class="form-control" id="direitos">
					</div>
					
					<div class="form-group">
						<label for="catalogador">Catalogador</label>
						<input type="text" class="form-control" id="catalogador">
					</div>
					
					<div class="form-group">
						<label for="data_inicial_catalogacao">Data inicial de catalogação</label>
						<input type="date" class="form-control" id="data_inicial_catalogacao">
					</div>
					
					<div class="form-group">
						<label for="data_final_catalogacao">Data final de catalogação</label>
						<input type="date" class="form-control" id="data_final_catalogacao">
					</div>
					
					<div class="form-group">
						<label for="fontes_pesquisa_referencias">Fontes de pesquisa e referências</label>
						<input type="text" class="form-control" id="fontes_pesquisa_referencias">
					</div>
					
					<div class="form-group">
						<label for="link_visao">Link visão 360</label>
						<input type="text" class="form-control" id="link_visao">
					</div>
					
					<div class="form-group">
						<label for="meta_keywords">Meta keywords</label>
						<input type="text" class="form-control" id="meta_keywords">
					</div>
					
					<div class="form-group">
						<label for="meta_description">Meta description</label>
						<input type="text" class="form-control" id="meta_description">
					</div>
					
					<div class="form-group">
						<label for="meta_title">Meta title</label>
						<input type="text" class="form-control" id="meta_title">
					</div>
					
					<div align="center">
						<button type="button" class="btn btn-primary w-50" onclick="salvarFichaVisualizacao()">
							Cadastrar ficha
						</button>
					</div>
					
				</form>
				
				
				<!--Ficha de English Fields -->
				<button type="button" class="btn btn-success w-100 mb-1" onclick="mostrarOcultarFichaEnglishFields()">
					Ficha de english fields
				</button>
				
				<form class="d-block mb-2" id="ficha_english_fields">
					
					<div class="form-group">
						<label for="titulo_ingles">Título em inglês</label>
						<input type="text" class="form-control" id="titulo_ingles">
					</div>
					
					<div class="form-group">
						<label for="autoria_ingles">Autoria em inglês</label>
						<input type="text" class="form-control" id="autoria_ingles">
					</div>
					
					<div class="form-group">
						<label for="colecao_ingles">Coleção em inglês</label>
						<input type="text" class="form-control" id="colecao_ingles">
					</div>
					
					<div class="form-group">
						<label for="historia_ingles">História em inglês</label>
						<input type="text" class="form-control" id="historia_ingles">
					</div>
					
					<div class="form-group">
						<label for="eventos_ingles">Eventos associados em inglês</label>
						<input type="text" class="form-control" id="eventos_ingles">
					</div>
					
					<div class="form-group">
						<label for="conteudo_ingles">Conteúdo em inglês</label>
						<input type="text" class="form-control" id="conteudo_ingles">
					</div>
					
					<div class="form-group">
						<label for="pecas_comp_ingles">Peças complementares em inglês</label>
						<input type="text" class="form-control" id="pecas_comp_ingles">
					</div>
					
					<div class="form-group">
						<label for="descricao_pecas_ingles">Descrição da peças complementares em inglês</label>
						<input type="text" class="form-control" id="descricao_pecas_ingles">
					</div>
					
					<div class="form-group">
						<label for="meta_keywords_ingles">Meta keywords em inglês</label>
						<input type="text" class="form-control" id="meta_keywords_ingles">
					</div>
					
					<div class="form-group">
						<label for="meta_description_ingles">Meta description em inglês</label>
						<input type="text" class="form-control" id="meta_description_ingles">
					</div>
					
					<div class="form-group">
						<label for="meta_title_ingles">Meta title em inglês</label>
						<input type="text" class="form-control" id="meta_title_ingles">
					</div>
					
					<div class="form-group">
						<label for="disponibilidade_peca">Disponibilidade da peça</label>
						<input type="text" class="form-control" id="disponibilidade_peca">
					</div>
					
					<div class="form-group">
						<label for="destacado">Destacado ?</label>
						<input type="text" class="form-control" id="destacado">
					</div>
					
					<div class="form-group">
						<label for="publica_documento">Publica documento ?</label>
						<input type="text" class="form-control" id="publica_documento">
					</div>
					
					<div class="form-group">
						<label for="ficha_conservacao1">Ficha de conservação</label>
						<input type="text" class="form-control" id="ficha_conservacao1">
					</div>
					
					<div align="center">
						<button type="button" class="btn btn-primary w-50" onclick="salvarFichaEnglishFields()">
							Cadastrar ficha
						</button>
					</div>
					
				</form>
				
				
				<!--Upload de Imagens -->
				<button type="button" class="btn btn-success w-100 mb-1">Upload de imagens</button>

				<form id="formulario_imagens">

					<input type="text" id="id_peca1" name="id_peca">
						
					<div class="form-group">
					 
						<label for="desenhos_tecnicos">
							Desenho técnico (Frente e Costas):
						</label>
						<input type="file" class="form-control" id="desenhos_tecnicos" name="desenhos_tecnicos[]" multiple>
					</div>
				
					<div class="form-group">
					 
						<label for="fotografias">
							Fotografia (Frente e Costas):
						</label>
						<input type="file" class="form-control" id="fotografias" name="fotografias[]" multiple>
					</div>
				
					<div class="form-group">
					 
						<label for="fotos_detalhes">
							Fotos de detalhes:
						</label>
						<input type="file" class="form-control" id="fotos_detalhes" name="fotos_detalhes[]" multiple>
					</div>

					<div align="center">
						<button type="button" class="btn btn-primary w-50" onclick="salvarImagens()">
							Cadastrar imagens
						</button>
					</div>


				</form>
			
			</div>
			
			<div class="col-md-3">
			
			</div>
			
		</div>
		
		<div class="row">
			<?php include "./rodape1.html"; ?>
		</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>