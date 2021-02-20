<?php 

/*
* Classe para Notícias
*
* @package PainelAdministrativo
* @author Victor <vmsa03@gmail.com>
*/
class Noticias extends model {

	public $id;
	public $id_usuario;
	public $categoria_id;
	public $titulo;
	public $descricao;
	public $tags;
	public $url;
	public $arquivo;
	public $tipo;
	public $legenda;
	public $postagem;
	public $data;

	/*
	* Função de Adicionar Notícia ao Portal 
	* 
	* Esta função vai inserir uma nova notícia ao banco de dados, anexado ao
	* arquivo de vídeo ou foto
	*
	* @param $id_usuario int é o id do autor da notícia
	* @param $categoria string é a categoria da notícia
	* @param $titulo string é título fornecido pelo escritor
	* @param $descricao string é a descrição fornecida pelo escritor
	* @param $tags string são as tags fornecidas pelo escritor
	* @param $url string é identificação da postagem através de uma url amigável
	* @param $arquivo string é nome do arquivo anexado a notícia
	* @param $tipo string são as condições do arquivo, se é vídeo ou imagem
	* @param $legenda string é a legenda do vídeo
	* @param $postagem string é a postagem fornecida pelo escritor
	* @param $data date é a data do dia da notícia
	* @return true or false
	*/
	public function set_noticia(){

		$sql = "INSERT INTO noticias SET id_usuario = :id_usuario, categoria_id = :categoria_id, titulo = :titulo, descricao = :descricao, tags = :tags, url = :url, arquivo = :arquivo, tipo = :tipo, legenda = :legenda, postagem = :postagem, data = :data, status = '1'";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_usuario", $this->id_usuario);
		$sql->bindValue(":categoria_id", $this->categoria_id);
		$sql->bindValue(":titulo", $this->titulo);
		$sql->bindValue(":descricao", $this->descricao);
		$sql->bindValue(":tags", $this->tags);
		$sql->bindValue(":url", $this->url);
		$sql->bindValue(":arquivo", $this->arquivo);
		$sql->bindValue(":tipo", $this->tipo);
		$sql->bindValue(":legenda", $this->legenda);
		$sql->bindValue(":postagem", $this->postagem);
		$sql->bindValue(":data", $this->data);
		$sql->execute();

	}

	/*
	* Função de Pegar as notícias do usuário
	* 
	* Esta função vai dar um select em todas notícias do usuário do portal
	*
	* @param $id_usuario int é o id do autor da notícia
	* @return string
	*/
	public function get_news(){

		$sql = "SELECT usuarios.id, usuarios.nome, noticias.id, noticias.id_usuario, noticias.titulo, noticias.arquivo, noticias.arquivo, noticias.tipo, noticias.data, DAY(noticias.data) as dia, MONTH(noticias.data) as mes, YEAR(noticias.data) as ano FROM noticias INNER JOIN usuarios ON usuarios.id = noticias.id_usuario WHERE noticias.id_usuario = :id_usuario ORDER BY noticias.id DESC";
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
	* Função de Verificar se usuário criou a notícia
	* 
	* Esta função serve para verificar autenticidade do criador e editor da notícia
	* Evitando que outro escritores editem notícias de outros
	*
	* @param $id_usuario int é o id do autor da notícia
	* @param $id é o id da notícia
	* @return string
	*/
	public function get_new(){

		$sql = "SELECT * FROM noticias WHERE id_usuario = :id_usuario AND id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $this->id);
		$sql->bindValue(':id_usuario', $this->id_usuario);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}

	}

	/*
	* Função de Atualizar uma notícia
	* 
	* Esta função irá atualizar os dados de uma notícia
	*
	* @param $id é o id da notícia
	* @param $titulo é o título da notícia
	* @param $descricao é a descrição da notícia
	* @param $tags são as tags da notícia
	* @param $legenda string é a legenda do arquivo
	* @param $postagem é a postagem da notícia
	* @return true or false
	*/
	public function update_new(){

		$sql = "UPDATE noticias SET titulo = :titulo, descricao = :descricao, tags = :tags, legenda = :legenda, postagem = :postagem WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $this->id);
		$sql->bindValue(':titulo', $this->titulo);
		$sql->bindValue(':descricao', $this->descricao);
		$sql->bindValue(':tags', $this->tags);
		$sql->bindValue(':legenda', $this->legenda);
		$sql->bindValue(':postagem', $this->postagem);
		$sql->execute();

	}

}