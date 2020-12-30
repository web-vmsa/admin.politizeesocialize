$(document).ready(function(){

	// Raiz
	var environment = "development";

	if (environment == "development") {
		var raiz = "http://localhost/admin.politizeesocialize/";
	} else {
		var raiz = "http://localhost/admin.politizeesocialize/";
	}

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

	// Edição
	$(".edit").on("click", function(){

		var id = $(this).data("id");
		var redirect = $(this).data("redirect");

		window.location.href= raiz+redirect+"/edit/"+id;

	});

	// Deleção
	$(".delete").on("click", function(){

		var id = $(this).data("id");
		var redirect = $(this).data("redirect");

		window.location.href= raiz+redirect+"/delete/"+id;

	});

});