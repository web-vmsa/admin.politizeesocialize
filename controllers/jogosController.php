<?php 
class jogosController extends controller {

	public function index(){


		$dados = array();

		$this->loadTemplate('jogos', $dados);

	}

	public function add(){


		$dados = array();

		$this->loadTemplate('add_jogo', $dados);

	}

	public function edit(){


		$dados = array();

		$this->loadTemplate('edit_jogo', $dados);

	}

	public function team(){


		$dados = array();

		$this->loadTemplate('add_team', $dados);

	}
	
}