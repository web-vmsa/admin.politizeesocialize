<?php 
class homeController extends controller {

	public function index(){


		$dados = array();

		$this->loadView('home', $dados);

	}

	public function painel() {


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user()
		);

		$this->loadTemplate('painel', $dados);

	}

	public function edit(){


		$dados = array();

		$this->loadTemplate('edit_user', $dados);

	}

	public function add(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user()
		);

		$this->loadTemplate('add_user', $dados);

	}

	public function logout(){


		$dados = array();

		$this->loadView('logout', $dados);

	}
	
}