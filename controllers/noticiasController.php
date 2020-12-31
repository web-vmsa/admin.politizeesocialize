<?php 
class noticiasController extends controller {

	public function index(){


		$dados = array();

		$this->loadTemplate('noticias', $dados);

	}

	public function add(){


		$dados = array();

		$this->loadTemplate('add_news', $dados);

	}

	public function edit(){


		$dados = array();

		$this->loadTemplate('edit_news', $dados);

	}
	
}