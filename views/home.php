<?php 
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
	echo "
		<script type='text/javascript'>
			window.location.href='".BASE_URL."home/painel'
		</script>
	";
} else {
	# code...
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

	<!-- Login -->
	<div class="login">
		<img src="<?php echo BASE_URL; ?>assets/images/favicon.png">

		<form method="POST" id="formulario_login" autocomplete="off">
			<input type="text" id="email" name="email" placeholder="E-MAIL">

			<input type="password" id="senha" name="senha" placeholder="SENHA">

			<button type="submit">LOGIN</button>
		</form>
	</div>

	<!-- Rodapé -->
	<footer class="rodape">
		<img src="<?php echo BASE_URL; ?>assets/images/favicon.png">

		<p>POLITIZE E SOCIALIZE</p>

		<p>TODOS OS DIREITOS RESERVADOS</p>

		<p>@2020</p>
	</footer>
</body>