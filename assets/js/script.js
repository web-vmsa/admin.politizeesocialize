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
	CKEDITOR.replace( 'lances' );

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
						swal("Sucesso!", "Sua notícia foi publicada com sucesso!", "success");
					} else {
						swal("Erro!", "Algo inesperado aconteceu, comunique o admin!", "error");
					}
				}
			});
		}

	});

	// Valida formulário de edição de notícia
	$("#edit_news").submit(function(e){

		e.preventDefault();

		var id = $("#id").val();
		var titulo = $("#titulo").val();
		var descricao = $("#descricao").val();
		var tags = $("#tags").val();
		var tipo = $("#tipo").val();
		var legenda = $("#legenda").val();
		var noticia = CKEDITOR.instances.noticia.getData();

		$.ajax({
			type:'POST',
			url:raiz+'ajax/edit_news',
			data:{id:id, titulo:titulo, descricao:descricao, tags:tags, tipo:tipo, legenda:legenda, noticia:noticia},
			success:function(result){
				if (result == 1) {
					swal("Opa!", "Parece que este o título está vazio!", "error");
				} else {
					swal("Sucesso!", "Os dados foram editados com sucesso!", "success");
				}
			}
		});

	});

	// Valida formulário de nova opinião
	$("#add_opi").submit(function(e){

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
				url:raiz+'ajax/add_opi',
				data:noticia_add,
				contentType:false,
				processData:false,
				success:function(result){
					if (result == 1) {
						swal("Sucesso!", "Sua opinião foi publicada com sucesso!", "success");
					} else {
						swal("Erro!", "Algo inesperado aconteceu, comunique o admin!", "error");
					}
				}
			});
		}

	});

	// Valida formulário de edição de opinIão
	$("#edit_opi").submit(function(e){

		e.preventDefault();

		var id = $("#id").val();
		var titulo = $("#titulo").val();
		var descricao = $("#descricao").val();
		var tags = $("#tags").val();
		var tipo = $("#tipo").val();
		var legenda = $("#legenda").val();
		var noticia = CKEDITOR.instances.noticia.getData();

		$.ajax({
			type:'POST',
			url:raiz+'ajax/edit_opi',
			data:{id:id, titulo:titulo, descricao:descricao, tags:tags, tipo:tipo, legenda:legenda, noticia:noticia},
			success:function(result){
				if (result == 1) {
					swal("Opa!", "Parece que este o título está vazio!", "error");
				} else {
					swal("Sucesso!", "Os dados foram editados com sucesso!", "success");
				}
			}
		});

	});

	// Valida formulário de criação de time
	$("#add_team").submit(function(e){

		e.preventDefault();

		var team_form = $("#add_team")[0];
		var add_team = new FormData(team_form);

		$.ajax({
			type:'POST',
			url:raiz+'ajax/add_team',
			data:add_team,
			contentType:false,
			processData:false,
			success:function(result){
				if (result == 1) {
					$("#escudo_time").val("");
					swal("Sucesso!", "Time adicionado com sucesso!", "success");
				} else {
					swal("Opa!", "Algo de errado aconteceu. Comunique o adm!", "error");
				}
			}
		});

	});

	// Valida formulário de novo placar ao vivo
	$("#add_jogo").submit(function(e){

		e.preventDefault();

		var jogo_add = new FormData();

		var arquivos = $('#anexo_jogo')[0].files;

		if (arquivos.length < 0) {
			swal("Opa!", "Nem todos os campos necessários estão preenchidos!", "warning");
		} else {

			jogo_add.append('lances', CKEDITOR.instances.lances.getData());

			jogo_add.append('anexo_jogo', arquivos[0]);

			jogo_add.append('legenda', $("#legenda").val());

			jogo_add.append('campeonato', $("#campeonato").val());

			jogo_add.append('fase', $("#fase").val());

			jogo_add.append('data', $("#data").val());

			jogo_add.append('time_fora', $("#time_fora").val());

			jogo_add.append('placar', $("#placar").val());

			jogo_add.append('time_casa', $("#time_casa").val());

			jogo_add.append('status', $("#status").val());

			$.ajax({
				type:'POST',
				url:raiz+'ajax/add_jogo',
				data:jogo_add,
				contentType:false,
				processData:false,
				success:function(result){
					if (result == 1) {
						swal("Sucesso!", "Placar ao vivo adicionado com sucesso!", "success");
					} else {
						swal("Opa!", "Ocorreu um erro interno! Comunique o adm.", "error");
					}
				}
			});
		}

	});

	// Valida formulário de edição de placar ao vivo
	$("#edit_jogo").submit(function(e){

		e.preventDefault();

		var id = $("#id").val();

		var campeonato = $("#campeonato").val();
		var fase = $("#fase").val();
		var time_casa = $("#time_casa").val();
		var placar = $("#placar").val();
		var time_fora = $("#time_fora").val();
		var status = $("#status").val();
		var legenda = $("#legenda").val();
		var tipo = $("#tipo").val();
		var lances = CKEDITOR.instances.lances.getData();

		if (id == "" || campeonato == "" || fase == "" || time_casa == "" || time_fora == "" || placar == "" ||
			status == "" || legenda == "" || tipo == "" || lances == "") {
			swal("Opa!", "Parece que nem todos os campos estão preenchidos!", "warning");
		} else {
			$.ajax({
				type:'POST',
				url:raiz+'ajax/edit_jogo',
				data:{id:id, campeonato:campeonato, fase:fase, time_casa:time_casa, placar:placar,
					time_fora:time_fora, status:status, legenda:legenda, tipo:tipo, lances:lances},
				success:function(result){
					if (result == 1) {
						swal("Sucesso!", "Placar ao vivo editado com sucesso!", "success");
					} else {
						swal("Opa!", "Ocorreu um erro interno! Comunique o adm.", "error");
					}
				}
			});
		}

	});

});