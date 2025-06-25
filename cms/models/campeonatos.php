<?php

class campeonatos extends model
{



  public function add($data = array())
  {



    if ($this->db->query("INSERT INTO campeonato SET



    nome = '" . $data["nome"] . "',

    descricao = '" . $data["descricao"] . "',

    temporada = '" . $data["temporada"] . "',

    tipo = '" . $data["tipo"] . "',

    num_clubes_campeonato = '" . $data["num_clubes_campeonato"] . "',

    grupos = '" . $data["grupos"] . "',

    clubes_proxima_fase = '" . $data["clubes_proxima_fase"] . "',

    decisao = '" . $data["decisao"] . "',

    gol_fora = '" . $data["gol_fora"] . "',

    tipo_decisao = '" . $data["tipo_decisao"] . "',

    pontuacao_continuada = '" . $data["pontuacao_continuada"] . "',

    status = '" . $data["status"] . "',

    date_add = '" . date('Y-m-d H:i:s') . "',

    date_mod = '" . date('Y-m-d H:i:s') . "'")) {





      $campeonato_id = $this->db->lastInsertId();





      if ($data["tipo"] == 1) :



        //ESQUEMA DE GRUPOS

        $rotulo_grupos = array("", "A", "B", "C", "D", "E", "F", "G", "H", "I");



        $clubes_por_grupo = (int) $data["num_clubes_campeonato"] / (int) $data["grupos"];



        for ($gr = 1; $gr <= $data["grupos"]; $gr++) :



          for ($clu = 1; $clu <= $clubes_por_grupo; $clu++) :



            $this->db->query("INSERT INTO classificacao(campeonato_id,clube_id,grupo) VALUES ('" . $campeonato_id . "','1','" . $rotulo_grupos[$gr] . "')");





          endfor;



        endfor;



        //clubes_proxima_fase DEFINIÇÃO DAS FINAIS

        //GOLS FORA CRITERIO DESEMPATE

        //decisao ida e volta

        $chaveamento = (int) $data["clubes_proxima_fase"] / 2;



        if ($data["decisao"] == 1) :







          //DECISÕES IDA E VOLTA /*ALTERAR TABELA DECISÃO PARA JOGOS*/





          while ($chaveamento >= 1) :

            for ($ida_volta = 1; $ida_volta <= 2; $ida_volta++) :

              for ($chave = 1; $chave <= $chaveamento; $chave++) :



                $this->db->query("INSERT INTO decisao (campeonato_id,chave,rodada,clube_1,clube_2,realizado) VALUES

              ('" . $campeonato_id . "','Chave " . $chave . "','b" . $chaveamento . "b" . $ida_volta . "','1','1','0')");



              endfor;

            endfor;

            $chaveamento = $chaveamento / 2;

          endwhile;





        else :

          //DECISÃO SÓ IDA



          while ($chaveamento >= 1) :



            for ($chave = 1; $chave <= $chaveamento; $chave++) :



              $this->db->query("INSERT INTO decisao(campeonato_id,chave,rodada,clube_1,clube_2,realizado) VALUES

            ('" . $campeonato_id . "','Chave " . $chave . "','b" . $chaveamento . "','1','1','0')");





            endfor;



            $chaveamento = $chaveamento / 2;

          endwhile;

        endif;



      else :

        $rotulo_grupos = "1";

        //Grupo único



        for ($clu = 1; $clu <= (int) $data["num_clubes_campeonato"]; $clu++) :



          $this->db->query("INSERT INTO classificacao(campeonato_id,clube_id,grupo) VALUES

            ('" . $campeonato_id . "','1','" . $rotulo_grupos . "')");



        endfor;



      endif;



      return $campeonato_id;
    } else {

      return false;
    }
  }



  public function edit($data = array())
  {



    /*REMOVIDO DA EDIÇÃO*/

    /*

    temporada = '".$data["temporada"]."',

    tipo = '".$data["tipo"]."',

    num_clubes_campeonato = '".$data["num_clubes_campeonato"]."',

    grupos = '".$data["grupos"]."',

    clubes_proxima_fase = '".$data["clubes_proxima_fase"]."',

    decisao = '".$data["decisao"]."',

    gol_fora = '".$data["gol_fora"]."',

    tipo_decisao = '".$data["tipo_decisao"]."',

    status = '".$data["status"]."',

    */

    /****/



    if ($this->db->query("UPDATE campeonato SET



    nome = '" . $data["nome"] . "',

    descricao = '" . $data["descricao"] . "',

    date_mod = '" . date('Y-m-d H:i:s') . "'



    WHERE campeonato_id = '" . $data["campeonato_id"] . "'")) {

      return true;
    } else {

      return false;
    }
  }



  public function get($id)

  {

    $sql = "SELECT * FROM campeonato WHERE campeonato_id = '" . $id . "'";



    $sql = $this->db->query($sql);



    if ($sql->rowCount() > 0) {

      $array = $sql->fetch();
    }



    return $array;
  }



  public function getAll($status = 1, $temporada = false, $orderBy = "")
  {
    $array = array();

    $sql = "SELECT * FROM campeonato WHERE ";

    if ($status == "all") {
      $sql .= " status != 0";
    } else {
      $sql .= " status = '" . $status . "'";
    }

    if ($temporada) {
      $sql .= " AND temporada = '" . $temporada . "'";
    }

    $sql .= " ORDER BY ". $orderBy ." ord ASC";

    $sql = $this->db->query($sql);

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
    }

    return $array;
  }

  public function del($id)

  {



    $sql = "UPDATE campeonato SET status = 0 WHERE campeonato_id = '" . $id . "'";



    $sql = $this->db->query($sql);



    /*REMOVE AS INSCRIÇÕES DO CAMPEONATO*/



    $this->db->query("DELETE FROM inscricoes WHERE campeonato_id = '" . $id . "'");



    return $sql;
  }



  public function getClassificacaoById($campeonato_id, $controle = "GROUP BY `grupo` ORDER BY `grupo` ASC")

  {



    $sql = "SELECT * FROM `classificacao` WHERE `campeonato_id` = '" . $campeonato_id . "' $controle";



    $sql = $this->db->query($sql);



    $array = array();



    if ($sql->rowCount() > 0) {

      $array = $sql->fetchAll();
    }



    return $array;
  }



  public function conf($data = array())

  {

    $sql = "DELETE FROM classificacao WHERE campeonato_id = '" . $data["campeonato_id"] . "'";



    $sql = $this->db->query($sql);



    /*insere novos valores*/



    foreach ($data["clube"] as $clube) {



      $explode = explode("@", $clube);





      $sql = "INSERT INTO classificacao SET 



        campeonato_id = '" . $data["campeonato_id"] . "',

        clube_id = '" . $explode[1] . "',

        grupo = '" . $explode[0] . "'



      ";



      $sql = $this->db->query($sql);
    }
  }



  public function getGruposByCampeonatoId($campeonato_id)

  {



    $sql = "SELECT campeonato_id,grupo FROM classificacao WHERE campeonato_id = '" . $campeonato_id . "' GROUP BY grupo ORDER BY grupo ASC";



    $sql = $this->db->query($sql);



    if ($sql->rowCount() > 0) {

      $array = $sql->fetchAll();
    }



    return $array;
  }





  public function getClubesByCampeonatoId($campeonato_id)

  {



    $sql = "SELECT clubes.clube_id, clubes.nome, clubes.nickname, clubes.sigla,clubes.escudo, classificacao.* FROM `classificacao` 



    INNER JOIN clubes ON classificacao.clube_id = clubes.clube_id 



    WHERE classificacao.`campeonato_id` = '" . $campeonato_id . "' 



    GROUP BY clubes.clube_id



    ORDER BY clubes.nickname ASC";



    $sql = $this->db->query($sql);



    if ($sql->rowCount() > 0) {

      $array = $sql->fetchAll();
    }



    return $array;
  }



  public function getClubesByCampeonatoIdAndGrupo($campeonato_id, $grupo)

  {



    $array = array();





    if ($grupo == "geral") {





      $sql = "SELECT clubes.clube_id, clubes.nome, clubes.nickname, clubes.sigla,clubes.escudo, classificacao.campeonato_id, classificacao.grupo,



      SUM(classificacao.J) AS J, 



      SUM(classificacao.PG) AS PG, 



      SUM(classificacao.V) AS V, 



      SUM(classificacao.E) AS E, 



      SUM(classificacao.D) AS D, 



      SUM(classificacao.GP) AS GP, 



      SUM(classificacao.GC) AS GC, 



      SUM(classificacao.S) AS S, 



      (SUM(classificacao.PG)/(SUM(classificacao.J)*3))*100 AS AP 



      FROM `classificacao` INNER JOIN clubes ON classificacao.clube_id = clubes.clube_id 



      WHERE classificacao.`campeonato_id` = '" . $campeonato_id . "'



      GROUP BY classificacao.`clube_id` 



      ORDER BY SUM(classificacao.PG) DESC, SUM(classificacao.V) DESC, SUM(classificacao.S) DESC, SUM(classificacao.GP) DESC, SUM(classificacao.GC) ASC, clubes.nome ASC";



      //ORDER BY classificacao.PG DESC, classificacao.V DESC, classificacao.S DESC, classificacao.GP DESC, classificacao.GC ASC, clubes.nome ASC";





    } else {





      $sql = "SELECT clubes.clube_id, clubes.nome, clubes.nickname, clubes.sigla,clubes.escudo, classificacao.* FROM `classificacao` 



      INNER JOIN clubes ON classificacao.clube_id = clubes.clube_id ";



      $sql .= "WHERE classificacao.`campeonato_id` = '" . $campeonato_id . "' AND classificacao.`grupo` = '" . $grupo . "'";



      $sql .= "ORDER BY classificacao.PG DESC, classificacao.V DESC, classificacao.S DESC, classificacao.GP DESC, classificacao.GC ASC, clubes.nome ASC";
    }



    $sql = $this->db->query($sql);



    if ($sql->rowCount() > 0) {

      $array = $sql->fetchAll();
    }



    return $array;
  }



  public function addJogo($data)

  {
    $sql = "INSERT INTO jogo SET
    campeonato_id = '" . $data["campeonato_id"] . "',
    fase = '" . $data["fase"] . "',
    grupo = '" . $data["grupo"] . "',
    rodada = '" . $data["rodada"] . "',
    clube_1 = '" . $data["clube_1"] . "',
    clube_2 = '" . $data["clube_2"] . "',
    estadio_id = '" . $data["estadio_id"] . "',
    arbitragem_id = '" . $data["arbitragem_id"] . "',
    auxiliar_1 = '" . $data["auxiliar_1"] . "',
    auxiliar_2 = '" . $data["auxiliar_2"] . "',
    delegado = '" . $data["delegado"] . "',
    representante = '" . $data["representante"] . "',
    data = '" . $data["data"] . "',
    hora = '" . $data["hora"] . "',
    obs = '" . $data["obs"] . "',
    realizado = '" . $data["realizado"] . "',
    date_add = '" . date('Y-m-d H:i:s') . "'
    ";
    $sql = $this->db->query($sql);
    $jogo_id = $this->db->lastInsertId();
    //cria registros na sumula casa
    $clube_1 = $this->db->query("SELECT DISTINCT(atleta_id), clube_id, incricao_id, campeonato_id 
    FROM inscricoes WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND clube_id = '" . $data["clube_1"] . "'");
    if ($clube_1->rowCount() > 0) {
      $clube_1 = $clube_1->fetchAll();
      $value = "";
      foreach ($clube_1 as $club) {
        $value .= $club["atleta_id"] . ",";
      }
      $value = substr($value, 0, -1);
      $this->db->query("INSERT INTO sumula SET
        jogo_id = '" . $jogo_id . "',
        code = 'atletas',
        ref = 'casa',
        value = '" . $value . "',
        date_add = '" . date('Y-m-d H:i:s') . "'
    ");
    }
    //cria registros na sumula visitante
    $clube_2 = $this->db->query("SELECT DISTINCT(atleta_id), clube_id, incricao_id, campeonato_id 
    FROM inscricoes WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND clube_id = '" . $data["clube_2"] . "'");
    if ($clube_2->rowCount() > 0) {
      $clube_2 = $clube_2->fetchAll();
      $value = "";
      foreach ($clube_2 as $club) {
        $value .= $club["atleta_id"] . ",";
      }
      $value = substr($value, 0, -1);
      $this->db->query("INSERT INTO sumula SET
              jogo_id = '" . $jogo_id . "',
              code = 'atletas',
              ref = 'visitante',
              value = '" . $value . "',
              date_add = '" . date('Y-m-d H:i:s') . "'
      ");
    }
    return $jogo_id;
  }



  public function editJogo($data)

  {

    $sql = "UPDATE jogo SET



    campeonato_id = '" . $data["campeonato_id"] . "',

    fase = '" . $data["fase"] . "',

    grupo = '" . $data["grupo"] . "',

    rodada = '" . $data["rodada"] . "',

    clube_1 = '" . $data["clube_1"] . "',

    clube_2 = '" . $data["clube_2"] . "',

    estadio_id = '" . $data["estadio_id"] . "',

    arbitragem_id = '" . $data["arbitragem_id"] . "',

    auxiliar_1 = '" . $data["auxiliar_1"] . "',

    auxiliar_2 = '" . $data["auxiliar_2"] . "',

    delegado = '" . $data["delegado"] . "',

    representante = '" . $data["representante"] . "',

    data = '" . $data["data"] . "',

    hora = '" . $data["hora"] . "',

    obs = '" . $data["obs"] . "',

    realizado = '" . $data["realizado"] . "',

    date_mod = '" . date('Y-m-d H:i:s') . "'



    WHERE jogo_id = '" . $data["jogo_id"] . "'

    

    ";





    /*edição da sumula*/



    /*dados clube 1*/



    $sumula = array();

    $sumula["jogo_id"] = $data["jogo_id"];

    $sumula["campeonato_id"] = $data["campeonato_id"];

    $sumula["id_classificado"] = $data["clube_1"];

    $sumula["ref"] = "casa";



    $this->createSumula($sumula);



    /*dados clube 2*/



    $sumula = array();

    $sumula["jogo_id"] = $data["jogo_id"];

    $sumula["campeonato_id"] = $data["campeonato_id"];

    $sumula["id_classificado"] = $data["clube_2"];

    $sumula["ref"] = "visitante";



    $this->createSumula($sumula);





    $sql = $this->db->query($sql);



    return $sql;
  }





  public function jogo_del($jogo_id)

  {



    $this->db->query("DELETE FROM sumula WHERE jogo_id = '" . $jogo_id . "'");





    return $this->db->query("DELETE FROM jogo WHERE jogo_id = '" . $jogo_id . "' AND realizado = '0'");
  }



  public function editResultJogo($data)

  {
    $sql = "UPDATE jogo SET 
      result_clube_1 = '" . $data["result_clube_1"] . "',
      penal_clube_1 = '" . $data["penal_clube_1"] . "',
      result_clube_2 = '" . $data["result_clube_2"] . "',
      penal_clube_2 = '" . $data["penal_clube_2"] . "',
      obs = '" . $data["obs"] . "',
      realizado = '" . $data["realizado"] . "',
      date_mod = NOW()
      WHERE jogo_id = '" . $data["jogo_id"] . "'
    ";
    $sql = $this->db->query($sql);

    if (isset($data["ocorrencias"])) {
      //APAGA REGISTRO DE OCORRENCIAS PRA NÃO GERAR REGISTRO DUPLICADO
      $this->db->query("DELETE FROM sumula WHERE jogo_id = '" . $data["jogo_id"] . "' AND code = 'atleta'");
      //CRIA REGISTRO DE OCORRENCIAS
      for ($i = 0; $i < count($data["ocorrencias"]); $i++) {
        $this->db->query("INSERT INTO sumula SET 
          jogo_id = '" . $data["jogo_id"] . "', 
          code = 'atleta', 
          ref = '" . $data["ocorrencias"][$i] . "',
          value = '" . $data["atletas"][$i] . "',
          date_add = '" . date('Y-m-d H:i:s') . "'
          ");
      }
    }

    if ($data["realizado"] == 1) {
      /*SE FOR DECISÃO VERIFICA SE TEM PONTUAÇÃO CONTINUADA*/
      if ($data["fase"] == "Grupo" || ($data["fase"] == "Decisão" && $data["pontuacao_continuada"] == 1)) {
        $this->updateClassificacao($data);
      }
      /*SE FOR DECISÃO*/
      if ($data["fase"] == "Decisão") {
        //$this->mata_mata($data); em 03/10/2017 Diego pediu para tirar o chaveamento automático
      }
    }

    return $sql;
  }





  public function getClubeById($clube_id)

  {

    $sql = $this->db->query("SELECT * FROM clubes WHERE clube_id = '" . $clube_id . "'");



    if ($sql->rowCount() > 0) {

      return $sql->fetch();
    } else {

      return false;
    }
  }





  public function mata_mata($data)

  {



    /*



      $data["campeonato_id"] = 25;

            $data["fase"] = "Decisão";

            $data["grupo"] = "Chave 1";

           

            $data["rodada"] = "b1b2";

           // $data["rodada"] = "b1";



            $data["clube_1"] = "1032";

            $data["result_clube_1"] = 1;

            $data["penal_clube_1"] = 2;



            $data["clube_2"] = "1040";

            $data["result_clube_2"] = 1;

            $data["penal_clube_2"] = 3;

            



            $data["realizado"] = 1;

         */





    if (isset($data["campeonato_id"])) {

      $campeonato = $this->get($data["campeonato_id"]);





      $rotulos['b8b1'] = array("b4b1", "b4b2");

      $rotulos['b8b2'] = array("b4b1", "b4b2");



      $rotulos['b4b1'] = array("b2b1", "b2b2");

      $rotulos['b4b2'] = array("b2b1", "b2b2");



      $rotulos['b2b1'] = array("b1b1", "b1b2");

      $rotulos['b2b2'] = array("b1b1", "b1b2");



      $rotulos["b1b1"] = array("c1", "c1");

      $rotulos["b1b2"] = array("c1", "c1");





      $rotulos['b8'] = 'b4';

      $rotulos['b4'] = 'b2';

      $rotulos['b2'] = 'b1';

      $rotulos['b1'] = 'c1';



      /*auxiliar para busca do 2º jogo*/



      $relacao["b8b1"] = 'b8b2';

      $relacao["b8b2"] = 'b8b1';



      $relacao["b4b1"] = 'b4b2';

      $relacao["b4b2"] = 'b4b1';



      $relacao["b2b1"] = 'b2b2';

      $relacao["b2b2"] = 'b2b1';



      $relacao["b1b1"] = 'b1b2';

      $relacao["b1b2"] = 'b1b1';



      $relacao["clube_1"] = "clube_2";

      $relacao["clube_2"] = "clube_1";







      $chave['Chave 1'] = 'Chave 1';

      $chave['Chave 2'] = 'Chave 1';



      $chave['Chave 3'] = 'Chave 2';

      $chave['Chave 4'] = 'Chave 2';



      $chave['Chave 5'] = 'Chave 3';

      $chave['Chave 6'] = 'Chave 3';



      $chave['Chave 7'] = 'Chave 4';

      $chave['Chave 8'] = 'Chave 4';







      //definição da casa ou visitante

      if ($data['grupo'] == 'Chave 1' || $data['grupo'] == 'Chave 3' || $data['grupo'] == 'Chave 5' || $data['grupo'] == 'Chave 7') :

        $clube = 'clube_1';

      elseif ($data['grupo'] == 'Chave 2' || $data['grupo'] == 'Chave 4' || $data['grupo'] == 'Chave 6' || $data['grupo'] == 'Chave 8') :

        $clube = 'clube_2';

      endif;







      if ($campeonato["decisao"] == 0) //só ida

      {



        $nova_rodada = $rotulos[$data['rodada']];

        $nova_chave = $chave[$data['grupo']];



        /*VERIFICAÇAO BÁSICA DE VENCEDOR*/

        if ($data["result_clube_1"] > $data["result_clube_2"]) :

          //vitoria clube 1

          $id_classificado = $data["clube_1"];

          $id_eliminado = $data["clube_2"];

        elseif ($data["result_clube_1"] < $data["result_clube_2"]) :

          //vitoria clube 2

          $id_classificado = $data["clube_2"];

          $id_eliminado = $data["clube_1"];

        elseif ($data["result_clube_1"] == $data["result_clube_2"]) :

          //empate





          if ($campeonato["tipo_decisao"] == 0) : //penaltis  //correto



            if ($data["penal_clube_1"] > $data["penal_clube_2"]) :

              $id_classificado = $data["clube_1"];

              $id_eliminado = $data["clube_2"];

            elseif ($data["penal_clube_1"] < $data["penal_clube_2"]) :

              $id_classificado = $data["clube_2"];

              $id_eliminado = $data["clube_1"];

            endif;



          elseif ($campeonato["tipo_decisao"] == 1) : //melhor campanha; correto



            $resultado = $this->melhor_campanha($data);

            $id_classificado = $resultado["classificado"];

            $id_eliminado = $resultado["eliminado"];



          endif;



        endif;







        if ($nova_rodada == "c1") : //define os campeões



          $final = array();

          $final["campeonato_id"] = $campeonato["campeonato_id"];

          $final["campeonato"] = $campeonato["nome"];

          $final["temporada"] = $campeonato["temporada"];

          $final["clube_id_campeao"] = $id_classificado;



          $clube = $this->getClubeById($id_classificado);



          $final["clube_campeao"] = $clube["nome"];

          $final["clube_campeao_sigla"] = $clube["sigla"];

          $final["clube_campeao_escudo"] = $clube["escudo"];



          $clube = $this->getClubeById($id_eliminado);



          $final["clube_id_vice"] = $id_eliminado;

          $final["clube_vice"] =  $clube["nome"];

          $final["clube_vice_sigla"] = $clube["sigla"];

          $final["clube_vice_escudo"] = $clube["escudo"];



          $this->cadastra_campeao($final);





        else : // define nova fase





          $jogo = $this->db->query("SELECT * FROM jogo WHERE `grupo` = '" . $nova_chave . "' AND `rodada` = '" . $nova_rodada . "' 



          AND `campeonato_id` = '" . $campeonato['campeonato_id'] . "'");







          if ($jogo->rowCount() == 0) {



            $this->db->query("INSERT INTO  jogo SET 



              `fase` = 'Decisão', 



              `grupo` = '" . $nova_chave . "', 



              `rodada` = '" . $nova_rodada . "', 



              " . $clube . " = " . $id_classificado . ",



              `campeonato_id` = '" . $campeonato['campeonato_id'] . "', 



              realizado = 0, 



              date_add = '" . date('Y-m-d H:i:s') . "'");





            $c["clube_1"] = "casa";

            $c["clube_2"] = "visitante";



            $jogo_id = $this->db->lastInsertId();



            $sumula = array();

            $sumula["jogo_id"] = $jogo_id;

            $sumula["campeonato_id"] = $data["campeonato_id"];

            $sumula["id_classificado"] = $id_classificado;

            $sumula["ref"] = $c[$clube];



            $this->createSumula($sumula);
          } else {

            $jogo = $jogo->fetch();

            $jogo_id = $jogo["jogo_id"];



            $this->db->query("UPDATE jogo



              SET " . $clube . " = " . $id_classificado . ", date_mod = '" . date('Y-m-d H:i:s') . "'



              WHERE `grupo` = '" . $nova_chave . "' AND `rodada` = '" . $nova_rodada . "' 



              AND `campeonato_id` = '" . $campeonato['campeonato_id'] . "'");



            $c["clube_1"] = "casa";

            $c["clube_2"] = "visitante";





            $sumula = array();

            $sumula["jogo_id"] = $jogo_id;

            $sumula["campeonato_id"] = $data["campeonato_id"];

            $sumula["id_classificado"] = $id_classificado;

            $sumula["ref"] = $c[$clube];



            $this->createSumula($sumula);
          }



        endif;
      } else { //ida e volta





        $nova_rodada = $rotulos[$data['rodada']];

        $nova_chave = $chave[$data['grupo']];





        $explode = explode("b", $data['rodada']);



        $f = $explode[1];

        $j = $explode[2];





        $jogos = $this->db->query("SELECT * FROM jogo WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND fase = '" . $data["fase"] . "' AND grupo = '" . $data["grupo"] . "' AND (rodada = '" . $data['rodada'] . "' OR rodada = '" . $relacao[$data["rodada"]] . "') AND (clube_1 = '" . $data["clube_1"] . "' OR clube_2 = '" . $data["clube_1"] . "' OR clube_1 = '" . $data["clube_2"] . "' OR clube_2 = '" . $data["clube_2"] . "')");







        if ($j == 1) {

          $ida = $data['rodada'];

          $volta = $relacao[$data["rodada"]];
        } else {

          $ida = $relacao[$data["rodada"]];

          $volta = $data['rodada'];
        }





        $jogo1 = $this->db->query("SELECT * FROM jogo WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND fase = '" . $data["fase"] . "' AND grupo = '" . $data["grupo"] . "' AND (rodada = '" . $ida . "') AND (clube_1 = '" . $data["clube_1"] . "' OR clube_2 = '" . $data["clube_1"] . "' OR clube_1 = '" . $data["clube_2"] . "' OR clube_2 = '" . $data["clube_2"] . "')");



        $jogo2 = $this->db->query("SELECT * FROM jogo WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND fase = '" . $data["fase"] . "' AND grupo = '" . $data["grupo"] . "' AND (rodada = '" . $volta . "') AND (clube_1 = '" . $data["clube_1"] . "' OR clube_2 = '" . $data["clube_1"] . "' OR clube_1 = '" . $data["clube_2"] . "' OR clube_2 = '" . $data["clube_2"] . "')");





        $jogo_ida = $jogo1->fetch();

        $jogo_volta = $jogo2->fetch();





        if ($jogo_ida["realizado"] == 1 && $jogo_volta["realizado"] == 1) {

          $resultado = array();



          $resultado["clube_a"] = $jogo_ida["clube_1"];

          $resultado["result_clube_a_ida"] = $jogo_ida["result_clube_1"];

          $resultado["penal_clube_a_ida"] = $jogo_ida["penal_clube_1"];

          $resultado["result_clube_a_volta"] = $jogo_volta["result_clube_2"];

          $resultado["penal_clube_a_volta"] = $jogo_volta["penal_clube_2"];



          $resultado["result_clube_a"] = $resultado["result_clube_a_ida"] + $resultado["result_clube_a_volta"];

          $resultado["penal_clube_a"] = $resultado["penal_clube_a_ida"] + $resultado["penal_clube_a_volta"];



          $resultado["clube_b"] = $jogo_ida["clube_2"];

          $resultado["result_clube_b_ida"] = $jogo_ida["result_clube_2"];

          $resultado["penal_clube_b_ida"] = $jogo_ida["penal_clube_2"];

          $resultado["result_clube_b_volta"] = $jogo_volta["result_clube_1"];

          $resultado["penal_clube_b_volta"] = $jogo_volta["penal_clube_1"];



          $resultado["result_clube_b"] = $resultado["result_clube_b_ida"] + $resultado["result_clube_b_volta"];

          $resultado["penal_clube_b"] = $resultado["penal_clube_b_ida"] + $resultado["penal_clube_b_volta"];





          /*mata a mata*/



          $id_classificado = 0;

          $id_eliminado = 0;



          if ($resultado["result_clube_a"] > $resultado["result_clube_b"]) :

            //vitoria clube 1

            $id_classificado = $resultado["clube_a"];

            $id_eliminado = $resultado["clube_b"];

          elseif ($resultado["result_clube_a"] < $resultado["result_clube_b"]) :

            //vitoria clube 2

            $id_classificado = $resultado["clube_b"];

            $id_eliminado = $resultado["clube_a"];

          elseif ($resultado["result_clube_a"] == $resultado["result_clube_b"]) :

            //empate



            /*regra de gol fora*/



            if ($campeonato["gol_fora"] == 1) : //tem gol fora



              if ($resultado["result_clube_a_volta"] > $resultado["result_clube_b_ida"]) :

                $id_classificado = $resultado["clube_a"];

                $id_eliminado = $resultado["clube_b"];

              elseif ($resultado["result_clube_a_volta"] < $resultado["result_clube_b_ida"]) :

                $id_classificado = $resultado["clube_b"];

                $id_eliminado = $resultado["clube_a"];

              else :

                $id_classificado = 0; //cai em penaltis ou melhor campanha

                $id_eliminado = 0;

              endif;



            endif;





            if ($id_classificado == 0) :





              if ($campeonato["tipo_decisao"] == 0) : //penaltis  //correto



                if ($resultado["penal_clube_a"] > $resultado["penal_clube_b"]) :

                  $id_classificado = $resultado["clube_a"];

                  $id_eliminado = $resultado["clube_b"];

                elseif ($resultado["penal_clube_a"] < $resultado["penal_clube_b"]) :

                  $id_classificado = $resultado["clube_b"];

                  $id_eliminado = $resultado["clube_a"];

                endif;



              elseif ($campeonato["tipo_decisao"] == 1) : //melhor campanha; correto





                $resultado = $this->melhor_campanha($data);

                $id_classificado = $resultado["classificado"];

                $id_eliminado = $resultado["eliminado"];





              endif;



            endif;



          endif;





          if ($nova_rodada[0] == "c1") : //define os campeões



            $final = array();

            $final["campeonato_id"] = $campeonato["campeonato_id"];

            $final["campeonato"] = $campeonato["nome"];

            $final["temporada"] = $campeonato["temporada"];

            $final["clube_id_campeao"] = $id_classificado;



            $clube = $this->getClubeById($id_classificado);



            $final["clube_campeao"] = $clube["nome"];

            $final["clube_campeao_sigla"] = $clube["sigla"];

            $final["clube_campeao_escudo"] = $clube["escudo"];



            $clube = $this->getClubeById($id_eliminado);



            $final["clube_id_vice"] = $id_eliminado;

            $final["clube_vice"] =  $clube["nome"];

            $final["clube_vice_sigla"] = $clube["sigla"];

            $final["clube_vice_escudo"] = $clube["escudo"];



            $this->cadastra_campeao($final);





          else : // define nova fase





            $jogo = $this->db->query("SELECT * FROM jogo WHERE `grupo` = '" . $nova_chave . "' AND `rodada` = '" . $nova_rodada[0] . "' 



            AND `campeonato_id` = '" . $campeonato['campeonato_id'] . "'");





            if ($jogo->rowCount() == 0) {



              $this->db->query("INSERT INTO  jogo SET 



                `fase` = 'Decisão', 



                `grupo` = '" . $nova_chave . "', 



                `rodada` = '" . $nova_rodada[0] . "', 



                " . $clube . " = " . $id_classificado . ",



                `campeonato_id` = '" . $campeonato['campeonato_id'] . "', 



                realizado = 0, 



                date_add = '" . date('Y-m-d H:i:s') . "'");





              $c["clube_1"] = "casa";

              $c["clube_2"] = "visitante";



              $jogo_id = $this->db->lastInsertId();



              $sumula = array();

              $sumula["jogo_id"] = $jogo_id;

              $sumula["campeonato_id"] = $data["campeonato_id"];

              $sumula["id_classificado"] = $id_classificado;

              $sumula["ref"] = $c[$clube];



              $this->createSumula($sumula);
            } else {

              $jogo = $jogo->fetch();

              $jogo_id = $jogo["jogo_id"];



              $this->db->query("UPDATE jogo 



                SET " . $clube . " = " . $id_classificado . ", date_mod = '" . date('Y-m-d H:i:s') . "'



                WHERE `grupo` = '" . $nova_chave . "' AND `rodada` = '" . $nova_rodada[0] . "' 



                AND `campeonato_id` = '" . $campeonato['campeonato_id'] . "'");



              $c["clube_1"] = "casa";

              $c["clube_2"] = "visitante";



              $sumula = array();

              $sumula["jogo_id"] = $jogo_id;

              $sumula["campeonato_id"] = $data["campeonato_id"];

              $sumula["id_classificado"] = $id_classificado;

              $sumula["ref"] = $c[$clube];



              $this->createSumula($sumula);
            }









            $jogo = $this->db->query("SELECT * FROM jogo WHERE `grupo` = '" . $nova_chave . "' AND `rodada` = '" . $nova_rodada[1] . "' 



            AND `campeonato_id` = '" . $campeonato['campeonato_id'] . "'");





            if ($jogo->rowCount() == 0) {



              $this->db->query("INSERT INTO  jogo SET 



                `fase` = 'Decisão', 



                `grupo` = '" . $nova_chave . "', 



                `rodada` = '" . $nova_rodada[1] . "', 



                " . $relacao[$clube] . " = " . $id_classificado . ",



                `campeonato_id` = '" . $campeonato['campeonato_id'] . "', 



                realizado = 0, 



                date_add = '" . date('Y-m-d H:i:s') . "'");





              $c["clube_1"] = "casa";

              $c["clube_2"] = "visitante";



              $jogo_id = $this->db->lastInsertId();



              $sumula = array();

              $sumula["jogo_id"] = $jogo_id;

              $sumula["campeonato_id"] = $data["campeonato_id"];

              $sumula["id_classificado"] = $id_classificado;

              $sumula["ref"] = $c[$relacao[$clube]];



              $this->createSumula($sumula);
            } else {

              $jogo = $jogo->fetch();

              $jogo_id = $jogo["jogo_id"];



              $this->db->query("UPDATE jogo 



                SET " . $relacao[$clube] . " = " . $id_classificado . ", date_mod = '" . date('Y-m-d H:i:s') . "'



                WHERE `grupo` = '" . $nova_chave . "' AND `rodada` = '" . $nova_rodada[1] . "' 



                AND `campeonato_id` = '" . $campeonato['campeonato_id'] . "'");



              $c["clube_1"] = "casa";

              $c["clube_2"] = "visitante";



              $sumula = array();

              $sumula["jogo_id"] = $jogo_id;

              $sumula["campeonato_id"] = $data["campeonato_id"];

              $sumula["id_classificado"] = $id_classificado;

              $sumula["ref"] = $c[$relacao[$clube]];



              $this->createSumula($sumula);
            }







          endif;
        }
      }
    }
  }





  public function cadastra_campeao($data)

  {





    $campeao = $this->db->query("SELECT * FROM campeao WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND posicao = 'campeao'");

    if ($campeao->rowCount() == 0) {





      $campeao = $this->db->query("INSERT INTO campeao 



      SET campeonato_id = '" . $data["campeonato_id"] . "', 

        campeonato = '" . $data["campeonato"] . "', 

        temporada = '" . $data["temporada"] . "',

        clube_id = '" . $data["clube_id_campeao"] . "',

        clube = '" . $data["clube_campeao"] . "',

        sigla = '" . $data["clube_campeao_sigla"] . "',

        escudo = '" . $data["clube_campeao_escudo"] . "',

        posicao = 'campeao',

        ord = '0',

        date_add = '" . date('Y-m-d H:i:s') . "',

        date_mod = '" . date('Y-m-d H:i:s') . "'

      ");
    } else {



      $campeao = $this->db->query("UPDATE campeao 



      SET 

        campeonato = '" . $data["campeonato"] . "', 

        temporada = '" . $data["temporada"] . "',

        clube_id = '" . $data["clube_id_campeao"] . "',

        clube = '" . $data["clube_campeao"] . "',

        sigla = '" . $data["clube_campeao_sigla"] . "',

        escudo = '" . $data["clube_campeao_escudo"] . "',

        ord = '0',

        date_mod = '" . date('Y-m-d H:i:s') . "'



        WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND posicao = 'campeao'

      ");
    }





    $vice_campeao = $this->db->query("SELECT * FROM campeao WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND posicao = 'vice_campeao'");



    if ($vice_campeao->rowCount() == 0) {



      $vice_campeao = $this->db->query("INSERT INTO campeao 



      SET campeonato_id = '" . $data["campeonato_id"] . "', 

        campeonato = '" . $data["campeonato"] . "', 

        temporada = '" . $data["temporada"] . "',

        clube_id = '" . $data["clube_id_vice"] . "',

        clube = '" . $data["clube_vice"] . "',

        sigla = '" . $data["clube_vice_sigla"] . "',

        escudo = '" . $data["clube_vice_escudo"] . "',

        posicao = 'vice_campeao',

        ord = '1',

        date_add = '" . date('Y-m-d H:i:s') . "',

        date_mod = '" . date('Y-m-d H:i:s') . "'

      ");
    } else {





      $vice_campeao = $this->db->query("UPDATE campeao 



      SET 

        campeonato = '" . $data["campeonato"] . "', 

        temporada = '" . $data["temporada"] . "',

        clube_id = '" . $data["clube_id_vice"] . "',

        clube = '" . $data["clube_vice"] . "',

        sigla = '" . $data["clube_vice_sigla"] . "',

        escudo = '" . $data["clube_vice_escudo"] . "',

        

        ord = '1',

        

        date_mod = '" . date('Y-m-d H:i:s') . "'



        WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND posicao = 'vice_campeao'



      ");
    }
  }





  public function melhor_campanha($data)

  {



    $id_classificado = 0;

    $id_eliminado = 0;







    $p1 = $this->db->query("SELECT * FROM classificacao WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND clube_id = '" . $data["clube_1"] . "'");

    $p2 = $this->db->query("SELECT * FROM classificacao WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND clube_id = '" . $data["clube_2"] . "'");



    $p1 = $p1->fetch();

    $p2 = $p2->fetch();



    if ($p1["PG"] > $p2["PG"]) {

      $id_classificado = $p1["clube_id"];

      $id_eliminado = $p2["clube_id"];
    } elseif ($p1["PG"] < $p2["PG"]) {

      $id_classificado = $p2["clube_id"];

      $id_eliminado = $p1["clube_id"];
    } else {

      //empate em pontos, verifica vitorias

      if ($p1["V"] > $p2["V"]) {

        $id_classificado = $p1["clube_id"];

        $id_eliminado = $p2["clube_id"];
      } elseif ($p1["V"] < $p2["V"]) {

        $id_classificado = $p2["clube_id"];

        $id_eliminado = $p1["clube_id"];
      } else {

        //empate em vitorias, verifica saldo



        if ($p1["S"] > $p2["S"]) {

          $id_classificado = $p1["clube_id"];

          $id_eliminado = $p2["clube_id"];
        } elseif ($p1["S"] < $p2["S"]) {

          $id_classificado = $p2["clube_id"];

          $id_eliminado = $p1["clube_id"];
        } else {

          //empate em saldo, verifica gols pró



          if ($p1["GP"] > $p2["GP"]) {

            $id_classificado = $p1["clube_id"];

            $id_eliminado = $p2["clube_id"];
          } elseif ($p1["GP"] < $p2["GP"]) {

            $id_classificado = $p2["clube_id"];

            $id_eliminado = $p1["clube_id"];
          } else {

            //empate em gols pró, verifica gols contra

            if ($p1["GC"] > $p2["GC"]) {

              $id_classificado = $p1["clube_id"];

              $id_eliminado = $p2["clube_id"];
            } elseif ($p1["GC"] < $p2["GC"]) {

              $id_classificado = $p2["clube_id"];

              $id_eliminado = $p1["clube_id"];
            } else {

              //não foi possivel identificar vencedor

              echo "nao foi possivel identificar vencedor";

              return false;
            }
          }
        }
      }
    }

    $array = array();

    $array["classificado"] = $id_classificado;

    $array["eliminado"] = $id_eliminado;



    return $array;
  }



  public function createSumula($data)
  {
    $clube = $this->db->query("SELECT DISTINCT(atleta_id) as id, 
  clube_id, 
  incricao_id, 
  campeonato_id 
  FROM inscricoes 
  WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND 
  clube_id = '" . $data["id_classificado"] . "'");

    if ($clube->rowCount() > 0) {
      $clube = $clube->fetchAll();

      $array_atletas = array();
      $index = 0;

      for ($a = 0; $a < sizeof($clube); $a++) {
        $existe = false;
        for ($b = 0; $b < sizeof($array_atletas); $b++) {
          if ($array_atletas[$b] == $clube[$a]["id"]) $existe = true;
          else $existe = false;
        }

        if (!$existe) {
          $array_atletas[$index] = $clube[$a]["id"];
          $index++;
        }
      }

      $value = "";

      for ($c = 0; $c < sizeof($array_atletas); $c++) {
        $value .= $array_atletas[$c] . ",";
      }
      $value = substr($value, 0, -1);
      $this->db->query("DELETE FROM sumula WHERE jogo_id = '" . $data["jogo_id"] . "' AND code = 'atletas' AND ref = '" . $data["ref"] . "'");
      $this->db->query("INSERT INTO sumula SET
          jogo_id = '" . $data["jogo_id"] . "',
          code = 'atletas',
          ref = '" . $data["ref"] . "',
          value = '" . $value . "',
          date_add = '" . date('Y-m-d H:i:s') . "'
      ");
    }
  }





  public function verificaPenalizacao($data = array()) //filtros campeonato_id, origem, origem_id, ref

  {



    $sql = "";



    $sql = $this->db->query("SELECT * FROM penalizacao WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND origem = '" . $data["origem"] . "' AND origem_id = '" . $data["origem_id"] . "' AND ref = '" . $data["ref"] . "'");





    $total = 0;



    if ($sql->rowCount() > 0) {



      foreach ($sql->fetchAll() as $penalizacao) {

        $total += $penalizacao["prefixo"] . $penalizacao["value"];
      }
    }



    return $total;
  }





  public function updateClassificacao($data)

  {



    /*acerta para o campeonato 2ª divisão ID: 23*/



    if ($data["campeonato_id"] == 23 || $data["campeonato_id"] == 47) {





      if ($data["fase"] == "Grupo") {

        $sql = " AND grupo = '" . $data["grupo"] . "'";
      } else {

        $sql = "";
      }







      if ($data["pontuacao_continuada"] == 1) //PEGA TODAS AS FASES

      {

        $jogo_clube_1 = "SELECT * FROM jogo 



      WHERE campeonato_id = '" . $data["campeonato_id"] . "' 



      " . $sql . " 



      AND realizado='1' 



      AND (clube_1='" . $data["clube_1"] . "' OR clube_2='" . $data["clube_1"] . "')";







        $jogo_clube_2 = "SELECT * FROM jogo 

      

      WHERE campeonato_id = '" . $data["campeonato_id"] . "' 



      " . $sql . " 



      AND realizado='1' 



      AND (clube_1='" . $data["clube_2"] . "' OR clube_2='" . $data["clube_2"] . "')";
      } else //PEGA APENAS FASE DE GRUPOS

      {

        $jogo_clube_1 = "SELECT * FROM jogo 



      WHERE campeonato_id = '" . $data["campeonato_id"] . "' 



      AND fase !='Decisão' 



      " . $sql . " 



      AND realizado='1' AND (clube_1='" . $data["clube_1"] . "' OR clube_2='" . $data["clube_1"] . "')";







        $jogo_clube_2 = "SELECT * FROM jogo 



      WHERE campeonato_id = '" . $data["campeonato_id"] . "' 



      AND fase !='Decisão' 



      " . $sql . " 



      AND realizado='1' 



      AND (clube_1='" . $data["clube_2"] . "' OR clube_2='" . $data["clube_2"] . "')";
      }
    } else {

      //demais campeonatos





      if ($data["pontuacao_continuada"] == 1) //PEGA TODAS AS FASES

      {

        $jogo_clube_1 = "SELECT * FROM jogo 



      WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND realizado='1' AND (clube_1='" . $data["clube_1"] . "' OR clube_2='" . $data["clube_1"] . "')";







        $jogo_clube_2 = "SELECT * FROM jogo 

      

      WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND realizado='1' AND (clube_1='" . $data["clube_2"] . "' OR clube_2='" . $data["clube_2"] . "')";
      } else //PEGA APENAS FASE DE GRUPOS

      {

        $jogo_clube_1 = "SELECT * FROM jogo 



      WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND fase !='Decisão' AND realizado='1' AND (clube_1='" . $data["clube_1"] . "' OR clube_2='" . $data["clube_1"] . "')";







        $jogo_clube_2 = "SELECT * FROM jogo 



      WHERE campeonato_id = '" . $data["campeonato_id"] . "' AND fase !='Decisão' AND realizado='1' AND (clube_1='" . $data["clube_2"] . "' OR clube_2='" . $data["clube_2"] . "')";
      }
    }







    //CLUBE 1





    $jogo_clube_1 = $this->db->query($jogo_clube_1);



    if ($jogo_clube_1->rowCount() > 0) {



      $busca_jogo_clube_1 = $jogo_clube_1->fetchAll();





      $clube_1_V = 0; //VITORIAS

      $clube_1_E = 0; //EMPATES

      $clube_1_D = 0; //DERROTAS



      $clube_1_GP = 0; //GOLS PRO

      $clube_1_GC = 0; //GOLS CONTRA



      foreach ($busca_jogo_clube_1 as $jogo1) {



        if ($data["clube_1"] == $jogo1['clube_1']) {

          //CLUBE 1 NA 1ª COLUNA



          $clube_1_GP += $jogo1['result_clube_1'];

          $clube_1_GC += $jogo1['result_clube_2'];



          if ($jogo1['result_clube_1'] > $jogo1['result_clube_2']) {

            $clube_1_V++;
          }



          if ($jogo1['result_clube_1'] == $jogo1['result_clube_2']) {

            $clube_1_E++;
          }



          if ($jogo1['result_clube_1'] < $jogo1['result_clube_2']) {

            $clube_1_D++;
          }
        } else {

          //CLUBE 1 NA 2ª COLUNA



          $clube_1_GP += $jogo1['result_clube_2'];

          $clube_1_GC += $jogo1['result_clube_1'];



          if ($jogo1['result_clube_1'] < $jogo1['result_clube_2']) {

            $clube_1_V++;
          }



          if ($jogo1['result_clube_1'] == $jogo1['result_clube_2']) {

            $clube_1_E++;
          }



          if ($jogo1['result_clube_1'] > $jogo1['result_clube_2']) {

            $clube_1_D++;
          }
        }
      }



      $jogos_clube_1 = $jogo_clube_1->rowCount();



      $clube_1_P = ($clube_1_V * 3) + $clube_1_E;



      $clube_1_S = ($clube_1_GP - $clube_1_GC);



      $clube_1_AP = ($clube_1_P / ($jogos_clube_1 * 3)) * 100;







      /*penalizações*/



      $penaliza = array();

      $penaliza["campeonato_id"] = $data["campeonato_id"];

      $penaliza["origem"] = "clube";

      $penaliza["origem_id"] = $data["clube_1"];

      $penaliza["ref"] = "pontos";



      $total = $this->verificaPenalizacao($penaliza);



      $clube_1_P += $total;











      if ($data["pontuacao_continuada"] == 1 && $data["fase"] == "Decisão" && $data["campeonato_id"] != 23) {



        $this->db->query("UPDATE classificacao SET 

        

          J = '" . $jogos_clube_1 . "',

          PG = '" . $clube_1_P . "', 

          V = '" . $clube_1_V . "', 

          E = '" . $clube_1_E . "', 

          D = '" . $clube_1_D . "', 

          GP = '" . $clube_1_GP . "', 

          GC = '" . $clube_1_GC . "', 

          S = '" . $clube_1_S . "', 

          AP = '" . $clube_1_AP . "' WHERE campeonato_id='" . $data["campeonato_id"] . "' AND clube_id='" . $data["clube_1"] . "'");
      } else {







        if ($data['fase'] == "Decisão") {





          $this->db->query("UPDATE classificacao SET 

          

            J = '" . $jogos_clube_1 . "',

            PG = '" . $clube_1_P . "', 

            V = '" . $clube_1_V . "', 

            E = '" . $clube_1_E . "', 

            D = '" . $clube_1_D . "', 

            GP = '" . $clube_1_GP . "', 

            GC = '" . $clube_1_GC . "', 

            S = '" . $clube_1_S . "', 

            AP = '" . $clube_1_AP . "' WHERE campeonato_id='" . $data["campeonato_id"] . "' AND clube_id='" . $data["clube_1"] . "' AND grupo!='A' AND grupo!='B'");
        } else {



          $this->db->query("UPDATE classificacao SET 

          

            J = '" . $jogos_clube_1 . "',

            PG = '" . $clube_1_P . "', 

            V = '" . $clube_1_V . "', 

            E = '" . $clube_1_E . "', 

            D = '" . $clube_1_D . "', 

            GP = '" . $clube_1_GP . "', 

            GC = '" . $clube_1_GC . "', 

            S = '" . $clube_1_S . "', 

            AP = '" . $clube_1_AP . "' WHERE campeonato_id='" . $data["campeonato_id"] . "' AND clube_id='" . $data["clube_1"] . "' AND grupo='" . $data["grupo"] . "'");
        }
      }
    }









    //CLUBE 2









    $jogo_clube_2 = $this->db->query($jogo_clube_2);



    if ($jogo_clube_2->rowCount() > 0) {



      $busca_jogo_clube_2 = $jogo_clube_2->fetchAll();





      $clube_2_V = 0; //VITORIAS

      $clube_2_E = 0; //EMPATES

      $clube_2_D = 0; //DERROTAS



      $clube_2_GP = 0; //GOLS PRO

      $clube_2_GC = 0; //GOLS CONTRA



      foreach ($busca_jogo_clube_2 as $jogo2) {



        if ($data["clube_2"] == $jogo2['clube_1']) {

          //CLUBE 2 NA 1ª COLUNA



          $clube_2_GP += $jogo2['result_clube_1'];

          $clube_2_GC += $jogo2['result_clube_2'];



          if ($jogo2['result_clube_1'] > $jogo2['result_clube_2']) {

            $clube_2_V++;
          }



          if ($jogo2['result_clube_1'] == $jogo2['result_clube_2']) {

            $clube_2_E++;
          }



          if ($jogo2['result_clube_1'] < $jogo2['result_clube_2']) {

            $clube_2_D++;
          }
        } else {

          //CLUBE 2 NA 2ª COLUNA



          $clube_2_GP += $jogo2['result_clube_2'];

          $clube_2_GC += $jogo2['result_clube_1'];



          if ($jogo2['result_clube_1'] < $jogo2['result_clube_2']) {

            $clube_2_V++;
          }



          if ($jogo2['result_clube_1'] == $jogo2['result_clube_2']) {

            $clube_2_E++;
          }



          if ($jogo2['result_clube_1'] > $jogo2['result_clube_2']) {

            $clube_2_D++;
          }
        }
      }



      $jogos_clube_2 = $jogo_clube_2->rowCount();



      $clube_2_P = ($clube_2_V * 3) + $clube_2_E;



      $clube_2_S = ($clube_2_GP - $clube_2_GC);



      $clube_2_AP = ($clube_2_P / ($jogos_clube_2 * 3)) * 100;





      /*penalizações*/



      $penaliza = array();

      $penaliza["campeonato_id"] = $data["campeonato_id"];

      $penaliza["origem"] = "clube";

      $penaliza["origem_id"] = $data["clube_2"];

      $penaliza["ref"] = "pontos";



      $total = $this->verificaPenalizacao($penaliza);



      $clube_2_P += $total;









      if ($data["pontuacao_continuada"] == 1 && $data["fase"] == "Decisão" && $data["campeonato_id"] != 23) {



        $this->db->query("UPDATE classificacao SET 

        

          J = '" . $jogos_clube_2 . "',

          PG = '" . $clube_2_P . "', 

          V = '" . $clube_2_V . "', 

          E = '" . $clube_2_E . "', 

          D = '" . $clube_2_D . "', 

          GP = '" . $clube_2_GP . "', 

          GC = '" . $clube_2_GC . "', 

          S = '" . $clube_2_S . "', 

          AP = '" . $clube_2_AP . "' WHERE campeonato_id='" . $data["campeonato_id"] . "' AND clube_id='" . $data["clube_2"] . "'");
      } else {



        if ($data['fase'] == "Decisão") {



          $this->db->query("UPDATE classificacao SET 

        

          J = '" . $jogos_clube_2 . "',

          PG = '" . $clube_2_P . "', 

          V = '" . $clube_2_V . "', 

          E = '" . $clube_2_E . "', 

          D = '" . $clube_2_D . "', 

          GP = '" . $clube_2_GP . "', 

          GC = '" . $clube_2_GC . "', 

          S = '" . $clube_2_S . "', 

          AP = '" . $clube_2_AP . "' WHERE campeonato_id='" . $data["campeonato_id"] . "' AND clube_id='" . $data["clube_2"] . "' AND grupo!='A' AND grupo!='B'");
        } else {



          $this->db->query("UPDATE classificacao SET 

        

          J = '" . $jogos_clube_2 . "',

          PG = '" . $clube_2_P . "', 

          V = '" . $clube_2_V . "', 

          E = '" . $clube_2_E . "', 

          D = '" . $clube_2_D . "', 

          GP = '" . $clube_2_GP . "', 

          GC = '" . $clube_2_GC . "', 

          S = '" . $clube_2_S . "', 

          AP = '" . $clube_2_AP . "' WHERE campeonato_id='" . $data["campeonato_id"] . "' AND clube_id='" . $data["clube_2"] . "' AND grupo='" . $data["grupo"] . "'");
        }
      }
    }
  }



  public function getJogoById($jogo_id)

  {



    $sql = "SELECT * FROM jogo WHERE jogo_id = '" . $jogo_id . "'";



    $sql = $this->db->query($sql);



    if ($sql->rowCount() > 0) {

      $array = $sql->fetch();
    }



    return $array;
  }



  public function getRodadasByCampeonatoId($campeonato_id, $fase = false, $grupo = fase)

  {

    $sql = "SELECT jogo.*, descricao.descricao AS rodada_descricao, descricao.ord FROM jogo INNER JOIN descricao ON jogo.rodada = descricao.rodada WHERE jogo.campeonato_id = '" . $campeonato_id . "'";





    $sql .= "GROUP BY jogo.rodada ORDER BY descricao.ord asc";



    $sql = $this->db->query($sql);



    $return = array();



    if ($sql->rowCount() > 0) {

      $return = $sql->fetchAll();
    }



    return $return;
  }





  public function getJogosByCampeonatoId($campeonato_id, $fase = false, $grupo = false, $rodada = false, $clube = false)
  {
    $sql = "SELECT 
    jogo.jogo_id, 
    jogo.campeonato_id,
    (SELECT nome FROM campeonato WHERE campeonato.campeonato_id = jogo.campeonato_id LIMIT 1) AS campeonato,
    (SELECT temporada FROM campeonato WHERE campeonato.campeonato_id = jogo.campeonato_id LIMIT 1) AS temporada,
    (SELECT nickname FROM clubes WHERE clubes.clube_id = jogo.clube_1 LIMIT 1) AS clube_1, 
    (SELECT escudo FROM clubes WHERE clubes.clube_id = jogo.clube_1 LIMIT 1) AS escudo_clube_1, 
    jogo.result_clube_1,
    jogo.penal_clube_1,
    (SELECT nickname FROM clubes WHERE clubes.clube_id = jogo.clube_2 LIMIT 1) AS clube_2,
    (SELECT escudo FROM clubes WHERE clubes.clube_id = jogo.clube_2 LIMIT 1) AS escudo_clube_2, 
    jogo.result_clube_2,
    jogo.penal_clube_2,
    (SELECT nome FROM arbitragem WHERE arbitragem.arbitragem_id = jogo.arbitragem_id LIMIT 1) AS arbitro,
    (SELECT nome FROM arbitragem WHERE arbitragem.arbitragem_id = jogo.auxiliar_1 LIMIT 1) AS auxiliar_1,
    (SELECT nome FROM arbitragem WHERE arbitragem.arbitragem_id = jogo.auxiliar_2 LIMIT 1) AS auxiliar_2,
    (SELECT nome FROM arbitragem WHERE arbitragem.arbitragem_id = jogo.representante LIMIT 1) AS representante,
    (SELECT campo FROM estadios WHERE estadios.estadio_id = jogo.estadio_id LIMIT 1) AS estadio,
    jogo.delegado, jogo.grupo, jogo.rodada, jogo.data, jogo.hora, jogo.realizado, jogo.obs, descricao.descricao AS rodada_descricao
    FROM jogo INNER JOIN descricao ON jogo.rodada = descricao.rodada WHERE jogo.campeonato_id = '" . $campeonato_id . "'";

    if ($fase) {
      $sql .= " AND jogo.fase = '" . $fase . "'";
    }

    if ($grupo) {
      $sql .= " AND jogo.grupo = '" . $grupo . "'";
    }

    if ($rodada) {
      $sql .= " AND jogo.rodada = '" . $rodada . "'";
    }

    if ($clube) {
      $sql .= " AND (clube_1 = '" . $clube . "' OR clube_2 = '" . $clube . "')";
    }

    $sql .= "  ORDER BY data ASC";
    $sql = $this->db->query($sql);
    $return = array();

    if ($sql->rowCount() > 0) {
      $return = $sql->fetchAll();
    }

    return $return;
  }

  public function getJogoAnexos($jogo_id)
  {
    $sql = "SELECT foto, ord FROM fotos WHERE parent = '" . $jogo_id . "' ORDER BY ord ASC";

    $sql = $this->db->query($sql);
    $return = array();

    if ($sql->rowCount() > 0) {
      $return = $sql->fetchAll();
    }

    return $return;
  }



  public function getAllJogos($id = "")

  {



    $sql = "SELECT 
        jogo_id, 
        campeonato_id,
        (SELECT nome FROM campeonato WHERE campeonato.campeonato_id = jogo.campeonato_id LIMIT 1) AS campeonato,
        (SELECT temporada FROM campeonato WHERE campeonato.campeonato_id = jogo.campeonato_id LIMIT 1) AS temporada,
        (SELECT pontuacao_continuada FROM campeonato WHERE campeonato.campeonato_id = jogo.campeonato_id LIMIT 1) AS pontuacao_continuada,
        (SELECT nome FROM clubes WHERE clubes.clube_id = jogo.clube_1 LIMIT 1) AS clube_1_completo, 
        (SELECT nome FROM clubes WHERE clubes.clube_id = jogo.clube_2 LIMIT 1) AS clube_2_completo,
        (SELECT nickname FROM clubes WHERE clubes.clube_id = jogo.clube_1 LIMIT 1) AS clube_1, 
        (SELECT nickname FROM clubes WHERE clubes.clube_id = jogo.clube_2 LIMIT 1) AS clube_2,
        (SELECT nome FROM arbitragem WHERE arbitragem.arbitragem_id = jogo.arbitragem_id LIMIT 1) AS arbitro,
        (SELECT nome FROM arbitragem WHERE arbitragem.arbitragem_id = jogo.auxiliar_1 LIMIT 1) AS auxiliar_1,
        (SELECT nome FROM arbitragem WHERE arbitragem.arbitragem_id = jogo.auxiliar_2 LIMIT 1) AS auxiliar_2,
        (SELECT nome FROM arbitragem WHERE arbitragem.arbitragem_id = jogo.representante LIMIT 1) AS representante,
        (SELECT CONCAT(campo, ' - ', nome_fantasia) FROM estadios WHERE estadios.estadio_id = jogo.estadio_id LIMIT 1) AS estadio,
        (SELECT descricao FROM descricao WHERE descricao.rodada = jogo.rodada LIMIT 1) AS rodada_descricao,
        clube_1 AS clube_id_1, result_clube_1, penal_clube_1, clube_2 AS clube_id_2, result_clube_2, penal_clube_2, delegado, fase, grupo, rodada, data, hora, realizado 
        FROM jogo " . $id . " ORDER BY data DESC";

    $sql = $this->db->query($sql);
    $return = array();

    if ($sql->rowCount() > 0) {

      $array = $sql->fetchAll();
      foreach ($array as $jogo) {
        array_push(
          $return,
          array(
            "jogo" => $jogo,
            "inscricoes" => $this->getAllAtletasPartidaId($jogo["jogo_id"])
          )
        );
      }
    }
    return $return;
  }





  public function getAllOcorrencias($status = 1)

  {



    $sql = $this->db->query("SELECT * FROM ocorrencias WHERE status = '" . $status . "'");



    $array = array();



    if ($sql->rowCount() > 0) {

      $array = $sql->fetchAll();
    }



    return $array;
  }







  public function getAllOcorrenciasPartidaId($jogo_id)

  {



    $array = array();



    $sql = "SELECT sumula.*, ocorrencias.value AS ref_descricao, atletas.nome AS value_descricao, clubes.sigla AS clube_sigla FROM sumula 



        INNER JOIN ocorrencias ON sumula.ref = ocorrencias.code



        INNER JOIN atletas ON sumula.value = atletas.atleta_id



        INNER JOIN clubes ON atletas.clube_id = clubes.clube_id



        WHERE sumula.code = 'atleta' AND sumula.jogo_id = '" . $jogo_id . "'";





    $sql = $this->db->query($sql);





    if ($sql->rowCount() > 0) {

      $array = $sql->fetchAll();
    }



    return $array;
  }





  public function getOcorrenciasByCampeonatoId($campeonato_id)

  {



    $array = array();



    $sql = "SELECT sumula.*, count(sumula.value) AS qde, atletas.nome as atleta, atletas.foto as foto, (SELECT nickname FROM clubes WHERE clube_id = atletas.clube_id) as clube, (SELECT escudo FROM clubes WHERE clube_id = atletas.clube_id) as escudo, atletas.clube_id FROM `jogo` 



  INNER JOIN sumula ON jogo.jogo_id = sumula.jogo_id 



  INNER JOIN atletas ON sumula.value = atletas.atleta_id 



  WHERE jogo.campeonato_id = '" . $campeonato_id . "' AND sumula.code = 'atleta' ";





    $sql .= " GROUP BY sumula.ref, sumula.value ORDER BY qde DESC";



    $sql = $this->db->query($sql);





    if ($sql->rowCount() > 0) {

      $array = $sql->fetchAll();
    }



    return $array;
  }











  public function getAllAtletasPartidaId($jogo_id)
  {
    $array = array();

    $sumula = "SELECT * FROM sumula WHERE jogo_id = '" . $jogo_id . "' AND (code = 'atletas')";
    $sumula = $this->db->query($sumula);

    // $array_atletas = array();
    // foreach($sumula as $at) {
    //   //carregar array com todos os atletas
    //   $e = explode(",", $at["value"]);
    //   for($a = 0; $a < sizeof($e); $a++) {
    //     $array_atletas = $e[$a];
    //   }
    // }

    foreach ($sumula as $at) {
      $explode = explode(",", $at["value"]);

      foreach ($explode as $id) {
        //busca atleta
        $atletas = $this->db->query("SELECT
          DISTINCT(atletas.atleta_id) as id,
          atletas.*,
          clubes.nome as clube_nome,
          clubes.nickname as clube_nickname,
          clubes.sigla as clube_sigla
        FROM atletas
        LEFT JOIN clubes
          ON clubes.clube_id = atletas.clube_id
        WHERE atletas.atleta_id = $id");

        foreach ($atletas as $atleta) {
          array_push($array, array("atletas" => array($at["ref"] => array(
            "atleta_id" => $atleta["id"],
            "nome" => addslashes($atleta["nome"]),
            "funcao" => $atleta["funcao"],
            "clube_nome" => $atleta["clube_nome"],
            "clube_nickname" => $atleta["clube_nickname"],
            "clube_sigla" => $atleta["clube_sigla"]
          ))));
        }
      }
    }

    return $array;
  }
}
