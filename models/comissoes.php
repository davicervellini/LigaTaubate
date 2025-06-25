<?php
class comissoes extends model {

	public function get($limite = 0, $status = 1) {
		$array = array();

		$sql = "SELECT comissao.*, clubes.clube_id, clubes.nome AS clube_nome FROM comissao 
		INNER JOIN clubes ON comissao.clube_id=clubes.clube_id
		WHERE comissao.status ='".$status."'";


		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {

			$array = $sql->fetchAll();

		}

		return $array;
	}

	public function add($data = array())
	{
		$sql = $this->db->query("INSERT INTO comissao SET 

			nome = '" . $data["nome"] . "', 
			nascimento = '" . $data["nascimento"] . "', 
			clube_id = '" . $data["clube_id"] . "', 
			funcao = '" . $data["funcao"] . "', 
			cpf = '" . $data["cpf"] . "', 
			rg = '" . $data["rg"] . "', 
			cref = '" . $data["cref"] . "', 
			foto = '" . $data["foto"] . "', 
			status = '1', 
			date_add = '" . date('Y-m-d H:i:s') . "'");

		return $this->db->lastInsertId();
	}

	public function edit($data = array())
	{
		$this->db->query("UPDATE comissao SET 

			nome = '" . $data["nome"] . "', 
			nascimento = '" . $data["nascimento"] . "', 
			clube_id = '" . $data["clube_id"] . "', 
			funcao = '" . $data["funcao"] . "', 
			cpf = '" . $data["cpf"] . "', 
			rg = '" . $data["rg"] . "', 
			cref = '" . $data["cref"] . "', 
			foto = '" . $data["foto"] . "',  
			date_mod= '" . date('Y-m-d H:i:s') . "' 

			WHERE comissao_id = '".(int) $data["comissao_id"]."'");

	}

	public function delete($id)
	{
		return $this->db->query("UPDATE comissao SET status = '0', date_mod= '".date('Y-m-d H:i:s')."' WHERE comissao_id = '".(int) $id."'");
	}

	public function getById($id)
	{
		$sql = "SELECT * FROM comissao WHERE comissao_id = '".(int) $id."'";

		$sql = $this->db->query($sql);

		return $sql->fetch();
	}

}
?>