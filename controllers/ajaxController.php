<?php 
class ajaxController extends controller {

	public function index(){


		$dados = array();

		if (!empty($_POST['email']) && !empty($_POST['senha'])) {
			
			$email = addslashes($_POST['email']);
			$senha = addslashes(md5($_POST['senha']));

			$login = new Usuarios();
			$login->email = $email;
			$login->senha = $senha;

			$verifica = $login->login();

			if ($verifica == true) {
				$dados['resultado'] = 1; 	
				$_SESSION['id'] = $verifica['id'];
			}  else {
				$dados['resultado'] = 0;
			}

		}

		$this->loadView('ajax', $dados);

	}

	public function add_user(){


		$dados = array();

		if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['permissoes']) && !empty($_POST['nivel']) && !empty($_POST['categoria_id'])) {
			
			$nome = $_POST['nome'];
			$social = '{"instagram": "", "facebook": "", "youtube": "", "linkedin": ""}';
			$email = $_POST['email'];
			$senha = md5($_POST['senha']);
			$permissoes = $_POST['permissoes'];
			$nivel = $_POST['nivel'];
			$categoria_id = $_POST['categoria_id'];

			$novo_user = new Usuarios();
			$novo_user->nome = $nome;
			$novo_user->social = $social;
			$novo_user->email = $email;
			$novo_user->senha = $senha;
			$novo_user->permissoes = $permissoes;
			$novo_user->nivel = $nivel;
			$novo_user->categoria_id = $categoria_id;
			$novo_user->add_user();

			$dados['resultado'] = "Sucesso!";

		}

		$this->loadView('ajax', $dados);

	}

	public function edit_user(){


		$dados = array();

		if($_FILES['foto_perfil']['size'] == 0) {

			$update = new Usuarios();

			$id = $_SESSION['id'];
			$nome = htmlspecialchars($_POST['nome']);
			$biografia = htmlspecialchars($_POST['frase']);
			$facebook = $_POST['facebook'];
			$instagram = $_POST['instagram'];
			$youtube = $_POST['youtube'];
			$linkedin = $_POST['linkedin'];

			$social = array(
				'instagram' => $instagram,
				'facebook' => $facebook,
				'youtube' => $youtube,
				'linkedin' => $linkedin
			);

			$update->id = $id;
			$update->nome = $nome;
			$update->biografia = $biografia;
			$update->social = json_encode($social);
			$update->update_user();

			$dados['resultado'] = 0;

		} else {

			$formatosPermitidos = array("png", "jpeg", "gif", "jpg", "svg");
			$extensao = pathinfo($_FILES['foto_perfil']['name'],  PATHINFO_EXTENSION);

			if (in_array($extensao, $formatosPermitidos)) { 
			
				$pasta = "users/images/"; 
				$temporario = $_FILES['foto_perfil']['tmp_name'];
				$novoNome = uniqid().".$extensao";

				if (move_uploaded_file($temporario, $pasta.$novoNome)) {
					
					$update = new Usuarios();

					$id = $_SESSION['id'];
					$nome = htmlspecialchars($_POST['nome']);
					$biografia = htmlspecialchars($_POST['frase']);
					$facebook = $_POST['facebook'];
					$instagram = $_POST['instagram'];
					$youtube = $_POST['youtube'];
					$linkedin = $_POST['linkedin'];

					$social = array(
						'instagram' => $instagram,
						'facebook' => $facebook,
						'youtube' => $youtube,
						'linkedin' => $linkedin
					);

					$update->id = $id;
					$update->nome = $nome;
					$update->foto = $novoNome;
					$update->biografia = $biografia;
					$update->social = json_encode($social);
					$update->update_photo();

					$dados['resultado'] = 1;

				} else {
					$dados['resultado'] = 0; 
				}

			} else {
				$dados['resultado'] = 0; 
			}

		}

		$this->loadView('ajax', $dados);

	}

	public function add_news(){

		date_default_timezone_set('America/Sao_Paulo');

		$dados = array();

		if (!empty($_POST['titulo'])) {
			
			$formatosPermitidos = array("png", "jpeg", "gif", "jpg", "mp4", "svg");
			$extensao = pathinfo($_FILES['anexo_noticia']['name'],  PATHINFO_EXTENSION);

			if (in_array($extensao, $formatosPermitidos)) {
				
				if (pathinfo($_FILES['anexo_noticia']['name'],  PATHINFO_EXTENSION) == "mp4") {
					
					$pasta = "users/videos/"; 
					$temporario = $_FILES['anexo_noticia']['tmp_name'];
					$novoNome = uniqid().".$extensao"; 

					$id_usuario = $_SESSION['id'];
					$categoria_id = $_POST['categoria_id'];
					$titulo = htmlspecialchars($_POST['titulo']);
					$descricao = htmlspecialchars($_POST['descricao']);
					$tags = htmlspecialchars($_POST['tags']);


					$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

					$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', '?', '!', ',', '(', ')', '"', '"', ';', ':', '/');

					$novo_titulo = strtolower(str_replace($comAcentos, $semAcentos, $titulo))."-".str_replace("/","-",date("Y/m/d"));
					$resultado = preg_replace('/[ -]+/' , '-' , $novo_titulo);


					$url = $resultado;
					$legenda = htmlspecialchars($_POST['legenda']);
					$arquivo = $novoNome;
					$tipo = 'video';
					$postagem = $_POST['noticia'];
					$data = date("Y/m/d H:i:s");

					$nova_noticia = new Noticias();
					$nova_noticia->id_usuario = $id_usuario;
					$nova_noticia->categoria_id = $categoria_id;
					$nova_noticia->titulo = $titulo;
					$nova_noticia->descricao = $descricao;
					$nova_noticia->tags = $tags;
					$nova_noticia->url = $url;
					$nova_noticia->arquivo = $arquivo;
					$nova_noticia->tipo = $tipo;
					$nova_noticia->legenda = $legenda;
					$nova_noticia->postagem = $postagem;
					$nova_noticia->data = $data;
					$nova_noticia->set_noticia();

					move_uploaded_file($temporario, $pasta.$novoNome);

					$dados['resultado'] = 1;

				} else {

					$pasta = "users/images/"; 
					$temporario = $_FILES['anexo_noticia']['tmp_name'];
					$novoNome = uniqid().".$extensao"; 

					$id_usuario = $_SESSION['id'];
					$categoria_id = $_POST['categoria_id'];
					$titulo = htmlspecialchars($_POST['titulo']);
					$descricao = htmlspecialchars($_POST['descricao']);
					$tags = htmlspecialchars($_POST['tags']);


					$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

					$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', '?', '!', ',', '(', ')', '"', '"', ';', ':', '/');

					$novo_titulo = strtolower(str_replace($comAcentos, $semAcentos, $titulo))."-".str_replace("/","-",date("Y/m/d"));
					$resultado = preg_replace('/[ -]+/' , '-' , $novo_titulo);


					$url = $resultado;
					$legenda = htmlspecialchars($_POST['legenda']);
					$arquivo = $novoNome;
					$tipo = 'imagem';
					$postagem = $_POST['noticia'];
					$data = date("Y/m/d H:i:s");

					$nova_noticia = new Noticias();
					$nova_noticia->id_usuario = $id_usuario;
					$nova_noticia->categoria_id = $categoria_id;
					$nova_noticia->titulo = $titulo;
					$nova_noticia->descricao = $descricao;
					$nova_noticia->tags = $tags;
					$nova_noticia->url = $url;
					$nova_noticia->arquivo = $arquivo;
					$nova_noticia->tipo = $tipo;
					$nova_noticia->legenda = $legenda;
					$nova_noticia->postagem = $postagem;
					$nova_noticia->data = $data;
					$nova_noticia->set_noticia();

					move_uploaded_file($temporario, $pasta.$novoNome);

					$dados['resultado'] = 1;

				}

			} else {

				$dados['resultado'] = 0;

			}

		}

		$this->loadView('ajax', $dados);

	}

	public function edit_news(){


		$dados = array();

		if (!empty($_POST['id']) && !empty($_POST['titulo']) && !empty($_POST['descricao']) && !empty($_POST['tags']) && !empty($_POST['legenda']) && !empty($_POST['noticia'])) {
			
			$id = $_POST['id'];
			$titulo = $_POST['titulo'];
			$descricao = $_POST['descricao'];
			$tags = $_POST['tags'];
			$tipo = $_POST['tipo'];
			$legenda = $_POST['legenda'];

			$noticia_edit = new Noticias();
			$noticia_edit->id = $id;
			$noticia_edit->titulo = $titulo;
			$noticia_edit->descricao = $descricao;
			$noticia_edit->tags = $tags;
			$noticia_edit->legenda = $legenda;
			$noticia_edit->postagem = $_POST['noticia'];
			$noticia_edit->update_new();

		} else {

			$dados['resultado'] = 1;

		}

		$this->loadView('ajax', $dados);

	}

	public function add_opi(){

		date_default_timezone_set('America/Sao_Paulo');

		$dados = array();

		if (!empty($_POST['titulo'])) {
			
			$formatosPermitidos = array("png", "jpeg", "gif", "jpg", "mp4", "svg");
			$extensao = pathinfo($_FILES['anexo_noticia']['name'],  PATHINFO_EXTENSION);

			if (in_array($extensao, $formatosPermitidos)) {
				
				if (pathinfo($_FILES['anexo_noticia']['name'],  PATHINFO_EXTENSION) == "mp4") {
					
					$pasta = "users/videos/"; 
					$temporario = $_FILES['anexo_noticia']['tmp_name'];
					$novoNome = uniqid().".$extensao"; 

					$id_usuario = $_SESSION['id'];
					$categoria_id = $_POST['categoria_id'];
					$titulo = htmlspecialchars($_POST['titulo']);
					$descricao = htmlspecialchars($_POST['descricao']);
					$tags = htmlspecialchars($_POST['tags']);


					$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

					$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', '?', '!', ',', '(', ')', '"', '"', ';', ':', '/');

					$novo_titulo = strtolower(str_replace($comAcentos, $semAcentos, $titulo))."-".str_replace("/","-",date("Y/m/d"));
					$resultado = preg_replace('/[ -]+/' , '-' , $novo_titulo);


					$url = $resultado;
					$legenda = htmlspecialchars($_POST['legenda']);
					$arquivo = $novoNome;
					$tipo = 'video';
					$postagem = $_POST['noticia'];
					$data = date("Y/m/d H:i:s");

					$nova_opiniao = new Colunas();
					$nova_opiniao->id_usuario = $id_usuario;
					$nova_opiniao->categoria_id = $categoria_id;
					$nova_opiniao->titulo = $titulo;
					$nova_opiniao->descricao = $descricao;
					$nova_opiniao->tags = $tags;
					$nova_opiniao->url = $url;
					$nova_opiniao->arquivo = $arquivo;
					$nova_opiniao->tipo = $tipo;
					$nova_opiniao->legenda = $legenda;
					$nova_opiniao->postagem = $postagem;
					$nova_opiniao->data = $data;
					$nova_opiniao->set_opi();

					move_uploaded_file($temporario, $pasta.$novoNome);

					$dados['resultado'] = 1;

				} else {

					$pasta = "users/images/"; 
					$temporario = $_FILES['anexo_noticia']['tmp_name'];
					$novoNome = uniqid().".$extensao"; 

					$id_usuario = $_SESSION['id'];
					$categoria_id = $_POST['categoria_id'];
					$titulo = htmlspecialchars($_POST['titulo']);
					$descricao = htmlspecialchars($_POST['descricao']);
					$tags = htmlspecialchars($_POST['tags']);


					$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

					$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', '?', '!', ',', '(', ')', '"', '"', ';', ':', '/');

					$novo_titulo = strtolower(str_replace($comAcentos, $semAcentos, $titulo))."-".str_replace("/","-",date("Y/m/d"));
					$resultado = preg_replace('/[ -]+/' , '-' , $novo_titulo);


					$url = $resultado;
					$legenda = htmlspecialchars($_POST['legenda']);
					$arquivo = $novoNome;
					$tipo = 'imagem';
					$postagem = $_POST['noticia'];
					$data = date("Y/m/d H:i:s");

					$nova_opiniao = new Colunas();
					$nova_opiniao->id_usuario = $id_usuario;
					$nova_opiniao->categoria_id = $categoria_id;
					$nova_opiniao->titulo = $titulo;
					$nova_opiniao->descricao = $descricao;
					$nova_opiniao->tags = $tags;
					$nova_opiniao->url = $url;
					$nova_opiniao->arquivo = $arquivo;
					$nova_opiniao->tipo = $tipo;
					$nova_opiniao->legenda = $legenda;
					$nova_opiniao->postagem = $postagem;
					$nova_opiniao->data = $data;
					$nova_opiniao->set_opi();

					move_uploaded_file($temporario, $pasta.$novoNome);

					$dados['resultado'] = 1;

				}

			} else {

				$dados['resultado'] = 0;

			}

		}

		$this->loadView('ajax', $dados);

	}

	public function edit_opi(){


		$dados = array();

		if (!empty($_POST['id']) && !empty($_POST['titulo']) && !empty($_POST['descricao']) && !empty($_POST['tags']) && !empty($_POST['legenda']) && !empty($_POST['noticia'])) {
			
			$id = $_POST['id'];
			$titulo = $_POST['titulo'];
			$descricao = $_POST['descricao'];
			$tags = $_POST['tags'];
			$legenda = $_POST['legenda'];

			$opi_edit = new Colunas();
			$opi_edit->id = $id;
			$opi_edit->titulo = $titulo;
			$opi_edit->descricao = $descricao;
			$opi_edit->tags = $tags;
			$opi_edit->legenda = $legenda;
			$opi_edit->postagem = $_POST['noticia'];
			$opi_edit->update_opi();

		} else {

			$dados['resultado'] = 1;

		}

		$this->loadView('ajax', $dados);

	}

	public function add_team(){

		$dados = array();

		if ($_FILES['escudo_time']['size'] == 0) {

			$dados['resultado'] = 0;

		} else {

			$formatosPermitidos = array("png", "jpeg", "gif", "jpg", "svg");
			$extensao = pathinfo($_FILES['escudo_time']['name'],  PATHINFO_EXTENSION);

			if (in_array($extensao, $formatosPermitidos)) {

				$pasta = "users/images/"; 
				$temporario = $_FILES['escudo_time']['tmp_name'];
				$novoNome = uniqid().".$extensao";
				$nome = htmlspecialchars($_POST['nome']);
				$alcunha = htmlspecialchars($_POST['alcunha']);

				move_uploaded_file($temporario, $pasta.$novoNome);

				$equipe = new Equipes();
				$equipe->nome = $nome;
				$equipe->escudo = $novoNome;
				$equipe->alcunha = $alcunha;
				$equipe->set_team();

				$dados['resultado'] = 1;

			} else {

				$dados['resultado'] = 0;

			}


		}

		$this->loadView('ajax', $dados);

	}

	public function add_jogo(){

		date_default_timezone_set('America/Sao_Paulo');

		$dados = array();

		if ($_FILES['anexo_jogo']['size'] == 0) {

			$dados['resultado'] = 0;

		} else {

			$campeonato = htmlspecialchars($_POST['campeonato']);
			$fase = htmlspecialchars($_POST['fase']);
			$data_oficial = htmlspecialchars($_POST['data']);
			$time_casa = htmlspecialchars($_POST['time_casa']);
			$time_fora = htmlspecialchars($_POST['time_fora']);

			$id_usuario = $_SESSION['id'];
			$categoria_id = 3;
			$placar = $_POST['placar'];
			$status_jogo = $_POST['status'];
			$titulo = $time_casa." vs ".$time_fora;
			$descricao = "Jogo válido pela fase ".$fase." do campeonato ".$campeonato." entre ".$time_casa." e ".$time_fora.". A data oficial do jogo é ".$data_oficial;
			$tags = $time_fora.", ".$time_fora.", ".$campeonato.", ".$data_oficial.", Esportes ".$fase;
			$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

			$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', '?', '!', ',', '(', ')', '"', '"', ';', ':', '/');

			$novo_titulo = strtolower(str_replace($comAcentos, $semAcentos, $titulo))."-".str_replace("/","-",date("Y/m/d"));
			$resultado = preg_replace('/[ -]+/' , '-' , $novo_titulo);

			$url = $resultado;
			$lances = $_POST['lances'];
			$data = $_POST['data'];
			$legenda = $_POST['legenda'];

			$formatosPermitidos = array("png", "jpeg", "gif", "jpg", "mp4", "svg");
			$extensao = pathinfo($_FILES['anexo_jogo']['name'],  PATHINFO_EXTENSION);

			if (in_array($extensao, $formatosPermitidos)) {
				
				if (pathinfo($_FILES['anexo_jogo']['name'],  PATHINFO_EXTENSION) == "mp4") {
					
					$pasta = "users/videos/"; 
					$temporario = $_FILES['anexo_jogo']['tmp_name'];
					$novoNome = uniqid().".$extensao"; 

					$arquivo = $novoNome;
					$tipo = 'video';

					move_uploaded_file($temporario, $pasta.$novoNome);

					$novo_jogo = new Jogos();
					$novo_jogo->id_usuario = $id_usuario;
					$novo_jogo->categoria_id = $categoria_id;
					$novo_jogo->time_casa = $time_casa;
					$novo_jogo->time_fora = $time_fora;
					$novo_jogo->fase = $fase;
					$novo_jogo->campeonato = $campeonato;
					$novo_jogo->placar = $placar;
					$novo_jogo->status_jogo = $status_jogo;
					$novo_jogo->titulo = $titulo;
					$novo_jogo->descricao = $descricao;
					$novo_jogo->tags = $tags;
					$novo_jogo->url = $url;
					$novo_jogo->arquivo = $arquivo;
					$novo_jogo->tipo = $tipo;
					$novo_jogo->legenda = $legenda;
					$novo_jogo->lances = $lances;
					$novo_jogo->data = $data;
					$novo_jogo->set_jogo();

					$dados['resultado'] = 1;

				} else {

					$pasta = "users/images/"; 
					$temporario = $_FILES['anexo_jogo']['tmp_name'];
					$novoNome = uniqid().".$extensao"; 

					$arquivo = $novoNome;
					$tipo = 'imagem';

					move_uploaded_file($temporario, $pasta.$novoNome);

					$novo_jogo = new Jogos();
					$novo_jogo->id_usuario = $id_usuario;
					$novo_jogo->categoria_id = $categoria_id;
					$novo_jogo->time_casa = $time_casa;
					$novo_jogo->time_fora = $time_fora;
					$novo_jogo->fase = $fase;
					$novo_jogo->campeonato = $campeonato;
					$novo_jogo->placar = $placar;
					$novo_jogo->status_jogo = $status_jogo;
					$novo_jogo->titulo = $titulo;
					$novo_jogo->descricao = $descricao;
					$novo_jogo->tags = $tags;
					$novo_jogo->url = $url;
					$novo_jogo->arquivo = $arquivo;
					$novo_jogo->tipo = $tipo;
					$novo_jogo->legenda = $legenda;
					$novo_jogo->lances = $lances;
					$novo_jogo->data = $data;
					$novo_jogo->set_jogo();

					$dados['resultado'] = 1;

				}

			} else {

				$dados['resultado'] = 0;

			}

		}

		$this->loadView('ajax', $dados);

	}

	public function edit_jogo(){

		$dados = array();

		if (!empty($_POST['id']) && !empty($_POST['campeonato']) && !empty($_POST['fase']) && !empty($_POST['time_casa']) && !empty($_POST['placar']) && !empty($_POST['time_fora']) && !empty($_POST['status']) && !empty($_POST['legenda']) && !empty($_POST['lances'])) {

			$campeonato = $_POST['campeonato'];
			$fase = $_POST['fase'];
			$time_casa = $_POST['time_casa'];
			$placar = $_POST['placar'];
			$time_fora = $_POST['time_fora'];
			$legenda = $_POST['legenda'];

			$id = $_POST['id'];
			$lances = $_POST['lances'];
			$status = $_POST['status'];
			$titulo = $time_casa." vs ".$time_fora;
			$descricao = "Jogo válido pela fase ".$fase." do campeonato ".$campeonato." entre ".$time_casa." e ".$time_fora;

			$jogo_edit = new Jogos();
			$jogo_edit->id = $id;
			$jogo_edit->time_casa = $time_casa;
			$jogo_edit->time_fora = $time_fora;
			$jogo_edit->fase = $fase;
			$jogo_edit->campeonato = $campeonato;
			$jogo_edit->placar = $placar;
			$jogo_edit->titulo = $titulo;
			$jogo_edit->descricao = $descricao;
			$jogo_edit->status_jogo = $status;
			$jogo_edit->legenda = $legenda;
			$jogo_edit->lances = $lances;
			$jogo_edit->update_jogo();
			
			$dados['resultado'] = 1;

		} else {

			$dados['resultado'] = 0;

		}

		$this->loadView('ajax', $dados);

	}
	
}