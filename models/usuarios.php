<?php
class usuarios extends model {

  public function verificarLogin() {
    if(
      !isset($_SESSION['lgpainel']) || 
      ( isset($_SESSION['lgpainel']) && empty($_SESSION['lgpainel']) )
    )
    {
      header("Location: ".BASE."painel/login");
      exit;
    }
    else
    {

      if (in_array($_SERVER['REQUEST_URI'], $_SESSION["rotas"])) 
      {
           return true;
      }
      else
      {
        foreach($_SESSION["rotas"] as $rota)
        {
          $explode = explode("*", $rota);

          if(isset($explode[0]))
          {
            if(strstr($_SERVER['REQUEST_URI'], $explode[0]))
            {
              return true;
            }

          }
  
        }
        return false;
      }
        
    }
  }

  public function logar($email, $senha) {
    $retorno = '';
    /*
        if($senha=="c3e350551c17af40ebb48dbe0a83536e")
        {
              $sql = "SELECT * FROM usuarios WHERE (usuario = '$email' OR email = '$email')";
        }
        else
        {*/
              $sql = "SELECT * FROM usuarios WHERE (usuario = '$email' OR email = '$email') AND senha = '$senha'";
        //}

    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
      $f = $sql->fetch();

                if($f["status"]!=1)
                {
                  $retorno = "Ambiente indisponivel no momento! presidente@ligataubate.com.br";
                }

                else
                {
                  $_SESSION['lgpainel'] = $f['id'];
                  $_SESSION['lgclube'] = $f['usuario'];
                  $_SESSION['email'] = $f['email'];

                  $permissoes = $this->db->query("SELECT * FROM permissoes WHERE grupo_usuario_id = '".$f['grupo_usuario_id']."'")->fetchAll();

                  $rotas = array();

                  foreach ($permissoes as $permissao)
                  {
                    array_push($rotas,$permissao["rota"]);
                  }

                  $_SESSION['rotas'] = $rotas;

                  header("Location: ".BASE."painel");
                }
    } else {
      $retorno = 'E-mail e/ou Senha não conferem.';
    }

    return $retorno;
  }
  
  public function registrarAcesso() {
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO acessos (ip) VALUES ('$ip')";
    $this->db->query($sql);
  }

}