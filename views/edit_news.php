<?php

	$permissoes = explode(",", $usuario['permissoes']);

	if ($usuario['nivel'] == "escritor") {
		
		if (in_array("EDIT", $permissoes)) {
			
			if ($noticia == true) {
				
				// code...

			} else {
				echo "
					<script type='text/javascript'>
						window.location.href='".BASE_URL."noticias'
					</script>
				";	
			}

		} else {
			echo "
				<script type='text/javascript'>
					window.location.href='".BASE_URL."noticias'
				</script>
			";
		}

	} else {
		echo "
			<script type='text/javascript'>
				window.location.href='".BASE_URL."home/painel'
			</script>
		";
	}

?>

<form class="conteudo" method="POST" id="edit_news">
	<!-- Topo -->
	<div class="topo">
		<h2>EDITAR NOTÍCIA</h2>

		<a href="<?php echo BASE_URL; ?>noticias">
			<div class="back">
				<h2>VOLTAR</h2>
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-undo-4.svg">
			</div>
		</a>
	</div>

	<!-- Itens do gerenciamento -->
	<div class="corpo-conteudo sem-margem">

		<input style="display: none;" type="text" name="id" id="id" value="<?php echo $noticia['id']; ?>">

		<div class="card-conteudo card-input">
			<div class="icon azul-marinho">T</div>
			<h3>TÍTULO</h3>
			<input type="text" name="titulo" id="titulo" placeholder="TÍTULO" value="<?php echo $noticia['titulo']; ?>">
		</div>
		
		<div class="card-conteudo card-input">
			<div class="icon instagram">D</div>
			<h3>DESCRIÇÃO</h3>
			<input type="text" name="descricao" id="descricao" placeholder="DESCRIÇÃO" value="<?php echo $noticia['descricao']; ?>">
		</div>

		<div class="card-conteudo card-input">
			<div class="icon foto">T</div>
			<h3>TAGS</h3>
			<input type="text" name="tags" id="tags" placeholder="TAGS" value="<?php echo $noticia['tags']; ?>">
		</div>
	</div>

	<!-- Topo -->
	<div class="topo">
		<h2>ANEXOS</h2>
	</div>

	<!-- Itens do gerenciamento -->
	<div class="corpo-conteudo sem-margem">
		<div class="card-conteudo card-input">
			<div class="icon capa-anexo">L</div>
			<h3>LEGENDA</h3>
			<input type="text" name="legenda" id="legenda" placeholder="LEGENDA" value="<?php echo $noticia['legenda']; ?>">
		</div>
	</div>

	<!-- Topo -->
	<div class="topo">
		<h2>NOTÍCIA</h2>
	</div>

	<!-- Descrição maior -->
	<div class="corpo-conteudo">
		<div class="card-textarea">
			<div class="icon foto">N</div>
			<h3>NOTÍCIA</h3>

			<textarea name="noticia" id="noticia">
				<?php echo $noticia['postagem']; ?>
			</textarea>
		</div>

		<a href="<?php echo BASE_URL; ?>noticias">
			<div class="card-conteudo">
				<div class="icon vermelho">C</div>
				<h3>CANCELAR</h3>
				<p>NÃO PUBLICAR A NOTÍCIA</p>
			</div>
		</a>

		<button type="submit" class="card-conteudo card-file card-button">
			<div class="icon verde">F</div>
			<h3>FINALIZAR</h3>
			<p>EDITAR ESTA NOTÍCIA</p>
		</button>
	</div>
</form>