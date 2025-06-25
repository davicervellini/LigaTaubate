<?php
class estadios extends model {

  public function get($limite = 0, $status = 1) {
    $array = array();

    $sql = "SELECT estadios.*, clubes.clube_id, clubes.nome AS clube_nome FROM estadios 
        LEFT JOIN clubes ON estadios.clube_id=clubes.clube_id
        WHERE estadios.status ='".$status."'";

    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {

      $array = $sql->fetchAll();

    }

    return $array;
  }

  public function getAll($status = 1)
  {

    $array = array();

    $sql = "SELECT * FROM estadios WHERE status = '".$status."' ORDER BY campo ASC";

    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {

      $array = $sql->fetchAll();

    }

    return $array;
  }

  public function add($data = array())
  {
    $sql = $this->db->query("INSERT INTO estadios SET 

      campo = '" . $data["campo"] . "',
      nome_fantasia = '".$data["nome_fantasia"]."', 
      inauguracao = '" . $data["inauguracao"] . "',  
      
      cep = '" . $data["cep"] . "', 
      endereco = '" . $data["endereco"] . "', 
      bairro = '" . $data["bairro"] . "', 
      cidade = '" . $data["cidade"] . "', 
      estado = '" . $data["estado"] . "', 

      clube_id = '" . $data["clube_id"] . "',
      foto = '" . $data["foto"] . "', 
      status = '1', 
      date_add = '" . date('Y-m-d H:i:s') . "'");  
    
    
      $campo_id = $this->db->lastInsertId();
    
    
      // FOR PARA CADASTRAR MANDANTES


      if(isset($data["mandante"]) && $data["mandante"]!="")
      {

        foreach ($data["mandante"] as $clube_id) 
        {
          
            $sql = $this->db->query("INSERT INTO mandantes SET
          
          estadio_id = '" . $campo_id . "',
          clube_id = '" . $clube_id . "'");

        }
      }

      return $campo_id;
    
  }

  public function edit($data = array())
  {
    $this->db->query("UPDATE estadios SET 

      campo = '" . $data["campo"] . "',
      nome_fantasia = '" . $data["nome_fantasia"] . "', 
      inauguracao = '" . $data["inauguracao"] . "',  
      
      cep = '" . $data["cep"] . "', 
      endereco = '" . $data["endereco"] . "', 
      bairro = '" . $data["bairro"] . "', 
      cidade = '" . $data["cidade"] . "', 
      estado = '" . $data["estado"] . "', 
      
      clube_id = '" . $data["clube_id"] . "',
      foto = '" . $data["foto"] . "', 
      date_mod= '" . date('Y-m-d H:i:s') . "' 

      WHERE estadio_id = '".(int) $data["estadio_id"]."'");

    //apaga os registros da tabela mandantes

    $this->db->query("DELETE FROM mandantes WHERE estadio_id = '".(int) $data["estadio_id"]."'");

    //cadastra os novos registros

      // FOR PARA CADASTRAR MANDANTES
      
      if(isset($data["mandante"]) && $data["mandante"]!="")

      {
        foreach ($data["mandante"] as $clube_id) 
        {
          
            $sql = $this->db->query("INSERT INTO mandantes SET
          
          estadio_id = '" . (int) $data["estadio_id"] . "',
          clube_id = '" . $clube_id . "'");

        }
      }

  }

  public function delete($id)
  {
    return $this->db->query("UPDATE estadios SET status = '0', date_mod= '".date('Y-m-d H:i:s')."' WHERE estadio_id = '".(int) $id."'");
  }

  public function getById($id)
  {
    $sql = "SELECT estadios.*, clubes.nome as clube_nome FROM estadios LEFT JOIN clubes ON estadios.clube_id = clubes.clube_id WHERE estadios.estadio_id = '".(int) $id."'";

    $sql = $this->db->query($sql);

    return $sql->fetch();
  }

    public function getByClubeId($id)
  {
    $sql = "SELECT estadios.*, clubes.nome as clube_nome FROM estadios LEFT JOIN clubes ON estadios.clube_id = clubes.clube_id WHERE estadios.clube_id = '".(int) $id."'";

    $sql = $this->db->query($sql);

    return $sql->fetch();
  }
  
  public function getMandanteById($id)
  {

    $array = array();

    
    $sql = "SELECT mandantes.*, clubes.nome FROM mandantes LEFT JOIN clubes ON mandantes.clube_id = clubes.clube_id WHERE mandantes.estadio_id = '".(int) $id."' ORDER BY mandante_id ASC";

    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {

      $array = $sql->fetchAll();

    }

    return $array;
  
  }

}
?>