<!-- Topo -->
<div class="topo">
	<h2>EDITAR INFORMAÇÕES</h2>

	<a href="<?php echo BASE_URL; ?>home/painel">
		<div class="back">
			<h2>VOLTAR</h2>
			<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-undo-4.svg">
		</div>
	</a>
</div>

<!-- Itens do gerenciamento -->
<form method="POST" enctype="multipart/form-data" class="corpo-conteudo">
	<div class="card-conteudo card-input">
		<div class="icon verde">N</div>
		<h3>NOME</h3>
		<input type="text" name="nome" id="nome" placeholder="SEU NOME">
	</div>
	<label for="foto_perfil" class="card-conteudo card-file">
		<div class="icon foto">F</div>
		<h3>FOTO</h3>
		<p>SELECIONE UM ARQUIVO</p>
	</label>
	<div class="card-conteudo card-input">
		<div class="icon rosa">F</div>
		<h3>FRASE</h3>
		<input type="text" name="frase" id="frase" placeholder="SUA FRASE">
	</div>
	<div class="card-conteudo card-input">
		<div class="icon facebook">F</div>
		<h3>FACEBOOK</h3>
		<input type="text" name="facebook" id="facebook" placeholder="LINK">
	</div>
	<div class="card-conteudo card-input">
		<div class="icon instagram">I</div>
		<h3>INSTAGRAM</h3>
		<input type="text" name="instagram" id="instagram" placeholder="LINK">
	</div>
	<div class="card-conteudo card-input">
		<div class="icon youtube">Y</div>
		<h3>YOUTUBE</h3>
		<input type="text" name="youtube" id="youtube" placeholder="LINK">
	</div>
	<div class="card-conteudo card-input">
		<div class="icon linkedin">L</div>
		<h3>LINKEDIN</h3>
		<input type="text" name="linkedin" id="linkedin" placeholder="LINK">
	</div>

	<input style="display: none;" type="file" id="foto_perfil" name="foto_perfil">
</form>