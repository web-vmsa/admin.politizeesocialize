<?php

	$propriedades = json_decode($usuario['usuario_prop']); 

	$permissoes = explode(",", $usuario['permissoes']);

	if ($propriedades->nivel == "escritor") {
		
		if ($propriedades->categoria == "esportes") {
			
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
	<h2>JOGOS</h2>

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

	<a href="<?php echo BASE_URL; ?>jogos/add">
		<div class="card-conteudo">
			<div class="icon amarelo">J</div>
			<h3>JOGO</h3>
			<p>NOVO PLACAR AO VIVO</p>
		</div>
	</a>

	<?php endif; ?>
	
</div>

<!-- Topo -->
<div class="topo">
	<h2>TODOS OS SEUS JOGOS</h2>
</div>

<!-- Itens do gerenciamento -->
<div class="corpo-conteudo jogos-conteudo">

	<?php 
		foreach($jogos as $dados): 

		$propriedades_jogo = json_decode($dados['jogo_prop']);

		$placar = $dados['placar'];

		$resultado = explode("-", $placar);

		$valor_maior = max($resultado);

		$placar_time_casa = $resultado[0];

		$placar_time_fora = $resultado[1];
	?>

	<div class="jogo-placar jogo-sem-borda">
		<div class="status-jogo">
			<p><?php echo $dados['status_jogo']; ?></p>
		</div>
		<div class="campeonato-jogo">
			<p><?php echo $propriedades_jogo->campeonato; ?> - <?php echo $propriedades_jogo->fase;; ?></p>
		</div>
		<div class="placar">
			<img src="<?php echo BASE_URL; ?>jogos/escudo/<?php echo $propriedades_jogo->time_casa; ?>">

			<p><?php echo $propriedades_jogo->time_casa; ?></p>
				
			<?php if($placar_time_casa == $valor_maior): ?>

			<h2><?php echo $placar_time_casa; ?><span>-<?php echo $placar_time_fora; ?></span></h2>

			<?php else: ?>

			<h2><span><?php echo $placar_time_casa; ?>-</span><?php echo $placar_time_fora; ?></h2>

			<?php endif; ?>

			<p><?php echo $propriedades_jogo->time_fora; ?></p>

			<img src="<?php echo BASE_URL; ?>jogos/escudo/<?php echo $propriedades_jogo->time_fora; ?>">
		</div>
		<div class="data-oficial">
			<p><?php echo substr(str_replace(":", "h", $dados['data']), 0,-3);?></p>
		</div>
		<div class="opcoes">

			<?php if(in_array("EDIT", $permissoes)): ?>

			<div class="edit" data-id="<?php echo $dados['id']; ?>" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
				<p>EDITAR</p>
			</div>

			<?php endif; ?>

			<?php if(in_array("DEL", $permissoes)): ?>

			<div class="delete" data-id="<?php echo $dados['id']; ?>" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
				<p>EXCLUIR</p>
			</div>

			<?php endif; ?>

		</div>
	</div>

	<div class="linha-abaixo-jogo"></div>

	<?php endforeach; ?>

	<!-- Carregar mais -->
	<div class="carregar-mais">
		<button id="load-more-games">
			CARREGAR MAIS
		</button>
	</div>
</div>