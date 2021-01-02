<?php

	$propriedades = json_decode($usuario['usuario_prop']); 

	$permissoes = explode(",", $usuario['permissoes']);

	if ($propriedades->nivel == "escritor") {
		
		if ($propriedades->categoria == "esportes") {
			
			if (in_array("EDIT", $permissoes)) {
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

	} else {
		echo "
			<script type='text/javascript'>
				window.location.href='".BASE_URL."home/painel'
			</script>
		";
	}

?>

<form class="conteudo" method="POST" enctype="multipart/form-data" id="edit_jogo">
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
		<div class="card-conteudo card-input">
			<div class="icon vermelho">C</div>
			<h3>CAMPEONATO</h3>
			<select id="campeonato" name="campeonato">
				<option>SELECIONE</option>
				<option value="1">BRASILEIRÃO</option>
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
			<select id="time_fora" name="time_fora">
				<option>SELECIONE</option>
				<option value="1">FLAMENGO</option>
				<option value="2">SANTOS</option>
				<option value="3">GRÊMIO</option>
				<option value="4">SÃO PAULO</option>
			</select>
		</div>
		
		<div class="card-conteudo card-input">
			<div class="icon amarelo">P</div>
			<h3>PLACAR</h3>
			<input type="text" name="placar" id="placar" placeholder="1-1">
		</div>

		<div class="card-conteudo card-input">
			<div class="icon amarelo">F</div>
			<h3>TIME DE FORA</h3>
			<select id="time_fora" name="time_fora">
				<option>SELECIONE</option>
				<option value="1">FLAMENGO</option>
				<option value="2">SANTOS</option>
				<option value="3">GRÊMIO</option>
				<option value="4">SÃO PAULO</option>
			</select>
		</div>

		<div class="card-conteudo card-input">
			<div class="icon amarelo">S</div>
			<h3>STATUS</h3>
			<select id="status" name="status">
				<option>SELECIONE</option>
				<option value="1o tempo">1o TEMPO</option>
				<option value="Intervalo">INTERVALO</option>
				<option value="2o tempo">2o TEMPO</option>
				<option value="Fim de jogo">FIM DE JOGO</option>
				<option value="Paralisado">PARALISADO</option>
				<option value="Adiado">ADIADO</option>
				<option value="Cancelado">CANCELADO</option>
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
			<div class="icon anexo">I</div>
			<h3>IMAGEM</h3>
			<p>SELECIONE UM ARQUIVO</p>
		</label>
		<label for="anexo_jogo" class="card-conteudo card-file">
			<div class="icon anexo">V</div>
			<h3>VÍDEO</h3>
			<p>SELECIONE UM ARQUIVO (ATÉ 30s)</p>
		</label>
		<label for="capa_anexo" class="card-conteudo card-file">
			<div class="icon capa-anexo">C</div>
			<h3>CAPA</h3>
			<p>CAPA DO VÍDEO</p>
		</label>
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
				
			</textarea>

			<script type="text/javascript">
				 CKEDITOR.replace( 'lances' );
			</script>
		</div>
	</div>

	<input style="display: none;" type="file" id="anexo_jogo" name="anexo_jogo">
	<input style="display: none;" type="file" id="capa_anexo" name="capa_anexo">
</form>