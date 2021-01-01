<?php 
class Usuarios extends model {

	public $email;
	public $senha;

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

}