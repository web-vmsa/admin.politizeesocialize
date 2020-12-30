$(document).ready(function(){

	// Fechar menu
	$(".close").on("click", function(){

		$(".menu").fadeOut("slow");

		$(".abre-menu").fadeIn("slow");

	});

	// Abrir menu
	$(".abre-menu").on("click", function(){

		$(".menu").fadeIn("slow");

		$(".abre-menu").fadeOut("slow");

	});

});