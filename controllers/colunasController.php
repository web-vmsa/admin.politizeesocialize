<?php 
class colunasController extends controller {

	public function index(){


		$dados = array();

		$this->loadTemplate('colunas', $dados);

	}

	public function add(){


		$dados = array();

		$this->loadTemplate('add_opi', $dados);

	}

	public function edit(){


		$dados = array();

		$this->loadTemplate('edit_opi', $dados);

	}
	
}