<?php 
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
	# code...
} else {
	echo "
		<script type='text/javascript'>
			window.location.href='".BASE_URL."home'
		</script>
	";
}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Primary Meta Tags -->
	<title>Politize e socialize - Painel administrativo</title>
	<meta name="title" content="Politize e socialize - Painel administrativo">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="Portuguese">
	<meta name="revisit-after" content="2 days">
	<meta name="author" content="Victor Miguel">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:image" content="<?php echo BASE_URL; ?>assets/images/logotipo-politizeesocialize.png">

	<!-- Css -->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">

	<!-- Favicon -->
	<link rel="icon" href="<?php echo BASE_URL; ?>assets/images/favicon.png" type="image/x-icon" />

	<!-- jQuery -->
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.5.1.min.js"></script>

	<!-- Script -->
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>

	<!-- CKEditor v4 -->
	<script src="<?php echo BASE_URL; ?>assets/js/ckeditor/ckeditor.js"></script>

	<!-- SweetAlert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<!-- Loading -->
	<div class="fundo-escuro">
		<div class="loading-box">
				
			<img src="<?php echo BASE_URL; ?>assets/images/509258_fb107.gif">

			<h3>CARREGANDO...</h3>

		</div>
	</div>

	<!-- Abre menu -->
	<div class="abre-menu">
		<p>MENU</p>
	</div>

	<!-- Corpo -->
	<section class="corpo">
		<!-- Menu lateral -->
		<nav class="menu">
			<div class="close">X</div>

			<a href="<?php echo BASE_URL; ?>home/edit">
				<div class="perfil">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-user-20.svg">
				</div>
			</a>

			<div class="hr"></div>

			<a href="<?php echo BASE_URL; ?>noticias/add">
				<div class="add">
					+
				</div>
			</a>

			<div class="hr"></div>

			<a href="<?php echo BASE_URL; ?>home/logout">
				<div class="logout">
					<img src="<?php echo BASE_URL; ?>assets/images/iconmonstr-log-out-5.svg">
				</div>
			</a>

			<div class="hr"></div>
		</nav>

		<!-- Itens de gerenciamento -->
		<section class="conteudo">
			<!-- Conteúdo -->
			<?php $this->loadViewInTemplate($viewName, $viewData); ?>

			<!-- Itens do rodapé -->
			<footer class="rodape-itens">
				<div class="item-rodape notas">
					<h2>NOTAS DO DESENVOLVEDOR</h2>

					<p>POR FAVOR, RESPEITEM O LIMITE DO VÍDEO, ATÉ <strong>2 MB</strong>, SE NÃO O VÍDEO NÃO SOBE AO SERVIDOR, E EVITEM TÍTULOS COM ASPAS, É POUCO CHAMATIVO.</p>
				</div>
				<div class="item-rodape desenvolvedor">
					<h2>CONTATO DO DESENVOLVEDOR</h2>

					<p>É ESSENCIAL MANTER O DESENVOLVEDOR INFORMADO DE  ERROS NO SISTEMA DO PAINEL.</p>

					<p><a href="mailto:vmsa03@gmail.com">VMSA03@GMAIL.COM</a></p>
				</div>
			</footer>

			<!-- Rodapé -->
			<footer class="rodape">
				<img src="<?php echo BASE_URL; ?>assets/images/favicon.png">

				<p>POLITIZE E SOCIALIZE</p>

				<p>TODOS OS DIREITOS RESERVADOS</p>

				<p>@2020</p>
			</footer>		
		</section>
	</section>
</body>