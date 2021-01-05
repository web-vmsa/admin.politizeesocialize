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
					$url = $titulo;
					$legenda = htmlspecialchars($_POST['legenda']);
					$arquivo = $novoNome;
					$arquivo_prop = array(
						'tipo' => 'video',
						'legenda' => $legenda
					);
					$postagem = htmlspecialchars($_POST['noticia']);
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
					$url = $titulo;
					$legenda = htmlspecialchars($_POST['legenda']);
					$arquivo = $novoNome;
					$arquivo_prop = array(
						'tipo' => 'imagem',
						'legenda' => $legenda
					);
					$postagem = htmlspecialchars($_POST['noticia']);
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
	
}