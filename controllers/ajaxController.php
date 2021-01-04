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
	
}