<?php 
class noticiasController extends controller {

	public function index(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$noticias = new Noticias();
		$noticias->id_usuario = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user(),
			'noticias' => $noticias->get_news()
		);

		$this->loadTemplate('noticias', $dados);

	}

	public function add(){


		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user()
		);

		$this->loadTemplate('add_news', $dados);

	}

	public function edit($id){

		$noticia = new Noticias();
		$noticia->id = $id;
		$noticia->id_usuario = $_SESSION['id']; 

		$usuario = new Usuarios();
		$usuario->id = $_SESSION['id'];

		$dados = array(
			'usuario' => $usuario->get_user(),
			'noticia' => $noticia->get_new()
		);

		$this->loadTemplate('edit_news', $dados);

	}
	
}