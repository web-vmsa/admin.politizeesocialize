<?php 
class colunasController extends controller {

	public function index(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$opinioes = new Colunas();
		$opinioes->id_usuario = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user(),
			'opinioes' => $opinioes->get_opis()
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

	public function edit($id){

		$opi = new Colunas();
		$opi->id = $id;
		$opi->id_usuario = $_SESSION['id'];

		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user(),
			'opi' => $opi->get_opi()
		);

		$this->loadTemplate('edit_opi', $dados);

	}
	
}