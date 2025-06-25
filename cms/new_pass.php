<?php

session_start();

include "conexao.php";
?>



<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
		 <title>Liga Municipal de Futebol de Taubaté</title>
		 <meta charset="utf-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="description" content="A Liga Municipal de Futebol de Taubaté é a entidade responsável por dirigir o futebol da cidade de Taubaté, promovendo e realizando competições nas mais diferentes categorias (base, amador e veterano) do esporte.">
		<meta name="author" content="Grupo Vergueiro">
		<meta name="keywords" content="Liga Taubaté Futebol">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="https://www.ligataubate.com.br/cms/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="https://www.ligataubate.com.br/cms/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="https://www.ligataubate.com.br/cms/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://www.ligataubate.com.br/cms/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="https://www.ligataubate.com.br/cms/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="https://www.ligataubate.com.br/cms/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="https://www.ligataubate.com.br/cms/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="https://www.ligataubate.com.br/cms/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="https://www.ligataubate.com.br/cms/assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="https://ligataubate.com.br/assets/images/soccer/favicons/favicon-120.png">
       <link rel="apple-touch-icon" sizes="120x120" href="https://ligataubate.com.br/assets/images/soccer/favicons/favicon-120.png">
       <link rel="apple-touch-icon" sizes="152x152" href="https://ligataubate.com.br/assets/images/soccer/favicons/favicon-120.png"> 
             
       </head>
    <!-- END HEAD -->

    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="https://www.ligataubate.com.br/assets/images/soccer/logo.png" width="150" alt=""/> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->

<?php
if(isset($_POST['password']) && isset($_POST['id_usuario']))
{


	$password = md5($_POST['password']);

	$id_usuario =$_POST['id_usuario'];

	mysqli_query($obj,"UPDATE usuarios SET senha = '$password' WHERE usuario = '$id_usuario'");

	mysqli_query($obj,"UPDATE recuperar_senha SET status = '0' WHERE token = '".$_SESSION['token']."'");

	echo "<div> <h3> Senha salva com sucesso! </h3>  <a href='https://www.ligataubate.com.br/cms/painel/'> Fazer login </a> </div>";


	//echo "<script>window.location = 'https://www.ligataubate.com.br/cms/painel'</script>";

}

else

{

$token = $_GET['token'];

$_SESSION['token'] = $token;

$sel = mysqli_query($obj,"SELECT * FROM recuperar_senha WHERE status = '1' AND token='".$_SESSION['token']."'");

$rs = mysqli_fetch_assoc($sel);

if($rs)
{

		if($rs['validade']<date('Y-m-d'))

		{

		
			echo "<div> <h3> Solicitação fora do prazo de validade </h3> <a id='forget-password' class='forget-password'> Tentar reenvio </a> </div>";

			//echo "<script>window.location='http://www.ligataubate.com.br/cms/forgot_pass.php'</script>";

		}

		else

		{

		?>

            <form method="POST" action="new_pass.php">
                <h4 class="form-title font-green"><center><strong>PAINEL ADMINISTRATIVO</strong></center></h4>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>  </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Senha</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Senha" name="password" id="password" maxlength="6" required/> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Conf. Senha</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" onkeyup="verifica()" autocomplete="off" placeholder="Confirmação de senha" name="confpassword" id="confpassword" required maxlength="6"/> </div>
                


                   	<input type="hidden" value="<?=$rs['id_usuario']?>"  name="id_usuario" />

					

                <div class="form-actions">

                	<span id="feedback"></span>
                		<?php
							if(!empty($erro)) {
								echo $erro;
                                echo "<p></p>";
							}
							?>


                    <button type="submit" name="botao" id="botao"  class="btn green uppercase">Salvar</button>
                    <a href="javascript:;" id="forget-password" class="forget-password" style="display:none">Esqueceu a senha?</a>
                </div>
            </form>

<?php

		}

	}

	else

	{



		echo "<div> <h3> Não encontramos esta solicitação! </h3> <a id='forget-password' class='forget-password'> Tentar reenvio </a> </div>";

	}

}

?>


            <!-- END LOGIN FORM -->
            
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="https://www.ligataubate.com.br/cms/forgot_pass.php" method="post">
                <h3 class="font-green">Esqueceu a senha?</h3>
                <p> Digite seu email abaixo para redefinir sua senha.</p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="E-mail" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn green btn-outline">Voltar</button>
                    <button type="submit" value="Enviar" class="btn btn-success uppercase pull-right">Enviar</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
            
        </div>
        <div class="copyright"> 2017 | Liga Municipal de Taubaté. </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="https://www.ligataubate.com.br/cms/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="https://www.ligataubate.com.br/cms/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://www.ligataubate.com.br/cms/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="https://www.ligataubate.com.br/cms/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="https://www.ligataubate.com.br/cms/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="https://www.ligataubate.com.br/cms/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="https://www.ligataubate.com.br/cms/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="https://www.ligataubate.com.br/cms/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="https://www.ligataubate.com.br/cms/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="https://www.ligataubate.com.br/cms/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="https://www.ligataubate.com.br/cms/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="https://www.ligataubate.com.br/cms/assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>


<script>

		function verifica()

		{

		var senha = document.getElementById("password").value;

		var confsenha = document.getElementById("confpassword").value;

			if(senha!=confsenha || senha.length<6 || confsenha.length<6)

			{

				document.getElementById("feedback").innerHTML = "As senhas não correspondem<p></p>";

				document.getElementById("botao").disabled = true;

			}

			else

			{

				document.getElementById("feedback").innerHTML = "Ok, verificado <p></p>";

				document.getElementById("botao").disabled = false;

			}

		}

	</script>