<?php 
class homeController extends controller {

	public function index(){


		$dados = array();

		$this->loadView('home', $dados);

	}

	public function painel() {


		$dados = array();

		$this->loadTemplate('painel', $dados);

	}

	public function edit(){


		$dados = array();

		$this->loadTemplate('edit_user', $dados);

	}

	public function add(){


		$dados = array();

		$this->loadTemplate('add_user', $dados);

	}

	public function logout(){


		$dados = array();

		$this->loadView('logout', $dados);

	}
	
}