<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
    session_start();
}
// Define a hora de início e fim da restrição de acesso para sexta-feira -->
// $inicio_restricao = strtotime('Monday 23:59:00');
// $fim_restricao = strtotime('Tuesday 14:00:00');
// $agora = time();

 // Verifica se é sexta-feira e se o acesso está restrito, redireciona para página de aviso -->
// if (($agora < $fim_restricao)) {
//     echo "<p><h1> Voltaremos após as 14:00 </h1> <br /> <a href='https://www.ligataubate.com.br'> voltar para o site</a></p>";
//     exit();
// }
?>
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
        <link href="<?php echo BASE; ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo BASE; ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo BASE; ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo BASE; ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo BASE; ?>assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
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
            <form method="POST">
                <h4 class="form-title font-green"><center><strong>PAINEL ADMINISTRATIVO</strong></center></h4>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Usuário ou senha inválida! </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Usuário</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuário" name="email" required/> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Senha</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Senha" name="senha" required maxlength="6"/> </div>
                <div class="form-actions">



                        <?php if(isset($_SESSION["msg"]))
                        {
                            $erro = $_SESSION["msg"];
                            unset($_SESSION["msg"]);
                        }
                        ?>




                		<?php
							if(!empty($erro)) {
								echo $erro;
                                echo "<p></p>";
							}
							?>




                    <button type="submit" class="btn green uppercase">Login</button>
                    <a href="javascript:;" id="forget-password" class="forget-password">Esqueceu a senha?</a>
                </div>
            </form>
            <!-- END LOGIN FORM -->
         
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="https://www.ligataubate.com.br/cms/forgot_pass.php" method="post">
                <h3 class="font-green">Esqueceu a senha?</h3>
                <p> Digite seu email abaixo para redefinir sua senha.</p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="E-mail" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn green btn-outline">Voltar</button>
                    <button type="submit" class="btn btn-success uppercase pull-right">Enviar</button>
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
        <script src="<?php echo BASE; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo BASE; ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE; ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo BASE; ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo BASE; ?>assets/pages/scripts/login.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>