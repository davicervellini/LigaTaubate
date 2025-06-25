<?php
class clubes extends model {

  public function get($limite = 0, $status = 1) {
    $array = array();

    $sql = "SELECT * FROM clubes WHERE status ='".$status."' ORDER BY nome ASC";

    /*
    if($limite > 0) {
      $sql .= " LIMIT ".$limite;
    }
    */

    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {

      $array = $sql->fetchAll();

    }

    return $array;
  }

  public function getEmailById($id)
  {
    $sql = $this->db->query("SELECT email FROM usuarios WHERE usuario = '".$id."'");


    $email = '';


    if($sql->rowCount() > 0)
    {
      $sql = $sql->fetch();

      $email = $sql["email"];
    }

    return $email;
  }
  
  public function getHistoriaById($id) {
    $array = array();
    $sql = "SELECT * FROM clubes_historia WHERE ativo = 1 AND id_clube = $id ORDER BY id_historia DESC LIMIT 1";

    $sql = $this->db->query($sql);

    return $sql->fetch();
  }


  public function add($data = array())
  {
    $sql = $this->db->query("INSERT INTO clubes SET 

      nome='".$data["nome"]."', 
      nickname='".$data["nickname"]."', 
      
      sigla='".$data["sigla"]."', 
      escudo = '".$data["escudo"]."', 
      
      fundacao = '".date('Y-m-d', strtotime($data["fundacao"]))."', 
      presidente = '".$data["presidente"]."', 
      representante_1 = '".$data["representante_1"]."', 
      representante_2 = '".$data["representante_2"]."', 
      site = '".$data["site"]."', 
      fanpage = '".$data["fanpage"]."', 
      status = '1', 
      date_add = '".date('Y-m-d H:i:s')."'");



    $clube_id = $this->db->lastInsertId();


    if($clube_id!=0)
    {


      $sql = $this->db->query("INSERT INTO mandantes SET

      estadio_id = ".$data["estadio_id"].",
      clube_id = ".$clube_id."

      ");

  /*CONFIGURAÇÃO DE USUÁRIOS*/

  $senha = $this->gerar_senha(6, false, true, true, false);

  $senha_segura = md5($senha);


  /*CRIA O USUARIO*/

  $this->db->query("INSERT INTO `usuarios` SET 

    `usuario` = '".$clube_id."',

    email='".$data["email"]."', 

    `senha` = '".$senha_segura."',

    `grupo_usuario_id` = '".$clube_id."',

    `status` = '1'
    ");


  /*CRIA O GRUPO PARA O USUARIO*/
  $this->db->query("INSERT INTO `grupo_usuarios` SET

    `grupo_usuario_id` = '".$clube_id."',

    `nome` = 'Clube',

    `descricao` = '".$data["nome"]."',

    `date_add` = '".date('Y-m-d')."'");

  
  /*PERMISSAO PARA VISUALIZAR E EDITAR O CLUBE*/
  $this->db->query("INSERT INTO `permissoes` SET

    `grupo_usuario_id` = '".$clube_id."',

    `rota` = '/cms/painel/clube_add/".$clube_id."',

    `date_add` = '".date('Y-m-d')."'

    ");

  /*TODAS AS OPERAÇAOES DO SEU CLUBE*/

  $this->db->query("INSERT INTO `permissoes` SET

    `grupo_usuario_id` = '".$clube_id."',

    `rota` = '/cms/painel/clube_add/".$clube_id."*',

    `date_add` = '".date('Y-m-d')."'

    ");


  /*VISUALIZAR E EDITAR SEUS ATLETAS*/

  $this->db->query("INSERT INTO `permissoes` SET

    `grupo_usuario_id` = '".$clube_id."',

    `rota` = '/cms/painel/atletas/".$clube_id."',

    `date_add` = '".date('Y-m-d')."'

    ");

  /*CADASTRAR ATLETAS NO SEU CLUBE*/

  $this->db->query("INSERT INTO `permissoes` SET

    `grupo_usuario_id` = '".$clube_id."',

    `rota` = '/cms/painel/atleta_add/".$clube_id."',

    `date_add` = '".date('Y-m-d')."'

    ");


  /*FUNÇAO AUXILIAR PARA BUSCAR CEP*/

  $this->db->query("INSERT INTO `permissoes` SET

    `grupo_usuario_id` = '".$clube_id."',

    `rota` = '/cms/painel/buscacep*',

    `date_add` = '".date('Y-m-d')."'

    ");

  /*FUNÇAO AUXILIAR PARA EVITAR CADASTRO DUPLICADO*/

  $this->db->query("INSERT INTO `permissoes` SET

    `grupo_usuario_id` = '".$clube_id."',

    `rota` = '/cms/painel/verifica_atleta*',

    `date_add` = '".date('Y-m-d')."'

    ");


  /*FUNÇAO PARA VISUALIZAR INSCRIÇÕES DO SEU ATLETA*/
  $this->db->query("INSERT INTO `permissoes` SET

    `grupo_usuario_id` = '".$clube_id."',

    `rota` = '/cms/painel/inscricao/".$clube_id."*',

    `date_add` = '".date('Y-m-d')."'

    ");


      $headers = "MIME-Version: 1.0\n";
      $headers .= "From: Liga Municial de Taubaté <presidente@ligataubate.com.br> \n";
      //    $headers .= "CC: Nome<email> \n";
      $headers .= "Content-type: text/html; charset=utf-8 \n";
      $headers .= "Reply-To: desenvolvimento@ligataubate.com.br \n ";


    $corpo = "<h1> ".$data["nome"]."</h1>
    <p>data do cadastro:".date('d/m/Y H:i:s')."</p>

    <br /> <br />

    <p> usuario: ".$clube_id."</p>
    <p> senha: ".$senha."</p>


    ";
    mail("presidente@ligataubate.com.br","Novo clube cadastrado - ".$data["nome"],$corpo, $headers);

    

    }
    else
    {


      $headers = "MIME-Version: 1.0\n";
      $headers .= "From: Liga Municial de Taubaté <presidente@ligataubate.com.br> \n";
      //    $headers .= "CC: Nome<email> \n";
      $headers .= "Content-type: text/html; charset=utf-8 \n";
      $headers .= "Reply-To: desenvolvimento@ligataubate.com.br \n ";


      $corpo = "<h1> ".$data["nome"]."</h1>
      <p>data do cadastro:".date('d/m/Y H:i:s')."</p>

      Houve um erro ao tentar cadastrar  clube ".$data["nome"]."

      <br /> <br />
      ";
      mail("presidente@ligataubate.com.br","Erro ao cadastrar clube - ".$data["nome"],$corpo, $headers);

    }


    return $clube_id;

  }

  public function edit($data = array())
  {
    $this->db->query("UPDATE clubes SET 

      nome='".$data["nome"]."', 
      nickname='".$data["nickname"]."', 
      
      sigla='".$data["sigla"]."',  
      escudo = '".$data["escudo"]."', 
      
      fundacao = '".date('Y-m-d', strtotime($data["fundacao"]))."', 
      presidente = '".$data["presidente"]."', 
      representante_1 = '".$data["representante_1"]."', 
      representante_2 = '".$data["representante_2"]."', 
      site = '".$data["site"]."', 
      fanpage = '".$data["fanpage"]."', 
      date_mod= '".date('Y-m-d H:i:s')."' 

      WHERE clube_id = '".(int) $data["clube_id"]."'");

      
      $sql = $this->db->query("UPDATE estadios SET clube_id = '' WHERE clube_id = '".$data["clube_id"]."'");

      $sql = $this->db->query("UPDATE estadios SET clube_id = '".$data["clube_id"]."' WHERE estadio_id = '".$data["estadio_id"]."'");
      
      $sql = $this->db->query("SELECT * FROM mandantes WHERE clube_id = '".$data["clube_id"]."'");


        /*CRIA O USUARIO*/

      $this->db->query("UPDATE `usuarios` SET email='".$data["email"]."' WHERE `usuario` = '".$data["clube_id"]."'");

      if($data["senha"]!="")
      {
        $senha = md5($data["senha"]);

        $this->db->query("UPDATE `usuarios` SET senha='".$senha."' WHERE `usuario` = '".$data["clube_id"]."'");
      }


      if($sql->rowCount() > 0) {


        $sql = $this->db->query("UPDATE mandantes SET

      estadio_id = ".$data["estadio_id"]."
      
      WHERE clube_id = ".(int) $data["clube_id"]."

      ");
      

      }

      else
      {

        $sql = $this->db->query("INSERT INTO mandantes SET

      estadio_id = ".$data["estadio_id"].",
      
      clube_id = ".(int) $data["clube_id"]."

      ");
      }


      


  }

  public function delete($id)
  {
    return $this->db->query("UPDATE clubes SET status = '0', date_mod= '".date('Y-m-d H:i:s')."' WHERE clube_id = '".(int) $id."'");
  }

  public function getById($id)
  {
    $sql = "SELECT * FROM clubes WHERE clube_id = '".(int) $id."'";

    $sql = $this->db->query($sql);

    return $sql->fetch();
  }


  public function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos)
  {
      $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
      $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
      $nu = "0123456789"; // $nu contem os números
      $si = "!@#$%¨&*()_+="; // $si contem os símbolos
     
      if ($maiusculas){
            // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($ma);
      }
     
        if ($minusculas){
            // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($mi);
        }
     
        if ($numeros){
            // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($nu);
        }
     
        if ($simbolos){
            // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
            $senha .= str_shuffle($si);
        }
     
        // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
        return substr(str_shuffle($senha),0,$tamanho);
  }

}
?>