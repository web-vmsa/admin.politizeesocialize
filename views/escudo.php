<?php

	header("Content-Type: image/jpeg");

	$imagem = $escudo['escudo'];

	echo file_get_contents(BASE_URL."users/images/".$imagem);

?>