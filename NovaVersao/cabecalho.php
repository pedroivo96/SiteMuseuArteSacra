<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<a class="navbar-brand font-weight-bold" href="./index.php">Museu Arte Sacra</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
	  
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<form class="form-inline my-2 my-lg-0 mr-auto">
				<input class="form-control mr-sm-2 bg-light" type="search" placeholder="Encontre uma peça" aria-label="Pesquisar peça">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
			</form>
		  	<ul class="navbar-nav">

				<?php
					session_start(); 
					// Verifica se existe os dados da sessão de login 
					if(isset($_SESSION["nome_usuario"])) { 
				?>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $_SESSION["nome_usuario"]; ?>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="pagina_usuario.php">Minhas peças</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Configurações de conta</a>
					<a class="dropdown-item" href="deslogar_usuario.php">Sair</a>
					</div>
				</li>

				<?php } ?>

				<li class="nav-item">
					<a class="nav-link" href="sobre.php">Sobre</a>
				</li>
		 	</ul>
		</div>
	</nav>
</header>

	  