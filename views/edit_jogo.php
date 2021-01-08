<?php

	$propriedades = json_decode($usuario['usuario_prop']); 

	$permissoes = explode(",", $usuario['permissoes']);

	if ($propriedades->nivel == "escritor") {
		
		if ($propriedades->categoria == "esportes") {
			
			if (in_array("EDIT", $permissoes)) {
				
				if ($jogo == true) {
					
					$arquivo_prop = json_decode($jogo['arquivo_prop']);

					$jogo_prop = json_decode($jogo['jogo_prop']);

				} else {
					echo "
						<script type='text/javascript'>
							window.location.href='".BASE_URL."jogos'
						</script>
					";
				}

			} else {
				echo "
					<script type='text/javascript'>
						window.location.href='".BASE_URL."jogos'
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

	} else {
		echo "
			<script type='text/javascript'>
				window.location.href='".BASE_URL."home/painel'
			</script>
		";
	}

?>

<form class="conteudo" method="POST" id="edit_jogo" autocomplete="off">
	<!-- Topo -->
	<div class="topo">
		<h2>EDITAR JOGO</h2>

		<a href="<?php echo BASE_URL; ?>jogos">
			<div class="back">
				<h2>VOLTAR</h2>
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-undo-4.svg">
			</div>
		</a>
	</div>

	<!-- Itens do gerenciamento -->
	<div class="corpo-conteudo sem-margem">

		<input style="display: none;" type="text" name="id" id="id" value="<?php echo $jogo['id']; ?>">

		<div class="card-conteudo card-input">
			<div class="icon vermelho">C</div>
			<h3>CAMPEONATO</h3>
			<select id="campeonato" name="campeonato">
				<option value="<?php echo $jogo_prop->campeonato ?>"><?php echo $jogo_prop->campeonato; ?></option>

				<?php 
					foreach($copas as $campeonato):
				?>

				<option value="<?php echo $campeonato['alcunha']; ?>"><?php echo utf8_encode($campeonato['alcunha']); ?></option>

				<?php endforeach; ?>
			</select>
		</div>
		
		<div class="card-conteudo card-input">
			<div class="icon vermelho">F</div>
			<h3>FASE</h3>
			<input type="text" name="fase" id="fase" placeholder="FASE" value="<?php echo $jogo_prop->fase; ?>">
		</div>
	</div>

	<!-- Topo -->
	<div class="topo">
		<h2>INFORMAÇÕES</h2>
	</div>

	<!-- Itens do gerenciamento -->
	<div class="corpo-conteudo sem-margem">
		<div class="card-conteudo card-input">
			<div class="icon amarelo">C</div>
			<h3>TIME DE CASA</h3>
			<select id="time_casa" name="time_casa">
				<option value="<?php echo $jogo_prop->time_casa; ?>"><?php echo $jogo_prop->time_casa; ?></option>

				<?php 
					foreach($equipes as $times):
				?>

				<option value="<?php echo $times['nome']; ?>"><?php echo $times['nome']; ?></option>

				<?php endforeach; ?>
			</select>
		</div>
		
		<div class="card-conteudo card-input">
			<div class="icon amarelo">P</div>
			<h3>PLACAR</h3>
			<input type="text" name="placar" id="placar" placeholder="1-1" value="<?php echo $jogo['placar']; ?>">
		</div>

		<div class="card-conteudo card-input">
			<div class="icon amarelo">F</div>
			<h3>TIME DE FORA</h3>
			<select id="time_fora" name="time_fora">
				<option value="<?php echo $jogo_prop->time_fora; ?>"><?php echo $jogo_prop->time_fora ?></option>

				<?php 
					foreach($equipes as $times):
				?>

				<option value="<?php echo $times['nome']; ?>"><?php echo $times['nome']; ?></option>

				<?php endforeach; ?>
			</select>
		</div>

		<div class="card-conteudo card-input">
			<div class="icon amarelo">S</div>
			<h3>STATUS</h3>
			<select id="status" name="status">
				<option value="<?php echo $jogo['status_jogo']; ?>"><?php echo $jogo['status_jogo']; ?></option>

				<option value="Vai começar">Vai começar</option>
				<option value="1o tempo">1o tempo</option>
				<option value="Intervalo">Intervalo</option>
				<option value="2o tempo">2o tempo</option>
				<option value="2o tempo">Fim de jogo</option>
				<option value="Paralisado">Paralisado</option>
				<option value="Adiado">Adiado</option>
				<option value="Cancelado">Cancelado</option>
			</select>
		</div>
	</div>

	<!-- Topo -->
	<div class="topo">
		<h2>ANEXOS</h2>
	</div>

	<!-- Itens do gerenciamento -->
	<div class="corpo-conteudo sem-margem">

		<input style="display: none;" type="text" name="tipo" id="tipo" value="<?php echo $arquivo_prop->tipo; ?>">

		<div class="card-conteudo card-input">
			<div class="icon capa-anexo">L</div>
			<h3>LEGENDA</h3>
			<input type="text" name="legenda" id="legenda" placeholder="LEGENDA" value="<?php echo $arquivo_prop->legenda; ?>">
		</div>
	</div>

	<!-- Topo -->
	<div class="topo">
		<h2>LANCE A LANCE</h2>
	</div>

	<!-- Descrição maior -->
	<div class="corpo-conteudo">
		<div class="card-textarea">
			<div class="icon foto">L</div>
			<h3>LANCES</h3>

			<textarea name="lances" id="lances">
				<?php echo $jogo['lances']; ?>
			</textarea>
		</div>

		<a href="<?php echo BASE_URL; ?>jogos">
			<div class="card-conteudo">
				<div class="icon vermelho">C</div>
				<h3>CANCELAR</h3>
				<p>NÃO EDITAR O JOGO</p>
			</div>
		</a>

		<button type="submit" class="card-conteudo card-file card-button">
			<div class="icon verde">F</div>
			<h3>FINALIZAR</h3>
			<p>EDITAR ESTE JOGO</p>
		</button>
	</div>
</form>