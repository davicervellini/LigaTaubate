<?php
  if(!isset($_GET['id'])) header('Location: clubes.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Basic Page Needs
  ================================================== -->
  <title>Liga Municipal de Futebol de Taubaté</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="A Liga Municipal de Futebol de Taubaté é a entidade responsável por dirigir o futebol da cidade de Taubaté, promovendo e realizando competições nas mais diferentes categorias (base, amador e veterano) do esporte.">
  <meta name="author" content="Grupo Vergueiro">
  <meta name="keywords" content="Liga Taubaté Futebol">

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="assets/images/soccer/favicons/favicon-120.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/soccer/favicons/favicon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/soccer/favicons/favicon-152.png">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

  <!-- Google Web Fonts
  ================================================== -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CSource+Sans+Pro:400,700" rel="stylesheet">

  <!-- CSS
  ================================================== -->
  <!-- Preloader CSS 
  <link href="assets/css/preloader.css" rel="stylesheet">-->

  <!-- Vendor CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
  <link href="assets/vendor/slick/slick.css" rel="stylesheet">

  <!-- Template CSS-->
  <link href="assets/css/content.css" rel="stylesheet">
  <link href="assets/css/components.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Custom CSS-->
  <link href="assets/css/custom.css" rel="stylesheet">

</head>
<body class="template-soccer">
  <div class="site-wrapper clearfix">
    <div class="site-overlay"></div>
    <!-- Header
    ================================================== -->
    <?php include "menu.php";?> 
    <!-- Content
    ================================================== -->
    <?php require "cms/core/model.php";?>
    <?php require "cms/models/clubes.php";?>
    <?php $not = new clubes(); 
    $clube = $not->getById($_GET['id']);
    $historia = $not->getHistoriaById($_GET['id']);
    ?>
    
    <div class="site-content">
      <div class="container">
        <!-- <div class="row" style="text-align: center; margin-bottom: 2em;">
          <div class="col-md">
            <img src="assets/images/clubes/2-divisao/agua-quente.jpg" width="250">
          </div>
        </div> -->

        <div class="row" style="text-align: center; margin-bottom: 2em; margin-top: 4em;">
          <div class="col-md">
            <h2 class="product__title"><b>HISTÓRIA DO CLUBE <?php echo $clube['nickname'] ?></b></h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md">
          ✅ <b>Nome completo:</b> <?php echo $historia['nome_completo'] ?><br>
          ✅ <b>Data de fundação:</b> <?php echo $historia['data_fundacao'] ?><br>
          ✅ <b>Presidente atual:</b> <?php echo $historia['presidente_atual'] ?><br>
          <?php if($historia['titulos_conquistados'] != "") { ?>
          ✅ <b>Títulos conquistados:</b> <?php echo $historia['titulos_conquistados'] ?><br>
          <?php } ?>
              <!-- <ul>
                <li>🏆 Tri-Campeão da 3ª divisão - 2004, 2011 e 2015</li>
                <li>🏆 Sub 20 - 2019</li>
              </ul> -->
          ✅ <b>Cores oficiais do time:</b> <?php echo $historia['cores_oficiais'] ?><br>
          ✅ <b>Bairro que representa:</b> <?php echo $historia['bairro_representante'] ?><br>

          <?php if($historia['jogador_destaque'] != "") { ?>
          ✅ <b>Jogador destaque:</b> <?php echo $historia['jogador_destaque'] ?><br>
          <?php } ?>

          <?php if($historia['artilheiro'] != "") { ?>
          ✅ <b>⚽ Artilheiro(s):</b>  <?php echo $historia['artilheiro'] ?><br>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>

            
    <!-- Footer
    ================================================== -->
    <?php include "footer.php";?>
    <!-- Footer / End -->
  </div>

  <!-- Javascript Files
  ================================================== -->
  <!-- Core JS -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <!--<script src="assets/js/core-min.js"></script>-->

  <!-- Vendor JS -->
  <script src="assets/vendor/twitter/jquery.twitter.js"></script>

  <!-- Template JS -->
  <script src="assets/js/init.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
  </html>
