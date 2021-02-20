<?php

	$permissoes = explode(",", $usuario['permissoes']);

	if ($usuario['nivel'] == "escritor") {
		
		if (in_array("EDIT", $permissoes)) {
			
			if ($opi == true) {
				
				// Code...

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

<form class="conteudo" method="POST" id="edit_opi" autocomplete="off">
	<!-- Topo -->
	<div class="topo">
		<h2>EDITAR OPINIÃO</h2>

		<a href="<?php echo BASE_URL; ?>colunas">
			<div class="back">
				<h2>VOLTAR</h2>
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-undo-4.svg">
			</div>
		</a>
	</div>

	<!-- Itens do gerenciamento -->
	<div class="corpo-conteudo sem-margem">

		<input style="display: none;" type="text" name="id" id="id" value="<?php echo $opi['id']; ?>">

		<div class="card-conteudo card-input">
			<div class="icon azul-marinho">T</div>
			<h3>TÍTULO</h3>
			<input type="text" name="titulo" id="titulo" placeholder="TÍTULO" value="<?php echo $opi['titulo']; ?>">
		</div>
		
		<div class="card-conteudo card-input">
			<div class="icon instagram">D</div>
			<h3>DESCRIÇÃO</h3>
			<input type="text" name="descricao" id="descricao" placeholder="DESCRIÇÃO" value="<?php echo $opi['descricao']; ?>">
		</div>

		<div class="card-conteudo card-input">
			<div class="icon foto">T</div>
			<h3>TAGS</h3>
			<input type="text" name="tags" id="tags" placeholder="TAGS" value="<?php echo $opi['tags']; ?>">
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
			<input type="text" name="legenda" id="legenda" placeholder="LEGENDA" value="<?php echo $opi['legenda']; ?>">
		</div>
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
				<?php echo $opi['postagem']; ?>
			</textarea>

		</div>

		<a href="<?php echo BASE_URL; ?>colunas">
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