<?php 

/*
* Classe para Controle de Usuários e suas funções
*
* @package PainelAdministrativo
* @author Victor <vmsa03@gmail.com>
*/
class Usuarios extends model {

	public $id;
	public $nome;
	public $foto;
	public $social;
	public $biografia;
	public $email;
	public $senha;
	public $permissoes;
	public $nivel;
	public $categoria_id;

	/*
	* Função Login
	* 
	* Esta função vai verificar através do email e senha se o usuário realmente existe
	* Na base de dados
	*
	* @param $email string é o email fornecido pelo usuário no formulário de login
	* @param $senha string é a senha fornecida pelo usuário no formulário de login
	* @return float
	*/
	public function login(){

		$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND status = '1'";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":email", $this->email);
		$sql->bindValue(":senha", $this->senha);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}

	}

	/*
	* Função Pegar Data do Usuário
	* 
	* Esta função busca os dados do usuário do banco de dados
	* Na base de dados
	*
	* @param $id float é o id do usuário da sessão atual
	* @return string
	*/
	public function get_user(){

		$sql = "SELECT usuarios.id, usuarios.nome as nome_usuario, usuarios.nivel, usuarios.categoria_id, usuarios.email, usuarios.social, usuarios.biografia, usuarios.permissoes, usuarios.nivel, usuarios.categoria_id, categorias.id, categorias.nome FROM usuarios INNER JOIN categorias ON usuarios.categoria_id = categorias.id WHERE usuarios.id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $this->id);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetch();
		}

	}

	/*
	* Função de adicionar um novo Usuário
	* 
	* Esta função irá adicionar um novo usuário ao banco de dados
	* Exclusiva a adms
	*
	* @param $nome string é o nome do usuário
	* @param $email string é o email do usuário
	* @param $senha string é a senha do usuário
	* @param $permissoes string são as permissões do usuário
	* @param $nivel string é o nível do usuário
	* @param $categoria_id int é a categoria do usuário
	* @return true or false
	*/
	public function add_user(){

		$sql = "INSERT INTO usuarios SET nome = :nome, social = :social, email = :email, senha = :senha, permissoes = :permissoes, nivel = :nivel, categoria_id = :categoria_id, status = '1'";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $this->nome);
		$sql->bindValue(':social', $this->social);
		$sql->bindValue(':email', $this->email);
		$sql->bindValue(':senha', $this->senha);
		$sql->bindValue(':permissoes', $this->permissoes);
		$sql->bindValue(':nivel', $this->nivel);
		$sql->bindValue(':categoria_id', $this->categoria_id);
		$sql->execute();

	}

	/*
	* Função de atualizar um Usuário
	* 
	* Esta função irá atualizar os dados de um usuário do banco de dados
	* Exclusiva a adms
	*
	* @param $nome string é o nome do usuário
	* @param $social json são as redes sociais do usuário
	* @param $biografia string biografia/frase fornecida pelo usuário
	* @param $id int id do usuário da sessão
	* @return true or false
	*/
	public function update_user(){

		$sql = "UPDATE usuarios SET nome = :nome, social = :social, biografia = :biografia WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $this->id);
		$sql->bindValue(":nome", $this->nome);
		$sql->bindValue(":social", $this->social);
		$sql->bindValue(":biografia", $this->biografia);
		$sql->execute();

	}

	/*
	* Função de atualizar a foto mais os dados do usuário
	* 
	* Esta função irá atualizar os dados de um usuário junto a foto do banco de dados
	* Exclusiva a adms
	*
	* @param $nome string é o nome do usuário
	* @param $social json são as redes sociais do usuário
	* @param $foto string é a foto fornecida pelo usuário
	* @param $biografia string biografia/frase fornecida pelo usuário
	* @param $id int id do usuário da sessão
	* @return true or false
	*/
	public function update_photo(){

		$sql = "UPDATE usuarios SET nome = :nome, foto = :foto, social = :social, biografia = :biografia WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $this->id);
		$sql->bindValue(":nome", $this->nome);
		$sql->bindValue(":foto", $this->foto);
		$sql->bindValue(":social", $this->social);
		$sql->bindValue(":biografia", $this->biografia);
		$sql->execute();

	}

}