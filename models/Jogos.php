<?php 

/*
* Classe para Jogos
*
* @package PainelAdministrativo
* @author Victor <vmsa03@gmail.com>
*/
class Jogos extends model {

	public $id;
	public $id_usuario;
	public $categoria;
	public $jogo_prop;
	public $placar;
	public $status_jogo;
	public $titulo;
	public $descricao;
	public $tags;
	public $url;
	public $arquivo;
	public $arquivo_prop;
	public $lances;
	public $data;

	/*
	* Função de Adicionar novo Jogo
	* 
	* Esta função vai adicionar um novo placar ao vivo ao portal, exclusiva
	* Para escritores da categoria Esportes
	*
	* @param $id_usuario int é o id do usuário logado
	* @param $categoria string é a categoria do usuário
	* @param $jogo_prop json são os dados do jogo
	* @param $placar string é o placar do jogo
	* @param $status_jogo string é o status do jogo
	* @param $titulo string é o título do jogo
	* @param $descricao string é a descrção do jogo
	* @param $tags string são as tags do jogo
	* @param $url string é a url de identificação do jogo
	* @param $arquivo string é nome do arquivo de anexo
	* @param $arquivo_prop json são as propriedades do arquivo de anexo
	* @param $lances string é a descrição maior do jogo
	* @param $data date é a data do jogo
	* @return true of false
	*/
	public function set_jogo(){

		$sql = "INSERT INTO jogos SET id_usuario = :id_usuario, categoria = :categoria, jogo_prop = :jogo_prop, placar = :placar, status_jogo = :status_jogo, titulo = :titulo, descricao = :descricao, tags = :tags, url = :url, arquivo = :arquivo, arquivo_prop = :arquivo_prop, lances = :lances, data = :data, status = '1'";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_usuario', $this->id_usuario);
		$sql->bindValue(':categoria', $this->categoria);
		$sql->bindValue(':jogo_prop', $this->jogo_prop);
		$sql->bindValue(':placar', $this->placar);
		$sql->bindValue(':status_jogo', $this->status_jogo);
		$sql->bindValue(':titulo', $this->titulo);
		$sql->bindValue(':descricao', $this->descricao);
		$sql->bindValue(':tags', $this->tags);
		$sql->bindValue(':url', $this->url);
		$sql->bindValue(':arquivo', $this->arquivo);
		$sql->bindValue(':arquivo_prop', $this->arquivo_prop);
		$sql->bindValue(':lances', $this->lances);
		$sql->bindValue(':data', $this->data);
		$sql->execute();

	}

	/*
	* Função de Pegar todas as competições
	* 
	* Esta função vai selecionar todas as competições disponíveis para se criar
	* um placar
	*
	* @return true of false
	*/
	public function get_cups(){

		$sql = "SELECT * FROM competicoes";
		$sql = $this->db->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return false;
		}

	}

	/*
	* Função de Pegar todos os jogos do usuário
	* 
	* Esta função vai selecionar todos os placares que o usuário criou
	*
	* @param $id_usuario int é o id do usuário logado
	* @return true of false
	*/
	public function get_jogos(){

		$sql = "SELECT * FROM jogos WHERE id_usuario = :id_usuario ORDER BY id DESC";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_usuario', $this->id_usuario);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return false;
		}

	}

	/*
	* Função de Pegar o Jogo
	* 
	* Esta função vai selecionar e verificar se o usuário criou o jogo em questão
	*
	* @param $id_usuario int é o id do usuário logado
	* @return true of false
	*/
	public function get_jogo(){

		$sql = "SELECT * FROM jogos WHERE id_usuario = :id_usuario";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_usuario', $this->id_usuario);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}

	}

	/*
	* Função de Editar um Jogo
	* 
	* Esta função vai editar um placar ao vivo
	*
	* @param $id_ int é o id do jogo
	* @param $jogo_prop json são os dados do jogo
	* @param $placar string é o placar do jogo
	* @param $status_jogo string é o status do jogo
	* @param $arquivo_prop json são as propriedades do arquivo de anexo
	* @param $lances string é a descrição maior do jogo
	* @return true of false
	*/
	public function update_jogo(){

		$sql = "UPDATE jogos SET jogo_prop = :jogo_prop, placar = :placar, status_jogo = :status_jogo, arquivo_prop = :arquivo_prop, lances = :lances WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $this->id);
		$sql->bindValue(':jogo_prop', $this->jogo_prop);
		$sql->bindValue(':placar', $this->placar);
		$sql->bindValue(':status_jogo', $this->status_jogo);
		$sql->bindValue(':arquivo_prop', $this->arquivo_prop);
		$sql->bindValue(':lances', $this->lances);
		$sql->execute();

	}

}