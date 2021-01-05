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
	* @param $arquivo_prop json são as condições do arquivo, se é vídeo ou imagem
	* @param $postagem string é a postagem fornecida pelo escritor
	* @param $data date é a data do dia da notícia
	* @return true or false
	*/
	public function set_noticia(){

		$sql = "INSERT INTO noticias SET id_usuario = :id_usuario, categoria = :categoria, titulo = :titulo, descricao = :descricao, tags = :tags, url = :url, arquivo = :arquivo, arquivo_prop = :arquivo_prop, postagem = :postagem, data = :data, status = '1'";
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

}