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

	<?php 
		foreach($noticias as $dados):

		$arquivo_prop = json_decode($dados['arquivo_prop']);
	?>

	<div class="noticia-menor-politica">
		
		<?php if($arquivo_prop->tipo == "imagem"): ?>

		<img src="<?php echo BASE_URL; ?>users/images/<?php echo $dados['arquivo']; ?>">

		<?php elseif($arquivo_prop->tipo == "video"): ?>

		<video>
			<source src="<?php echo BASE_URL; ?>users/videos/<?php echo $dados['arquivo']; ?>" type="video/mp4">
		</video>

		<?php endif; ?>

		<div class="noticia-menor-conteudo-politica">
			<h2><?php echo mb_strtoupper($dados['titulo']); ?></h2>
			<p>POR <?php echo mb_strtoupper($dados['nome']); ?> | <?php echo $dados['dia']; ?> DE 

				<?php
					switch ($dados['mes']) {
				        case "01":    $mes = "JANEIRO";     break;
				        case "02":    $mes = "FEVEREIRO";   break;
				        case "03":    $mes = "MARÇO";       break;
				        case "04":    $mes = "ABRIL";       break;
				        case "05":    $mes = "MAIO";        break;
				        case "06":    $mes = "JUNHO";       break;
				        case "07":    $mes = "JULHO";       break;
				        case "08":    $mes = "AGOSTO";      break;
				        case "09":    $mes = "SETEMBRO";    break;
				        case "10":    $mes = "OUTUBRO";     break;
				        case "11":    $mes = "NOVEMBRO";    break;
				        case "12":    $mes = "DEZEMBRO";    break; 
				 }
				 
				 echo $mes;
				?>


				<br>DE <?php echo $dados['ano']; ?></p>

			<div class="opcoes">

				<?php if(in_array("EDIT", $permissoes)): ?>

				<div class="edit" data-id="<?php echo $dados['id']; ?>" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
					<p>EDITAR</p>
				</div>

				<?php endif; ?>

				<?php if(in_array("DEL", $permissoes)): ?>

				<div class="delete" data-id="<?php echo $dados['id']; ?>" data-redirect="noticias">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
					<p>EXCLUIR</p>
				</div>

				<?php endif; ?>

			</div>
		</div>
	</div>

	<?php endforeach; ?>

	<!-- Carregar mais -->
	<div class="carregar-mais">
		<button id="load-more-news">
			CARREGAR MAIS
		</button>
	</div>
</div>