<?php
class informativos extends model {

  public function get() {
    $array = array();

    $sql = "SELECT informativos.*, categorias.titulo as categoria_titulo FROM informativos INNER JOIN categorias ON informativos.categoria_id = categorias.categoria_id WHERE informativos.status = '1' ORDER BY informativos.date_add DESC";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
    }

    return $array;
  }

  public function getByMes($mes) {
    $array = array();

    if($mes == "corrente") {

      $inicioMes = (string)date('Y')."-".date('m')."-01 00:00:00";
      $fimMes = (string)date('Y')."-".date('m')."-31 23:59:59";

    } else if ($mes == "-1") { // mês anterior...

      if(date('m') == "01") {
        $mes = "12";
        $ano = date('Y') - 1;
      } else {
        $mes = date('m') - 1;
        $ano = date('Y');
      }

      $inicioMes = (string)$ano."-".$mes."-01 00:00:00";
      $fimMes = (string)$ano."-".$mes."-31 23:59:59";

    } else if ($mes == "-2") { // mês penúltimo...

      if(date('m') == "01") {
        $mes = "11";
        $ano = date('Y') - 1;
      } else if (date('m') == "02") {
        $mes = "12";
        $ano = date('Y') - 1;
      } else {
        $mes = date('m') - 2;
        $ano = date('Y');
      }

      $inicioMes = (string)$ano."-".$mes."-01 00:00:00";
      $fimMes = (string)$ano."-".$mes."-31 23:59:59";

    } else if ($mes == "-3") { // mês antepenúltimo...

      if(date('m') == "01") {
        $mes = "10";
        $ano = date('Y') - 1;
      } else if (date('m') == "02") {
        $mes = "11";
        $ano = date('Y') - 1;
      } else if (date('m') == "03") {
        $mes = "12";
        $ano = date('Y') - 1;
      } else {
        $mes = date('m') - 3;
        $ano = date('Y');
      }

      $inicioMes = (string)$ano."-".$mes."-01 00:00:00";
      $fimMes = (string)$ano."-".$mes."-31 23:59:59";

    } else if ($mes == "antigos") { //menos 4 meses

      if(date('m') == "01") {
        $antigo = "09";
        $ano = date('Y') - 1;
      } else if(date('m') == "02") {
        $antigo = "10";
        $ano = date('Y') - 1;
      } else if(date('m') == "03") {
        $antigo = "11";
        $ano = date('Y') - 1;
      } else if(date('m') == "04") {
        $antigo = "12";
        $ano = date('Y') - 1;
      } else {
        $antigo = date('m') - 4;
        $ano = date('Y');
      }

      $inicioMes = "2012-01-01 00:00:00";
      $fimMes = (string)$ano."-".$antigo."-31 23:59:59";

    }

    $sql = "SELECT informativos.*, categorias.titulo as categoria_titulo FROM informativos 
    INNER JOIN categorias ON informativos.categoria_id = categorias.categoria_id 
    WHERE informativos.status = '1' AND 
      (informativos.date_add >= '$inicioMes' AND informativos.date_add <= '$fimMes') 
     ORDER BY informativos.date_add DESC";
    
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
    }

    return $array;
  }

  public function getByUrl($url) {
    $array = array();

    $sql = "SELECT informativos.*, categorias.titulo as categoria_titulo FROM informativos 

    LEFT JOIN categorias ON informativos.categoria_id = categorias.categoria_id WHERE informativos.url = '".$url."'";

    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
      $array = $sql->fetch();
    }

    return $array;
  }

  public function getById($id) {
    $array = array();

    $sql = "SELECT informativos.*, categorias.titulo as categoria_titulo FROM informativos 

    LEFT JOIN categorias ON informativos.categoria_id = categorias.categoria_id WHERE informativos.informativo_id = '".$id."'";

    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
      $array = $sql->fetch();
    }

    return $array;
  }

  public function delete($id) {

    return $this->db->query("UPDATE informativos SET status = '0', date_mod = '".date('Y-m-d H:i:s')."' WHERE informativo_id = '$id'");

  }

  public function edit($data) {

    $this->db->query("UPDATE informativos SET titulo = '".$data["titulo"]."', url = '".$data["url"]."', corpo = '".$data["corpo"]."', categoria_id = '".$data["categoria_id"]."', date_mod = '".date('Y-m-d H:i:s')."' WHERE informativo_id = '".$data["informativo_id"]."'");

  }

  public function add($data) {

    $this->db->query("INSERT INTO informativos SET titulo = '".$data["titulo"]."', url = '".$data["url"]."', corpo = '".$data["corpo"]."', categoria_id = '".$data["categoria_id"]."', status = '1', date_add = '".date('Y-m-d H:i:s')."'");
    
  }

}