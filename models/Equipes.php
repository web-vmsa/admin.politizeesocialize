<?php 

/*
* Classe para Times
*
* @package PainelAdministrativo
* @author Victor <vmsa03@gmail.com>
*/
class Equipes extends model {

	public $id;
	public $nome;
	public $alcunha;
	public $escudo;

	/*
	* Função de Adicionar novo Time 
	* 
	* Esta função irá inserir novos times as competições, exclusiva a adms
	*
	* @param $nome string é o nome do time
	* @param $alcunha são as siglas do time
	* @param $escudo é o escudo do time
	* @return true of false
	*/
	public function set_team(){

		$sql = "INSERT INTO equipes SET nome = :nome, alcunha = :alcunha, escudo = :escudo";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $this->nome);
		$sql->bindValue(':alcunha', $this->alcunha);
		$sql->bindValue(':escudo', $this->escudo);
		$sql->execute();

	}

}