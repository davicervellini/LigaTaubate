<?php
class fotos extends model {

	function add($data)
	{
		$this->db->query("INSERT INTO `fotos`(`ref`, `parent`, `foto`, `date_add`, `ord`) VALUES ('".$data["ref"]."','".$data["parent"]."','".$data["foto"]."', '".date('Y-m-d H:i:s')."', '".$data["ord"]."')");
	}

	function del($id)
	{
		return $this->db->query("DELETE FROM `fotos` WHERE `foto_id` = '".$id."'");
	}

	function getById($id)
	{
		return $this->db->query("SELECT * FROM `fotos` WHERE `foto_id` = '".$id."'")->fetch();
	}

	function getByRefId($ref, $parent)
	{
		return $this->db->query("SELECT * FROM `fotos` WHERE `ref` = '".$ref."' AND `parent` = '".$parent."' ORDER BY `ord`")->fetchAll();
	}

	function getLikeRefId($ref, $parent)
	{
		return $this->db->query("SELECT * FROM `fotos` WHERE `ref` LIKE '".$ref."%' AND `parent` = '".$parent."' ORDER BY `ord` ASC")->fetchAll();
	}

	
        
}