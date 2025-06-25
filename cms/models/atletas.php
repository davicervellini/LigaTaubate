<?php

class atletas extends model
{


  public function getWhoHasHistoryByLetter($letter)
  {
    $letter = $letter . "%";

    $sql = "SELECT DISTINCT id_atleta as id, id_historia as id_historia, nome as nome, apelido as apelido, foto as foto FROM 
    atletas_historia WHERE nome LIKE '$letter' ORDER BY nome ASC";

    $sql = $this->db->query($sql);

    return $sql->fetchAll();
  }

  public function getBID($data = "", $nome = "", $clube_id = "", $situacao = "")
  {
    $sql = "SELECT
              DATE_FORMAT(t1.data, '%d/%m/%Y às %H:%i:%s') as data,
              DATE_FORMAT(t1.data_atualizacao, '%d/%m/%Y às %H:%i:%s') as data_atualizacao,
              t1.status,
              t2.foto as foto,
              t2.nome as nome,
              t3.nome as clube,
              t4.nome as campeonato
            FROM bid t1
            LEFT JOIN atletas t2
              ON t2.atleta_id = t1.id_atleta
            LEFT JOIN clubes t3
              ON t3.clube_id = t2.clube_id
            LEFT JOIN campeonato t4
              ON t4.campeonato_id = t1.id_campeonato
          WHERE t1.exibir_publico = 1";

    if ($data !== "") {
      $dataIni = $data . " 00:00:00";
      $dataFim = $data . " 23:59:59";

      $sql .= " AND ((t1.data BETWEEN '$dataIni' AND '$dataFim') OR (t1.data_atualizacao BETWEEN '$dataIni' AND '$dataFim'))";
    }
    if ($nome !== "") {
      $nome = "%" . $nome . "%";
      $sql .= " AND t2.nome LIKE '$nome'";
    }
    if ($clube_id !== "") {
      $sql .= " AND t2.clube_id = '$clube_id'";
    }
    if ($situacao !== "") {
      $sql .= " AND t1.status = '$situacao'";
    }

    $sql .= " ORDER BY t1.data DESC LIMIT 300";

    $sql = $this->db->query($sql);

    return $sql->fetchAll();
  }

  public function getBIDByPersonID($id)
  {
    $sql = "SELECT
      status,
      DATE_FORMAT(data_atualizacao, '%d/%m/%Y às %H:%i:%s') as data_atualizacao,
      exibir_publico
    FROM bid WHERE id_atleta = '$id' ORDER BY data DESC LIMIT 1";
    //sempre o mais recente

    $query = $this->db->query($sql);

    if ($query->rowCount() < 1) {
      return 0;
    } else {
      $result = $query->fetchAll();
      $response = array(
        "status" => $result[0]['status'],
        "data_atualizacao" => $result[0]['data_atualizacao'],
        "exibir_publico" => $result[0]['exibir_publico']
      );
      return $response;
    }
  }

  public function hideAllPersonBID($id)
  {
    $sql = "UPDATE bid SET 
      data_atualizacao = NOW(),
      exibir_publico = 0
    WHERE id_atleta = '$id'";

    $this->db->query($sql);
  }

  public function publishBID($id_atleta, $status, $id_campeonato, $id_clube)
  {
    if (!$id_atleta || !$id_campeonato || !$id_clube) {
      return;
    }

    //Todos os registros antigos não serão visíveis publicamente
    $sql = "UPDATE bid SET 
        data_atualizacao = NOW(),
        exibir_publico = 0
      WHERE id_atleta = '$id_atleta' AND id_campeonato = '$id_campeonato' AND id_clube = '$id_clube'";
    $this->db->query($sql);

    $sql = "INSERT INTO bid (
      id_atleta,
      id_clube,
      id_campeonato,
      status
    ) VALUES (
      '$id_atleta',
      '$id_clube',
      '$id_campeonato',
      '$status'
    )";
    $this->db->query($sql);
  }

  public function publishBIDList($ids)
  {
    foreach ($ids as $id) {
      $sql = $this->db->query("SELECT clube_id FROM atletas WHERE atleta_id = '$id'");
      $query = $sql->fetchAll();
      $id_clube = $query[0]['clube_id'];

      $sql = $this->db->query("SELECT campeonato_id FROM inscricoes WHERE atleta_id = '$id' AND clube_id = '$id_clube' AND status = '1' ORDER BY date_add DESC");
      $campeonatos = $sql->fetchAll();

      foreach ($campeonatos as $campeonato) {
        $id_campeonato = $campeonato['campeonato_id'];

        $sql = "SELECT id_registro FROM bid WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

        $query = $this->db->query($sql);

        if ($query->rowCount() < 1) { //se não existe registros no BID
          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '1'
          )";

          $this->db->query($sql);
        } else {
          //Todos os registros antigos não serão visíveis publicamente
          $sql = "UPDATE bid SET 
              data_atualizacao = NOW(),
              exibir_publico = 0
            WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

          $this->db->query($sql);

          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '1'
          )";

          $this->db->query($sql);
        }
      }
    }
  }

  public function inaptBIDList($ids)
  {
    foreach ($ids as $id) {
      $sql = $this->db->query("SELECT clube_id FROM atletas WHERE atleta_id = '$id'");
      $query = $sql->fetchAll();
      $id_clube = $query[0]['clube_id'];

      $sql = $this->db->query("SELECT campeonato_id FROM inscricoes WHERE atleta_id = '$id' AND clube_id = '$id_clube' AND status = '1' ORDER BY date_add DESC");
      $campeonatos = $sql->fetchAll();

      foreach ($campeonatos as $campeonato) {
        $id_campeonato = $campeonato['campeonato_id'];

        $sql = "SELECT id_registro FROM bid WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

        $query = $this->db->query($sql);

        if ($query->rowCount() < 1) { //se não existe registros no BID
          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '0'
          )";

          $this->db->query($sql);
        } else {
          //Todos os registros antigos não serão visíveis publicamente
          $sql = "UPDATE bid SET 
              data_atualizacao = NOW(),
              exibir_publico = 0
            WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

          $this->db->query($sql);

          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '0'
          )";

          $this->db->query($sql);
        }
      }
    }
  }

  public function travadBIDList($ids)
  {
    foreach ($ids as $id) {
      $sql = $this->db->query("SELECT clube_id FROM atletas WHERE atleta_id = '$id'");
      $query = $sql->fetchAll();
      $id_clube = $query[0]['clube_id'];

      $sql = $this->db->query("SELECT campeonato_id FROM inscricoes WHERE atleta_id = '$id' AND clube_id = '$id_clube' AND status = '1' ORDER BY date_add DESC");
      $campeonatos = $sql->fetchAll();

      foreach ($campeonatos as $campeonato) {
        $id_campeonato = $campeonato['campeonato_id'];

        $sql = "SELECT id_registro FROM bid WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

        $query = $this->db->query($sql);

        if ($query->rowCount() < 1) { //se não existe registros no BID
          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '3'
          )";

          $this->db->query($sql);
        } else {
          //Todos os registros antigos não serão visíveis publicamente
          $sql = "UPDATE bid SET 
              data_atualizacao = NOW(),
              exibir_publico = 0
            WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

          $this->db->query($sql);

          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '3'
          )";

          $this->db->query($sql);
        }
      }
    }
  }

  public function liberadoList($ids)
  {
    foreach ($ids as $id) {
      $sql = $this->db->query("SELECT clube_id FROM atletas WHERE atleta_id = '$id'");
      $query = $sql->fetchAll();
      $id_clube = $query[0]['clube_id'];

      $sql = $this->db->query("SELECT campeonato_id FROM inscricoes WHERE atleta_id = '$id' AND clube_id = '$id_clube' AND status = '1' ORDER BY date_add DESC");
      $campeonatos = $sql->fetchAll();

      foreach ($campeonatos as $campeonato) {
        $id_campeonato = $campeonato['campeonato_id'];

        $sql = "SELECT id_registro FROM bid WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

        $query = $this->db->query($sql);

        if ($query->rowCount() < 1) { //se não existe registros no BID
          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '2'
          )";

          $this->db->query($sql);
        } else {
          //Todos os registros antigos não serão visíveis publicamente
          $sql = "UPDATE bid SET 
              data_atualizacao = NOW(),
              exibir_publico = 0
            WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

          $this->db->query($sql);

          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '2'
          )";

          $this->db->query($sql);
        }
      }
    }
  }
  
  public function fotoForaList($ids)
  {
    foreach ($ids as $id) {
      $sql = $this->db->query("SELECT clube_id FROM atletas WHERE atleta_id = '$id'");
      $query = $sql->fetchAll();
      $id_clube = $query[0]['clube_id'];

      $sql = $this->db->query("SELECT campeonato_id FROM inscricoes WHERE atleta_id = '$id' AND clube_id = '$id_clube' AND status = '1' ORDER BY date_add DESC");
      $campeonatos = $sql->fetchAll();

      foreach ($campeonatos as $campeonato) {
        $id_campeonato = $campeonato['campeonato_id'];

        $sql = "SELECT id_registro FROM bid WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

        $query = $this->db->query($sql);

        if ($query->rowCount() < 1) { //se não existe registros no BID
          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '5'
          )";

          $this->db->query($sql);
        } else {
          //Todos os registros antigos não serão visíveis publicamente
          $sql = "UPDATE bid SET 
              data_atualizacao = NOW(),
              exibir_publico = 0
            WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

          $this->db->query($sql);

          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '5'
          )";

          $this->db->query($sql);
        }
      }
    }
  }
  
  public function inscricaoForaList($ids)
  {
    foreach ($ids as $id) {
      $sql = $this->db->query("SELECT clube_id FROM atletas WHERE atleta_id = '$id'");
      $query = $sql->fetchAll();
      $id_clube = $query[0]['clube_id'];

      $sql = $this->db->query("SELECT campeonato_id FROM inscricoes WHERE atleta_id = '$id' AND clube_id = '$id_clube' AND status = '1' ORDER BY date_add DESC");
      $campeonatos = $sql->fetchAll();

      foreach ($campeonatos as $campeonato) {
        $id_campeonato = $campeonato['campeonato_id'];

        $sql = "SELECT id_registro FROM bid WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

        $query = $this->db->query($sql);

        if ($query->rowCount() < 1) { //se não existe registros no BID
          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '7'
          )";

          $this->db->query($sql);
        } else {
          //Todos os registros antigos não serão visíveis publicamente
          $sql = "UPDATE bid SET 
              data_atualizacao = NOW(),
              exibir_publico = 0
            WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

          $this->db->query($sql);

          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '7'
          )";

          $this->db->query($sql);
        }
      }
    }
  }

  public function inscricaoFora($ids)
  {
    foreach ($ids as $id) {
      $sql = $this->db->query("SELECT clube_id FROM atletas WHERE atleta_id = '$id'");
      $query = $sql->fetchAll();
      $id_clube = $query[0]['clube_id'];

      $sql = $this->db->query("SELECT campeonato_id FROM inscricoes WHERE atleta_id = '$id' AND clube_id = '$id_clube' AND status = '1' ORDER BY date_add DESC");
      $campeonatos = $sql->fetchAll();

      foreach ($campeonatos as $campeonato) {
        $id_campeonato = $campeonato['campeonato_id'];

        $sql = "SELECT id_registro FROM bid WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

        $query = $this->db->query($sql);

        if ($query->rowCount() < 1) { //se não existe registros no BID
          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '7'
          )";

          $this->db->query($sql);
        } else {
          //Todos os registros antigos não serão visíveis publicamente
          $sql = "UPDATE bid SET 
              data_atualizacao = NOW(),
              exibir_publico = 0
            WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

          $this->db->query($sql);

          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '7'
          )";

          $this->db->query($sql);
        }
      }
    }
  }
  
  public function aguardandoFPFList($ids)
  {
    foreach ($ids as $id) {
      $sql = $this->db->query("SELECT clube_id FROM atletas WHERE atleta_id = '$id'");
      $query = $sql->fetchAll();
      $id_clube = $query[0]['clube_id'];

      $sql = $this->db->query("SELECT campeonato_id FROM inscricoes WHERE atleta_id = '$id' AND clube_id = '$id_clube' AND status = '1' ORDER BY date_add DESC");
      $campeonatos = $sql->fetchAll();

      foreach ($campeonatos as $campeonato) {
        $id_campeonato = $campeonato['campeonato_id'];

        $sql = "SELECT id_registro FROM bid WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

        $query = $this->db->query($sql);

        if ($query->rowCount() < 1) { //se não existe registros no BID
          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '5'
          )";

          $this->db->query($sql);
        } else {
          //Todos os registros antigos não serão visíveis publicamente
          $sql = "UPDATE bid SET 
              data_atualizacao = NOW(),
              exibir_publico = 0
            WHERE id_atleta = '$id' AND id_campeonato = '$id_campeonato'";

          $this->db->query($sql);

          $sql = "INSERT INTO bid (
            id_atleta,
            id_clube,
            id_campeonato,
            status
          ) VALUES (
            '$id',
            '$id_clube',
            '$id_campeonato',
            '6'
          )";

          $this->db->query($sql);
        }
      }
    }
  }

  public function getHistoryById($id)
  {
    $sql = "SELECT * FROM atletas_historia WHERE id_historia = $id";

    $sql = $this->db->query($sql);

    return $sql->fetch();
  }


  public function log($clube_id, $atleta_id, $campeonato_id, $action)
  {


    $usuario_id = $_SESSION['lgpainel'];

    $sql = "INSERT INTO atividades SET 

    usuario_id = '" . $usuario_id . "',  
    clube_id = '" . $clube_id . "',  
    atleta_id = '" . $atleta_id . "',  
    campeonato_id = '" . $campeonato_id . "',  
    action = '" . $action . "',  
  
    date_add = NOW()";

    $this->db->query($sql);
  }



  public function get($limite = 0, $status = 1, $date = 0)
  {

    $array = array();
    if ($date == 0) {
      $date = date('Y');
    } 


    //$sql = "SELECT atletas.*, clubes.nome as clube_nome FROM atletas LEFT JOIN clubes ON atletas.clube_id = clubes.clube_id WHERE atletas.status ='".$status."'";


    // $sql = "SELECT inscricoes.*, atletas.*, campeonato.nome AS campeonato_nome, campeonato.temporada, clubes.nome as clube_nome FROM inscricoes 
    // LEFT JOIN campeonato ON inscricoes.campeonato_id = campeonato.campeonato_id 
    // LEFT JOIN atletas ON inscricoes.atleta_id = atletas.atleta_id
    // LEFT JOIN clubes ON atletas.clube_id = clubes.clube_id WHERE atletas.status ='".$status."' AND inscricoes.status = '1'";

    $sql = "SELECT 
    inscricoes.*, 
    inscricoes.clube_id AS inscricao_clube_id,
    atletas.*, clubes.nome AS clube_nome, 
    campeonato.temporada, 
    campeonato.nome AS campeonato_nome 
    FROM inscricoes 
    LEFT JOIN atletas ON inscricoes.atleta_id = atletas.atleta_id 
    LEFT JOIN campeonato ON inscricoes.campeonato_id = campeonato.campeonato_id 
    LEFT JOIN clubes ON inscricoes.clube_id = clubes.clube_id 
    WHERE 
    inscricoes.status = 1 AND 
    atletas.status = '" . $status . "' AND campeonato.temporada ='" . $date . "'";







    if ($limite > 0) {

      $sql .= " LIMIT " . $limite;
    }

    $sql = $this->db->query($sql);




    if ($sql->rowCount() > 0) {



      $array = $sql->fetchAll();
    }



    return $array;
  }

  public function getNewEntries($limite = 0, $status = 1, $date = 0){
  
  $array = array();
  if ($date == 0) {
    $date = date('Y');
  } 
  // Define a data do dia anterior e do próximo dia
  $today = date('Y-m-d');

// Define a data do dia anterior e do próximo dia que são terça ou quarta-feira
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($today)));
if (date('N', strtotime($yesterday)) > 3) {
  $yesterday = date('Y-m-d', strtotime('previous tuesday', strtotime($today)));
}

$tomorrow = date('Y-m-d', strtotime('+1 day', strtotime($today)));
if (date('N', strtotime($tomorrow)) > 3) {
  $tomorrow = date('Y-m-d', strtotime('next wednesday', strtotime($today)));
}
    
$sql = "SELECT 
        inscricoes.*, 
        inscricoes.clube_id AS inscricao_clube_id,
        atletas.*, 
        clubes.nome AS clube_nome, 
        campeonato.temporada, 
        campeonato.nome AS campeonato_nome 
        FROM inscricoes 
        LEFT JOIN atletas ON inscricoes.atleta_id = atletas.atleta_id 
        LEFT JOIN campeonato ON inscricoes.campeonato_id = campeonato.campeonato_id 
        LEFT JOIN clubes ON inscricoes.clube_id = clubes.clube_id 
        WHERE 
        inscricoes.status = 1 AND 
        atletas.status = '" . $status . "' AND 
        campeonato.temporada ='" . $date . "' AND 
        inscricoes.date_add BETWEEN '" . $yesterday . "' AND '" . $tomorrow . "'
        ORDER BY inscricoes.date_add DESC";

if ($limite > 0) {
  $sql .= " LIMIT " . $limite;
}

$sql = $this->db->query($sql);

if ($sql->rowCount() > 0) {
  $array = $sql->fetchAll();
}

return $array;


  }





  public function getByClubeId($clube_id, $status = 1)
  {
    $array = array();

    $sql = "SELECT atletas.*, clubes.nome as inscricao_clube_id FROM atletas 
    LEFT JOIN clubes ON atletas.clube_id = clubes.clube_id 
    WHERE atletas.clube_id = '" . $clube_id . "' AND atletas.status ='" . $status . "'";

    $sql .= " AND atletas.atleta_id IN (SELECT atleta_id FROM inscricoes WHERE status = 1 AND date_add LIKE '" . date('Y') . "%')";

    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = array();
      foreach ($sql as $atleta) {
        $inscricoes = "SELECT inscricoes.incricao_id, campeonato.nome AS campeonato, campeonato.temporada AS temporada FROM inscricoes 
        LEFT JOIN campeonato ON inscricoes.campeonato_id = campeonato.campeonato_id
        WHERE inscricoes.atleta_id = '" . $atleta["atleta_id"] . "' AND inscricoes.status = '1' AND inscricoes.date_add LIKE '" . date('Y') . "%'";

        $inscricoes = $this->db->query($inscricoes);

        $arr = $inscricoes->fetchAll();

        $atleta["inscricoes"] = $arr;

        array_push($array, $atleta);
      }
      //$array = $sql->fetchAll();
    }

    return $array;
  }

  public function getByClubeIdYear($clube_id, $year = null)
  {
    $array = array();
    if (!$year) $year = date('Y');
    $year = $year . "%";
    $sql = "SELECT atletas.*, clubes.nome as clube_nome FROM atletas 
    LEFT JOIN clubes ON atletas.clube_id = clubes.clube_id 
    WHERE atletas.clube_id = '" . $clube_id . "' AND atletas.status ='1'";
    $sql .= " AND atletas.atleta_id IN (SELECT atleta_id FROM inscricoes WHERE status = 1 AND date_add LIKE '$year')";
    $sql = $this->db->query($sql);
    if ($sql->rowCount() > 0) {
      $array = array();
      foreach ($sql as $atleta) {
        $inscricoes = "SELECT inscricoes.incricao_id, campeonato.nome AS campeonato, campeonato.temporada AS temporada FROM inscricoes 
      LEFT JOIN campeonato ON inscricoes.campeonato_id = campeonato.campeonato_id
      WHERE inscricoes.atleta_id = '" . $atleta["atleta_id"] . "' AND inscricoes.status = '1' AND inscricoes.date_add LIKE '$year'";

        $inscricoes = $this->db->query($inscricoes);

        $arr = $inscricoes->fetchAll();

        $atleta["inscricoes"] = $arr;

        array_push($array, $atleta);
      }
      //$array = $sql->fetchAll();
    }
    return $array;
  }


  public function verificaLimite($funcao, $campeonato_id, $clube_id, $limite)
  {

    $sql = $this->db->query("SELECT * FROM atletas LEFT JOIN inscricoes ON atletas.atleta_id = inscricoes.atleta_id 

      WHERE atletas.funcao = '" . $funcao . "' AND inscricoes.campeonato_id = '" . $campeonato_id . "' AND inscricoes.clube_id = '" . $clube_id . "' AND inscricoes.status = '1'");

    $qde_inscricoes = $sql->rowCount();

    if ($qde_inscricoes >= $limite) {
      return false;
    } else {
      return true;
    }
  }

  public function validaCPF($cpf) {
    // Extrai apenas os números do CPF
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
  
    // Verifica se o CPF possui 11 dígitos
    if (strlen($cpf) != 11) {
      return false;
    }
  
    // Verifica se todos os dígitos são iguais
    if (preg_match('/(\d)\1{10}/', $cpf)) {
      return false;
    }
  
    // Calcula o primeiro dígito verificador
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
      $soma += ($cpf[$i] * (10 - $i));
    }
    $resto = $soma % 11;
    $dv1 = ($resto < 2) ? 0 : (11 - $resto);
  
    // Calcula o segundo dígito verificador
    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
      $soma += ($cpf[$i] * (11 - $i));
    }
    $resto = $soma % 11;
    $dv2 = ($resto < 2) ? 0 : (11 - $resto);
  
    // Verifica se os dígitos verificadores estão corretos
    if (($cpf[9] != $dv1) || ($cpf[10] != $dv2)) {
      return false;
    }
  
    // Se chegou até aqui, o CPF é válido
    return true;
  }

  public function verificaCPF($cpf) {
    $currentYear = date('Y');
    $sql = $this->db->prepare("SELECT atleta_id FROM atletas WHERE cpf = :cpf AND status = 1 AND YEAR(date_add) = :currentYear");
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':currentYear', $currentYear);
    $sql->execute();
    
    if ($sql->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
  }

  public function add($data = array())
  {

    switch($data["funcao"]) {
      case "Técnico":
        $inscricoes = $this->verificaLimite("Técnico", $data["campeonato_id"], $data["clube_id"], 1);
        if($inscricoes == false) {
          $_SESSION["msg_erro_limit_tec"] = "Apenas 1 Técnico por Clube 😞";
          header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
          exit;
        }
      break;

      case "Atleta":
        $inscricoes = $this->verificaLimite("Atleta", $data["campeonato_id"], $data["clube_id"], 22);
        if($inscricoes == false) {
          $_SESSION["msg_erro_limit_atlet"] = "Você Ultrapassou o limite de 22 atletas";
          header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
          exit;
        }
      break;

      case "Auxiliar Técnico": 
        $inscricoes = $this->verificaLimite("Auxiliar Técnico", $data["campeonato_id"], $data["clube_id"], 1);
        if($inscricoes == false) {
          $_SESSION["msg_erro_limit_aux"] = "Apenas 1 Auxiliar Técnico por Clube 😞";
          header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
          exit;
        }
      break;

      case "Massagista":
        $inscricoes = $this->verificaLimite("Massagista", $data["campeonato_id"], $data["clube_id"], 1);
        if($inscricoes == false) {
          $_SESSION["msg_erro_limit_mass"] = "Apenas 1 Massagista por Clube 😞";
          header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
          exit;
        }
        break;

      case "Preparador Físico":
          $inscricoes = $this->verificaLimite("Preparador Físico", $data["campeonato_id"], $data["clube_id"], 1);
          if($inscricoes == false) {
            $_SESSION["msg_erro_limit_prep"] = "Apenas 1 Preparador Físico por Clube 😞";
            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
            exit;
          }
          break;

      default: 
        $inscricoes = false;
        break;
    }

    //valida CPF
    if($this->validaCPF($data["cpf"]) === false) {
      $_SESSION["msg_cpf_invalido"] = "CPF Inválido, fornece um CPF válido! ";
      header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
      exit;
    }

    if ($inscricoes) {
     // Pega o ano corrente
    $currentYear = date('Y');

    // Verifica se o cadastro do atleta já existe para evitar registro duplicado
    // e se o atleta está ativo no ano corrente
    $ATLETA = $this->db->query("SELECT atleta_id FROM atletas WHERE cpf = '" . $data["cpf"] . "' AND status = 1 AND YEAR(date_add) = " . $currentYear);

    // Verifica CPF
    if ($ATLETA->rowCount() > 0) {
        $_SESSION["msg_erro_cpf"] = "CPF já cadastrado e ativo em " . $currentYear . "! 😞";
        header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
        exit;
    }
      
      if ($ATLETA->rowCount() == 0) {
        $this->db->query(
          "INSERT INTO atletas SET 
          foto = '" . $data["foto"] . "', 
          clube_id = '" . $data["clube_id"] . "', 
          nome = '" . addslashes($data["nome"]) . "', 
          apelido = '" . addslashes($data["apelido"]) . "', 
          funcao = '" . $data["funcao"] . "', 
          nascimento = '" . $data["nascimento"] . "', 
          natural_cidade = '" . addslashes($data["natural_cidade"]) . "', 
          natural_estado = '" . addslashes($data["natural_estado"]) . "', 
          rg = '" . $data["rg"] . "',
          cpf = '" . $data["cpf"] . "', 
          cref = '" . $data["cref"] . "',
          nome_pai = '" . addslashes($data["nome_pai"]) . "', 
          nome_mae = '" . addslashes($data["nome_mae"]) . "', 
          cep ='" . $data["cep"] . "', 
          endereco = '" . addslashes($data["endereco"]) . "', 
          bairro = '" . addslashes($data["bairro"]) . "', 
          cidade = '" . addslashes($data["cidade"]) . "', 
          estado = '" . addslashes($data["estado"]) . "', 
          status = '1',
          email = '" . $data["email"] . "', 
          celular = '" . $data["celular"] . "',
          anexo_rg = '" . $data["anexo_rg"] . "', 
          anexo_cpf = '" . $data["anexo_cpf"] . "', 
          anexo_cnh = '" . $data["anexo_cnh"] . "', 
          anexo_residencia = '" . $data["anexo_residencia"] . "', 
          date_add = '" . date('Y-m-d H:i:s') . "'"
        );

        $atleta_id = $this->db->lastInsertId();

        $this->log($data["clube_id"], $atleta_id, $data["campeonato_id"], 1); //clube, atleta, campeonato, action

        $this->db->query("INSERT INTO inscricoes SET 
          campeonato_id = '" . $data["campeonato_id"] . "', 
          clube_id = '" . $data["clube_id"] . "',
          atleta_id = '" . $atleta_id . "',
          status = '1',
          date_add = '" . date('Y-m-d H:i:s') . "'
        ");

        $this->log($data["clube_id"], $atleta_id, $data["campeonato_id"], 4); //clube, atleta, campeonato, action

        $this->updateSumula(["campeonato_id" => $data["campeonato_id"], "clube_id" => $data["clube_id"]]);
        /*ENVIO TEMPORARIO DE E-MAIL*/
        if ($data["campeonato_id"] == 23 || $data["campeonato_id"] == 25 || $data["campeonato_id"] == 32 || $data["campeonato_id"] == 34 || $data["campeonato_id"] == 35 || $data["campeonato_id"] == 37) {
          $headers = "MIME-Version: 1.0\n";
          $headers .= "From: Liga Municial de Taubaté <presidente@ligataubate.com.br> \n";
          //    $headers .= "CC: Nome<email> \n";
          $headers .= "Content-type: text/html; charset=utf-8 \n";
          $headers .= "Reply-To: desenvolvimento@ligataubate.com.br \n ";

          $clube = $this->db->query("SELECT * FROM clubes WHERE clube_id = '" . $data["clube_id"] . "'");

          if ($clube->rowCount() > 0) {
            $array = $clube->fetch();
            $clube = $array["nome"];
          } else {
            $clube = "Não identificado";
          }

          $campeonato = $this->db->query("SELECT * FROM campeonato WHERE campeonato_id = '" . $data["campeonato_id"] . "'");

          if ($campeonato->rowCount() > 0) {
            $array2 = $campeonato->fetch();
            $campeonato = $array2["nome"];
          } else {
            $campeonato = "Não identificado";
          }

          $corpo = "<h1> " . $data["nome"] . "</h1>
            <p>Clube: " . $clube . " </p>
            <p>Campeonato: " . $campeonato . " </p>
            <p>data do cadastro:" . date('d/m/Y H:i:s') . "</p>
            <br /> ";

          mail("presidente@ligataubate.com.br", "Novo atleta cadastrado - " . $data["nome"], $corpo, $headers);
        }
      } else {
        $atleta_id = $ATLETA->fetch()["atleta_id"];

        $this->db->query(
          "UPDATE atletas SET 
          status = '1',
          foto = '" . $data["foto"] . "', 
          clube_id = '" . $data["clube_id"] . "', 
          nome = '" . addslashes($data["nome"]) . "',
          apelido = '" . addslashes($data["apelido"]) . "', 
          funcao = '" . $data["funcao"] . "', 
          nascimento = '" . $data["nascimento"] . "', 
          natural_cidade = '" . addslashes($data["natural_cidade"]) . "', 
          natural_estado = '" . addslashes($data["natural_estado"]) . "', 
          rg = '" . $data["rg"] . "',
          cpf = '" . $data["cpf"] . "', 
          cref = '" . $data["cref"] . "',
          nome_pai = '" . addslashes($data["nome_pai"]) . "', 
          nome_mae = '" . addslashes($data["nome_mae"]) . "', 
          cep ='" . $data["cep"] . "', 
          endereco = '" . addslashes($data["endereco"]) . "', 
          bairro = '" . addslashes($data["bairro"]) . "', 
          cidade = '" . addslashes($data["cidade"]) . "', 
          estado = '" . addslashes($data["estado"]) . "', 
          email = '" . $data["email"] . "', 
          celular = '" . $data["celular"] . "',
          anexo_rg = '" . $data["anexo_rg"] . "', 
          anexo_cpf = '" . $data["anexo_cpf"] . "', 
          anexo_cnh = '" . $data["anexo_cnh"] . "', 
          anexo_residencia = '" . $data["anexo_residencia"] . "', 
          date_mod = '" . date('Y-m-d H:i:s') . "'
          WHERE atleta_id = '" . $atleta_id . "'"
        );

        $this->log($data["clube_id"], $atleta_id, $data["campeonato_id"], 1);

        $this->db->query("INSERT INTO inscricoes SET 
          campeonato_id = '" . $data["campeonato_id"] . "', 
          clube_id = '" . $data["clube_id"] . "',
          atleta_id = '" . $atleta_id . "',
          status = '1',
          date_add = '" . date('Y-m-d H:i:s') . "'
        ");

        $this->log($data["clube_id"], $atleta_id, $data["campeonato_id"], 4);

        $this->updateSumula(["campeonato_id" => $data["campeonato_id"], "clube_id" => $data["clube_id"]]);
      }

      return $atleta_id;
    } else {
      return false;
    }
  }

  public function updateSumula($data) //array campeonato_id, clube_id
  {

    require_once "campeonatos.php";

    $campeonatos = new campeonatos();


    $sql = $this->db->query("SELECT * FROM jogo WHERE campeonato_id ='" . $data["campeonato_id"] . "' AND (clube_1 = '" . $data["clube_id"] . "' OR clube_2 = '" . $data["clube_id"] . "') AND realizado = 0");


    if ($sql->rowCount() > 0) {

      foreach ($sql->fetchAll() as $jogo) {

        $sumula = array();
        $sumula["jogo_id"] = $jogo["jogo_id"];
        $sumula["campeonato_id"] = $jogo["campeonato_id"];
        $sumula["id_classificado"] = $data["clube_id"];
        $sumula["ref"] = ($data["clube_id"] == $jogo["clube_1"]) ? "casa" : "visitante";

        $campeonatos->createSumula($sumula);
      }
    }
  }



  public function edit($data = array())
  {
    $this->db->query(
      "UPDATE atletas SET 
      foto ='" . $data["foto"] . "', 
      anexo_rg ='" . $data["anexo_rg"] . "', 
      anexo_cpf ='" . $data["anexo_cpf"] . "', 
      anexo_cnh ='" . $data["anexo_cnh"] . "', 
      anexo_residencia ='" . $data["anexo_residencia"] . "', 
      clube_id ='" . $data["clube_id"] . "', 
      nome ='" . addslashes($data["nome"]) . "', 
      apelido ='" . addslashes($data["apelido"]) . "', 
      funcao ='" . $data["funcao"] . "', 
      nascimento ='" . $data["nascimento"] . "', 
      natural_cidade ='" . addslashes($data["natural_cidade"]) . "', 
      natural_estado ='" . addslashes($data["natural_estado"]) . "', 
      cref ='" . $data["cref"] . "', 
      nome_pai ='" . addslashes($data["nome_pai"]) . "', 
      nome_mae ='" . addslashes($data["nome_mae"]) . "', 
      cep ='" . $data["cep"] . "', 
      endereco ='" . addslashes($data["endereco"]) . "', 
      bairro ='" . addslashes($data["bairro"]) . "', 
      cidade ='" . addslashes($data["cidade"]) . "', 
      estado ='" . addslashes($data["estado"]) . "',
      date_mod= '" . date('Y-m-d H:i:s') . "',
      email = '" . $data["email"] . "', 
      celular = '" . $data["celular"] . "',
      status = '1'
      WHERE atleta_id = '" . (int) $data["atleta_id"] . "'"
    );

    $this->log($data["clube_id"], $data["atleta_id"], $data["campeonato_id"], 2);

    if ($data["campeonato_id"] > 0) {
      $sql = $this->db->query("SELECT * FROM inscricoes WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND clube_id = '" . $data["clube_id"] . "' AND atleta_id = '" . $data["atleta_id"] . "' AND status='1'");

      if ($sql->rowCount() == 0) {
        $sql = $this->db->query("INSERT INTO inscricoes SET 
          campeonato_id = '" . $data["campeonato_id"] . "', 
          clube_id = '" . $data["clube_id"] . "', 
          atleta_id = '" . $data["atleta_id"] . "',
          status = '1',
          date_add = '" . date('Y-m-d H:i:s') . "'
        ");

        $this->log($data["clube_id"], $data["atleta_id"], $data["campeonato_id"], 4); //clube, atleta, campeonato, action
      }

      $this->updateSumula(["campeonato_id" => $data["campeonato_id"], "clube_id" => $data["clube_id"]]);
    }
  }



  public function delInscricao($clube_id, $campeonato_id, $atleta_id)

  {
    $inscricoes = $this->db->query("DELETE FROM inscricoes WHERE clube_id = '" . $clube_id . "' AND campeonato_id = '" . $campeonato_id . "' AND atleta_id = '" . $atleta_id . "'");

    //HIDING FROM BID AS WELL
    $this->db->query("UPDATE bid SET exibir_publico = 0 WHERE id_atleta = '" . $atleta_id . "' AND id_clube = '" . $clube_id . "' AND id_campeonato = '" . $campeonato_id . "'");


    $this->updateSumula(["campeonato_id" => $campeonato_id, "clube_id" => $clube_id]);

    $this->log($clube_id, $atleta_id, $campeonato_id, 5); //clube, atleta, campeonato, action

    return $inscricoes;
  }



  public function delete($id)

  {

    //Buscando clube do atleta
    $result = $this->db->query("SELECT clube_id FROM atletas WHERE atleta_id = '" . (int) $id . "'");
    $result = $result->fetchAll();
    $clube_id = $result[0]["clube_id"];

    //Buscando jogos do clube
    $jogos = $this->db->query("SELECT jogo_id FROM jogo WHERE realizado = 0 AND (clube_1 = '" . (int) $clube_id . "' OR clube_2 = '" . (int) $clube_id . "')");
    $jogos = $jogos->fetchAll();

    foreach ($jogos as $jogo) {
      //Buscando jogos do clube
      $sumulas = $this->db->query("SELECT sumula_id, value FROM sumula WHERE jogo_id = '" . (int) $jogo['jogo_id'] . "'");
      $sumulas = $sumulas->fetchAll();

      foreach ($sumulas as $sumula) {
        $valueArray = explode(",", $sumula['value']);
        $updatedValue = "";

        foreach ($valueArray as $valueItem) {
          if ($valueItem != $id) {
            $updatedValue .= "," . $valueItem;
          }
        }

        $updatedValue = substr_replace($updatedValue, "", 0, 1);

        $this->db->query("UPDATE sumula SET value = '" . $updatedValue . "' WHERE sumula_id = '" . (int) $sumula['sumula_id'] . "'");
      }
    }

    $this->db->query("DELETE FROM inscricoes WHERE atleta_id = '" . (int) $id . "'");

    $this->log(0, $id, 0, 3);

    return $this->db->query("UPDATE atletas SET status = '0', date_mod= '" . date('Y-m-d H:i:s') . "' WHERE atleta_id = '" . (int) $id . "'");
  }



  public function getById($id)

  {

    $sql = "SELECT * FROM atletas WHERE atleta_id = '" . (int) $id . "'";


    $sql = $this->db->query($sql);

    return $sql->fetch();
  }



  public function getByDoc($doc, $funcao)

  {



    $sql = "SELECT * FROM atletas WHERE status = '1' AND (rg = '" . $doc . "' OR cpf = '" . $doc . "') and funcao = '" . $funcao . "'";



    $sql = $this->db->query($sql);



    return $sql->fetch();
  }



  public function getInscricaoByIdAtleta($atleta_id)

  {



    $sql = "SELECT inscricoes.*, atletas.*, campeonato.nome AS campeonato_nome, campeonato.temporada, clubes.nickname as clube_nickname FROM inscricoes 



    INNER JOIN campeonato ON inscricoes.campeonato_id = campeonato.campeonato_id 



    INNER JOIN atletas ON inscricoes.atleta_id = atletas.atleta_id
    INNER JOIN clubes ON inscricoes.clube_id = clubes.clube_id





    WHERE inscricoes.atleta_id = '" . $atleta_id . "' AND inscricoes.status='1'";



    $sql = $this->db->query($sql);

    $array = array();



    if ($sql->rowCount() > 0) {



      $array = $sql->fetchAll();
    }



    return $array;
  }



  public function getInscricoes($date = 0)

  {

    if ($date == 0) $date = date('Y');


    $sql = "SELECT inscricoes.incricao_id, inscricoes.campeonato_id, inscricoes.atleta_id, inscricoes.status, inscricoes.ficha, inscricoes.carteirinha, inscricoes.date_add, count(atletas.nome) as quant_atletas, campeonato.nome as campeonato_nome, clubes.clube_id, clubes.nome as clube_nome FROM `inscricoes` 



    INNER JOIN atletas ON inscricoes.atleta_id = atletas.atleta_id



    INNER JOIN campeonato ON inscricoes.campeonato_id = campeonato.campeonato_id AND campeonato.temporada = '$date'



    INNER JOIN clubes ON atletas.clube_id = clubes.clube_id WHERE inscricoes.status ='1'



    GROUP BY inscricoes.campeonato_id, inscricoes.clube_id";



    $sql = $this->db->query($sql);



    if ($sql->rowCount() > 0) {



      $array = $sql->fetchAll();
    }



    return $array;
  }



  public function getInscricaoByIdCampeoantoAndClube($clube_id, $campeonato_id, $atleta_id)
  {
    $array = array();

    $sql = "SELECT
          DISTINCT(inscricoes.atleta_id) as atleta_id,
          inscricoes.incricao_id as incricao_id,
          inscricoes.campeonato_id as campeonato_id,
          inscricoes.ficha as ficha,
          inscricoes.carteirinha as carteirinha,
          inscricoes.date_add as date_add,
          atletas.*,
          campeonato.nome as campeonato_nome,
          campeonato.temporada,
          clubes.nome as clube_nome,
          clubes.nickname as clube_nickname
        FROM inscricoes
          LEFT JOIN atletas
            ON atletas.atleta_id = inscricoes.atleta_id
          LEFT JOIN clubes 
            ON clubes.clube_id = atletas.clube_id
          LEFT JOIN campeonato 
            ON campeonato.campeonato_id = inscricoes.campeonato_id";
    if (!is_null($atleta_id)) {
      $sql .= " WHERE inscricoes.clube_id = $clube_id AND 
              inscricoes.campeonato_id = $campeonato_id AND
              inscricoes.atleta_id = $atleta_id AND 
              inscricoes.status = 1";
    } else {
      $sql .= " WHERE inscricoes.clube_id = $clube_id AND 
      inscricoes.campeonato_id = $campeonato_id AND 
      inscricoes.status = 1";
    }

    $sql .= " ORDER BY atletas.nome ASC";

    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
    }

    return $array;
  }







  public function sql($sql)

  {

    $array = array();


    $sql = $this->db->query($sql);



    if ($sql->rowCount() > 0) {



      $array = $sql->fetchAll();
    }



    return $array;
  }
}
