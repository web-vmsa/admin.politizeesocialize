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

		if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['permissoes']) && !empty($_POST['propriedades'])) {
			
			$nome = $_POST['nome'];
			$social = '{"instagram": "", "facebook": "", "youtube": "", "linkedin": ""}';
			$email = $_POST['email'];
			$senha = md5($_POST['senha']);
			$permissoes = $_POST['permissoes'];
			$propriedades = $_POST['propriedades'];

			$novo_user = new Usuarios();
			$novo_user->nome = $nome;
			$novo_user->social = $social;
			$novo_user->email = $email;
			$novo_user->senha = $senha;
			$novo_user->permissoes = $permissoes;
			$novo_user->propriedades = $propriedades;
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

			$formatosPermitidos = array("png", "jpeg", "gif", "jpg");
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
			
			$formatosPermitidos = array("png", "jpeg", "gif", "jpg", "mp4");
			$extensao = pathinfo($_FILES['anexo_noticia']['name'],  PATHINFO_EXTENSION);

			if (in_array($extensao, $formatosPermitidos)) {
				
				if (pathinfo($_FILES['anexo_noticia']['name'],  PATHINFO_EXTENSION) == "mp4") {
					
					$pasta = "users/videos/"; 
					$temporario = $_FILES['anexo_noticia']['tmp_name'];
					$novoNome = uniqid().".$extensao"; 

					$id_usuario = $_SESSION['id'];
					$categoria = $_POST['categoria'];
					$titulo = htmlspecialchars($_POST['titulo']);
					$descricao = htmlspecialchars($_POST['descricao']);
					$tags = htmlspecialchars($_POST['tags']);


					$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', '', '', '', '', '', '');

					$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', '?', '!', ',', '(', ')', '"');

					$novo_titulo = strtolower(str_replace($comAcentos, $semAcentos, $titulo))."-".str_replace("/","-",date("Y/m/d"));
					$resultado = preg_replace('/[ -]+/' , '-' , $novo_titulo);


					$url = $resultado;
					$legenda = htmlspecialchars($_POST['legenda']);
					$arquivo = $novoNome;
					$arquivo_prop = array(
						'tipo' => 'video',
						'legenda' => $legenda
					);
					$postagem = $_POST['noticia'];
					$data = date("Y/m/d H:i:s");

					$nova_noticia = new Noticias();
					$nova_noticia->id_usuario = $id_usuario;
					$nova_noticia->categoria = $categoria;
					$nova_noticia->titulo = $titulo;
					$nova_noticia->descricao = $descricao;
					$nova_noticia->tags = $tags;
					$nova_noticia->url = $url;
					$nova_noticia->arquivo = $arquivo;
					$nova_noticia->arquivo_prop = json_encode($arquivo_prop);
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
					$categoria = $_POST['categoria'];
					$titulo = htmlspecialchars($_POST['titulo']);
					$descricao = htmlspecialchars($_POST['descricao']);
					$tags = htmlspecialchars($_POST['tags']);


					$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', '', '', '', '', '', '');

					$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', '?', '!', ',', '(', ')', '"');

					$novo_titulo = strtolower(str_replace($comAcentos, $semAcentos, $titulo))."-".str_replace("/","-",date("Y/m/d"));
					$resultado = preg_replace('/[ -]+/' , '-' , $novo_titulo);


					$url = $resultado;
					$legenda = htmlspecialchars($_POST['legenda']);
					$arquivo = $novoNome;
					$arquivo_prop = array(
						'tipo' => 'imagem',
						'legenda' => $legenda
					);
					$postagem = $_POST['noticia'];
					$data = date("Y/m/d H:i:s");

					$nova_noticia = new Noticias();
					$nova_noticia->id_usuario = $id_usuario;
					$nova_noticia->categoria = $categoria;
					$nova_noticia->titulo = $titulo;
					$nova_noticia->descricao = $descricao;
					$nova_noticia->tags = $tags;
					$nova_noticia->url = $url;
					$nova_noticia->arquivo = $arquivo;
					$nova_noticia->arquivo_prop = json_encode($arquivo_prop);
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

		if (!empty($_POST['id']) && !empty($_POST['titulo']) && !empty($_POST['descricao']) && !empty($_POST['tags']) && !empty($_POST['legenda']) && !empty($_POST['noticia']) && !empty($_POST['tipo'])) {
			
			$id = $_POST['id'];
			$titulo = $_POST['titulo'];
			$descricao = $_POST['descricao'];
			$tags = $_POST['tags'];
			$tipo = $_POST['tipo'];
			$legenda = $_POST['legenda'];

			$arquivo_prop = array(
				'tipo' => $tipo,
				'legenda' => $legenda
			);

			$noticia_edit = new Noticias();
			$noticia_edit->id = $id;
			$noticia_edit->titulo = $titulo;
			$noticia_edit->descricao = $descricao;
			$noticia_edit->tags = $tags;
			$noticia_edit->arquivo_prop = json_encode($arquivo_prop);
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
			
			$formatosPermitidos = array("png", "jpeg", "gif", "jpg", "mp4");
			$extensao = pathinfo($_FILES['anexo_noticia']['name'],  PATHINFO_EXTENSION);

			if (in_array($extensao, $formatosPermitidos)) {
				
				if (pathinfo($_FILES['anexo_noticia']['name'],  PATHINFO_EXTENSION) == "mp4") {
					
					$pasta = "users/videos/"; 
					$temporario = $_FILES['anexo_noticia']['tmp_name'];
					$novoNome = uniqid().".$extensao"; 

					$id_usuario = $_SESSION['id'];
					$categoria = $_POST['categoria'];
					$titulo = htmlspecialchars($_POST['titulo']);
					$descricao = htmlspecialchars($_POST['descricao']);
					$tags = htmlspecialchars($_POST['tags']);


					$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', '', '', '', '', '', '');

					$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', '?', '!', ',', '(', ')', '"');

					$novo_titulo = strtolower(str_replace($comAcentos, $semAcentos, $titulo))."-".str_replace("/","-",date("Y/m/d"));
					$resultado = preg_replace('/[ -]+/' , '-' , $novo_titulo);


					$url = $resultado;
					$legenda = htmlspecialchars($_POST['legenda']);
					$arquivo = $novoNome;
					$arquivo_prop = array(
						'tipo' => 'video',
						'legenda' => $legenda
					);
					$postagem = $_POST['noticia'];
					$data = date("Y/m/d H:i:s");

					$nova_opiniao = new Colunas();
					$nova_opiniao->id_usuario = $id_usuario;
					$nova_opiniao->categoria = $categoria;
					$nova_opiniao->titulo = $titulo;
					$nova_opiniao->descricao = $descricao;
					$nova_opiniao->tags = $tags;
					$nova_opiniao->url = $url;
					$nova_opiniao->arquivo = $arquivo;
					$nova_opiniao->arquivo_prop = json_encode($arquivo_prop);
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
					$categoria = $_POST['categoria'];
					$titulo = htmlspecialchars($_POST['titulo']);
					$descricao = htmlspecialchars($_POST['descricao']);
					$tags = htmlspecialchars($_POST['tags']);


					$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', '', '', '', '', '', '');

					$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', '?', '!', ',', '(', ')', '"');

					$novo_titulo = strtolower(str_replace($comAcentos, $semAcentos, $titulo))."-".str_replace("/","-",date("Y/m/d"));
					$resultado = preg_replace('/[ -]+/' , '-' , $novo_titulo);


					$url = $resultado;
					$legenda = htmlspecialchars($_POST['legenda']);
					$arquivo = $novoNome;
					$arquivo_prop = array(
						'tipo' => 'imagem',
						'legenda' => $legenda
					);
					$postagem = $_POST['noticia'];
					$data = date("Y/m/d H:i:s");

					$nova_opiniao = new Colunas();
					$nova_opiniao->id_usuario = $id_usuario;
					$nova_opiniao->categoria = $categoria;
					$nova_opiniao->titulo = $titulo;
					$nova_opiniao->descricao = $descricao;
					$nova_opiniao->tags = $tags;
					$nova_opiniao->url = $url;
					$nova_opiniao->arquivo = $arquivo;
					$nova_opiniao->arquivo_prop = json_encode($arquivo_prop);
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

		if (!empty($_POST['id']) && !empty($_POST['titulo']) && !empty($_POST['descricao']) && !empty($_POST['tags']) && !empty($_POST['legenda']) && !empty($_POST['noticia']) && !empty($_POST['tipo'])) {
			
			$id = $_POST['id'];
			$titulo = $_POST['titulo'];
			$descricao = $_POST['descricao'];
			$tags = $_POST['tags'];
			$tipo = $_POST['tipo'];
			$legenda = $_POST['legenda'];

			$arquivo_prop = array(
				'tipo' => $tipo,
				'legenda' => $legenda
			);

			$opi_edit = new Colunas();
			$opi_edit->id = $id;
			$opi_edit->titulo = $titulo;
			$opi_edit->descricao = $descricao;
			$opi_edit->tags = $tags;
			$opi_edit->arquivo_prop = json_encode($arquivo_prop);
			$opi_edit->postagem = $_POST['noticia'];
			$opi_edit->update_opi();

		} else {

			$dados['resultado'] = 1;

		}

		$this->loadView('ajax', $dados);

	}
	
}