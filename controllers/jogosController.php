<?php 
class jogosController extends controller {

	public function index(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$jogos = new Jogos();
		$jogos->id_usuario = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user(),
			'jogos' => $jogos->get_jogos()
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

		$jogo = new Jogos();
		$jogo->id_usuario = $_SESSION['id'];

		$copas = new Jogos();

		$equipes = new Equipes();

		$dados = array(
			'usuario' => $usuario->get_user(),
			'jogo' => $jogo->get_jogo(),
			'copas' => $copas->get_cups(),
			'equipes' => $equipes->get_teams()
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

	public function escudo($nome){

		$escudo = new Equipes();
		$escudo->nome = $nome;

		$dados = array(
			'escudo' => $escudo->get_team()
		);

		$this->loadView('escudo', $dados);		

	}
	
}