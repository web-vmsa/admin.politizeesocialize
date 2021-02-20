<?php

	$permissoes = explode(",", $usuario['permissoes']);

	if ($usuario['nivel'] == "escritor") {
		
		if (in_array("ADD", $permissoes)) {
			# code...
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

<form class="conteudo" method="POST" enctype="multipart/form-data" id="add_news" autocomplete="off">
	<!-- Topo -->
	<div class="topo">
		<h2>ADICIONAR NOTÍCIA</h2>

		<a href="<?php echo BASE_URL; ?>noticias">
			<div class="back">
				<h2>VOLTAR</h2>
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-undo-4.svg">
			</div>
		</a>
	</div>

	<!-- Itens do gerenciamento -->
	<div class="corpo-conteudo sem-margem">
		<div class="card-conteudo card-input">
			<div class="icon azul-marinho">T</div>
			<h3>TÍTULO</h3>
			<input type="text" name="titulo" id="titulo" placeholder="TÍTULO">
		</div>
		
		<div class="card-conteudo card-input">
			<div class="icon instagram">D</div>
			<h3>DESCRIÇÃO</h3>
			<input type="text" name="descricao" id="descricao" placeholder="DESCRIÇÃO">
		</div>

		<div class="card-conteudo card-input">
			<div class="icon foto">T</div>
			<h3>TAGS</h3>
			<input type="text" name="tags" id="tags" placeholder="TAGS">
		</div>
	</div>

	<!-- Topo -->
	<div class="topo">
		<h2>ANEXOS</h2>
	</div>

	<!-- Itens do gerenciamento -->
	<div class="corpo-conteudo sem-margem">
		<label for="anexo_noticia" class="card-conteudo card-file">
			<div class="icon anexo">A</div>
			<h3>ANEXO</h3>
			<p>SELECIONE UM ARQUIVO (VÍDEO ATÉ 2 MB)</p>
		</label>
		<div class="card-conteudo card-input">
			<div class="icon capa-anexo">L</div>
			<h3>LEGENDA</h3>
			<input type="text" name="legenda" id="legenda" placeholder="LEGENDA">
		</div>
	</div>

	<input style="display: none;" type="file" id="anexo_noticia" name="anexo_noticia">
	<input style="display: none;" type="text" id="categoria_id" name="categoria_id" value="<?php echo $usuario['categoria_id']; ?>">

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
			<p>PUBLICAR ESTA NOTÍCIA</p>
		</button>
	</div>

</form>