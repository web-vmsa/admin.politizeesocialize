<?php 

/*
* Classe para Opiniões
*
* @package PainelAdministrativo
* @author Victor <vmsa03@gmail.com>
*/
class Colunas extends model {

	public $id;
	public $id_usuario;
	public $categoria;
	public $titulo;
	public $descricao;
	public $tags;
	public $url;
	public $arquivo;
	public $arquivo_prop;
	public $postagem;
	public $data;

	/*
	* Função de Adicionar Opinião ao Portal 
	* 
	* Esta função vai inserir uma nova opinião ao banco de dados, anexado ao
	* arquivo de vídeo ou foto
	*
	* @param $id_usuario int é o id do autor da opinião
	* @param $categoria string é a categoria da opinião
	* @param $titulo string é título fornecido pelo escritor
	* @param $descricao string é a descrição fornecida pelo escritor
	* @param $tags string são as tags fornecidas pelo escritor
	* @param $url string é identificação da postagem através de uma url amigável
	* @param $arquivo string é nome do arquivo anexado a opinião
	* @param $arquivo_prop json são as condições do arquivo, se é vídeo ou imagem
	* @param $postagem string é a postagem fornecida pelo escritor
	* @param $data date é a data do dia da opinião
	* @return true or false
	*/
	public function set_opi(){

		$sql = "INSERT INTO opinioes SET id_usuario = :id_usuario, categoria = :categoria, titulo = :titulo, descricao = :descricao, tags = :tags, url = :url, arquivo = :arquivo, arquivo_prop = :arquivo_prop, postagem = :postagem, data = :data, status = '1'";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id_usuario", $this->id_usuario);
		$sql->bindValue(":categoria", $this->categoria);
		$sql->bindValue(":titulo", $this->titulo);
		$sql->bindValue(":descricao", $this->descricao);
		$sql->bindValue(":tags", $this->tags);
		$sql->bindValue(":url", $this->url);
		$sql->bindValue(":arquivo", $this->arquivo);
		$sql->bindValue(":arquivo_prop", $this->arquivo_prop);
		$sql->bindValue(":postagem", $this->postagem);
		$sql->bindValue(":data", $this->data);
		$sql->execute();

	}

	/*
	* Função de Pegar as opiniões do usuário
	* 
	* Esta função vai dar um select em todas opiniões do usuário do portal
	*
	* @param $id_usuario int é o id do autor da opinião
	* @return string
	*/
	public function get_opis(){

		$sql = "SELECT usuarios.id, usuarios.nome, opinioes.id, opinioes.id_usuario, opinioes.titulo, opinioes.arquivo, opinioes.arquivo_prop, opinioes.data, DAY(opinioes.data) as dia, MONTH(opinioes.data) as mes, YEAR(opinioes.data) as ano FROM opinioes INNER JOIN usuarios ON usuarios.id = opinioes.id_usuario WHERE opinioes.id_usuario = :id_usuario ORDER BY opinioes.id DESC";
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
	* Função de Verificar se usuário criou a opinião
	* 
	* Esta função serve para verificar autenticidade do criador e editor da notícia
	* Evitando que outro escritores editem notícias de outros
	*
	* @param $id_usuario int é o id do autor da opinião
	* @param $id é o id da notícia
	* @return string
	*/
	public function get_opi(){

		$sql = "SELECT * FROM opinioes WHERE id_usuario = :id_usuario AND id = :id";
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
	* Função de Atualizar uma opinião
	* 
	* Esta função irá atualizar os dados de uma opinião
	*
	* @param $id é o id da opinião
	* @param $titulo é o título da opinião
	* @param $descricao é a descrição da opinião
	* @param $tags são as tags da opinião
	* @param $arquivo_prop são as propriedades do arquivo
	* @param $postagem é a postagem da opinião
	* @return true or false
	*/
	public function update_opi(){

		$sql = "UPDATE opinioes SET titulo = :titulo, descricao = :descricao, tags = :tags, arquivo_prop = :arquivo_prop, postagem = :postagem WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $this->id);
		$sql->bindValue(':titulo', $this->titulo);
		$sql->bindValue(':descricao', $this->descricao);
		$sql->bindValue(':tags', $this->tags);
		$sql->bindValue(':arquivo_prop', $this->arquivo_prop);
		$sql->bindValue(':postagem', $this->postagem);
		$sql->execute();

	}

}