<?php

	$propriedades = json_decode($usuario['usuario_prop']); 

	$permissoes = explode(",", $usuario['permissoes']);

	if ($propriedades->nivel == "adm") {
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
	<h2>ADICIONAR TIME</h2>

	<a href="<?php echo BASE_URL; ?>home/painel">
		<div class="back">
			<h2>VOLTAR</h2>
			<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-undo-4.svg">
		</div>
	</a>
</div>

<!-- Itens do gerenciamento -->
<form method="POST" enctype="multipart/form-data" class="corpo-conteudo" id="add_team" autocomplete="off">
	<div class="card-conteudo card-input">
		<div class="icon vermelho">N</div>
		<h3>NOME</h3>
		<input type="text" name="nome" id="nome" placeholder="NOME">
	</div>
	
	<label for="escudo_time" class="card-conteudo card-file">
		<div class="icon foto">E</div>
		<h3>ESCUDO</h3>
		<p>SELECIONE UM ARQUIVO</p>
	</label>

	<input style="display: none;" type="file" id="escudo_time" name="escudo_time">

	<div class="card-conteudo card-input">
		<div class="icon amarelo">A</div>
		<h3>ALCUNHA</h3>
		<input type="text" name="alcunha" id="alcunha" placeholder="ALCUNHA">
	</div>

	<a href="<?php echo BASE_URL; ?>home/painel">
		<div class="card-conteudo">
			<div class="icon vermelho">C</div>
			<h3>CANCELAR</h3>
			<p>NÃO CRIAR ESTE TIME</p>
		</div>
	</a>

	<button type="submit" class="card-conteudo card-file card-button">
		<div class="icon verde">F</div>
		<h3>FINALIZAR</h3>
		<p>CRIAR ESTE TIME</p>
	</button>
</form>