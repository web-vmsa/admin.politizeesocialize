<?php

	$propriedades = json_decode($usuario['usuario_prop']); 

	$permissoes = explode(",", $usuario['permissoes']);

	if ($propriedades->nivel == "escritor") {
		# code....
	} else {
		echo "
			<script type='text/javascript'>
				window.location.href='".BASE_URL."home/painel'
			</script>
		";
	}

?>

<!-- Topo -->
<div class="topo">
	<h2>NOTÍCIAS</h2>

	<a href="<?php echo BASE_URL; ?>home/painel">
		<div class="back">
			<h2>VOLTAR</h2>
			<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-undo-4.svg">
		</div>
	</a>
</div>

<!-- Itens do gerenciamento -->
<div class="corpo-conteudo sem-margem">

	<?php if(in_array("ADD", $permissoes)): ?>

	<a href="<?php echo BASE_URL; ?>noticias/add">
		<div class="card-conteudo">
			<div class="icon verde">N</div>
			<h3>NOTÍCIA</h3>
			<p>NOVA INFORMAÇÃO AO SITE</p>
		</div>
	</a>

	<?php endif; ?>

</div>

<!-- Topo -->
<div class="topo">
	<h2>TODAS AS SUAS NOTÍCIAS</h2>
</div>

<!-- Itens do gerenciamento -->
<div class="corpo-conteudo">
	<div class="noticia-menor-politica">
		<img src="https://ogimg.infoglobo.com.br/in/23339989-b88-b82/FT1086A/652/80469877_Brazils-new-President-Jair-Bolsonaro-L-and-Brazils-new-Vice-President-Hamilton-Mourao.jpg">
		<div class="noticia-menor-conteudo-politica">
			<h2>LOREM IPSUM  DOLOR SIT AMET, CONSECTETUR ADIPISCING</h2>
			<p>POR HUGO SOUZA | 20 DE OUTUBRO<br>DE 2020</p>

			<div class="opcoes">
				<div class="edit" data-id="12" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
					<p>EDITAR</p>
				</div>
				<div class="delete" data-id="12" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
					<p>EXCLUIR</p>
				</div>
			</div>
		</div>
	</div>

	<div class="noticia-menor-politica">
		<img src="https://ogimg.infoglobo.com.br/in/23339989-b88-b82/FT1086A/652/80469877_Brazils-new-President-Jair-Bolsonaro-L-and-Brazils-new-Vice-President-Hamilton-Mourao.jpg">
		<div class="noticia-menor-conteudo-politica">
			<h2>LOREM IPSUM  DOLOR SIT AMET, CONSECTETUR ADIPISCING</h2>
			<p>POR HUGO SOUZA | 20 DE OUTUBRO<br>DE 2020</p>

			<div class="opcoes">
				<div class="edit" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
					<p>EDITAR</p>
				</div>
				<div class="delete" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
					<p>EXCLUIR</p>
				</div>
			</div>
		</div>
	</div>

	<div class="noticia-menor-politica">
		<img src="https://ogimg.infoglobo.com.br/in/23339989-b88-b82/FT1086A/652/80469877_Brazils-new-President-Jair-Bolsonaro-L-and-Brazils-new-Vice-President-Hamilton-Mourao.jpg">
		<div class="noticia-menor-conteudo-politica">
			<h2>LOREM IPSUM  DOLOR SIT AMET, CONSECTETUR ADIPISCING</h2>
			<p>POR HUGO SOUZA | 20 DE OUTUBRO<br>DE 2020</p>

			<div class="opcoes">
				<div class="edit" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
					<p>EDITAR</p>
				</div>
				<div class="delete" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
					<p>EXCLUIR</p>
				</div>
			</div>
		</div>
	</div>

	<div class="noticia-menor-politica">
		<img src="https://ogimg.infoglobo.com.br/in/23339989-b88-b82/FT1086A/652/80469877_Brazils-new-President-Jair-Bolsonaro-L-and-Brazils-new-Vice-President-Hamilton-Mourao.jpg">
		<div class="noticia-menor-conteudo-politica">
			<h2>LOREM IPSUM  DOLOR SIT AMET, CONSECTETUR ADIPISCING</h2>
			<p>POR HUGO SOUZA | 20 DE OUTUBRO<br>DE 2020</p>

			<div class="opcoes">
				<div class="edit" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
					<p>EDITAR</p>
				</div>
				<div class="delete" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
					<p>EXCLUIR</p>
				</div>
			</div>
		</div>
	</div>

	<div class="noticia-menor-politica">
		<img src="https://ogimg.infoglobo.com.br/in/23339989-b88-b82/FT1086A/652/80469877_Brazils-new-President-Jair-Bolsonaro-L-and-Brazils-new-Vice-President-Hamilton-Mourao.jpg">
		<div class="noticia-menor-conteudo-politica">
			<h2>LOREM IPSUM  DOLOR SIT AMET, CONSECTETUR ADIPISCING</h2>
			<p>POR HUGO SOUZA | 20 DE OUTUBRO<br>DE 2020</p>

			<div class="opcoes">
				<div class="edit" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
					<p>EDITAR</p>
				</div>
				<div class="delete" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
					<p>EXCLUIR</p>
				</div>
			</div>
		</div>
	</div>

	<div class="noticia-menor-politica">
		<img src="https://ogimg.infoglobo.com.br/in/23339989-b88-b82/FT1086A/652/80469877_Brazils-new-President-Jair-Bolsonaro-L-and-Brazils-new-Vice-President-Hamilton-Mourao.jpg">
		<div class="noticia-menor-conteudo-politica">
			<h2>LOREM IPSUM  DOLOR SIT AMET, CONSECTETUR ADIPISCING</h2>
			<p>POR HUGO SOUZA | 20 DE OUTUBRO<br>DE 2020</p>

			<div class="opcoes">
				<div class="edit" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
					<p>EDITAR</p>
				</div>
				<div class="delete" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
					<p>EXCLUIR</p>
				</div>
			</div>
		</div>
	</div>

	<div class="noticia-menor-politica">
		<img src="https://ogimg.infoglobo.com.br/in/23339989-b88-b82/FT1086A/652/80469877_Brazils-new-President-Jair-Bolsonaro-L-and-Brazils-new-Vice-President-Hamilton-Mourao.jpg">
		<div class="noticia-menor-conteudo-politica">
			<h2>LOREM IPSUM  DOLOR SIT AMET, CONSECTETUR ADIPISCING</h2>
			<p>POR HUGO SOUZA | 20 DE OUTUBRO<br>DE 2020</p>

			<div class="opcoes">
				<div class="edit" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
					<p>EDITAR</p>
				</div>
				<div class="delete" data-id="14" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
					<p>EXCLUIR</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Carregar mais -->
	<div class="carregar-mais">
		<button id="load-more-news">
			CARREGAR MAIS
		</button>
	</div>
</div>