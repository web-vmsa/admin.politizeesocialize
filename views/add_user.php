<?php

	$propriedades = json_decode($usuario['usuario_prop']); 

	$permissoes = explode(",", $usuario['permissoes']);

	if ($propriedades->nivel == "adm") {
		
		if (in_array("ADD", $permissoes)) {
			# code...
		} else {
			echo "
				<script type='text/javascript'>
					window.location.href='".BASE_URL."home/painel'
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

<!-- Topo -->
<div class="topo">
	<h2>ADICIONAR USUÁRIO</h2>

	<a href="<?php echo BASE_URL; ?>home/painel">
		<div class="back">
			<h2>VOLTAR</h2>
			<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-undo-4.svg">
		</div>
	</a>
</div>

<!-- Itens do gerenciamento -->
<form method="POST" enctype="multipart/form-data" class="corpo-conteudo" id="add_user">
	<div class="card-conteudo card-input">
		<div class="icon vermelho">N</div>
		<h3>NOME</h3>
		<input type="text" name="nome" id="nome" placeholder="NOME">
	</div>
	
	<div class="card-conteudo card-input">
		<div class="icon youtube">E</div>
		<h3>E-MAIL</h3>
		<input type="text" name="email" id="email" placeholder="E-MAIL">
	</div>

	<div class="card-conteudo card-input">
		<div class="icon azul-marinho">S</div>
		<h3>SENHA</h3>
		<input type="text" name="senha" id="senha" placeholder="SENHA">
	</div>

	<div class="card-conteudo card-input">
		<div class="icon gray">P</div>
		<h3>PERMISSÕES</h3>
		<input type="text" name="permissoes" id="permissoes" placeholder="PERMISSÕES">
	</div>

	<div class="card-conteudo card-input">
		<div class="icon cinza-escuro">P</div>
		<h3>PROPRIEDADES</h3>
		<input type="text" name="propriedades" id="propriedades" placeholder="PROPRIEDADES">
	</div>

	<button type="submit" class="card-conteudo card-file card-button">
		<div class="icon verde">F</div>
		<h3>FINALIZAR</h3>
		<p>CRIAR ESTE USUÁRIO</p>
	</button>
</form>