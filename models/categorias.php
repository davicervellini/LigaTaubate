<?php
class categorias extends model {

	public function get() {
		$array = array();

		$sql = "SELECT * FROM categorias WHERE status = '1' ORDER BY titulo ASC";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getById($id) {
		$array = array();

		$sql = "SELECT * FROM categorias WHERE categoria_id = '".$id."'";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function delete($id) {

		return $this->db->query("UPDATE categorias SET 
		
		status = '0', 
		date_mod = '".date('Y-m-d H:i:s')."' 
		
		WHERE categoria_id = '$id'");

	}

	public function edit($data) {

		$this->db->query("UPDATE categorias SET 
		
		titulo = '".$data["titulo"]."', 
		url = '".$data["url"]."', 
		corpo = '".$data["corpo"]."' , 
		date_mod = '".date('Y-m-d H:i:s')."' 
		
		WHERE categoria_id = '".$data["categoria_id"]."'");

	}

	public function add($data) {

		$this->db->query("INSERT INTO categorias SET 
		
		titulo = '".$data["titulo"]."', 
		url = '".$data["url"]."', 
		corpo = '".$data["corpo"]."', 
		status = '1', 
		date_add = '".date('Y-m-d H:i:s')."'");
		
	}

}