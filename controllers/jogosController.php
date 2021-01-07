<?php 
class jogosController extends controller {

	public function index(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user()
		);

		$this->loadTemplate('jogos', $dados);

	}

	public function add(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$copas = new Jogos();

		$equipes = new Equipes();

		$dados = array(
			'usuario' => $usuario->get_user(),
			'copas' => $copas->get_cups(),
			'equipes' => $equipes->get_teams()
		);

		$this->loadTemplate('add_jogo', $dados);

	}

	public function edit(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user()
		);

		$this->loadTemplate('edit_jogo', $dados);

	}

	public function team(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user()
		);

		$this->loadTemplate('add_team', $dados);

	}
	
}