<?php
class arbitragem extends model {

	public function get($limite = 0, $status = 1) {
    $array = array();

    // Construa a consulta SQL incluindo a condição do status
    $sql = "SELECT * FROM arbitragem WHERE status = :status ORDER BY nome ASC";

    // Prepare a consulta SQL
    $sql = $this->db->prepare($sql);

    // Vincule o parâmetro :status
    $sql->bindValue(":status", $status);

    // Execute a consulta SQL
    $sql->execute();

    // Verifique se há registros retornados
    if($sql->rowCount() > 0) {
        // Se houver registros, armazene-os em um array
        $array = $sql->fetchAll();
    }

    // Retorne o array contendo os registros
    return $array;
}


	// public function getByFilters($ano = "", $nome = "", $getHidden = true) {
	// 	$array = array();

	// 	$dataIni = (string)$ano."-01-01 00:00:00";
	// 	$dataFim = (string)$ano."-12-31 23:59:59";

	// 	$sql = "SELECT * FROM arbitragem WHERE arbitragem_id != 0";

	// 	if($ano) {
	// 		$sql .= " AND (date_add BETWEEN '$dataIni' AND '$dataFim')";
	// 	}
	// 	if($nome) {
	// 		$nome = "%".$nome."%";
	// 		$sql .= " AND nome LIKE '$nome'";
	// 	}
	// 	if(!$getHidden) {
	// 		$sql .= " AND `show` = 1";
	// 	}

	// 	$sql .= " ORDER BY nome ASC";

	// 	$sql = $this->db->query($sql);

	// 	if($sql->rowCount() > 0) {

	// 		$array = $sql->fetchAll();

	// 	}

	// 	return $array;
	// }
	public function getByFilters($ano = "", $nome = "", $getHidden = true) {
    $array = array();

    // Começamos a construir a consulta SQL
    $sql = "SELECT * FROM arbitragem WHERE arbitragem_id != 0";

    // Verifique se há um ano especificado
    if($ano) {
        // Se houver, adicione a condição de data à consulta SQL
        $dataIni = (string)$ano."-01-01 00:00:00";
        $dataFim = (string)$ano."-12-31 23:59:59";
        $sql .= " AND (date_add BETWEEN '$dataIni' AND '$dataFim')";
    }

    // Verifique se há um nome especificado
    if($nome) {
        // Se houver, adicione a condição de nome à consulta SQL
        $nome = "%".$nome."%";
        $sql .= " AND nome LIKE '$nome'";
    }

    // Verifique se a opção de incluir árbitros ocultos está definida como false
    if(!$getHidden) {
        // Se não estiver, adicione a condição para mostrar apenas árbitros não ocultos
        $sql .= " AND `show` = 1";
    }

    // Finalize a consulta SQL com a ordenação
    $sql .= " ORDER BY nome ASC";

    // Execute a consulta SQL
    $sql = $this->db->query($sql);

    // Verifique se há resultados
    if($sql->rowCount() > 0) {
        // Se houver, armazene os resultados em um array
        $array = $sql->fetchAll();
    }

    // Retorne o array de resultados
    return $array;
}


	public function sql($sql)
	{

		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {

			$array = $sql->fetchAll();

		}


		return $array;

	}
	public function add($data = array())
	{
		$sql = $this->db->query("INSERT INTO arbitragem SET 

			nome = '" . $data["nome"] . "', 
			nascimento = '" . $data["nascimento"] . "',  
			funcao = '" . $data["funcao"] . "', 
			cpf = '" . $data["cpf"] . "', 
			rg = '" . $data["rg"] . "', 
			telefone = '" . $data["telefone"] . "',
			cep = '" . $data["cep"] . "', 
			endereco = '" . $data["endereco"] . "', 
			bairro = '" . $data["bairro"] . "',
			numero = '" . $data["numero"] . "', 
			cidade = '" . $data["cidade"] . "', 
			estado = '" . $data["estado"] . "', 
			foto = '" . $data["foto"] . "', 
			status = '1', 
			date_add = '" . date('Y-m-d H:i:s') . "'");

		return $this->db->lastInsertId();
		
	}

	public function addViaPublicForm ($data = array()) {
		$sql = $this->db->query("INSERT INTO arbitragem SET 

			nome = '" . $data["nome"] . "', 
			nascimento = '" . $data["nascimento"] . "',  
			funcao = '" . $data["funcao"] . "',  
			cpf = '" . $data["cpf"] . "', 
			rg = '" . $data["rg"] . "', 
			escolaridade = '" . $data["escolaridade"] . "', 
			nome_pai = '" . $data["nome_pai"] . "', 
			nome_mae = '" . $data["nome_mae"] . "', 
			email = '" . $data["email"] . "', 
			whatsapp = '" . $data["whatsapp"] . "', 
			telefone = '" . $data["telefone"] . "',
			cep = '" . $data["cep"] . "', 
			endereco = '" . $data["endereco"] . "', 
			bairro = '" . $data["bairro"] . "', 
			numero = '" . $data["numero"] . "', 
			cidade = '" . $data["cidade"] . "', 
			estado = '" . $data["estado"] . "', 
			foto = '', 
			status = '1', 
			date_add = '" . date('Y-m-d H:i:s') . "'");

		return $this->db->lastInsertId();
	}

	public function edit($data = array())
	{
		$this->db->query("UPDATE arbitragem SET 

			nome = '" . $data["nome"] . "', 
			nascimento = '" . $data["nascimento"] . "', 
			funcao = '" . $data["funcao"] . "', 
			cpf = '" . $data["cpf"] . "', 
			rg = '" . $data["rg"] . "', 
			telefone = '" . $data["telefone"] . "',
			cep = '" . $data["cep"] . "', 
			endereco = '" . $data["endereco"] . "', 
			bairro = '" . $data["bairro"] . "', 
			numero = '" . $data["numero"] . "', 
			cidade = '" . $data["cidade"] . "', 
			estado = '" . $data["estado"] . "', 
			foto = '" . $data["foto"] . "',  
			date_mod= '" . date('Y-m-d H:i:s') . "' 

			WHERE arbitragem_id = '".(int) $data["arbitragem_id"]."'");

	}

	public function delete($id)
	{
		return $this->db->query("UPDATE arbitragem SET status = '0', date_mod= '".date('Y-m-d H:i:s')."' WHERE arbitragem_id = '".(int) $id."'");
	}

	public function getById($id)
	{
		$sql = "SELECT * FROM arbitragem WHERE arbitragem_id = '".(int) $id."'";

		$sql = $this->db->query($sql);

		return $sql->fetch();
	}

}
?>