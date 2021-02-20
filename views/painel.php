<?php 

	$permissoes = explode(",", $usuario['permissoes']);

?>

<!-- Topo -->
<div class="topo">
	<h2>GERENCIAMENTO</h2>
</div>

<!-- Itens do gerenciamento -->
<div class="corpo-conteudo">
	<a href="<?php echo BASE_URL; ?>home/edit">
		<div class="card-conteudo">
			<div class="icon azul">I</div>
			<h3>INFO</h3>
			<p>SEUS DADOS DE PESSOAIS</p>
		</div>
	</a>

	<?php if($usuario['nivel'] == "escritor"): ?>

	<a href="<?php echo BASE_URL; ?>noticias">
		<div class="card-conteudo">
			<div class="icon vermelho">N</div>
			<h3>NOTÍCIA</h3>
			<p>NOVA INFORMAÇÃO AO SITE</p>
		</div>
	</a>

	<?php if($usuario['categoria_id'] == 3): ?>

	<a href="<?php echo BASE_URL; ?>jogos">
		<div class="card-conteudo">
			<div class="icon amarelo">J</div>
			<h3>JOGO</h3>
			<p>NOVA PLACAR AO VIO</p>
		</div>
	</a>

	<?php endif; ?>

	<a href="<?php echo BASE_URL; ?>colunas">
		<div class="card-conteudo">
			<div class="icon vermelho">O</div>
			<h3>OPINIÃO</h3>
			<p>NOVA OPINIÃO AS COLUNAS</p>
		</div>
	</a>

	<?php endif; ?>

	<?php if($usuario['nivel'] == "adm"): ?>

	<a href="<?php echo BASE_URL; ?>jogos/team">
		<div class="card-conteudo">
			<div class="icon amarelo">T</div>
			<h3>TIME</h3>
			<p>NOVO TIME AS COMPETIÇÕES</p>
		</div>
	</a>

	<?php if(in_array("ADD", $permissoes)): ?>

	<a href="<?php echo BASE_URL; ?>home/add">
		<div class="card-conteudo">
			<div class="icon verde">U</div>
			<h3>USUÁRIO</h3>
			<p>NOVO USUÁRIO ADMINISTRADOR</p>
		</div>
	</a>

	<?php endif; ?>

	<?php endif; ?>

</div>