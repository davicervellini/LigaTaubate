<?php
class painelController extends controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $u = new usuarios();
        $u->verificarLogin();

        $data = array();

        $this->loadTemplateInPainel('painel/home', $data);
    }

    /*
  FUNÇÕES LOGIN E LOGOUT
*/
    public function login()
    {
        $data = array(
            'erro' => ''
        );

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['senha']);

            $u = new usuarios();
            $data['erro'] = $u->logar($email, $senha);
        }

        $this->loadView("painel/login", $data);
    }

    public function login_admin()
    {
        $data = array(
            'erro' => ''
        );

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $senha = md5($_POST['senha']);

            $u = new usuarios();
            $data['erro'] = $u->logar($email, $senha);
        }

        $this->loadView("painel/login_admin", $data);
    }

    public function logout()
    {
        unset($_SESSION['lgpainel']);
        header("Location: " . BASE . "painel/login");
        exit;
    }

    public function verifica_login()
    {
        $u = new usuarios();
        if (!$u->verificarLogin()) {
            header("Location: " . BASE . "painel/erro");
        }
    }

    /*
  FUNÇÃO ERRO
*/
    public function erro()
    {
        $data = array();

        $this->loadTemplateInPainel('painel/erro', $data);
    }

    /*
  FUNÇÃO CLUBES
*/
    public function clubes()
    {

        $this->verifica_login();

        $data = array();

        $clubes = new clubes();

        $data['clubes'] = $clubes->get();

        $this->loadTemplateInPainel('painel/clube_list', $data);
    }

    public function clube_add($id = null)
    {
        $this->verifica_login();

        $clubes = new clubes();

        $fotos = new fotos();

        $estadios = new estadios();

        $data = array();

        if (isset($_POST["nome"])) {

            if (isset($_FILES['escudo']) && $_FILES['escudo']['name'] != "") {
                //exclui escudo antiga
                if (isset($_POST["escudo_id"])) {
                    unlink("assets/images/escudos/" . $_POST["escudo_id"]);
                }

                $nomedoarquivo = md5($_FILES['escudo']['name'] . time() . rand(0, 999)) . '.jpg';
                $escudo = move_uploaded_file($_FILES['escudo']['tmp_name'], 'assets/images/escudos/' . $nomedoarquivo);

                $data["escudo"] = ($escudo) ? $nomedoarquivo : '';
            } else {
                $data["escudo"] = $_POST["escudo_id"];
            }

            if ($_POST["clube_id"] == 0) {

                $data["nome"] = $_POST["nome"];
                $data["nickname"] = $_POST["nickname"];
                $data["email"] = $_POST["email"];
                $data["sigla"] = $_POST["sigla"];
                $data["estadio_id"] = $_POST["estadio_id"];
                $data["fundacao"] = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["fundacao"])));
                $data["presidente"] = $_POST["presidente"];
                $data["representante_1"] = $_POST["representante_1"];
                $data["representante_2"] = $_POST["representante_2"];
                $data["site"] = $_POST["site"];
                $data["fanpage"] = $_POST["fanpage"];


                $clube_id = $clubes->add($data);

                $_SESSION["msg"] = "Cadastro realizado com sucesso!";

                header("Location: " . BASE . "painel/clubes");
            } else {
                $data["nome"] = $_POST["nome"];
                $data["clube_id"] = $_POST["clube_id"];
                $data["nickname"] = $_POST["nickname"];
                $data["email"] = $_POST["email"];
                $data["sigla"] = $_POST["sigla"];
                $data["estadio_id"] = $_POST["estadio_id"];
                $data["fundacao"] = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["fundacao"])));
                $data["presidente"] = $_POST["presidente"];
                $data["representante_1"] = $_POST["representante_1"];
                $data["representante_2"] = $_POST["representante_2"];
                $data["site"] = $_POST["site"];
                $data["fanpage"] = $_POST["fanpage"];

                $data["senha"] = $_POST["senha"];


                $clubes->edit($data);

                $_SESSION["msg"] = "Clube {$_POST["nome"]} editado com sucesso!";

                header("Location: " . BASE . "painel/clube_add/" . $data["clube_id"]);
            }
        }

        if (isset($id)) {
            $result = $clubes->getById($id);

            $data["clube_id"] = $result["clube_id"];
            $data["nome"] = $result["nome"];
            $data["escudo"] = $result["escudo"];
            $data["nickname"] = $result["nickname"];
            $data["email"] = $clubes->getEmailById($id);
            $data["sigla"] = $result["sigla"];
            $data["estadios"] = $estadios->getAll();

            $data["estadio"] = $estadios->getByClubeId($result["clube_id"]);

            $data["fundacao"] = date('d/m/Y', strtotime($result["fundacao"]));
            $data["presidente"] = $result["presidente"];
            $data["representante_1"] = $result["representante_1"];
            $data["representante_2"] = $result["representante_2"];
            $data["site"] = $result["site"];
            $data["fanpage"] = $result["fanpage"];
        } else {
            $data["clube_id"] = 0;
            $data["nome"] = "";
            $data["escudo"] = "";
            $data["nickname"] = "";
            $data["email"] = "";
            $data["sigla"] = "";
            $data["estadios"] = $estadios->getAll();
            $data["estadio"] = array();
            $data["fundacao"] = "";
            $data["presidente"] = "";
            $data["representante_1"] = "";
            $data["representante_2"] = "";
            $data["site"] = "";
            $data["fanpage"] = "";
        }
        $this->loadTemplateInPainel('painel/clube_form', $data);
    }

    public function clubes_off()
    {
        $this->verifica_login();

        $clubes = new clubes();

        $msg = "";

        unset($_SESSION["msg"]);

        foreach ($_POST["checked"] as $clube_id) {
            $clubes->delete($clube_id);
            $msg .= "Clube" . $clube_id . " desativado <br />";
        }

        $_SESSION["msg"] = $msg;

        header("location: " . BASE . "painel/clubes");
    }

    public function clube_del($id = null)
    {
        $this->verifica_login();

        unset($_SESSION["msg"]);

        $clubes = new clubes();

        if ($clubes->delete($id)) {
            $_SESSION["msg"] = "Clube {$id} desativado com sucesso!";
        } else {
            $_SESSION["msg"] = "Erro ao excluir Clube!";
        }



        header("location: " . BASE . "painel/clubes");
    }

    /*
  FUNÇÃO NOTICIAS
*/
    public function noticias()
    {
        $this->verifica_login();

        $data = array();

        $noticias = new noticias();
        $data['noticias'] = $noticias->get();

        $this->loadTemplateInPainel('painel/noticia_list', $data);
    }

    public function noticia_add($id = null)
    {
        $this->verifica_login();

        $data = array();
        $noticias = new noticias();
        $categorias = new categorias();
        $fotos = new fotos();

        unset($_SESSION["msg"]);

        if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
            $data["titulo"] = addslashes($_POST['titulo']);
            $data["url"] = addslashes($_POST['url']);
            $data["corpo"] = utf8_decode(addslashes($_POST['corpo']));
            $data["video_youtube"] = $_POST['video_youtube'];
            $data["categoria_id"] = $_POST['categoria_id'];
            $data["tipo_noticia"] = $_POST['tipo_noticia'];


            if (isset($_FILES['foto_principal']) && $_FILES['foto_principal']['name'] != "") {
                if (isset($_POST["foto_principal_id"])) {
                    unlink("assets/images/noticias/" . $_POST["foto_principal_id"]);
                }

                $nomedoarquivo = md5($_FILES['foto_principal']['name'] . time() . rand(0, 999)) . '.jpg';
                $foto_principal = move_uploaded_file($_FILES['foto_principal']['tmp_name'], 'assets/images/noticias/' . $nomedoarquivo);
                $data["foto_principal"] = $nomedoarquivo;
            } else {
                $data["foto_principal"] = $_POST["foto_principal_id"];
            }


            if ($_POST["noticia_id"] == 0) {
                $data["noticia_id"] = $noticias->add($data);
                $_SESSION["msg"] = "Cadastro realizado com sucesso!";
            } else {

                $data["noticia_id"] = $_POST["noticia_id"];
                $noticias->edit($data);
                $_SESSION["msg"] = "Noticia {$_POST["titulo"]} editada com sucesso!";
            }

            if (isset($_FILES['galeria'])) {

                if (count($_FILES['galeria']['tmp_name']) > 0) {

                    for ($q = 0; $q < count($_FILES['galeria']['tmp_name']); $q++) {

                        $nomedoarquivo = md5($_FILES['galeria']['name'][$q] . time() . rand(0, 999)) . '.jpg';

                        $foto = move_uploaded_file($_FILES['galeria']['tmp_name'][$q], 'assets/images/galerias/' . $nomedoarquivo);

                        $data["ref"] = 'noticia';
                        $data["parent"] = $data["noticia_id"];
                        $data["foto"] = ($foto) ? $nomedoarquivo : '';
                        $data["ord"] = $q;

                        if ($foto != "") {
                            $fotos->add($data);
                        }
                    }
                }
            }

            if ($_POST["noticia_id"] != 0) {
                header("Location: " . BASE . "painel/noticia_add/" . $_POST["noticia_id"]);
            } else {
                header("Location: " . BASE . "painel/noticias");
            }
        }

        $data["categorias"] = $categorias->get(0);

        if (isset($id)) {
            $result = $noticias->getById($id);

            $data["noticia_id"] = $result["noticia_id"];
            $data["titulo"] = $result["titulo"];
            $data["url"] = $result["url"];
            $data["corpo"] = $result["corpo"];
            $data["video_youtube"] = $result["video_youtube"];
            $data["categoria_id"] = $result["categoria_id"];
            $data["tipo_noticia"] = $result["tipo_noticia"];
            $data["foto_principal"] = $result["foto_principal"];
            $data["categoria_titulo"] = $result["categoria_titulo"];

            $data["galeria"] = $fotos->getByRefId("noticia", $result["noticia_id"]);
        } else {
            $data["noticia_id"] = 0;
            $data["titulo"] = "";
            $data["url"] = "";
            $data["corpo"] = "";
            $data["video_youtube"] = "";
            $data["tipo_noticia"] = "";
            $data["foto_principal"] = "";
            $data["galeria"] = array();
        }

        $this->loadTemplateInPainel('painel/noticia_form', $data);
    }

    public function noticia_del($id)
    {
        $this->verifica_login();

        $noticias = new noticias();

        unset($_SESSION["msg"]);

        if (isset($id)) {
            if ($noticias->delete($id)) {
                $_SESSION["msg"] = "Noticia excluida com sucesso!";
            } else {
                $_SESSION["msg"] = "Erro ao excluir Noticia!";
            }
        }

        header("Location: " . BASE . "painel/noticias");
    }

    public function noticias_off()
    {
        $this->verifica_login();

        $noticias = new noticias();

        $msg = "";

        unset($_SESSION["msg"]);

        foreach ($_POST["checked"] as $noticia_id) {
            $noticias->delete($noticia_id);
            $msg .= "Noticia" . $noticia_id . " desativada <br />";
        }

        $_SESSION["msg"] = $msg;

        header("location: " . BASE . "painel/noticias");
    }

    /*
  FUNÇÃO INFORMATIVOS
*/
    public function informativos()
    {
        $this->verifica_login();

        $data = array();

        $informativos = new informativos();
        $data['informativos'] = $informativos->get();

        $this->loadTemplateInPainel('painel/informativo_list', $data);
    }

    public function informativo_add($id = null)
    {
        $this->verifica_login();

        $data = array();
        $informativos = new informativos();
        $categorias = new categorias();

        unset($_SESSION["msg"]);

        if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {

            $data["titulo"] = addslashes($_POST['titulo']);
            $data["url"] = addslashes($_POST['url']);
            $data["corpo"] = addslashes($_POST['corpo']);
            $data["categoria_id"] = $_POST['categoria_id'];


            if ($_POST["informativo_id"] == 0) {
                $informativos->add($data);
                $_SESSION["msg"] = "Cadastro realizado com sucesso!";

                header("Location: " . BASE . "painel/informativos");
            } else {
                $data["informativo_id"] = $_POST["informativo_id"];
                $informativos->edit($data);
                $_SESSION["msg"] = "Informativo {$_POST["titulo"]} editada com sucesso!";

                header("Location: " . BASE . "painel/informativo_add/" . $_POST["informativo_id"]);
            }
        }

        $data["categorias"] = $categorias->get();

        if (isset($id)) {
            $result = $informativos->getById($id);

            $data["informativo_id"] = $result["informativo_id"];
            $data["titulo"] = $result["titulo"];
            $data["url"] = $result["url"];
            $data["corpo"] = $result["corpo"];
            $data["categoria_id"] = $result["categoria_id"];
            $data["categoria_titulo"] = $result["categoria_titulo"];
        } else {
            $data["informativo_id"] = 0;
            $data["titulo"] = "";
            $data["url"] = "";
            $data["corpo"] = "";
        }

        $this->loadTemplateInPainel('painel/informativo_form', $data);
    }

    public function informativo_del($id)
    {
        $this->verifica_login();

        $informativos = new informativos();

        unset($_SESSION["msg"]);

        if (isset($id)) {
            if ($informativos->delete($id)) {
                $_SESSION["msg"] = "Informativo excluido com sucesso!";
            } else {
                $_SESSION["msg"] = "Erro ao excluir Informativo!";
            }
        }

        header("Location: " . BASE . "painel/informativos");
    }

    public function informativos_off()
    {
        $this->verifica_login();

        $informativos = new informativos();

        $msg = "";

        unset($_SESSION["msg"]);

        foreach ($_POST["checked"] as $informativo_id) {
            $informativos->delete($informativo_id);
            $msg .= "Informativo" . $informativo_id . " desativado <br />";
        }

        $_SESSION["msg"] = $msg;

        header("location: " . BASE . "painel/informativos");
    }

    /*
  FUNÇÃO CATEGORIAS
*/
    public function categorias()
    {
        $this->verifica_login();

        $data = array();

        $categorias = new categorias();
        $data['categorias'] = $categorias->get();

        $this->loadTemplateInPainel('painel/categoria_list', $data);
    }

    public function categoria_add($id = null)
    {
        $this->verifica_login();

        $data = array();
        $categorias = new categorias();

        $data['categorias'] = $categorias->get();

        unset($_SESSION["msg"]);

        if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
            $data["titulo"] = addslashes($_POST['titulo']);
            $data["url"] = addslashes($_POST['url']);
            $data["corpo"] = addslashes($_POST['corpo']);
            $data["status"] = $_POST["status"];



            if ($_POST["categoria_id"] == 0) {
                $categorias->add($data);
                $_SESSION["msg"] = "Cadastro realizado com sucesso!";
            } else {
                $data["categoria_id"] = $_POST["categoria_id"];
                $categorias->edit($data);
                $_SESSION["msg"] = "Categoria {$_POST["titulo"]} editada com sucesso!";
                $data["status"] = $_POST["status"];
            }

            header("Location: " . BASE . "painel/categorias");
        }

        if (isset($id)) {
            $result = $categorias->getById($id);

            $data["categoria_id"] = $result["categoria_id"];
            $data["titulo"] = $result["titulo"];
            $data["url"] = $result["url"];
            $data["corpo"] = $result["corpo"];
            $data["status"] = $result["status"];
        } else {
            $data["categoria_id"] = 0;
            $data["titulo"] = "";
            $data["url"] = "";
            $data["corpo"] = "";
            $data["status"] = "";
        }

        $this->loadTemplateInPainel('painel/categoria_form', $data);
    }

    public function categoria_del($id)
    {
        $this->verifica_login();

        $categorias = new categorias();

        unset($_SESSION["msg"]);

        if (isset($id)) {
            if ($categorias->delete($id)) {
                $_SESSION["msg"] = "Categoria excluida com sucesso!";
            } else {
                $_SESSION["msg"] = "Erro ao excluir categoria!";
            }
        }

        header("Location: " . BASE . "painel/categorias");
    }

    public function categorias_off()
    {
        $this->verifica_login();

        $categorias = new categorias();

        $msg = "";

        unset($_SESSION["msg"]);

        foreach ($_POST["checked"] as $categoria_id) {
            $categorias->delete($categoria_id);
            $msg .= "Categoria" . $categoria_id . " desativada <br />";
        }

        $_SESSION["msg"] = $msg;

        header("location: " . BASE . "painel/categorias");
    }

    /*
FUNÇÃO EXCLUI FOTO
*/
    public function exclui_foto($foto_id)
    {
        $this->verifica_login();

        $fotos = new fotos();

        if (isset($foto_id)) {

            $foto = $fotos->getById($foto_id);

            unlink("assets/images/galerias/" . $foto["foto"]);

            $fotos->del($foto_id);

            header("location: " . BASE . "painel/noticia_add/" . $foto["parent"]); //futuramente trocar este trecho
        }
    }

    /*
FUNÇÃO ATLETAS
*/
    public function atletas($clube_id = null)
    {

        $this->verifica_login();

        $data = array();

        $atletas = new atletas();


        if (isset($clube_id)) {
            $data['atletas'] = $atletas->getByClubeId($clube_id);
            $data["clube_id"] = $clube_id;
        } else {
            $data['atletas'] = $atletas->get();
            $data["clube_id"] = 0;
        }



        $this->loadTemplateInPainel('painel/atleta_list', $data);
    }

    public function atletas_novo()
    {
        $this->verifica_login();

        $data = array();

        $atletas = new atletas();

        $data['atletas'] = $atletas->getNewEntries();
        $data["clube_id"] = 0;
        


        $this->loadTemplateInPainel('painel/atleta_list_new', $data);
    }

    public function verifica_atleta($doc, $funcao)
    {
        $this->verifica_login();

        $atletas = new atletas();

        $status_atleta = $atletas->getByDoc($doc, $funcao);


        $url_retorno = $_POST["url_retorno"];



        if ($status_atleta != false) {

            echo 'Atleta já esta cadastrado! <a href="' . $url_retorno . '/' . $status_atleta["atleta_id"] . '"> clique aqui </a> para finalizar a inscrição';
            echo "<input type='hidden' id='verifica' value='1' />";
        } else {
            echo "<input type='hidden' id='verifica' value='0' />";
        }
    }
    
   


    public function atleta_add($clube_id = null, $id = null, $rotacao_imagem = false)
    {
        $this->verifica_login();
        if ($rotacao_imagem) {

            /*$image = WideImage::load("assets/images/atletas/".$rotacao_imagem);

            $image = $image->rotate(90);

            $image->saveToFile("assets/images/atletas/".$rotacao_imagem);
            /*
            header("Pragma: no-cache");
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-cache, cachehack=".time());
            header("Cache-Control: no-store, must-revalidate");
            header("Cache-Control: post-check=-1, pre-check=-1", false);
           
            @clearstatcache();
             */
            header("location: " . BASE . "painel/atleta_add/" . $clube_id . "/" . $id);
        } else {
            $atletas = new atletas();
            $fotos = new fotos();
            $clubes = new clubes();
            $campeonatos = new campeonatos();
            $data = array();


            if (isset($_POST["nome"])) {
                $cpf = $_POST['cpf'];
                $currentYear = date('Y');

                if (!$_POST["atleta_id"]) { //É um novo atleta

                    //VERIFICA SE O CPF JA EXISTE
                    if($atletas->verificaCPF($cpf)){
                        $_SESSION["msg_erro_cpf"] = "CPF já cadastrado e ativo em " . $currentYear . "! 😞";
                        header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
                        die();
                    }
                     //CPF VALIDO
                     if($atletas->validaCPF($cpf) === false){
                        $_SESSION["msg_cpf_invalido"] = "CPF Inválido, fornece um CPF válido! ";
                        header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
                        die();
                    }


                    if (!$_FILES['anexo_residencia'] || !$_FILES['anexo_residencia']['name']) {
                        $_SESSION["msg"] = "O anexo do comprovante de residência é obrigatório";

                        header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");

                        die();
                    }
                    if ((!$_FILES['anexo_cnh'] || !$_FILES['anexo_cnh']['name']) && ((!$_FILES['anexo_rg'] || !$_FILES['anexo_rg']['name']) || (!$_FILES['anexo_cpf'] || !$_FILES['anexo_cpf']['name']))) {
                        $_SESSION["msg"] = "O anexo dos documentos pessoais (CNH ou RG + CPF) é obrigatório";

                        header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");

                        die();
                    }
                  

                } else { //É um atleta existente
                    if ((!$_FILES['anexo_residencia'] || !$_FILES['anexo_residencia']['name']) && !$_POST["anexo_residencia_id"]) {
                        $_SESSION["msg"] = "O anexo do comprovante de residência é obrigatório";

                        header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $data["atleta_id"]);

                        die();
                    }
                    if (((!$_FILES['anexo_cnh'] || !$_FILES['anexo_cnh']['name']) && !$_POST['anexo_cnh_id']) && (((!$_FILES['anexo_rg'] || !$_FILES['anexo_rg']['name']) && !$_POST['anexo_rg_id']) || ((!$_FILES['anexo_cpf'] || !$_FILES['anexo_cpf']['name']) && !$_POST['anexo_cpf_id']))) {
                        $_SESSION["msg"] = "O anexo dos documentos pessoais (CNH ou RG + CPF) é obrigatório";

                        header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $data["atleta_id"]);

                        die();
                    }
                }

                if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {
                    //exclui foto antiga
                    if (isset($_POST["foto_id"])) {
                        unlink("assets/images/atletas/" . $_POST["foto_id"]);
                    }

                    $nomedoarquivo = md5($_FILES['foto']['name'] . time() . rand(0, 999)) . '.jpg';
                    $foto = move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/images/atletas/' . $nomedoarquivo);

                    /*redimensionar imagem*/

                    /*$image = WideImage::load('assets/images/atletas/'.$nomedoarquivo);

                    $image = $image->resize(800);

                    $image->saveToFile('assets/images/atletas/'.$nomedoarquivo);

                    /*fim*/

                    $data["foto"] = ($foto) ? $nomedoarquivo : '';
                } else {
                    $data["foto"] = $_POST["foto_id"];
                }

                //Upload comprovante de residência
                if (isset($_FILES['anexo_residencia']) && $_FILES['anexo_residencia']['name'] != "") {
                    //exclui foto antiga
                    if (isset($_POST["anexo_residencia_id"])) {
                        unlink("assets/images/atletas/docs/" . $_POST["anexo_residencia_id"]);
                    }

                    $file_parts = pathinfo($_FILES['anexo_residencia']['name']);

                    if (!in_array($file_parts['extension'], ["pdf"])) {
                        $_SESSION["msg"] = "Os anexos dos documentos precisam ser no formato PDF";

                        if ($_POST["atleta_id"] == 0) {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
                        } else {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $data["atleta_id"]);
                        }

                        die();
                    }

                    if ($_FILES['anexo_residencia']['size'] > 2097152) {
                        $_SESSION['msg'] = "O anexo do comprovante de residência não pode ser maior que 2MB";

                        if ($_POST["atleta_id"] == 0) {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
                        } else {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $data["atleta_id"]);
                        }

                        die();
                    }

                    $nomedoarquivo = md5($_FILES['anexo_residencia']['name'] . time() . rand(0, 999)) . '.' . $file_parts['extension'];
                    $comprovante_residencia = move_uploaded_file($_FILES['anexo_residencia']['tmp_name'], 'assets/images/atletas/docs/' . $nomedoarquivo);

                    $data["anexo_residencia"] = ($comprovante_residencia) ? $nomedoarquivo : '';
                } else {
                    $data["anexo_residencia"] = $_POST["anexo_residencia_id"];
                }

                if (isset($_FILES['anexo_cnh']) && $_FILES['anexo_cnh']['name'] != "") {

                    if (isset($_POST["anexo_cnh_id"])) {
                        unlink("assets/images/atletas/docs/" . $_POST["anexo_cnh_id"]);
                    }

                    $file_parts = pathinfo($_FILES['anexo_cnh']['name']);

                    if (!in_array($file_parts['extension'], ["pdf"])) {
                        $_SESSION["msg"] = "Os anexos dos documentos precisam ser no formato PDF";

                        if ($_POST["atleta_id"] == 0) {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
                        } else {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $data["atleta_id"]);
                        }

                        die();
                    }

                    if ($_FILES['anexo_cnh']['size'] > 2097152) {
                        $_SESSION['msg'] = "O anexo da CNH não pode ser maior que 2MB";

                        if ($_POST["atleta_id"] == 0) {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
                        } else {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $data["atleta_id"]);
                        }

                        die();
                    }

                    $nomedoarquivo = md5($_FILES['anexo_cnh']['name'] . time() . rand(0, 999)) . '.' . $file_parts['extension'];
                    $cnh = move_uploaded_file($_FILES['anexo_cnh']['tmp_name'], 'assets/images/atletas/docs/' . $nomedoarquivo);

                    $data["anexo_cnh"] = ($cnh) ? $nomedoarquivo : '';
                } else {
                    $data["anexo_cnh"] = $_POST['anexo_cnh_id'];
                }


                if (isset($_FILES['anexo_rg']) && $_FILES['anexo_rg']['name'] != "") {

                    if (isset($_POST["anexo_rg_id"])) {
                        unlink("assets/images/atletas/docs/" . $_POST["anexo_rg_id"]);
                    }

                    $file_parts = pathinfo($_FILES['anexo_rg']['name']);
                    if (!in_array($file_parts['extension'], ["pdf"])) {
                        $_SESSION["msg"] = "Os anexos dos documentos precisam ser no formato PDF";

                        if ($_POST["atleta_id"] == 0) {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
                        } else {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $data["atleta_id"]);
                        }

                        die();
                    }

                    if ($_FILES['anexo_rg']['size'] > 2097152) {
                        $_SESSION['msg'] = "O anexo do RG não pode ser maior que 2MB";

                        if ($_POST["atleta_id"] == 0) {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
                        } else {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $data["atleta_id"]);
                        }

                        die();
                    }

                    $nomedoarquivo = md5($_FILES['anexo_rg']['name'] . time() . rand(0, 999)) . '.' . $file_parts['extension'];
                    $rg = move_uploaded_file($_FILES['anexo_rg']['tmp_name'], 'assets/images/atletas/docs/' . $nomedoarquivo);

                    $data["anexo_rg"] = ($rg) ? $nomedoarquivo : '';
                } else {
                    $data["anexo_rg"] = $_POST['anexo_rg_id'];
                }


                if (isset($_FILES['anexo_cpf']) && $_FILES['anexo_rg']['name'] != "") {

                    if (isset($_POST["anexo_cpf_id"])) {
                        unlink("assets/images/atletas/docs/" . $_POST["anexo_cpf_id"]);
                    }

                    $file_parts = pathinfo($_FILES['anexo_cpf']['name']);
                    if (!in_array($file_parts['extension'], ["pdf"])) {
                        $_SESSION["msg"] = "Os anexos dos documentos precisam ser no formato PDF";

                        if ($_POST["atleta_id"] == 0) {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
                        } else {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $data["atleta_id"]);
                        }

                        die();
                    }

                    if ($_FILES['anexo_cpf']['size'] > 2097152) {
                        $_SESSION['msg'] = "O anexo do CPF não pode ser maior que 2MB";

                        if ($_POST["atleta_id"] == 0) {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
                        } else {
                            header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $data["atleta_id"]);
                        }

                        die();
                    }

                    $nomedoarquivo = md5($_FILES['anexo_cpf']['name'] . time() . rand(0, 999)) . '.' . $file_parts['extension'];
                    $cpf = move_uploaded_file($_FILES['anexo_cpf']['tmp_name'], 'assets/images/atletas/docs/' . $nomedoarquivo);

                    $data["anexo_cpf"] = ($cpf) ? $nomedoarquivo : '';
                } else {
                    $data["anexo_cpf"] = $_POST['anexo_cpf_id'];
                }



                if ($_POST["atleta_id"] == 0) {

                    $data["clube_id"] = $_POST["clube_id"];
                    $data["campeonato_id"] = $_POST["campeonato_id"];
                    $data["nome"] = $_POST["nome"];
                    $data["apelido"] = $_POST["apelido"];

                    $data["funcao"] = $_POST["funcao"];
                    $data["nascimento"] = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["nascimento"])));
                    $data["natural_cidade"] = $_POST["natural_cidade"];
                    $data["natural_estado"] = $_POST["natural_estado"];
                    $data["rg"] = $_POST["rg"];
                    $data["cpf"] = $_POST["cpf"];
                    $data["cref"] = isset($_POST["cref"]) ? $_POST["cref"] : '';
                    $data["nome_pai"] = $_POST["nome_pai"];
                    $data["nome_mae"] = $_POST["nome_mae"];
                    $data["cep"] = $_POST["cep"];
                    $data["endereco"] = $_POST["endereco"];
                    $data["bairro"] = $_POST["bairro"];
                    $data["cidade"] = $_POST["cidade"];
                    $data["estado"] = $_POST["estado"];
                    $data["email"] = $_POST["email"];
                    $data["celular"] = $_POST["celular"];

                   

                    $atleta_id = $atletas->add($data);


                    if (!$atleta_id) {
                        $_SESSION["msg_erro"] = "Limite de inscrições para atletas atingido!";
                        header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/");
?>
                        <script>
                            alert("O limite de inscrições para atletas deste clube neste campeonato foi atingido. Verifique as inscrições e tente novamente.")
                        </script>
<?php
                    } else {
                        $_SESSION["msg_success"] = "Cadastro realizado com sucesso!";
                        header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $atleta_id);
                    }
                } else {
                    $data["atleta_id"] = $_POST["atleta_id"];
                    $data["clube_id"] = $_POST["clube_id"];
                    $data["campeonato_id"] = $_POST["campeonato_id"];
                    $data["nome"] = $_POST["nome"];
                    $data["apelido"] = $_POST["apelido"];

                    $data["funcao"] = $_POST["funcao"];
                    $data["nascimento"] = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["nascimento"])));
                    $data["natural_cidade"] = $_POST["natural_cidade"];
                    $data["natural_estado"] = $_POST["natural_estado"];
                    $data["rg"] = $_POST["rg"];
                    $data["cpf"] = $_POST["cpf"];
                    $data["cref"] = isset($_POST["cref"]) ? $_POST["cref"] : '';
                    $data["nome_pai"] = $_POST["nome_pai"];
                    $data["nome_mae"] = $_POST["nome_mae"];
                    $data["cep"] = $_POST["cep"];
                    $data["endereco"] = $_POST["endereco"];
                    $data["bairro"] = $_POST["bairro"];
                    $data["cidade"] = $_POST["cidade"];
                    $data["estado"] = $_POST["estado"];
                    $data["email"] = $_POST["email"];
                    $data["celular"] = $_POST["celular"];


                    $atletas->edit($data);

                    $_SESSION["msg"] = "Atleta {$_POST["nome"]} editado com sucesso!";

                    header("location: " . BASE . "painel/atleta_add/" . $_POST["clube_id"] . "/" . $data["atleta_id"]);
                }
            }

            if (isset($id)) {
                $result = $atletas->getById($id);

                $data["atleta_id"] = $result["atleta_id"];
                $data["foto"] = $result["foto"];
                $data["clube_info"] = $clubes->getById($result["clube_id"]);
                $data["inscricao_info"] = $atletas->getInscricaoByIdAtleta($result["atleta_id"]);
                $data["campeonatos"] = $campeonatos->getAll();
                $data["nome"] = $result["nome"];
                $data["apelido"] = $result["apelido"];

                $data["funcao"] = $result["funcao"];
                $data["nascimento"] = date('d/m/Y', strtotime($result["nascimento"]));
                $data["natural_cidade"] = $result["natural_cidade"];
                $data["natural_estado"] = $result["natural_estado"];
                $data["rg"] = $result["rg"];
                $data["anexo_rg"] = $result["anexo_rg"];
                $data["cpf"] = $result["cpf"];
                $data["anexo_cpf"] = $result["anexo_cpf"];
                $data["anexo_cnh"] = $result["anexo_cnh"];
                $data["anexo_residencia"] = $result["anexo_residencia"];
                $data["cref"] = $result["cref"];
                $data["nome_pai"] = $result["nome_pai"];
                $data["nome_mae"] = $result["nome_mae"];
                $data["cep"] = $result["cep"];
                $data["endereco"] = $result["endereco"];
                $data["bairro"] = $result["bairro"];
                $data["cidade"] = $result["cidade"];
                $data["estado"] = $result["estado"];
                $data["email"] = $result["email"];
                $data["celular"] = $result["celular"];
            } else {
                $data["atleta_id"] = 0;
                $data["foto"] = "";

                $data["clube_info"] = "";

                $data["inscricao_info"] = array();
                $data["campeonatos"] = $campeonatos->getAll();
                $data["nome"] = "";
                $data["apelido"] = "";

                $data["funcao"] = "";
                $data["nascimento"] = "";
                $data["natural_cidade"] = "";
                $data["natural_estado"] = "";
                $data["rg"] = "";
                $data["anexo_rg"] = "";
                $data["cpf"] = "";
                $data["anexo_cpf"] = "";
                $data["anexo_cnh"] = "";
                $data["anexo_residencia"] = "";
                $data["cref"] = "";
                $data["nome_pai"] = "";
                $data["nome_mae"] = "";
                $data["cep"] = "";
                $data["endereco"] = "";
                $data["bairro"] = "";
                $data["cidade"] = "";
                $data["estado"] = "";
                $data["email"] = "";
                $data["celular"] = "";
            }


            if ($clube_id == 0) //verificação necessaria para o admin dos clubes
            {
                $data["clubes"] = $clubes->get();
            } else {
                $data["clubes"] = $clubes->getById($clube_id);
                $data["clube_info"] = $clubes->getById($clube_id);
            }


            $this->loadTemplateInPainel('painel/atleta_form', $data);
        }
    }


    public function atletas_off()
    {

        $this->verifica_login();


        $atletas = new atletas();

        $msg = "";

        unset($_SESSION["msg"]);

        $msg = "Atletas desativados";

        foreach ($_POST["checked"] as $cx) {
            $explode = explode("/", $cx);

            // $atletas->delete($explode[2]);
            $msg .= " " . $explode[2] . ",";
        }

        $msg = substr($msg, 0, -1);

        $_SESSION["msg"] = $msg;

        header("location: " . BASE . "painel/atletas");
    }

    public function atleta_del($id = null)
    {

        $this->verifica_login();

        unset($_SESSION["msg"]);

        $atletas = new atletas();

        if ($atletas->delete($id)) {
            $_SESSION["msg"] = "Atleta {$id} desativado com sucesso!";
        } else {
            $_SESSION["msg"] = "Erro ao desativar Atleta!";
        }



        header("location: " . BASE . "painel/atletas");
    }

    public function inscricao($clube_id = null, $campeonato_id = null, $atleta_id = null, $remover = null)
    {
        $this->verifica_login();

        $atletas = new atletas();

        $clubes = new clubes();


        if ($remover == "remover") {
            $atletas->delInscricao($clube_id, $campeonato_id, $atleta_id);

            header("location: " . BASE . "painel/atleta_add/$clube_id/$atleta_id");
        }



        $data = array();

        $data["inscricoes"] = $atletas->getInscricaoByIdCampeoantoAndClube($clube_id, $campeonato_id, $atleta_id);

        $data["clube"] = $clubes->getById($clube_id);
        $this->loadViewInTemplate('painel/ficha_atleta', $data);
    }

    public function atualiza_sumula($jogo_id)
    {

        $campeonatos = new campeonatos();

        $atletas = new atletas();

        $jogo = $campeonatos->getJogoById($jogo_id);


        //CLUBE 1

        $data = array();

        $data["campeonato_id"] = $jogo["campeonato_id"];

        $data["clube_id"] = $jogo["clube_1"];

        $atletas->updateSumula($data);


        //CLUBE 2

        $data = array();

        $data["campeonato_id"] = $jogo["campeonato_id"];

        $data["clube_id"] = $jogo["clube_2"];

        $atletas->updateSumula($data);
    }

    public function carteirinhas()
    {
        $this->verifica_login();
        $atletas = new atletas();
        $data = array();
        $data["inscricoes"] = $atletas->getInscricoes();
        $this->loadTemplateInPainel('painel/inscricoes', $data);
    }

    public function carteirinha($clube_id = null, $campeonato_id = null, $atleta_id = null)
    {
        $this->verifica_login();
        $atletas = new atletas();
        $data = array();
        if (isset($_POST["checked"])) {
            $sql = "SELECT DISTINCT(inscricoes.atleta_id) as atleta_id, 
                        inscricoes.*, 
                        atletas.*, 
                        campeonato.nome AS campeonato_nome, 
                        campeonato.temporada, 
                        clubes.nome AS clube_nome, 
                        clubes.nickname AS clube_nickname 
                    FROM inscricoes 
                    LEFT JOIN atletas ON
                        -- ON atletas.atleta_id = inscricoes.atleta_id 
                        inscricoes.atleta_id = atletas.atleta_id
                    LEFT JOIN clubes ON
                        -- ON clubes.clube_id = atletas.clube_id
                        inscricoes.clube_id = clubes.clube_id
                    LEFT JOIN campeonato ON
                        -- ON campeonato.campeonato_id = inscricoes.campeonato_id 
                        inscricoes.campeonato_id = campeonato.campeonato_id
                    WHERE 
                ";

            foreach ($_POST["checked"] as $cx) {
                $explode = explode("/", $cx);
                $sql .= " (inscricoes.campeonato_id = '" . $explode[1] . "' AND inscricoes.clube_id = '" . $explode[0] . "' AND atletas.atleta_id = '" . $explode[2] . "') OR";
            }



            $sql = substr($sql, 0, -2);



            $data["carteirinhas"]  = $atletas->sql($sql);
            
            $this->loadViewInTemplate('painel/carteirinha', $data);
        } else {
            $data["carteirinhas"] = $atletas->getInscricaoByIdCampeoantoAndClube($clube_id, $campeonato_id, $atleta_id);
            $this->loadViewInTemplate('painel/carteirinha', $data);
        }
    }

    /*
  FUNÇÃO COMISSAO
*/
    public function comissao()
    {

        $this->verifica_login();

        $data = array();

        $comissoes = new comissoes();

        $data['comissoes'] = $comissoes->get();

        $this->loadTemplateInPainel('painel/comissao_list', $data);
    }

    public function verifica_comissao($doc)
    {
        $this->verifica_login();

        $comissoes = new comissoes();

        $status_comissao = $comissoes->getByDoc($doc);

        if ($status_comissao == 1) {
            echo 'Integrante já esta cadastrado!';
            echo "<input type='hidden' id='verifica' value='1' />";
        } else {
            echo "<input type='hidden' id='verifica' value='0' />";
        }
    }

    public function comissao_add($id = null)
    {

        $this->verifica_login();

        $comissoes = new comissoes();

        $fotos = new fotos();

        $clubes = new clubes();

        $data = array();

        unset($_SESSION["msg"]);

        if (isset($_POST["nome"])) {

            if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {
                //exclui foto antiga
                if (isset($_POST["foto_id"])) {
                    unlink("assets/images/comissao/" . $_POST["foto_id"]);
                }

                $nomedoarquivo = md5($_FILES['foto']['name'] . time() . rand(0, 999)) . '.jpg';
                $foto = move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/images/comissao/' . $nomedoarquivo);

                $data["foto"] = ($foto) ? $nomedoarquivo : '';
            } else {
                $data["foto"] = $_POST["foto_id"];
            }

            if ($_POST["comissao_id"] == 0) {

                $data["nome"] = $_POST["nome"];
                $data["nascimento"] = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["nascimento"])));
                $data["clube_id"] = $_POST["clube_id"];
                $data["funcao"] = $_POST["funcao"];
                $data["cpf"] = $_POST["cpf"];
                $data["rg"] = $_POST["rg"];
                $data["cref"] = $_POST["cref"];
                $data["status"] = $_POST["status"];

                $comissao_id = $comissoes->add($data);

                $_SESSION["msg"] = "Cadastro realizado com sucesso!";
            } else {
                $data["comissao_id"] = $_POST["comissao_id"];
                $data["nome"] = $_POST["nome"];
                $data["nascimento"] = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["nascimento"])));
                $data["clube_id"] = $_POST["clube_id"];
                $data["funcao"] = $_POST["funcao"];
                $data["cpf"] = $_POST["cpf"];
                $data["rg"] = $_POST["rg"];
                $data["cref"] = $_POST["cref"];
                $data["status"] = $_POST["status"];

                $comissoes->edit($data);

                $_SESSION["msg"] = "Integrante {$_POST["nome"]} editado com sucesso!";
            }

            header("location: " . BASE . "painel/comissao");
        }


        if (isset($id)) {
            $result = $comissoes->getById($id);

            $data["comissao_id"] = $result["comissao_id"];
            $data["nome"] = $result["nome"];
            $data["nascimento"] = date('d/m/Y', strtotime($result["nascimento"]));
            $data["clube_info"] = $clubes->getById($result["clube_id"]);
            $data["funcao"] = $result["funcao"];
            $data["cpf"] = $result["cpf"];
            $data["rg"] = $result["rg"];
            $data["cref"] = $result["cref"];
            $data["foto"] = $result["foto"];
            $data["status"] = $result["status"];
        } else {
            $data["comissao_id"] = 0;
            $data["nome"] = "";
            $data["nascimento"] = "";
            $data["clube_id"] = "";
            $data["funcao"] = "";
            $data["cpf"] = "";
            $data["rg"] = "";
            $data["cref"] = "";
            $data["foto"] = "";
            $data["status"] = "";
        }
        $data["clubes"] = $clubes->get();

        $this->loadTemplateInPainel('painel/comissao_form', $data);
    }

    public function comissao_off()
    {

        $this->verifica_login();


        $comissoes = new comissoes();

        $msg = "";

        unset($_SESSION["msg"]);

        foreach ($_POST["checked"] as $comissao_id) {
            $comissoes->delete($comissao_id);
            $msg .= "Integrante " . $comissao_id . " desativado <br />";
        }

        $_SESSION["msg"] = $msg;

        header("location: " . BASE . "painel/comissao");
    }

    public function comissao_del($id = null)
    {

        $this->verifica_login();

        unset($_SESSION["msg"]);

        $comissoes = new comissoes();

        if ($comissoes->delete($id)) {
            $_SESSION["msg"] = "Integrante {$id} desativado com sucesso!";
        } else {
            $_SESSION["msg"] = "Erro ao desativar integrante!";
        }



        header("location: " . BASE . "painel/comissao");
    }

    /*
  FUNÇÃO ARBITRAGEM
*/
    public function arbitragem()
    {

        $this->verifica_login();

        $data = array();

        $arbitragem = new arbitragem();

        $data['arbitragem'] = $arbitragem->get();

        $this->loadTemplateInPainel('painel/arbitragem_list', $data);
    }

    public function verifica_arbitragem($doc)
    {
        $this->verifica_login();

        $arbitragem = new arbitragem();

        $status_arbitragem = $arbitragem->getByDoc($doc);

        if ($status_arbitragem == 1) {
            echo 'Árbitro já esta cadastrado!';
            echo "<input type='hidden' id='verifica' value='1' />";
        } else {
            echo "<input type='hidden' id='verifica' value='0' />";
        }
    }

    public function arbitragem_add($id = null)
    {

        $this->verifica_login();

        $arbitragem = new arbitragem();

        $fotos = new fotos();

        /*$clubes = new clubes();*/

        $data = array();

        unset($_SESSION["msg"]);

        if (isset($_POST["nome"])) {

            if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {
                //exclui foto antiga
                if (isset($_POST["foto_id"])) {
                    unlink("assets/images/arbitros/" . $_POST["foto_id"]);
                }

                $nomedoarquivo = md5($_FILES['foto']['name'] . time() . rand(0, 999)) . '.jpg';
                $foto = move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/images/arbitros/' . $nomedoarquivo);

                $data["foto"] = ($foto) ? $nomedoarquivo : '';
            } else {
                $data["foto"] = $_POST["foto_id"];
            }

            if ($_POST["arbitragem_id"] == 0) {

                $data["nome"] = $_POST["nome"];
                $data["nascimento"] = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["nascimento"])));
                $data["funcao"] = $_POST["funcao"];
                $data["cpf"] = $_POST["cpf"];
                $data["rg"] = $_POST["rg"];
                $data["telefone"] = $_POST["telefone"];

                $data["cep"] = $_POST["cep"];
                $data["endereco"] = $_POST["endereco"];
                $data["bairro"] = $_POST["bairro"];
                $data["numero"] = $_POST["numero"];
                $data["cidade"] = $_POST["cidade"];
                $data["estado"] = $_POST["estado"];


                $data["status"] = $_POST["status"];

                $arbitragem_id = $arbitragem->add($data);

                $_SESSION["msg"] = "Cadastro realizado com sucesso!";
            } else {
                $data["arbitragem_id"] = $_POST["arbitragem_id"];
                $data["nome"] = $_POST["nome"];
                $data["nascimento"] = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["nascimento"])));
                $data["funcao"] = $_POST["funcao"];
                $data["cpf"] = $_POST["cpf"];
                $data["rg"] = $_POST["rg"];
                $data["telefone"] = $_POST["telefone"];

                $data["cep"] = $_POST["cep"];
                $data["endereco"] = $_POST["endereco"];
                $data["bairro"] = $_POST["bairro"];
                $data["numero"] = $_POST["numero"];
                $data["cidade"] = $_POST["cidade"];
                $data["estado"] = $_POST["estado"];


                $data["status"] = $_POST["status"];

                $arbitragem->edit($data);

                $_SESSION["msg"] = "Árbitro {$_POST["nome"]} editado com sucesso!";
            }

            header("location: " . BASE . "painel/arbitragem");
        }


        if (isset($id)) {
            $result = $arbitragem->getById($id);

            $data["arbitragem_id"] = $result["arbitragem_id"];
            $data["nome"] = $result["nome"];
            $data["nascimento"] = date('d/m/Y', strtotime($result["nascimento"]));
            $data["funcao"] = $result["funcao"];
            $data["cpf"] = $result["cpf"];
            $data["rg"] = $result["rg"];
            $data["telefone"] = $result["telefone"];

            $data["cep"] = $result["cep"];
            $data["endereco"] = $result["endereco"];
            $data["bairro"] = $result["bairro"];
            $data["numero"] = $result["numero"];
            $data["cidade"] = $result["cidade"];
            $data["estado"] = $result["estado"];

            $data["foto"] = $result["foto"];
            $data["status"] = $result["status"];
        } else {
            $data["arbitragem_id"] = 0;
            $data["nome"] = "";
            $data["nascimento"] = "";
            $data["funcao"] = "";
            $data["cpf"] = "";
            $data["rg"] = "";
            $data["telefone"] = "";

            $data["cep"] = "";
            $data["endereco"] = "";
            $data["bairro"] = "";
            $data["numero"] = "";
            $data["cidade"] = "";
            $data["estado"] = "";


            $data["foto"] = "";
            $data["status"] = "";
        }

        $this->loadTemplateInPainel('painel/arbitragem_form', $data);
    }

    public function arbitragem_off()
    {

        $this->verifica_login();


        $arbitragem = new arbitragem();

        $msg = "";

        unset($_SESSION["msg"]);

        foreach ($_POST["checked"] as $arbitragem_id) {
            $arbitragem->delete($arbitragem_id);
            $msg .= "Árbitro " . $arbitragem_id . " desativado <br />";
        }

        $_SESSION["msg"] = $msg;

        header("location: " . BASE . "painel/arbitragem");
    }

    public function arbitragem_del($id = null)
    {

        $this->verifica_login();

        unset($_SESSION["msg"]);

        $arbitragem = new arbitragem();

        if ($arbitragem->delete($id)) {
            $_SESSION["msg"] = "Árbitro {$id} desativado com sucesso!";
        } else {
            $_SESSION["msg"] = "Erro ao desativar árbitro!";
        }



        header("location: " . BASE . "painel/arbitragem");
    }

    public function ficha_arbitro()
    {

        $this->verifica_login();

        $data = array();

        $arbitragem = new arbitragem();

        $sql = "SELECT * FROM arbitragem ";

        if (isset($_POST["checked"])) {
            $sql .= " WHERE ";

            foreach ($_POST["checked"] as $arbitragem_id) {
                $sql .= " arbitragem_id = '" . $arbitragem_id . "' OR";
            }

            $sql = substr($sql, 0, -2);
        }


        $data["arbitros"] = $arbitragem->sql($sql);

        $this->loadViewInTemplate('painel/ficha_arbitragem', $data);
    }

    /*
  FUNÇÃO ESTADIOS
*/
    public function estadios()
    {

        $this->verifica_login();

        $data = array();

        $estadios = new estadios();

        $data['estadios'] = $estadios->get();

        $this->loadTemplateInPainel('painel/estadio_list', $data);
    }

    public function verifica_estadio($doc)
    {
        $this->verifica_login();

        $estadios = new estadios();

        $status_estadio = $estadios->getByDoc($doc);

        if ($status_estadio == 1) {
            echo 'Estádio já esta cadastrado!';
            echo "<input type='hidden' id='verifica' value='1' />";
        } else {
            echo "<input type='hidden' id='verifica' value='0' />";
        }
    }

    public function estadio_add($id = null)
    {

        $this->verifica_login();

        $estadios = new estadios();

        $fotos = new fotos();

        $clubes = new clubes();

        $data = array();

        unset($_SESSION["msg"]);

        if (isset($_POST["campo"])) {

            if (isset($_FILES['foto']) && $_FILES['foto']['name'] != "") {
                //exclui foto antiga
                if (isset($_POST["foto_id"])) {
                    unlink("assets/images/estadios/" . $_POST["foto_id"]);
                }

                $nomedoarquivo = md5($_FILES['foto']['name'] . time() . rand(0, 999)) . '.jpg';
                $foto = move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/images/estadios/' . $nomedoarquivo);

                $data["foto"] = ($foto) ? $nomedoarquivo : '';
            } else {
                $data["foto"] = $_POST["foto_id"];
            }

            if ($_POST["estadio_id"] == 0) {

                $data["campo"] = $_POST["campo"];
                $data["nome_fantasia"] = $_POST["nome_fantasia"];
                $data["inauguracao"] = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["inauguracao"])));

                $data["cep"] = $_POST["cep"];
                $data["endereco"] = $_POST["endereco"];
                $data["bairro"] = $_POST["bairro"];
                $data["cidade"] = $_POST["cidade"];
                $data["estado"] = $_POST["estado"];

                $data["clube_id"] = $_POST["clube_id"];
                $data["mandante"] = $_POST["mandante"];
                $data["status"] = $_POST["status"];

                $estadio_id = $estadios->add($data);

                $_SESSION["msg"] = "Cadastro realizado com sucesso!";

                header("location: " . BASE . "painel/estadios");
            } else {
                $data["estadio_id"] = $_POST["estadio_id"];
                $data["campo"] = $_POST["campo"];
                $data["nome_fantasia"] = $_POST["nome_fantasia"];
                $data["inauguracao"] = date('Y-m-d', strtotime(str_replace("/", "-", $_POST["inauguracao"])));

                $data["cep"] = $_POST["cep"];
                $data["endereco"] = $_POST["endereco"];
                $data["bairro"] = $_POST["bairro"];
                $data["cidade"] = $_POST["cidade"];
                $data["estado"] = $_POST["estado"];


                $data["clube_id"] = $_POST["clube_id"];
                $data["mandante"] = $_POST["mandante"];
                //$data["foto"] = $_POST["foto"];
                $data["status"] = $_POST["status"];

                $estadios->edit($data);

                $_SESSION["msg"] = "Estádio {$_POST["campo"]} editado com sucesso!";

                header("location: " . BASE . "painel/estadio_add/" . $_POST["estadio_id"]);
            }
        }


        if (isset($id)) {
            $result = $estadios->getById($id);

            $data["estadio_id"] = $result["estadio_id"];
            $data["foto"] = $result["foto"];
            $data["campo"] = $result["campo"];
            $data["nome_fantasia"] = $result["nome_fantasia"];
            $data["inauguracao"] = date('d/m/Y', strtotime($result["inauguracao"]));
            $data["clube_id"] = $result["clube_id"];
            $data["clube_nome"] = $result["clube_nome"];

            $data["cep"] = $result["cep"];
            $data["endereco"] = $result["endereco"];
            $data["bairro"] = $result["bairro"];
            $data["cidade"] = $result["cidade"];
            $data["estado"] = $result["estado"];


            $data["mandantes"] = $estadios->getMandanteById($id);
            $data["status"] = $result["status"];
        } else {
            $data["estadio_id"] = 0;
            $data["foto"] = "";
            $data["campo"] = "";
            $data["nome_fantasia"] = "";
            $data["inauguracao"] = "";
            $data["clube_id"] = "";
            $data["clube_nome"] = "";

            $data["cep"] = "";
            $data["endereco"] = "";
            $data["bairro"] = "";
            $data["cidade"] = "";
            $data["estado"] = "";

            $data["mandantes"] = array();
            $data["status"] = "";
        }
        $data["clubes"] = $clubes->get();

        $this->loadTemplateInPainel('painel/estadio_form', $data);
    }

    public function estadio_off()
    {

        $this->verifica_login();


        $estadios = new estadios();

        $msg = "";

        unset($_SESSION["msg"]);

        foreach ($_POST["checked"] as $estadio_id) {
            $estadios->delete($estadio_id);
            $msg .= "Estádio " . $estadio_id . " desativado <br />";
        }

        $_SESSION["msg"] = $msg;

        header("location: " . BASE . "painel/estadios");
    }

    public function estadio_del($id = null)
    {

        $this->verifica_login();

        unset($_SESSION["msg"]);

        $estadios = new estadios();

        if ($estadios->delete($id)) {
            $_SESSION["msg"] = "Estádio {$id} desativado com sucesso!";
        } else {
            $_SESSION["msg"] = "Erro ao desativar estádio!";
        }

        header("location: " . BASE . "painel/estadios");
    }

    /*
  FUNÇÃO BUSCACEP
*/
    public function buscacep($cep)
    {

        $this->verifica_login();

        unset($_SESSION["msg"]);

        $atletas = new atletas();

        if ($cep == "") {
            echo "Preencha corretamente o CEP!";
        } else {



            $valor = json_decode(file_get_contents("https://viacep.com.br/ws/$cep/json/"));

            if (isset($valor->logradouro)) {

                $data["endereco"] = $valor->logradouro;
                $data["bairro"] = $valor->bairro;
                $data["cidade"] = $valor->localidade;
                $data["estado"] = $valor->uf;
                $data["sucesso"] = 1;
                $data["msg"] = "";
            } else {
                $data["endereco"] = "";
                $data["bairro"] = "";
                $data["cidade"] = "";
                $data["estado"] = "";
                $data["sucesso"] = 0;
                $data["msg"] = "Cep não encontrado, favor digitar as informações";
            }

            echo '
             <input type="hidden" name="sucesso" id="sucesso" value="' . $data["sucesso"] . '" />

                ' . $data["msg"] . '

        
      <div class="form-group form-md-line-input">
        <label class="col-md-3 control-label" for="endereco"> <span class="required">*</span> Endereço completo, numero :</label>
        <div class="col-md-9">
        <input type="text" class="form-control" name="endereco" id="endereco" value="' . $data["endereco"] . '" required />
        <div class="form-control-focus"> </div>
        <span class="help-block"></span>
        </div>
      </div>
             
      <div class="form-group form-md-line-input">
        <label class="col-md-3 control-label" for="bairro"> <span class="required">*</span> Bairro :</label>
        <div class="col-md-9">
        <input type="text" class="form-control" name="bairro" id="bairro" value="' . $data["bairro"] . '" required />
        <div class="form-control-focus"> </div>
        <span class="help-block"></span>
        </div>
      </div>
            
      <div class="form-group form-md-line-input">
        <label class="col-md-3 control-label" for="cidade"><span class="required">*</span> Cidade :</label>
        <div class="col-md-9">
        <input type="text" class="form-control" name="cidade" id="cidade" value="' . $data["cidade"] . '" required />
        <div class="form-control-focus"> </div>
        <span class="help-block"></span>
        </div>
      </div>
            
      <div class="form-group form-md-line-input">
        <label class="col-md-3 control-label" for="estado"><span class="required">*</span> Estado (UF) :</label>
        <div class="col-md-9">
        <input type="text" class="form-control" name="estado" id="estado" value="' . $data["estado"] . '" required />
        <div class="form-control-focus"> </div>
        <span class="help-block"></span>
        </div>
      </div> 
         
                ';
        }
    }


    public function atividades()
    {

        $this->verifica_login();

        $data = array();

        $atletas = new atletas();

        $sql = "SELECT atividades.*,
        
        usuarios.usuario,usuarios.email as email_usuario, 
        clubes.nickname as clube,
        campeonato.nome as campeonato,
        atletas.nome as atleta

        FROM atividades 

        LEFT JOIN usuarios ON atividades.usuario_id = usuarios.id
        LEFT JOIN clubes ON atividades.clube_id = clubes.clube_id
        LEFT JOIN campeonato ON atividades.campeonato_id = campeonato.campeonato_id
        LEFT JOIN atletas ON atividades.atleta_id = atletas.atleta_id

        where atividades.date_add BETWEEN '" . date('Y') . "-01-01 00:00:00' and '" . date('Y-m-d H:i:s') . "' ORDER BY atividades.date_add DESC";

        date_format($data["date_add"], "d/m/Y H:i:s");
        $data["atividades"] = $atletas->sql($sql);

        //1=add atleta,2=edit atleta,3=remov atle, 4=add insc,5=rem insc, 6 = del inscr 
        $data["actions"] = array(
            "1" => "Cadastro atleta",
            "2" => "Atualização atleta",
            "3" => "Remoção atleta",
            "4" => "Inscrição atleta",
            "5" => "Remoção Inscrição atleta",
            "6" => "Exclusão Inscrição atleta",
        );

        $this->loadTemplateInPainel('painel/atividade_list', $data);
    }
}
