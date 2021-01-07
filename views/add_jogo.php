<?php

	$propriedades = json_decode($usuario['usuario_prop']); 

	$permissoes = explode(",", $usuario['permissoes']);

	if ($propriedades->nivel == "escritor") {
		
		if ($propriedades->categoria == "esportes") {
			
			if (in_array("ADD", $permissoes)) {
				# code...
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

<form class="conteudo" method="POST" enctype="multipart/form-data" id="add_jogo" autocomplete="off">
	<!-- Topo -->
	<div class="topo">
		<h2>ADICIONAR JOGO</h2>

		<a href="<?php echo BASE_URL; ?>jogos">
			<div class="back">
				<h2>VOLTAR</h2>
				<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-undo-4.svg">
			</div>
		</a>
	</div>

	<!-- Itens do gerenciamento -->
	<div class="corpo-conteudo sem-margem">
		<div class="card-conteudo card-input">
			<div class="icon vermelho">C</div>
			<h3>CAMPEONATO</h3>
			<select id="campeonato" name="campeonato">
				<option>SELECIONE</option>

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
			<input type="text" name="fase" id="fase" placeholder="FASE">
		</div>

		<div class="card-conteudo card-input">
			<div class="icon vermelho">D</div>
			<h3>DATA OFICIAL</h3>
			<input type="datetime-local" name="data" id="data">
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
				<option>SELECIONE</option>

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
			<input type="text" name="placar" id="placar" value="0-0">
		</div>

		<div class="card-conteudo card-input">
			<div class="icon amarelo">F</div>
			<h3>TIME DE FORA</h3>
			<select id="time_fora" name="time_fora">
				<option>SELECIONE</option>

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
		<label for="anexo_jogo" class="card-conteudo card-file">
			<div class="icon anexo">A</div>
			<h3>ANEXO</h3>
			<p>SELECIONE UM ARQUIVO (VÍDEO ATÉ 30s)</p>
		</label>
		<div class="card-conteudo card-input">
			<div class="icon capa-anexo">L</div>
			<h3>LEGENDA</h3>
			<input type="text" name="legenda" id="legenda" placeholder="LEGENDA">
		</div>
	</div>

	<input style="display: none;" type="file" id="anexo_jogo" name="anexo_jogo">

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
				
			</textarea>
		</div>

		<a href="<?php echo BASE_URL; ?>jogos">
			<div class="card-conteudo">
				<div class="icon vermelho">C</div>
				<h3>CANCELAR</h3>
				<p>NÃO PUBLICAR O PLACAR</p>
			</div>
		</a>

		<button type="submit" class="card-conteudo card-file card-button">
			<div class="icon verde">F</div>
			<h3>FINALIZAR</h3>
			<p>PUBLICAR ESTE JOGO</p>
		</button>
	</div>
</form>