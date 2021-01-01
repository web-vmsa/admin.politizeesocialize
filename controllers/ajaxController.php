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
	
}