<?php 
class colunasController extends controller {

	public function index(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user()
		);

		$this->loadTemplate('colunas', $dados);

	}

	public function add(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user()
		);

		$this->loadTemplate('add_opi', $dados);

	}

	public function edit(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user()
		);

		$this->loadTemplate('edit_opi', $dados);

	}
	
}