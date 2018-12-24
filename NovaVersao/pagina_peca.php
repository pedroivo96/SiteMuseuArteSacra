<!DOCTYPE html>
<html lang="en">
  <head>
  
	<?php
		session_start(); 
		include './conexao_museu.php';
 
		// Verifica se existe os dados da sessão de login 
		/*if(!isset($_SESSION["nome_usuario"])) { 
			// Usuário não logado! Redireciona para a página de login 
			header("Location: index.php"); 
			exit; 
		} */
		
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

				<?php

				$conn = getConnection();

        		$sql = 'SELECT * FROM pecas WHERE id_peca = :id_peca';
        		$stmt = $conn->prepare($sql);
        		$stmt->bindValue(':id_peca', $_POST['id_peca']);
        		$stmt->execute();
        		$count = $stmt->rowCount();

        		if($count > 0){
			
					//Existe uma peça referente a este ID

					$result = $stmt->fetchAll();
			
					foreach($result as $row){
						?>
						<dl class="row">
							<dt class="col-sm-6">Nome da peça</dt>
  							<dd class="col-sm-6"><?php echo $row['nome_peca']; ?></dd>
						</dl>
						<?php

						if(isset($_SESSION['nome_usuario'])){
							?>
							<dl class="row">
								<dt class="col-sm-6">Número de inventário (Museu)</dt>
  								<dd class="col-sm-6"><?php echo $row['numero_inventario_museu']; ?></dd>
							</dl>

							<dl class="row">
								<dt class="col-sm-6">Número de inventário (Projeto)</dt>
  								<dd class="col-sm-6"><?php echo $row['numero_inventario_projeto']; ?></dd>
							</dl>							
						<?php
						}

						?>
						<p>Ficha técnica</p>
						<?php

						$sql1 = 'SELECT * FROM fichas_tecnicas WHERE id_peca = :id_peca';
        				$stmt1 = $conn->prepare($sql1);
        				$stmt1->bindValue(':id_peca', $_POST['id_peca']);
        				$stmt1->execute();
        				$count1 = $stmt1->rowCount();

        				if($count1 > 0){

							$result1 = $stmt1->fetchAll();
			
							foreach($result1 as $row1){
								
								//Localização - A
								if(isset($_SESSION['nome_usuario'])){
									?>
									<dl class="row">
										<dt class="col-sm-6">Localização</dt>
  										<dd class="col-sm-6"><?php echo $row1['localizacao']; ?></dd>
									</dl>
									<?php		
								}

								//Termo de doação - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Termo de doação</dt>
  									<dd class="col-sm-6"><?php echo $row1['termo_doacao']; ?></dd>
								</dl>	
								<?php

								//Fabricante/Autor - A
								if(isset($_SESSION['nome_usuario'])){
									?>
									<dl class="row">
										<dt class="col-sm-6">Fabricante/Autor</dt>
  										<dd class="col-sm-6"><?php echo $row1['fabricante_autor']; ?></dd>
									</dl>
									<?php		
								}

								//Data - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Data</dt>
  									<dd class="col-sm-6"><?php echo $row1['data']; ?></dd>
								</dl>	
								<?php

								//Local de aquisição - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Local de aquisição</dt>
  									<dd class="col-sm-6"><?php echo $row1['local_aquisicao']; ?></dd>
								</dl>	
								<?php

								//Tecido - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Tecido</dt>
  									<dd class="col-sm-6"><?php echo $row1['tecido']; ?></dd>
								</dl>	
								<?php

								//Composição - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Composição</dt>
  									<dd class="col-sm-6"><?php echo $row1['composicao']; ?></dd>
								</dl>	
								<?php

								//Bordado - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Bordado</dt>
  									<dd class="col-sm-6"><?php echo $row1['bordado']; ?></dd>
								</dl>	
								<?php

								//Tipologia - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Tipologia</dt>
  									<dd class="col-sm-6"><?php echo $row1['tipologia']; ?></dd>
								</dl>	
								<?php

								//Pintura - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Pintura</dt>
  									<dd class="col-sm-6"><?php echo $row1['pintura']; ?></dd>
								</dl>	
								<?php

								//Técnica - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Técnica</dt>
  									<dd class="col-sm-6"><?php echo $row1['tecnica']; ?></dd>
								</dl>	
								<?php

								//Dimensões - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Dimensões</dt>
  									<dd class="col-sm-6"><?php echo $row1['dimensoes']; ?></dd>
								</dl>	
								<?php


								//Desenho técnico - U

								//Fotografia - U

							}
						}

						<p>Ficha catalográfica</p>

						$sql2 = 'SELECT * FROM fichas_catalograficas WHERE id_peca = :id_peca';
        				$stmt2 = $conn->prepare($sql2);
        				$stmt2->bindValue(':id_peca', $_POST['id_peca']);
        				$stmt2->execute();
        				$count2 = $stmt2->rowCount();

        				if($count2 > 0){

							$result2 = $stmt2->fetchAll();
			
							foreach($result2 as $row2){

								//Classe - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Classe</dt>
  									<dd class="col-sm-6"><?php echo $row2['classe']; ?></dd>
								</dl>	
								<?php

								//Subclasse - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Subclasse</dt>
  									<dd class="col-sm-6"><?php echo $row2['sub_classe']; ?></dd>
								</dl>	
								<?php

								//Tipo - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Tipo</dt>
  									<dd class="col-sm-6"><?php echo $row2['tipo']; ?></dd>
								</dl>	
								<?php

								//Histórico de uso - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Histórico de uso</dt>
  									<dd class="col-sm-6"><?php echo $row2['historico_uso']; ?></dd>
								</dl>	
								<?php

								//Possíveis usos da peça - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Possíveis usos da peça</dt>
  									<dd class="col-sm-6"><?php echo $row2['possiveis_usos']; ?></dd>
								</dl>	
								<?php

								//Data de aquisição - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Data de aquisição</dt>
  									<dd class="col-sm-6"><?php echo $row2['data_aquisicao']; ?></dd>
								</dl>	
								<?php

								//Técnica/material - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Técnica/material</dt>
  									<dd class="col-sm-6"><?php echo $row2['tecnica_material']; ?></dd>
								</dl>	
								<?php

								//Forma - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Forma</dt>
  									<dd class="col-sm-6"><?php echo $row2['forma']; ?></dd>
								</dl>	
								<?php

								//Descrição da peça - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Descrição da peça</dt>
  									<dd class="col-sm-6"><?php echo $row2['descricao_peca']; ?></dd>
								</dl>	
								<?php

								//Dimensões - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Dimensões</dt>
  									<dd class="col-sm-6"><?php echo $row2['dimensoes']; ?></dd>
								</dl>	
								<?php

								//Descrição de peças complementares - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Descrição de peças complementares</dt>
  									<dd class="col-sm-6"><?php echo $row2['descricao_pecas_complementares']; ?></dd>
								</dl>	
								<?php

								//Observações - A
								if(isset($_SESSION['nome_usuario'])){
									?>
									<dl class="row">
										<dt class="col-sm-6">Observações</dt>
  										<dd class="col-sm-6"><?php echo $row2['observacoes']; ?></dd>
									</dl>
									<?php		
								}

								//Fotos dos detalhes (imagens) - U

								//Descrição dos detalhes - U
								?>
								<dl class="row">
									<dt class="col-sm-6">Descrição dos detalhes</dt>
  									<dd class="col-sm-6"><?php echo $row2['descricao_detalhes']; ?></dd>
								</dl>	
								<?php

							}
						}

						<p>Ficha de conservação</p>

						$sql3 = 'SELECT * FROM fichas_conservacao WHERE id_peca = :id_peca';
        				$stmt3 = $conn->prepare($sql3);
        				$stmt3->bindValue(':id_peca', $_POST['id_peca']);
        				$stmt3->execute();
        				$count3 = $stmt3->rowCount();

        				if($count3 > 0){

							$result3 = $stmt3->fetchAll();
			
							foreach($result3 as $row3){

								if(isset($_SESSION['nome_usuario'])){
									?>

									<!-- Número de registro - A -->
									<dl class="row">
										<dt class="col-sm-6">Número de registro</dt>
  										<dd class="col-sm-6"><?php echo $row3['numero_registro']; ?></dd>
									</dl>	

									<!-- Título - A -->
									<dl class="row">
										<dt class="col-sm-6">Título</dt>
  										<dd class="col-sm-6"><?php echo $row3['titulo']; ?></dd>
									</dl>

									<!-- Classe - A -->
									<dl class="row">
										<dt class="col-sm-6">Classe</dt>
  										<dd class="col-sm-6"><?php echo $row3['classe']; ?></dd>
									</dl>
								
									<!-- Denominação - A -->
									<dl class="row">
										<dt class="col-sm-6">Denominação</dt>
  										<dd class="col-sm-6"><?php echo $row3['denominacao']; ?></dd>
									</dl>

									<!-- Estado geral de conservação - A -->
									<dl class="row">
										<dt class="col-sm-6">Estado geral de conservação</dt>
  										<dd class="col-sm-6"><?php echo $row3['estado_geral_conservacao']; ?></dd>
									</dl>

									<!-- Danos verificados -->
									<dl class="row">
										<dt class="col-sm-6">Danos verificados</dt>
  										<dd class="col-sm-6"><?php echo $row3['danos_verificados']; ?></dd>
									</dl>

									<!-- Procedimentos de higienização - A -->
									<dl class="row">
										<dt class="col-sm-6">Procedimentos de higienização</dt>
  										<dd class="col-sm-6"><?php echo $row3['procedimentos_higiene']; ?></dd>
									</dl>

									<!-- Reparos realizados - A -->
									<dl class="row">
										<dt class="col-sm-6">Reparos realizados</dt>
  										<dd class="col-sm-6"><?php echo $row3['reparos_realizados']; ?></dd>
									</dl>

									<!-- Acondicionamento - A -->
									<dl class="row">
										<dt class="col-sm-6">Acondicionamento</dt>
  										<dd class="col-sm-6"><?php echo $row3['acondicionamento']; ?></dd>
									</dl>

									<!-- Restauração ou conservação preventiva - A -->
									<dl class="row">
										<dt class="col-sm-6">Restauração ou conservação preventiva</dt>
  										<dd class="col-sm-6"><?php echo $row3['restauracao_conservacao']; ?></dd>
									</dl>

									<!-- Procedimentos de Conservação Preventiva - A -->
									<dl class="row">
										<dt class="col-sm-6">Procedimentos de Conservação Preventiva</dt>
  										<dd class="col-sm-6"><?php echo $row3['procedimentos_conservacao']; ?></dd>
									</dl>

									<!-- Observações - A -->
									<dl class="row">
										<dt class="col-sm-6">Observações</dt>
  										<dd class="col-sm-6"><?php echo $row3['observacoes']; ?></dd>
									</dl>

									<!-- Data - A -->
									<dl class="row">
										<dt class="col-sm-6">Data</dt>
  										<dd class="col-sm-6"><?php echo $row3['data']; ?></dd>
									</dl>

									<!-- Responsável pelo preenchimento - A  -->
									<dl class="row">
										<dt class="col-sm-6">Responsável pelo preenchimento</dt>
  										<dd class="col-sm-6"><?php echo $row3['responsavel_preenchimento']; ?></dd>
									</dl>
			
									<?php
								}
							}
						}

						<p>Ficha de visualização</p>

						$sql4 = 'SELECT * FROM fichas_visualizacao WHERE id_peca = :id_peca';
        				$stmt4 = $conn->prepare($sql4);
        				$stmt4->bindValue(':id_peca', $_POST['id_peca']);
        				$stmt4->execute();
        				$count4 = $stmt4->rowCount();

        				if($count4 > 0){

							$result4 = $stmt4->fetchAll();
			
							foreach($result4 as $row4){

								if(isset($_SESSION['nome_usuario'])){
									?>

									<!--Tipo de acervo - A -->
									<dl class="row">
										<dt class="col-sm-6">Tipo de acervo</dt>
  										<dd class="col-sm-6"><?php echo $row4['tipo_acervo']; ?></dd>
									</dl>	

									<!--Número de registro - A -->
									<dl class="row">
										<dt class="col-sm-6">Número de registro</dt>
  										<dd class="col-sm-6"><?php echo $row4['numero_registro']; ?></dd>
									</dl>

									<!--Número de registro antigos - A -->
									<dl class="row">
										<dt class="col-sm-6">Números de registros antigos</dt>
  										<dd class="col-sm-6"><?php echo $row4['numero_registros_antigos']; ?></dd>
									</dl>

									<!--Sala - A -->
									<dl class="row">
										<dt class="col-sm-6">Sala</dt>
  										<dd class="col-sm-6"><?php echo $row4['sala']; ?></dd>
									</dl>

									<!--Estante - A -->
									<dl class="row">
										<dt class="col-sm-6">Estante</dt>
  										<dd class="col-sm-6"><?php echo $row4['estante']; ?></dd>
									</dl>

									<!--Prateleira - A -->
									<dl class="row">
										<dt class="col-sm-6">Prateleira</dt>
  										<dd class="col-sm-6"><?php echo $row4['prateleira']; ?></dd>
									</dl>

									<!--Embalagem - A -->
									<dl class="row">
										<dt class="col-sm-6">Embalagem</dt>
  										<dd class="col-sm-6"><?php echo $row4['embalagem']; ?></dd>
									</dl>

									<!--Classe - A -->
									<dl class="row">
										<dt class="col-sm-6">Embalagem</dt>
  										<dd class="col-sm-6"><?php echo $row4['embalagem']; ?></dd>
									</dl>

									<!--Denominação - A -->
									<dl class="row">
										<dt class="col-sm-6">Denominação</dt>
  										<dd class="col-sm-6"><?php echo $row4['denominacao']; ?></dd>
									</dl>

									<!--Tipo - A -->
									<dl class="row">
										<dt class="col-sm-6">Tipo</dt>
  										<dd class="col-sm-6"><?php echo $row4['tipo']; ?></dd>
									</dl>

									<!--Título - A -->
									<dl class="row">
										<dt class="col-sm-6">Título</dt>
  										<dd class="col-sm-6"><?php echo $row4['titulo']; ?></dd>
									</dl>

									<!--Autoria - A -->
									<dl class="row">
										<dt class="col-sm-6">Autoria</dt>
  										<dd class="col-sm-6"><?php echo $row4['autoria']; ?></dd>
									</dl>

									<!--Coleção - A -->
									<dl class="row">
										<dt class="col-sm-6">Coleção</dt>
  										<dd class="col-sm-6"><?php echo $row4['colecao']; ?></dd>
									</dl>

									<!--Tipo de data de produção - A -->
									<dl class="row">
										<dt class="col-sm-6">Tipo de data de produção</dt>
  										<dd class="col-sm-6"><?php echo $row4['tipo_data_producao']; ?></dd>
									</dl>

									<!--Data de produção (década) - A -->
									<dl class="row">
										<dt class="col-sm-6">Data de produção (década)</dt>
  										<dd class="col-sm-6"><?php echo $row4['data_producao']; ?></dd>
									</dl>

									<!--Local de produção - A -->
									<dl class="row">
										<dt class="col-sm-6">Local de produção</dt>
  										<dd class="col-sm-6"><?php echo $row4['local_producao']; ?></dd>
									</dl>

									<!--Histórico da peça - A -->
									<dl class="row">
										<dt class="col-sm-6">Histórico da peça</dt>
  										<dd class="col-sm-6"><?php echo $row4['historico_peca']; ?></dd>
									</dl>

									<!--Eventos associados - A -->
									<dl class="row">
										<dt class="col-sm-6">Eventos associados</dt>
  										<dd class="col-sm-6"><?php echo $row4['eventos_associados']; ?></dd>
									</dl>

									<!--Largura - A -->
									<dl class="row">
										<dt class="col-sm-6">Largura</dt>
  										<dd class="col-sm-6"><?php echo $row4['largura']; ?></dd>
									</dl>

									<!--Altura - A -->
									<dl class="row">
										<dt class="col-sm-6">Altura</dt>
  										<dd class="col-sm-6"><?php echo $row4['altura']; ?></dd>
									</dl>

									<!--Profundidade - A -->
									<dl class="row">
										<dt class="col-sm-6">Profundidade</dt>
  										<dd class="col-sm-6"><?php echo $row4['profundidade']; ?></dd>
									</dl>

									<!--Circunferência - A -->
									<dl class="row">
										<dt class="col-sm-6">Circunferência</dt>
  										<dd class="col-sm-6"><?php echo $row4['circunferencia']; ?></dd>
									</dl>

									<!--Técnica - A -->
									<dl class="row">
										<dt class="col-sm-6">Técnica</dt>
  										<dd class="col-sm-6"><?php echo $row4['tecnica']; ?></dd>
									</dl>

									<!--Material - A -->
									<dl class="row">
										<dt class="col-sm-6">Material</dt>
  										<dd class="col-sm-6"><?php echo $row4['material']; ?></dd>
									</dl>

									<!--Etiqueta de Composição - A -->
									<dl class="row">
										<dt class="col-sm-6">Etiqueta de composição</dt>
  										<dd class="col-sm-6"><?php echo $row4['etiqueta_composicao']; ?></dd>
									</dl>

									<!--Descrição / Conteúdo - A -->
									<dl class="row">
										<dt class="col-sm-6">Descrição / Conteúdo</dt>
  										<dd class="col-sm-6"><?php echo $row4['descricao_conteudo']; ?></dd>
									</dl>

									<!--Peças complementares - A -->
									<dl class="row">
										<dt class="col-sm-6">Peças complementares</dt>
  										<dd class="col-sm-6"><?php echo $row4['pecas_complementares']; ?></dd>
									</dl>

									<!--Descrição das peças complementares - A -->
									<dl class="row">
										<dt class="col-sm-6">Descrição das peças complementares</dt>
  										<dd class="col-sm-6"><?php echo $row4['descricao_pecas_comp']; ?></dd>
									</dl>

									<!--Peças relacionadas - A -->
									<dl class="row">
										<dt class="col-sm-6">Peças relacionadas</dt>
  										<dd class="col-sm-6"><?php echo $row4['pecas_relacionadas']; ?></dd>
									</dl>

									<!--Descritores - A -->
									<dl class="row">
										<dt class="col-sm-6">Descritores</dt>
  										<dd class="col-sm-6"><?php echo $row4['descritores']; ?></dd>
									</dl>

									<!--Descritores geográficos - A -->
									<dl class="row">
										<dt class="col-sm-6">Descritores geográficos</dt>
  										<dd class="col-sm-6"><?php echo $row4['descritores_geograficos']; ?></dd>
									</dl>

									<!--Documentos relacionados - A -->
									<dl class="row">
										<dt class="col-sm-6">Documentos relacionados</dt>
  										<dd class="col-sm-6"><?php echo $row4['documentos_relacionados']; ?></dd>
									</dl>

									<!--Notas e observações - A -->
									<dl class="row">
										<dt class="col-sm-6">Notas e observações</dt>
  										<dd class="col-sm-6"><?php echo $row4['notas_observacoes']; ?></dd>
									</dl>

									<!--Valor da peça - A -->
									<dl class="row">
										<dt class="col-sm-6">Valor da peça</dt>
  										<dd class="col-sm-6"><?php echo $row4['valor_peca']; ?></dd>
									</dl>

									<!--Seguradora - A -->
									<dl class="row">
										<dt class="col-sm-6">Seguradora</dt>
  										<dd class="col-sm-6"><?php echo $row4['seguradora']; ?></dd>
									</dl>

									<!--Valor do seguro - A -->
									<dl class="row">
										<dt class="col-sm-6">Valor do seguro</dt>
  										<dd class="col-sm-6"><?php echo $row4['valor_seguro']; ?></dd>
									</dl>

									<!--Formas de incorporação - A -->
									<dl class="row">
										<dt class="col-sm-6">Formas de incorporação</dt>
  										<dd class="col-sm-6"><?php echo $row4['formas_incorporacao']; ?></dd>
									</dl>

									<!--Tipo de data de incorporação - A -->
									<dl class="row">
										<dt class="col-sm-6">Tipo de data de incorporação</dt>
  										<dd class="col-sm-6"><?php echo $row4['tipo_data_incorporacao']; ?></dd>
									</dl>

									<!--Frequências - A -->
									<dl class="row">
										<dt class="col-sm-6">Frequências</dt>
  										<dd class="col-sm-6"><?php echo $row4['frequencias']; ?></dd>
									</dl>

									<!--Procedências - A -->
									<dl class="row">
										<dt class="col-sm-6">Procedências</dt>
  										<dd class="col-sm-6"><?php echo $row4['procedencias']; ?></dd>
									</dl>

									<!--Uso e acesso peça física - A -->
									<dl class="row">
										<dt class="col-sm-6">Uso e acesso peça física</dt>
  										<dd class="col-sm-6"><?php echo $row4['uso_acesso_peca_fisica']; ?></dd>
									</dl>

									<!--Uso e acesso representante digital - A -->
									<dl class="row">
										<dt class="col-sm-6">Uso e acesso representante digital</dt>
  										<dd class="col-sm-6"><?php echo $row4['uso_acesso_representante']; ?></dd>
									</dl>

									<!--Histórico de circulação - A -->
									<dl class="row">
										<dt class="col-sm-6">Histórico de circulação</dt>
  										<dd class="col-sm-6"><?php echo $row4['historico_circulacao']; ?></dd>
									</dl>

									<!--Direitos - A -->
									<dl class="row">
										<dt class="col-sm-6">Direitos</dt>
  										<dd class="col-sm-6"><?php echo $row4['direitos']; ?></dd>
									</dl>

									<!--Catalogador - A -->
									<dl class="row">
										<dt class="col-sm-6">Catalogador</dt>
  										<dd class="col-sm-6"><?php echo $row4['catalogador']; ?></dd>
									</dl>

									<!--Data inicial de catalogação - A -->
									<dl class="row">
										<dt class="col-sm-6">Data inicial de catalogação</dt>
  										<dd class="col-sm-6"><?php echo $row4['data_inicial_catalogacao']; ?></dd>
									</dl>

									<!--Data final de catalogação - A -->
									<dl class="row">
										<dt class="col-sm-6">Data final de catalogação</dt>
  										<dd class="col-sm-6"><?php echo $row4['data_final_catalogacao']; ?></dd>
									</dl>

									<!--Fontes de pesquisa e referências - A -->
									<dl class="row">
										<dt class="col-sm-6">Fontes de pesquisa e referências</dt>
  										<dd class="col-sm-6"><?php echo $row4['fontes_pesquisa_referencias']; ?></dd>
									</dl>

									<!--Link visão 360 - A -->
									<dl class="row">
										<dt class="col-sm-6">Link visão 360</dt>
  										<dd class="col-sm-6"><?php echo $row4['link_visao']; ?></dd>
									</dl>

									<!--Meta keywords - A -->
									<dl class="row">
										<dt class="col-sm-6">Meta keywords</dt>
  										<dd class="col-sm-6"><?php echo $row4['meta_keywords']; ?></dd>
									</dl>

									<!--Meta description - A -->
									<dl class="row">
										<dt class="col-sm-6">Meta description</dt>
  										<dd class="col-sm-6"><?php echo $row4['meta_description']; ?></dd>
									</dl>
									
									<!--Meta title - A -->
									<dl class="row">
										<dt class="col-sm-6">Meta title</dt>
  										<dd class="col-sm-6"><?php echo $row4['meta_title']; ?></dd>
									</dl>

									<?php
								}
							}
						}
						
						<p>Ficha de english fields</p>	

						$sql5 = 'SELECT * FROM fichas_english_fields WHERE id_peca = :id_peca';
        				$stmt5 = $conn->prepare($sql5);
        				$stmt5->bindValue(':id_peca', $_POST['id_peca']);
        				$stmt5->execute();
        				$count5 = $stmt5->rowCount();

        				if($count5 > 0){

							$result5 = $stmt5->fetchAll();
			
							foreach($result5 as $row5){

								//Título em inglês - U

								//Autoria em inglês - U

								//Coleção em inglês - U

								//História em inglês - U

								//Eventos associados em inglês - U

								//Conteúdo em inglês - U

								//Peças complementares em inglês - U

								//Descrição da peças complementares em inglês - U

								//Meta keywords em inglês - U

								//Meta description em inglês - U

								//Meta title em inglês - U

								//Disponibilidade da peça - U

								//Destacado ? - U

								//Publica documento ? - U

								//Ficha de conservação - U

							}
						}

					}

        		}else{
        			//Não existe nenhuma peça referente a este ID
        		}

				?>
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