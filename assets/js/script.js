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

	// Valida formulário de adicionar o usuário
	$("#add_user").submit(function(e){

		e.preventDefault();

		var add_user = $(this).serialize();

		var nome = $("#nome").val();
		var email = $("#email").val();
		var senha = $("#senha").val();
		var permissoes = $("#permissoes").val();
		var propriedades = $("#propriedades").val();

		if (nome == "" || email == "" || senha == "" || permissoes == "" || propriedades == "") {
			swal("Opa!", "Prrencha todos os campos obrigatórios!", "warning");
		} else {
			$.ajax({
				type:'POST',
				url:raiz+'ajax/add_user',
				data:add_user,
				success:function(result){
					$("#add_user input").val("");
					swal(result, "Este usuário foi criado com sucesso!", "success");
				}
			});
		}

	});

	// Valida formulário de edição de perfil
	$("#edit_user").submit(function(e){

		e.preventDefault();

		var form = $("#edit_user")[0];
		var data_edit = new FormData(form);

		$.ajax({
			type:'POST',
			url:raiz+'ajax/edit_user',
			data:data_edit,
			contentType:false,
			processData:false,
			success:function(result){
				if (result == 1) {
					$("#foto_perfil").val("");
					swal("Sucesso!", "Sua foto foi editada com sucesso!", "success");
				} else {
					swal("Sucesso!", "Seus dados foram editados com sucesso!", "success");
				}
			}
		});

	});

	CKEDITOR.replace( 'noticia' );

	// Valida formulário de nova notícia
	$("#add_news").submit(function(e){

		e.preventDefault();

		var noticia_add = new FormData();

		var arquivos = $('#anexo_noticia')[0].files;

		if (arquivos.length < 0) {
			swal("Opa!", "Nem todos os campos necessários estão preenchidos!", "warning");
		} else {

			noticia_add.append('noticia', CKEDITOR.instances.noticia.getData());

			noticia_add.append('legenda', $("#legenda").val());

			noticia_add.append('titulo', $("#titulo").val());

			noticia_add.append('descricao', $("#descricao").val());

			noticia_add.append('tags', $("#tags").val());

			noticia_add.append('categoria', $("#categoria").val());

			noticia_add.append('anexo_noticia', arquivos[0]);

			$.ajax({
				type:'POST',
				url:raiz+'ajax/add_news',
				data:noticia_add,
				contentType:false,
				processData:false,
				success:function(result){
					if (result == 1) {
						$("#add_news input").val("");
						swal("Sucesso!", "Sua notícia foi publicada com sucesso!", "success");
					} else {
						swal("Erro!", "Algo inesperado aconteceu, comunique o admin!", "error");
					}
				}
			});
		}

	});

});