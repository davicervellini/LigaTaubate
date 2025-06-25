<?php
class campeonatoController extends controller {

	public function __construct() {
        parent::__construct();
    }

    public function index() {
        $u = new usuarios();
        $u->verificarLogin();

        $campeonatos = new campeonatos();

        $data = array();

        $data["campeonatos"] = $campeonatos->getAll();
        
        $this->loadTemplateInPainel('campeonato/campeonato_list', $data);
    }

    public function teste()
    {
        $u = new usuarios();
        $u->verificarLogin();

        $c = new campeonatos();


        $data = array();

         $data["campeonato_id"] = 32; 
         $data["origem"] = "clube";
         $data["origem_id"] = 1011; 
         $data["ref"] = "pontos";

        var_dump($c->verificaPenalizacao($data));

    }

    public function add($id = null)
    {

    	$u = new usuarios();
        $u->verificarLogin();

        $campeonatos = new campeonatos();

        $data = array();

        unset($_SESSION["msg"]);

        if(isset($_POST["nome"]))
        {

        	$data["campeonato_id"] = $_POST["campeonato_id"];
        	$data["nome"] = $_POST["nome"]; 
			$data["descricao"] = $_POST["descricao"]; 
			$data["temporada"] = $_POST["temporada"];
			$data["tipo"] = $_POST["tipo"]; 
			$data["num_clubes_campeonato"] = $_POST["num_clubes_campeonato"]; 
			$data["grupos"] = $_POST["grupos"]; 
			$data["clubes_proxima_fase"] = $_POST["clubes_proxima_fase"]; 
			$data["decisao"] = $_POST["decisao"]; 
			$data["gol_fora"] = $_POST["gol_fora"]; 
			$data["tipo_decisao"] = $_POST["tipo_decisao"]; 
            $data["pontuacao_continuada"] = $_POST["pontuacao_continuada"]; 
			$data["status"] = 1;

        	if($_POST["campeonato_id"]==0)
        	{
        		//cadastro de campeonato

        		if($campeonato_id = $campeonatos->add($data))
				{
					//campeonato cadastrado

					header("Location: ".BASE."campeonato/");
				}
				else
				{
					//erro ao cadastrar
				}
        	}

        	else
        	{
        		//edição de campeonato
        		
        		if($campeonatos->edit($data))
				{
					//campeonato editado
					header("Location: ".BASE."campeonato/add/".$_POST["campeonato_id"]);
				}
				else
				{
					//erro ao editar
					header("Location: ".BASE."campeonato/erro");
				}
				

        	}
			



		}

		if(isset($id))
		{
			$result = $campeonatos->get($id);

			$data["campeonato_id"] = $result["campeonato_id"];
        	$data["nome"] = $result["nome"]; 
			$data["descricao"] = $result["descricao"]; 
			$data["temporada"] = $result["temporada"];
			$data["tipo"] = $result["tipo"]; 
			$data["num_clubes_campeonato"] = $result["num_clubes_campeonato"]; 
			$data["grupos"] = $result["grupos"]; 
			$data["clubes_proxima_fase"] = $result["clubes_proxima_fase"]; 
			$data["decisao"] = $result["decisao"]; 
			$data["gol_fora"] = $result["gol_fora"]; 
			$data["tipo_decisao"] = $result["tipo_decisao"]; 
            $data["pontuacao_continuada"] = $result["pontuacao_continuada"]; 
			$data["status"] = $result["status"];

		}
		else
		{
			$data["campeonato_id"] = 0;
        	$data["nome"] = "";
			$data["descricao"] = "";
			$data["temporada"] = "";
			$data["tipo"] = "";
			$data["num_clubes_campeonato"] = "";
			$data["grupos"] = "";
			$data["clubes_proxima_fase"] = "";
			$data["decisao"] = "";
			$data["gol_fora"] = "";
			$data["tipo_decisao"] = "";
            $data["pontuacao_continuada"] = "";
			$data["status"] = "";

		}

        $this->loadTemplateInPainel('campeonato/campeonato_form', $data);

    }

    public function mata_mata()
    {
        $u = new usuarios();
        $u->verificarLogin();

        $campeonatos = new campeonatos();


           
        
        $campeonatos->mata_mata();
    }

    public function conf($id)
    {

    	$u = new usuarios();
        $u->verificarLogin();

        $msg = "";

        $data = array();

        $campeonatos = new campeonatos();
        $clubes = new clubes();

        if(isset($_POST["clube"]))
        {

            $data["campeonato_id"] = $_POST["campeonato_id"];
            $data["clube"] = $_POST["clube"];
            $campeonatos->conf($data);

        }



        	$result = $campeonatos->get($id);

			$data["campeonato_id"] = $result["campeonato_id"];
        	$data["nome"] = $result["nome"]; 
			$data["descricao"] = $result["descricao"]; 
			$data["classificacao"] = $campeonatos->getClassificacaoById($id);
			$data["clubes"] = $clubes->get();

			$data["grupos_clubes"] = $campeonatos->getClassificacaoById($id,"ORDER BY `grupo` ASC");
			
			/*
			$data["temporada"] = $result["temporada"];
			$data["tipo"] = $result["tipo"]; 
			$data["num_clubes_campeonato"] = $result["num_clubes_campeonato"]; 
			$data["grupos"] = $result["grupos"]; 
			$data["clubes_proxima_fase"] = $result["clubes_proxima_fase"]; 
			$data["decisao"] = $result["decisao"]; 
			$data["gol_fora"] = $result["gol_fora"]; 
			$data["tipo_decisao"] = $result["tipo_decisao"]; 
			$data["status"] = $result["status"];
			*/






    	$this->loadTemplateInPainel('campeonato/campeonato_conf_form', $data);

    }


    public function del($id)
    {

    	$u = new usuarios();
        $u->verificarLogin();

         $msg = "";

        $campeonatos = new campeonatos();

        unset($_SESSION["msg"]);

        if($campeonatos->del($id))
        {
        	$msg = "Campeonato {$id} excluído com sucesso!";
        }
        else
        {
        	$msg = "Campeonato {$id} excluído com sucesso!";

        	//erro ao excluir
        }

        $_SESSION["msg"] = $msg;

        header("Location: ".BASE."campeonato/");
    }

    public function jogos($campeonato_id = null, $grupo = null, $rodada = null)
    {

        $data = array();

        $u = new usuarios();
        $u->verificarLogin();

        $campeonatos = new campeonatos();

        $data["campeonato_id"] = (isset($_GET["campeonato_id"]))? $_GET["campeonato_id"] : 56;
        $data["grupo"] = (isset($_GET["grupo"]))? $_GET["grupo"] : null;
        $data["rodada"] = (isset($_GET["rodada"]))? $_GET["rodada"] : null;



        if(!empty($data["campeonato_id"]) || !empty($data["grupo"]) || !empty($data["rodada"]))
        {
            $id = " WHERE ";
            
            if(!empty($data["campeonato_id"]))
            {
                $id .=" jogo.campeonato_id = '".$data["campeonato_id"]."' AND";
            }   

            if(!empty($data["grupo"]))
            {
                $id .="  jogo.grupo = '".$data["grupo"]."' AND";
            }  

            if(!empty($rodada))
            {
                $id .="  jogo.rodada = '".$data["rodada"]."' AND";
            }  



            $id = substr($id,0,-3);
        }



        $data["jogos"] = $campeonatos->getAllJogos((isset($id)? $id : ""));
        $data["campeonatos"] = $campeonatos->getAll();

         $this->loadTemplateInPainel('campeonato/jogo_list', $data);

    }

    public function jogo_resultado_ajax()
    {
        $u = new usuarios();
        $u->verificarLogin();

        $campeonatos = new campeonatos();

        $data = array();

        $data["campeonato_id"] = $_POST["campeonato_id"]; 
        
        $data["clube_1"] = $_POST["clube_1"]; 
        
        $data["result_clube_1"] = $_POST["result_clube_1"]; 
        
        $data["penal_clube_1"] = $_POST["penal_clube_1"]; 

        $data["clube_2"] = $_POST["clube_2"]; 
        
        $data["result_clube_2"] = $_POST["result_clube_2"]; 
        
        $data["penal_clube_2"] = $_POST["penal_clube_2"]; 
        
        //$data["obs"] = $_POST["campeonato_id"]; 
        $data["realizado"] = $_POST["realizado"]; 
        
        $data["jogo_id"] = $_POST["jogo_id"]; 
        
        $data["fase"] = $_POST["fase"]; 

        $data["grupo"] = $_POST["grupo"]; 
        
        $data["pontuacao_continuada"] = $_POST["pontuacao_continuada"]; 



        if($campeonatos->editResultJogo($data))
        {
            echo "=) Jogo Salvo!";
        }

        

    }

    public function jogo_add($jogo_id = null)
    {
    	$u = new usuarios();
        $u->verificarLogin();

        $data = array();

        if(isset($_SESSION["mensagem"]))
        {
            $data["mensagem"] = $_SESSION["mensagem"];
            unset($_SESSION["mensagem"]);
        }

        $campeonatos = new campeonatos();
        $clubes = new clubes();
        $estadios = new estadios();
        $arbitragem = new arbitragem();
        

        $data["campeonatos"] = $campeonatos->getAll();
        $data["estadios"] = $estadios->getAll();
        $data["arbitros"] = $arbitragem->get();

        if(isset($_POST["jogo_id"]) && $_POST["jogo_id"]==0)
        {

        	$data["campeonato_id"] = $_POST["campeonato_id"]; 
            $data["fase"] = $_POST["fase"];
			$data["grupo"] = $_POST["grupo"];
            $data["rodada"] = $_POST["rodada"];
			$data["clube_1"] = $_POST["clube_1"];
			$data["clube_2"] = $_POST["clube_2"];
			$data["estadio_id"] = $_POST["estadio_id"];
			
            if($_POST["arbitragem_id"]!="")
            {
                $data["arbitragem_id"] = $_POST["arbitragem_id"];
            }
            else
            {
                $data["arbitragem_id"] = 88;
            }

            
            if($_POST["auxiliar_1"]!="")
            {
                $data["auxiliar_1"] = $_POST["auxiliar_1"];
            }
            else
            {
                $data["auxiliar_1"] = 88;
            }


            if($_POST["auxiliar_2"]!="")
            {
                $data["auxiliar_2"] = $_POST["auxiliar_2"];
            }
            else
            {
                $data["auxiliar_2"] = 88;
            }


            if($_POST["representante"]!="")
            {
                $data["representante"] = $_POST["representante"];
            }
            else
            {
                $data["representante"] = 88;
            }
        
            


            $data["delegado"] = $_POST["delegado"];
			$data["data"] = date('Y-m-d', strtotime(str_replace("/","-",$_POST["data"])));
			$data["hora"] = date("H:i", strtotime($_POST["hora"]));
			$data["obs"] = addslashes($_POST["obs"]);
			$data["realizado"] = addslashes($_POST["realizado"]);

        	$jogo_id = $campeonatos->addJogo($data);

            if($jogo_id)
            {
                 $_SESSION["mensagem"] = "Jogo cadastrado com sucesso!";
            }
            else
            {
                $_SESSION["mensagem"] = "Erro ao cadastrar o jogo! entrar com contato com desenvolvimento@ligataubate.com.br";
            }

            header("Location: ".BASE."campeonato/jogo_add/".$jogo_id);

        }
        if(isset($_POST["jogo_id"]) && $_POST["jogo_id"]!=0)
        {
            $data["jogo_id"] = $_POST["jogo_id"]; 
            $data["campeonato_id"] = $_POST["campeonato_id"]; 
            $data["fase"] = $_POST["fase"];
            $data["grupo"] = $_POST["grupo"];
            $data["rodada"] = $_POST["rodada"];
            $data["clube_1"] = $_POST["clube_1"];
            $data["clube_2"] = $_POST["clube_2"];
            $data["estadio_id"] = $_POST["estadio_id"];
            $data["arbitragem_id"] = $_POST["arbitragem_id"];
            $data["auxiliar_1"] = $_POST["auxiliar_1"];
            $data["auxiliar_2"] = $_POST["auxiliar_2"];
            $data["representante"] = $_POST["representante"];
            $data["delegado"] = $_POST["delegado"];
            $data["data"] = date('Y-m-d', strtotime(str_replace("/","-",$_POST["data"])));
            $data["hora"] = date("H:i", strtotime($_POST["hora"]));
            $data["obs"] = addslashes($_POST["obs"]);
            $data["realizado"] =  addslashes($_POST["realizado"]);

            if($campeonatos->editJogo($data))
            {
                $_SESSION["mensagem"] = "Jogo editado com sucesso!";
            }
            else
            {
                $_SESSION["mensagem"] = "Erro ao editar o jogo! entrar com contato com desenvolvimento@ligataubate.com.br";
            }

            header("Location: ".BASE."campeonato/jogo_add/".$_POST["jogo_id"]);

        }

        if(isset($jogo_id))
        {
            $result = $campeonatos->getJogoById($jogo_id);

            $data["jogo_id"] = $jogo_id;

            $data["campeonato"] = $campeonatos->get($result["campeonato_id"]); 
            $data["fase"] = $result["fase"];
            $data["grupo"] = $result["grupo"];
            $data["rodada"] = $result["rodada"];
            
            $data["clube_1"] = $clubes->getById($result["clube_1"]);
            $data["clube_2"] = $clubes->getById($result["clube_2"]);
            
            $data["estadio"] = $estadios->getById($result["estadio_id"]);

            $data["arbitragem"] = $arbitragem->getById($result["arbitragem_id"]);
            $data["auxiliar_1"] = $arbitragem->getById($result["auxiliar_1"]);
            $data["auxiliar_2"] = $arbitragem->getById($result["auxiliar_2"]);

            $data["representante"] = $arbitragem->getById($result["representante"]);
            $data["delegado"] = $result["delegado"];
            

            $data["data"] = date('d/m/Y', strtotime($result["data"]));
            $data["hora"] = date('H:i', strtotime($result["hora"]));
            $data["obs"] = $result["obs"];
            $data["realizado"] = $result["realizado"];



        }
        else
        {
            $data["jogo_id"] = 0;
        }


        $this->loadTemplateInPainel('campeonato/jogo_conf', $data);
    }



    public function cadastrajogoajax()
    {

        $u = new usuarios();
        $u->verificarLogin();

        $data = array();

        if(isset($_SESSION["mensagem"]))
        {
            $data["mensagem"] = $_SESSION["mensagem"];
            unset($_SESSION["mensagem"]);
        }

        $campeonatos = new campeonatos();
        $clubes = new clubes();
        $estadios = new estadios();
        $arbitragem = new arbitragem();
        

        $data["campeonatos"] = $campeonatos->getAll();
        $data["estadios"] = $estadios->getAll();
        $data["arbitros"] = $arbitragem->get();

        if(isset($_POST["jogo_id"]) && $_POST["jogo_id"]==0)
        {

            $data["campeonato_id"] = $_POST["campeonato_id"]; 
            $data["fase"] = $_POST["fase"];
            $data["grupo"] = $_POST["grupo"];
            $data["rodada"] = $_POST["rodada"];
            $data["clube_1"] = $_POST["clube_1"];
            $data["clube_2"] = $_POST["clube_2"];
            $data["estadio_id"] = $_POST["estadio_id"];
            
            if($_POST["arbitragem_id"]!="")
            {
                $data["arbitragem_id"] = $_POST["arbitragem_id"];
            }
            else
            {
                $data["arbitragem_id"] = 88;
            }

            
            if($_POST["auxiliar_1"]!="")
            {
                $data["auxiliar_1"] = $_POST["auxiliar_1"];
            }
            else
            {
                $data["auxiliar_1"] = 88;
            }


            if($_POST["auxiliar_2"]!="")
            {
                $data["auxiliar_2"] = $_POST["auxiliar_2"];
            }
            else
            {
                $data["auxiliar_2"] = 88;
            }


            if($_POST["representante"]!="")
            {
                $data["representante"] = $_POST["representante"];
            }
            else
            {
                $data["representante"] = 88;
            }
        
            


            $data["delegado"] = $_POST["delegado"];
            $data["data"] = date('Y-m-d', strtotime(str_replace("/","-",$_POST["data"])));
            $data["hora"] = date("H:i", strtotime($_POST["hora"]));
            $data["obs"] = addslashes($_POST["obs"]);
            $data["realizado"] = $_POST["realizado"];

            $jogo_id = $campeonatos->addJogo($data);

            if($jogo_id)
            {
                 $_SESSION["mensagem"] = "Jogo cadastrado com sucesso!";
            }
            else
            {
                $_SESSION["mensagem"] = "Erro ao cadastrar o jogo! entrar com contato com desenvolvimento@ligataubate.com.br";
            }

            //header("Location: ".BASE."campeonato/jogo_add/".$jogo_id);
            echo $_SESSION["mensagem"];

        }
        if(isset($_POST["jogo_id"]) && $_POST["jogo_id"]!=0)
        {
            $data["jogo_id"] = $_POST["jogo_id"]; 
            $data["campeonato_id"] = $_POST["campeonato_id"]; 
            $data["fase"] = $_POST["fase"];
            $data["grupo"] = $_POST["grupo"];
            $data["rodada"] = $_POST["rodada"];
            $data["clube_1"] = $_POST["clube_1"];
            $data["clube_2"] = $_POST["clube_2"];
            $data["estadio_id"] = $_POST["estadio_id"];
            $data["arbitragem_id"] = $_POST["arbitragem_id"];
            $data["auxiliar_1"] = $_POST["auxiliar_1"];
            $data["auxiliar_2"] = $_POST["auxiliar_2"];
            $data["representante"] = $_POST["representante"];
            $data["delegado"] = $_POST["delegado"];
            $data["data"] = date('Y-m-d', strtotime(str_replace("/","-",$_POST["data"])));
            $data["hora"] = date("H:i", strtotime($_POST["hora"]));
            $data["obs"] = addslashes($_POST["obs"]);
            $data["realizado"] = $_POST["realizado"];

            if($campeonatos->editJogo($data))
            {
                $_SESSION["mensagem"] = "Jogo editado com sucesso!";
            }
            else
            {
                $_SESSION["mensagem"] = "Erro ao editar o jogo! entrar com contato com desenvolvimento@ligataubate.com.br";
            }

            //header("Location: ".BASE."campeonato/jogo_add/".$_POST["jogo_id"]);
            echo $_SESSION["mensagem"];

        }
    }


    public function jogo_del($jogo_id)
    {

        $u = new usuarios();
        $u->verificarLogin();

        $data = array();

        unset($_SESSION["msg"]);

        $campeonatos = new campeonatos();


        if($campeonatos->jogo_del($jogo_id))
        {
            $msg = "Jogo excluido com sucesso!";
        }
        else
        {
            $msg = "Erro ao excluir jogo!";
        }

        $_SESSION["msg"] = $msg;

        $this->jogos();
    }


    /*
FUNÇÃO EXCLUI FOTO
*/
    public function exclui_julgamento($foto_id)
    {
        $u = new usuarios();
        $u->verificarLogin();

        $fotos = new fotos();

        if(isset($foto_id))
        {
            
            $foto = $fotos->getById($foto_id);

            unlink("assets/images/sumulas/".$foto["parent"]."/".$foto["foto"]);

            $fotos->del($foto_id);

            header("location: ".BASE."campeonato/jogo_resultado/".$foto["parent"]); //futuramente trocar este trecho
        }
    }


    public function jogo_resultado($jogo_id)
    {
        $u = new usuarios();
        $u->verificarLogin();

        $data = array();

        if(isset($_SESSION["mensagem"]))
        {
            $data["mensagem"] = $_SESSION["mensagem"];
            unset($_SESSION["mensagem"]);
        }

        $campeonatos = new campeonatos();
        $clubes = new clubes();
        $estadios = new estadios();
        $arbitragem = new arbitragem();
        $fotos = new fotos();
       
        

        $data["campeonatos"] = $campeonatos->getAll();
        $data["estadios"] = $estadios->getAll();
        $data["arbitros"] = $arbitragem->get();
        $data["ocorrencias"] = $campeonatos->getAllOcorrencias();
        
        


        if(isset($_POST["jogo_id"]) && $_POST["jogo_id"]!=0)
        {
            $data["jogo_id"] = $_POST["jogo_id"]; 
            
            $data["pontuacao_continuada"] = $_POST["pontuacao_continuada"]; 
            $data["campeonato_id"] = $_POST["campeonato_id"];
            $data["fase"] = $_POST["fase"];
            $data["grupo"] = $_POST["grupo"];
            $data["rodada"] = $_POST["rodada"];
           
            $data["clube_1"] = $_POST["clube_1"];

            if($_POST["result_clube_1"]!="")
            {
                $data["result_clube_1"] = $_POST["result_clube_1"];
            }
            else
            {
                $data["result_clube_1"] = 0;
            }
            

            if($_POST["penal_clube_1"]!="")
            {
                $data["penal_clube_1"] = $_POST["penal_clube_1"];
            }
            else
            {
                $data["penal_clube_1"] = 0;
            }
            

            $data["clube_2"] = $_POST["clube_2"];

            if($_POST["result_clube_2"]!="")
            {
                $data["result_clube_2"] = $_POST["result_clube_2"];
            }
            else
            {
                $data["result_clube_2"] = 0;
            }


            if($_POST["penal_clube_2"]!="")
            {
                $data["penal_clube_2"] = $_POST["penal_clube_2"];
            }
            else
            {
                $data["penal_clube_2"] = 0;
            }

           
            $data["obs"] = addslashes($_POST["obs"]);
            $data["realizado"] = $_POST["realizado"];

            $data["ocorrencias"] = $_POST["ocorrencias"];
            $data["atletas"] = $_POST["atletas"];


            /*VERIFICA SE DIRETORIO DAS SUMULAS EXISTE*/
            if(!file_exists("assets/images/sumulas")){
                mkdir("assets/images/sumulas");
            }
            if(!file_exists("assets/images/sumulas/".$data["jogo_id"]))
            {
                mkdir("assets/images/sumulas/".$data["jogo_id"]);
            }

            /*1*/

            // if(isset($_FILES['sumula-pg1']) && $_FILES['sumula-pg1']['name']!="")
            // {
            //     if($_POST['sumula-pg1-id']!="")
            //     {

            //         $foto = $fotos->getById($_POST['sumula-pg1-id']);

            //         unlink("assets/images/sumulas/".$data["jogo_id"]."/".$foto["foto"]);

            //         $fotos->del($_POST['sumula-pg1-id']);
            //     }

            //     $data["sumula-pg1"] = md5($_FILES['sumula-pg1']['name'].time().rand(0,999)).'.jpg';
            //     move_uploaded_file($_FILES['sumula-pg1']['tmp_name'], 'assets/images/sumulas/'.$data["jogo_id"].'/'.$data["sumula-pg1"]);

            //             $ft = array();
            //             $ft["ref"] = 'sumula-pg1';
            //             $ft["parent"] = $data["jogo_id"];
            //             $ft["foto"] = $data["sumula-pg1"];
            //             $ft["ord"] = 1;

            //             $fotos->add($ft);
            // }
            if(isset($_FILES['sumula-pg1']) && $_FILES['sumula-pg1']['name']!="") {
                if($_POST['sumula-pg1-id']!="") {
                    $foto = $fotos->getById($_POST['sumula-pg1-id']);
                    unlink("assets/images/sumulas/".$data["jogo_id"]."/".$foto["foto"]);
                    $fotos->del($_POST['sumula-pg1-id']);
                }
            
                // Gera um nome único para o arquivo
                $filename = md5($_FILES['sumula-pg1']['name'].time().rand(0,999));
            
                // Obtém a extensão do arquivo original
                $ext = pathinfo($_FILES['sumula-pg1']['name'], PATHINFO_EXTENSION);
            
                // Define o novo nome do arquivo com a extensão original
                $data["sumula-pg1"] = $filename . '.' . $ext;
            
                // Move o arquivo para o diretório de destino
                move_uploaded_file($_FILES['sumula-pg1']['tmp_name'], 'assets/images/sumulas/'.$data["jogo_id"].'/'.$data["sumula-pg1"]);
            
                $ft = array();
                $ft["ref"] = 'sumula-pg1';
                $ft["parent"] = $data["jogo_id"];
                $ft["foto"] = $data["sumula-pg1"];
                $ft["ord"] = 1;
            
                $fotos->add($ft);
            }
            

            /*2*/

            // if(isset($_FILES['sumula-pg2']) && $_FILES['sumula-pg2']['name']!="")
            // {
            //     if($_POST['sumula-pg2-id']!="")
            //     {

            //         $foto = $fotos->getById($_POST['sumula-pg2-id']);

            //         unlink("assets/images/sumulas/".$data["jogo_id"]."/".$foto["foto"]);

            //         $fotos->del($_POST['sumula-pg2-id']);
            //     }


            //     $data["sumula-pg2"] = md5($_FILES['sumula-pg2']['name'].time().rand(0,999)).'.jpg';
            //     move_uploaded_file($_FILES['sumula-pg2']['tmp_name'], 'assets/images/sumulas/'.$data["jogo_id"].'/'.$data["sumula-pg2"]);

            //             $ft = array();
            //             $ft["ref"] = 'sumula-pg2';
            //             $ft["parent"] = $data["jogo_id"];
            //             $ft["foto"] = $data["sumula-pg2"];
            //             $ft["ord"] = 2;

            //             $fotos->add($ft);
            // }

            if(isset($_FILES['sumula-pg2']) && $_FILES['sumula-pg2']['name']!="") {
                if($_POST['sumula-pg2-id']!="") {
                    $foto = $fotos->getById($_POST['sumula-pg2-id']);
                    unlink("assets/images/sumulas/".$data["jogo_id"]."/".$foto["foto"]);
                    $fotos->del($_POST['sumula-pg2-id']);
                }

                // Gera um nome único para o arquivo
                $filename = md5($_FILES['sumula-pg2']['name'].time().rand(0,999));

                // Obtém a extensão do arquivo original
                $ext = pathinfo($_FILES['sumula-pg2']['name'], PATHINFO_EXTENSION);

                // Define o novo nome do arquivo com a extensão original
                $data["sumula-pg2"] = $filename . '.' . $ext;

                // Move o arquivo para o diretório de destino
                move_uploaded_file($_FILES['sumula-pg2']['tmp_name'], 'assets/images/sumulas/'.$data["jogo_id"].'/'.$data["sumula-pg2"]);

                $ft = array();
                $ft["ref"] = 'sumula-pg2';
                $ft["parent"] = $data["jogo_id"];
                $ft["foto"] = $data["sumula-pg2"];
                $ft["ord"] = 2;

                $fotos->add($ft);
            }


            /*3*/

            // if(isset($_FILES['sumula-pg3']) && $_FILES['sumula-pg3']['name']!="")
            // {

            //     if($_POST['sumula-pg3-id']!="")
            //     {

            //         $foto = $fotos->getById($_POST['sumula-pg3-id']);

            //         unlink("assets/images/sumulas/".$data["jogo_id"]."/".$foto["foto"]);

            //         $fotos->del($_POST['sumula-pg3-id']);
            //     }

            //     $data["sumula-pg3"] = md5($_FILES['sumula-pg3']['name'].time().rand(0,999)).'.jpg';
            //     move_uploaded_file($_FILES['sumula-pg3']['tmp_name'], 'assets/images/sumulas/'.$data["jogo_id"].'/'.$data["sumula-pg3"]);


            //             $ft = array();
            //             $ft["ref"] = 'sumula-pg3';
            //             $ft["parent"] = $data["jogo_id"];
            //             $ft["foto"] = $data["sumula-pg3"];
            //             $ft["ord"] = 2;

            //             $fotos->add($ft);
            // }
            

            if(isset($_FILES['sumula-pg3']) && $_FILES['sumula-pg3']['name']!="") {
                if($_POST['sumula-pg3-id']!="") {
                    $foto = $fotos->getById($_POST['sumula-pg3-id']);
                    unlink("assets/images/sumulas/".$data["jogo_id"]."/".$foto["foto"]);
                    $fotos->del($_POST['sumula-pg3-id']);
                }

                // Gera um nome único para o arquivo
                $filename = md5($_FILES['sumula-pg3']['name'].time().rand(0,999));

                // Obtém a extensão do arquivo original
                $ext = pathinfo($_FILES['sumula-pg3']['name'], PATHINFO_EXTENSION);

                // Define o novo nome do arquivo com a extensão original
                $data["sumula-pg3"] = $filename . '.' . $ext;

                // Move o arquivo para o diretório de destino
                move_uploaded_file($_FILES['sumula-pg3']['tmp_name'], 'assets/images/sumulas/'.$data["jogo_id"].'/'.$data["sumula-pg3"]);

                $ft = array();
                $ft["ref"] = 'sumula-pg3';
                $ft["parent"] = $data["jogo_id"];
                $ft["foto"] = $data["sumula-pg3"];
                $ft["ord"] = 3;

                $fotos->add($ft);
            }



            /*delegado*/

            // if(isset($_FILES['sumula-delegado']) && $_FILES['sumula-delegado']['name']!="")
            // {

            //     if($_POST['sumula-delegado-id']!="")
            //     {

            //         $foto = $fotos->getById($_POST['sumula-delegado-id']);

            //         unlink("assets/images/sumulas/".$data["jogo_id"]."/".$foto["foto"]);

            //         $fotos->del($_POST['sumula-delegado-id']);
            //     }

            //     $data["sumula-delegado"] = md5($_FILES['sumula-delegado']['name'].time().rand(0,999)).'.jpg';
            //     move_uploaded_file($_FILES['sumula-delegado']['tmp_name'], 'assets/images/sumulas/'.$data["jogo_id"].'/'.$data["sumula-delegado"]);

            //             $ft = array();
            //             $ft["ref"] = 'sumula-delegado';
            //             $ft["parent"] = $data["jogo_id"];
            //             $ft["foto"] = $data["sumula-delegado"];
            //             $ft["ord"] = 3;

            //             $fotos->add($ft);
            // }
            if(isset($_FILES['sumula-delegado']) && $_FILES['sumula-delegado']['name']!="") {
                if($_POST['sumula-delegado-id']!="") {
                    $foto = $fotos->getById($_POST['sumula-delegado-id']);
                    unlink("assets/images/sumulas/".$data["jogo_id"]."/".$foto["foto"]);
                    $fotos->del($_POST['sumula-delegado-id']);
                }

                // Gera um nome único para o arquivo
                $filename = md5($_FILES['sumula-delegado']['name'].time().rand(0,999));

                // Obtém a extensão do arquivo original
                $ext = pathinfo($_FILES['sumula-delegado']['name'], PATHINFO_EXTENSION);

                // Define o novo nome do arquivo com a extensão original
                $data["sumula-delegado"] = $filename . '.' . $ext;

                // Move o arquivo para o diretório de destino
                move_uploaded_file($_FILES['sumula-delegado']['tmp_name'], 'assets/images/sumulas/'.$data["jogo_id"].'/'.$data["sumula-delegado"]);

                $ft = array();
                $ft["ref"] = 'sumula-delegado';
                $ft["parent"] = $data["jogo_id"];
                $ft["foto"] = $data["sumula-delegado"];
                $ft["ord"] = 3;

                $fotos->add($ft);
            }



            //$data["sumula-julgamento"] = 

            //julgamentos

            // if(isset($_FILES['sumula-julgamento'])) {

            //     if(count($_FILES['sumula-julgamento']['tmp_name']) > 0) {

            //         for($q=0;$q<count($_FILES['sumula-julgamento']['tmp_name']);$q++) {

            //             $nomedoarquivo = md5($_FILES['sumula-julgamento']['name'][$q].time().rand(0,999)).'.jpg';

            //             $foto = move_uploaded_file($_FILES['sumula-julgamento']['tmp_name'][$q], 'assets/images/sumulas/'.$data["jogo_id"].'/'.$nomedoarquivo);

            //             $data["ref"] = 'sumula-julgamento'.$q;
            //             $data["parent"] = $data["jogo_id"];
            //             $data["foto"] = ($foto)?$nomedoarquivo:'';
            //             $data["ord"] = $q;

            //             if($foto!="")
            //             {
            //                 $fotos->add($data);
            //             }
                        
            //         }

            //     }

            // }

            if(isset($_FILES['sumula-julgamento'])) {
                if(count($_FILES['sumula-julgamento']['tmp_name']) > 0) {
                    for($q=0;$q<count($_FILES['sumula-julgamento']['tmp_name']);$q++) {
                        // Gera um nome único para o arquivo
                        $nomedoarquivo = md5($_FILES['sumula-julgamento']['name'][$q].time().rand(0,999));

                        // Obtém a extensão do arquivo original
                        $ext = pathinfo($_FILES['sumula-julgamento']['name'][$q], PATHINFO_EXTENSION);

                        // Define o novo nome do arquivo com a extensão original
                        $filename = $nomedoarquivo . '.' . $ext;

                        // Move o arquivo para o diretório de destino
                        $foto = move_uploaded_file($_FILES['sumula-julgamento']['tmp_name'][$q], 'assets/images/sumulas/'.$data["jogo_id"].'/'.$filename);

                        $data["ref"] = 'sumula-julgamento'.$q;
                        $data["parent"] = $data["jogo_id"];
                        $data["foto"] = ($foto) ? $filename : '';
                        $data["ord"] = $q;

                        if($foto!="") {
                            $fotos->add($data);
                        }
                    }
                }
            }





            if($campeonatos->editResultJogo($data))
            {
                $_SESSION["mensagem"] = "Jogo editado com sucesso!";
            }
            else
            {
                $_SESSION["mensagem"] = "Erro ao editar o jogo! entrar com contato com desenvolvimento@ligataubate.com.br";
            }

            header("Location: ".BASE."campeonato/jogo_resultado/".$_POST["jogo_id"]);

        }

        if(isset($jogo_id))
        {
            $result = $campeonatos->getJogoById($jogo_id);

            $data["jogo_id"] = $jogo_id;

            $data["campeonato"] = $campeonatos->get($result["campeonato_id"]); 
            $data["fase"] = $result["fase"];
            $data["grupo"] = $result["grupo"];
            $data["rodada"] = $result["rodada"];
            
            $data["clube_1"] = $clubes->getById($result["clube_1"]);
            $data["result_clube_1"] = $result["result_clube_1"];
            $data["penal_clube_1"] = $result["penal_clube_1"];

            $data["clube_2"] = $clubes->getById($result["clube_2"]);
            $data["result_clube_2"] = $result["result_clube_2"];
            $data["penal_clube_2"] = $result["penal_clube_2"];
            
            $data["obs"] = $result["obs"];
            $data["realizado"] = $result["realizado"];

            $data["sumula_pg1"] = $fotos->getByRefId("sumula-pg1",$jogo_id);
            $data["sumula_pg2"] = $fotos->getByRefId("sumula-pg2",$jogo_id);
            $data["sumula_pg3"] = $fotos->getByRefId("sumula-pg3",$jogo_id);
            $data["sumula_delegado"] = $fotos->getByRefId("sumula-delegado",$jogo_id);
            $data["sumula_julgamento"] = $fotos->getLikeRefId("sumula-julgamento",$jogo_id);


            $data["ocorrencias_partida"] = $campeonatos->getAllOcorrenciasPartidaId($jogo_id);
            $data["atletas"] = $campeonatos->getAllAtletasPartidaId($jogo_id);

        }
        else
        {
            $data["jogo_id"] = 0;
        }


        $this->loadTemplateInPainel('campeonato/jogo_result', $data);
    }

    public function carrega_grupos()
    {

    	$u = new usuarios();
        $u->verificarLogin();

        $campeonatos = new campeonatos();



        if(isset($_POST["campeonato_id"]))
        {
        	$data["grupos"] = $campeonatos->getGruposByCampeonatoId($_POST["campeonato_id"]);

        	echo "<option value=''> Selecione o Grupo </option>";

        	foreach ($data["grupos"] as $gp) {

        			echo "<option value='".$gp["grupo"]."'> ".$gp["grupo"]."</option> ";
        	}
        }

    }

    public function carrega_clubes()
    {

    	$u = new usuarios();
        $u->verificarLogin();

        $campeonatos = new campeonatos();

        if(isset($_POST["campeonato_id"]) && isset($_POST["grupo"]))
        {
        	$data["clubes"] = $campeonatos->getClubesByCampeonatoIdAndGrupo($_POST["campeonato_id"], $_POST["grupo"]);

        	echo "<option value=''> Selecione o Clube </option>";

        	foreach ($data["clubes"] as $cl) {

        			echo "<option value='".$cl["clube_id"]."'> ".$cl["nome"]."</option> ";
        	}

        }

    }

    public function carrega_clubes_decisao()
    {

        $u = new usuarios();
        $u->verificarLogin();

        $campeonatos = new campeonatos();


        if(isset($_POST["campeonato_id"]))
        {
            $data["campeonato"] = $campeonatos->get($_POST["campeonato_id"]);
            $data["classificacao"] = $campeonatos->getClassificacaoById($_POST["campeonato_id"]);

            echo "<option value=''> Selecione o Clube </option>";

            foreach ($data["classificacao"] as $class) {

                   echo "<optgroup label='Grupo ".$class["grupo"]."'>";


                   $data["clubes"] = $campeonatos->getClubesByCampeonatoIdAndGrupo($_POST["campeonato_id"], $class["grupo"]);

                   $posicao = 1;


                   foreach($data["clubes"] as $clube)
                   {                              

                    


                    if($posicao<=(ceil($data["campeonato"]["clubes_proxima_fase"]/$data["campeonato"]["grupos"])))
                    {
                        echo "<option value='".$clube["clube_id"]."'>  ".$posicao."º - ".$clube["nome"]." ".$clube["PG"]."  [V]</option>";
                    }
                    else
                    {
                        echo "<option value='".$clube["clube_id"]."'> ".$posicao."º - ".$clube["nome"]." ".$clube["PG"]."  [x]</option>";
                    }
                     

                     $posicao++;

                   }

                   

                   echo "</optgroup>";



            }

        }


    }

    public function carrega_divs()
    {

        $u = new usuarios();
        $u->verificarLogin();

     
        if(isset($_POST["fase"]))
        {

            if($_POST["fase"]=="Grupo")
            {
            
            ?>

            <div class="form-group form-md-line-input" >
              <label class="col-md-3 control-label" for="grupo">
              <span class="required">*</span> Grupo:
              </label>  
              <div class="col-md-9">
                <select class="form-control" name="grupo" id="grupo" required onchange="carregaClubes(campeonato_id.value,this.value)" />

                <option value=""> Selecione </option>

                <?php if(isset($grupo)){?>

                <option selected value="<?php echo $grupo;?>"> <?php echo $grupo;?> </option>

                <?php } ?>


              </select>

              <div class="form-control-focus"> </div>
              <span class="help-block"></span>
              </div>
          </div>



            <div class="form-group form-md-line-input">
              <label class="col-md-3 control-label" for="rodada">
              <span class="required">*</span> Rodada:
              </label>  
              <div class="col-md-9">
                <select class="form-control" name="rodada" id="rodada" required />

                <option value=""> Selecione </option>

                    <?php if(isset($rodada)){?>

                    <option selected value="<?php echo $rodada;?>"> <?php echo $rodada;?> </option>

                    <?php } ?>


    
                    <?php for($rodada=1;$rodada<=20;$rodada++){?>
                    <option value='<?php echo $rodada;?>'> <?php echo $rodada;?> </option>
                    <?php } ?>
                        


              </select>

              <div class="form-control-focus"> </div>
              <span class="help-block"></span>
              </div>
          </div>

          <?php

            }
            elseif($_POST["fase"]=="Decisão")
            {
                ?>

                    <div class="form-group form-md-line-input" >
                          <label class="col-md-3 control-label" for="grupo">
                          <span class="required">*</span> Chave:
                          </label>  
                          <div class="col-md-9">
                            <select class="form-control" name="grupo" id="grupo" required onchange="" />

                            <option value=""> Selecione </option>

                            <?php if(isset($grupo)){?>

                            <option selected value="<?php echo $grupo;?>"> <?php echo $grupo;?> </option>

                            <?php } ?>

                
                                <option value="Chave 1"> Chave 1 </option>
                                <option value="Chave 2"> Chave 2 </option>
                                <option value="Chave 3"> Chave 3 </option>
                                <option value="Chave 4"> Chave 4 </option>
                                <option value="Chave 5"> Chave 5 </option>
                                <option value="Chave 6"> Chave 6 </option>
                                <option value="Chave 7"> Chave 7 </option>
                                <option value="Chave 8"> Chave 8 </option>

                          </select>

                          <div class="form-control-focus"> </div>
                          <span class="help-block"></span>
                          </div>
                      </div>




            <div class="form-group form-md-line-input" >
              <label class="col-md-3 control-label" for="rodada">
              <span class="required">*</span> Rodada:
              </label>  
              <div class="col-md-9">
                <select class="form-control" name="rodada" id="rodada" required />

                <option value=""> Selecione </option>

                    <?php if(isset($rodada)){?>

                    <option selected value="<?php echo $rodada;?>"> <?php echo $rodada;?> </option>

                    <?php } ?>


                        <!--JOGO ÚNICO-->
                        <optgroup label="Jogo único">
                            
                            <option value='b8'> Oitavas de final</option>
                            
                            <option value='b4'> Quartas de final</option>
                            
                            <option value='b2'> Semi-final</option>

                              <option value='c1'> 3º Lugar - Jogo único</option>
                            
                            <option value='b1'> Final</option>
                        </optgroup>
                            
                            <!--JOGO IDA E VOLTA-->
                        <optgroup label="Ida e Volta">
                            
                            <option value='b8b1'> Oitavas de final - Jogo ida</option>
                            
                            <option value='b8b2'> Oitavas de final - Jogo volta</option>
                            
                            
                            <option value='b4b1'> Quartas de final - Jogo ida</option>
                            
                            <option value='b4b2'> Quartas de final - Jogo volta</option>
                            
                            
                            <option value='b2b1'> Semi-final - Jogo ida</option>
                            
                            <option value='b2b2'> Semi-final - Jogo volta</option>



                             <option value='c1c1'> 3º Lugar - Jogo ida</option>
                            
                            <option value='c1c2'> 3º Lugar - Jogo volta</option>

                            
                            
                            <option value='b1b1'> Final - Jogo ida</option>
                            
                            <option value='b1b2'> Final - Jogo volta</option>
                        </optgroup>
                                            


              </select>

              <div class="form-control-focus"> </div>
              <span class="help-block"></span>
              </div>
          </div>




                <?php
            }
        }

    }

    //Esta função carrega a Súmula
    public function sumula()
    {
        $u = new usuarios();
        $u->verificarLogin();
        
        $atletas = new atletas();

        $campeonatos = new campeonatos();

        $data = array();
        /*
        $sql = "SELECT jogo.*, campeonato.nome AS campeonato_nome, campeonato.temporada AS campeonato_temporada FROM jogo
        INNER JOIN campeonato ON jogo.campeonato_id = campeonato.campeonato_id 
        WHERE ";
        */

        $id = " WHERE ";

        foreach($_POST["checked"] as $jogo_id)
        {
            $id .= " (jogo.jogo_id = '".$jogo_id."') OR";
        }

        $id = substr($id,0,-2);

        $data["sumulas"] = $campeonatos->getAllJogos($id);

        $this->loadViewInTemplate('painel/sumula', $data); 
    }



    public function sumula_delegado()
    {
        $u = new usuarios();
        $u->verificarLogin();

        $atletas = new atletas();

        $campeonatos = new campeonatos();

        $data = array();

        
        /*

        $sql = "SELECT jogo.*, campeonato.nome AS campeonato_nome, campeonato.temporada AS campeonato_temporada FROM jogo

        INNER JOIN campeonato ON jogo.campeonato_id = campeonato.campeonato_id 

        


        WHERE ";

        */

        $id = " WHERE ";


        foreach($_POST["checked"] as $jogo_id)
        {

            $id .= " (jogo.jogo_id = '".$jogo_id."') OR";

        }

        $id = substr($id,0,-2);


        $data["sumulas"] = $campeonatos->getAllJogos($id);

        $this->loadViewInTemplate('painel/sumula_delegado', $data); 


    }

}

?>