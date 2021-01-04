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
	<div class="jogo-placar jogo-sem-borda">
		<div class="status-jogo">
			<p>Ao vivo</p>
		</div>
		<div class="campeonato-jogo">
			<p>Libertadores - Oitavas de Final / Ida</p>
		</div>
		<div class="placar">
			<img src="https://a2.espncdn.com/combiner/i?img=%2Fi%2Fteamlogos%2Fsoccer%2F500%2F819.png">
			<p>Flamengo</p>
			<h2>2<span>-0</span></h2>
			<p>Racing SC</p>
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Escudo_de_Racing_Club_%282014%29.svg/1200px-Escudo_de_Racing_Club_%282014%29.svg.png">
		</div>
		<div class="data-oficial">
			<p>12/08/2020 12h30</p>
		</div>
		<div class="opcoes">
			<div class="edit" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
				<p>EDITAR</p>
			</div>
			<div class="delete" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
				<p>EXCLUIR</p>
			</div>
		</div>
	</div>

	<div class="linha-abaixo-jogo"></div>

	<div class="jogo-placar jogo-sem-borda">
		<div class="campeonato-jogo">
			<p>Libertadores - Oitavas de Final / Ida</p>
		</div>
		<div class="placar">
			<img src="https://a2.espncdn.com/combiner/i?img=%2Fi%2Fteamlogos%2Fsoccer%2F500%2F819.png">
			<p>Flamengo</p>
			<h2>2<span>-0</span></h2>
			<p>Racing SC</p>
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Escudo_de_Racing_Club_%282014%29.svg/1200px-Escudo_de_Racing_Club_%282014%29.svg.png">
		</div>
		<div class="data-oficial">
			<p>12/08/2020 12h30</p>
		</div>
		<div class="opcoes">
			<div class="edit" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
				<p>EDITAR</p>
			</div>
			<div class="delete" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
				<p>EXCLUIR</p>
			</div>
		</div>
	</div>

	<div class="linha-abaixo-jogo"></div>

	<div class="jogo-placar jogo-sem-borda">
		<div class="campeonato-jogo">
			<p>Libertadores - Oitavas de Final / Ida</p>
		</div>
		<div class="placar">
			<img src="https://a2.espncdn.com/combiner/i?img=%2Fi%2Fteamlogos%2Fsoccer%2F500%2F819.png">
			<p>Flamengo</p>
			<h2>2<span>-0</span></h2>
			<p>Racing SC</p>
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Escudo_de_Racing_Club_%282014%29.svg/1200px-Escudo_de_Racing_Club_%282014%29.svg.png">
		</div>
		<div class="data-oficial">
			<p>12/08/2020 12h30</p>
		</div>
		<div class="opcoes">
			<div class="edit" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
				<p>EDITAR</p>
			</div>
			<div class="delete" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
				<p>EXCLUIR</p>
			</div>
		</div>
	</div>

	<div class="linha-abaixo-jogo"></div>

	<div class="jogo-placar jogo-sem-borda">
		<div class="campeonato-jogo">
			<p>Libertadores - Oitavas de Final / Ida</p>
		</div>
		<div class="placar">
			<img src="https://a2.espncdn.com/combiner/i?img=%2Fi%2Fteamlogos%2Fsoccer%2F500%2F819.png">
			<p>Flamengo</p>
			<h2>2<span>-0</span></h2>
			<p>Racing SC</p>
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Escudo_de_Racing_Club_%282014%29.svg/1200px-Escudo_de_Racing_Club_%282014%29.svg.png">
		</div>
		<div class="data-oficial">
			<p>12/08/2020 12h30</p>
		</div>
		<div class="opcoes">
			<div class="edit" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
				<p>EDITAR</p>
			</div>
			<div class="delete" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
				<p>EXCLUIR</p>
			</div>
		</div>
	</div>

	<div class="linha-abaixo-jogo"></div>

	<div class="jogo-placar jogo-sem-borda">
		<div class="campeonato-jogo">
			<p>Libertadores - Oitavas de Final / Ida</p>
		</div>
		<div class="placar">
			<img src="https://a2.espncdn.com/combiner/i?img=%2Fi%2Fteamlogos%2Fsoccer%2F500%2F819.png">
			<p>Flamengo</p>
			<h2>2<span>-0</span></h2>
			<p>Racing SC</p>
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Escudo_de_Racing_Club_%282014%29.svg/1200px-Escudo_de_Racing_Club_%282014%29.svg.png">
		</div>
		<div class="data-oficial">
			<p>12/08/2020 12h30</p>
		</div>
		<div class="opcoes">
			<div class="edit" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
				<p>EDITAR</p>
			</div>
			<div class="delete" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
				<p>EXCLUIR</p>
			</div>
		</div>
	</div>

	<div class="linha-abaixo-jogo"></div>

	<div class="jogo-placar jogo-sem-borda">
		<div class="campeonato-jogo">
			<p>Libertadores - Oitavas de Final / Ida</p>
		</div>
		<div class="placar">
			<img src="https://a2.espncdn.com/combiner/i?img=%2Fi%2Fteamlogos%2Fsoccer%2F500%2F819.png">
			<p>Flamengo</p>
			<h2>2<span>-0</span></h2>
			<p>Racing SC</p>
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Escudo_de_Racing_Club_%282014%29.svg/1200px-Escudo_de_Racing_Club_%282014%29.svg.png">
		</div>
		<div class="data-oficial">
			<p>12/08/2020 12h30</p>
		</div>
		<div class="opcoes">
			<div class="edit" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
				<p>EDITAR</p>
			</div>
			<div class="delete" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
				<p>EXCLUIR</p>
			</div>
		</div>
	</div>

	<div class="linha-abaixo-jogo"></div>

	<div class="jogo-placar jogo-sem-borda">
		<div class="campeonato-jogo">
			<p>Libertadores - Oitavas de Final / Ida</p>
		</div>
		<div class="placar">
			<img src="https://a2.espncdn.com/combiner/i?img=%2Fi%2Fteamlogos%2Fsoccer%2F500%2F819.png">
			<p>Flamengo</p>
			<h2>2<span>-0</span></h2>
			<p>Racing SC</p>
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Escudo_de_Racing_Club_%282014%29.svg/1200px-Escudo_de_Racing_Club_%282014%29.svg.png">
		</div>
		<div class="data-oficial">
			<p>12/08/2020 12h30</p>
		</div>
		<div class="opcoes">
			<div class="edit" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-edit-10.svg">
				<p>EDITAR</p>
			</div>
			<div class="delete" data-id="14" data-redirect="jogos">
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-x-mark-4.svg">
				<p>EXCLUIR</p>
			</div>
		</div>
	</div>

	<div class="linha-abaixo-jogo"></div>

	<!-- Carregar mais -->
	<div class="carregar-mais">
		<button id="load-more-games">
			CARREGAR MAIS
		</button>
	</div>
</div>