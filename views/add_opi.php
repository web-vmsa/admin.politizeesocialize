<?php

	$propriedades = json_decode($usuario['usuario_prop']); 

	$permissoes = explode(",", $usuario['permissoes']);

	if ($propriedades->nivel == "escritor") {
		
		if (in_array("ADD", $permissoes)) {
			# code...
		} else {
			echo "
				<script type='text/javascript'>
					window.location.href='".BASE_URL."colunas'
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

<form class="conteudo" method="POST" enctype="multipart/form-data" id="add_opi">
	<!-- Topo -->
	<div class="topo">
		<h2>ADICIONAR OPINIÃO</h2>

		<a href="<?php echo BASE_URL; ?>colunas">
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
			<div class="icon anexo">I</div>
			<h3>IMAGEM</h3>
			<p>SELECIONE UM ARQUIVO</p>
		</label>
		<label for="anexo_noticia" class="card-conteudo card-file">
			<div class="icon anexo">V</div>
			<h3>VÍDEO</h3>
			<p>SELECIONE UM ARQUIVO (ATÉ 30s)</p>
		</label>
		<label for="capa_anexo" class="card-conteudo card-file">
			<div class="icon capa-anexo">C</div>
			<h3>CAPA</h3>
			<p>CAPA DO VÍDEO</p>
		</label>
	</div>

	<!-- Topo -->
	<div class="topo">
		<h2>POSTAGEM</h2>
	</div>

	<!-- Descrição maior -->
	<div class="corpo-conteudo">
		<div class="card-textarea">
			<div class="icon foto">P</div>
			<h3>POSTAGEM</h3>

			<textarea name="noticia" id="noticia">
				
			</textarea>

			<script type="text/javascript">
				 CKEDITOR.replace( 'noticia' );
			</script>
		</div>

		<a href="<?php echo BASE_URL; ?>colunas">
			<div class="card-conteudo">
				<div class="icon vermelho">C</div>
				<h3>CANCELAR</h3>
				<p>NÃO PUBLICAR A OPINIÃO</p>
			</div>
		</a>

		<button type="submit" class="card-conteudo card-file card-button">
			<div class="icon verde">F</div>
			<h3>FINALIZAR</h3>
			<p>PUBLICAR ESTA OPINIÃO</p>
		</button>
	</div>

	<input style="display: none;" type="file" id="anexo_noticia" name="anexo_noticia">
	<input style="display: none;" type="file" id="capa_anexo" name="capa_anexo">
</form>