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

	// Valida formulário de login
	$("#formulario_login").submit(function(e){

		e.preventDefault();

		var data_login = $(this).serialize();

		var email = $("#email").val();
		var senha = $("#senha").val();

		if (email == "" || senha == "") {
			swal("Opa!", "Insira seu e-mail e senha!", "warning");
		} else {
			$.ajax({
				type:'POST',
				url:raiz+'ajax',
				data:data_login,
				success:function(result){
					if (result == 1) {
						window.location.href=raiz+'home/painel'
					} else {
						swal("Opa!", "Parece que este usuário não existe!", "error");
					}
				}
			});
		}

	});

});