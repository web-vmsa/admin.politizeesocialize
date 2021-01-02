<?php 

/*
* Classe para Controle de Usuários e suas funções
*
* @package PainelAdministrativo
* @author Victor <vmsa03@gmail.com>
*/
class Usuarios extends model {

	public $id;
	public $email;
	public $senha;

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

		$sql = "SELECT * FROM usuarios WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(":id", $this->id);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetch();
		}

	}

}