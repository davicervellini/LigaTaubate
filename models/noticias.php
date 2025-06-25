<?php
class noticias extends model {

	public function get($tipo_noticia = null,$limite = null) {
		$array = array();

		$sql = "SELECT noticias.*, categorias.titulo as categoria_titulo FROM noticias INNER JOIN categorias ON noticias.categoria_id = categorias.categoria_id WHERE noticias.status = '1'";
		
		if(!empty($tipo_noticia))
		{
			$sql .= "  AND noticias.tipo_noticia = '".$tipo_noticia."'";
		}

		$sql .= " ORDER BY noticias.date_add DESC";

		if(!empty($limite))
		{
			$sql .= " LIMIT $limite";
		}
		
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getFiltered($category_id, $dateI, $dateF) {
		$array = array();

		$sql = "SELECT 
			noticias.*, 
			categorias.titulo as categoria_titulo 
		FROM noticias 
			INNER JOIN categorias 
				ON noticias.categoria_id = categorias.categoria_id 
		WHERE noticias.status = '1'";
		
		if($category_id)
		{
			$sql .= "  AND categorias.categoria_id = '$category_id'";
		}

		if($dateI && $dateF)
		{
			$dateI .= " 00:00:00";
			$dateF .= " 23:59:59";

			$sql .= " AND noticias.date_add BETWEEN '$dateI' AND '$dateF'";
		} else {
			$dateI = date_create(date('Y-m-d'));
			date_sub($dateI, date_interval_create_from_date_string('90 days'));
			$dateI = date_format($dateI, 'Y-m-d')." 00:00:00";
			$dateF = date('Y-m-d')." 23:59:59";

			$sql .= " AND noticias.date_add BETWEEN '$dateI' AND '$dateF'";
		}

		$sql .= " ORDER BY noticias.date_add DESC";
	
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getById($id) {
		$array = array();

		$sql = "SELECT noticias.*, categorias.titulo as categoria_titulo FROM noticias 

		LEFT JOIN categorias ON noticias.categoria_id = categorias.categoria_id WHERE noticias.noticia_id = '".$id."'";

		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getByUrl($url) {
		$array = array();

		$sql = "SELECT noticias.*, categorias.titulo as categoria_titulo FROM noticias 

		LEFT JOIN categorias ON noticias.categoria_id = categorias.categoria_id WHERE noticias.url = '".$url."' AND noticias.status = '1'";

		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

		public function getByCategoriaId($categoria_id,$noticia_id = null, $limite = null) {
		$array = array();

		$sql = "SELECT noticias.*, categorias.titulo as categoria_titulo FROM noticias 

		LEFT JOIN categorias ON noticias.categoria_id = categorias.categoria_id WHERE noticias.categoria_id = '".$categoria_id."' AND noticias.status = '1'";

		if(isset($noticia_id) && $noticia_id != "")
		{
			$sql .= " AND noticias.noticia_id != '".$noticia_id."'";
		}

		if(!empty($limite))
		{
			$sql .= " LIMIT $limite";
		}

		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function delete($id) {

		return $this->db->query("UPDATE noticias SET status = '0', date_mod = '".date('Y-m-d H:i:s')."' WHERE noticia_id = '$id'");

	}

	public function edit($data) {

		$this->db->query("UPDATE noticias SET titulo = '".$data["titulo"]."', url = '".$data["url"]."', corpo = '".$data["corpo"]."',video_youtube = '".$data["video_youtube"]."', categoria_id = '".$data["categoria_id"]."', tipo_noticia = '".$data["tipo_noticia"]."', foto_principal = '".$data["foto_principal"]."', date_mod='".date('Y-m-d H:i:s')."' WHERE noticia_id = '".$data["noticia_id"]."'");

	}

	public function add($data) {

		$this->db->query("INSERT INTO noticias SET titulo = '".$data["titulo"]."', url = '".$data["url"]."', corpo = '".$data["corpo"]."', video_youtube = '".$data["video_youtube"]."', categoria_id = '".$data["categoria_id"]."', tipo_noticia = '".$data["tipo_noticia"]."', status = '1', foto_principal = '".$data["foto_principal"]."', date_add='".date('Y-m-d H:i:s')."'");
		//var_dump("INSERT INTO noticias SET titulo = '".$data["titulo"]."', url = '".$data["url"]."', corpo = '".$data["corpo"]."', categoria_id = '".$data["categoria_id"]."', status = '1', foto_principal = '".$data["foto_principal"]."', date_add='".date('Y-m-d H:i:s')."'");
		return $this->db->lastInsertId();
		
	}

}