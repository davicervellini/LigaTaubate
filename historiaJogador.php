<?php
  if(!isset($_GET['id'])) header('Location: historiaJogadores.php');
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
    <?php require "cms/models/atletas.php";?>
    <?php $atletas = new atletas(); ?>
    <?php $result = $atletas->getHistoryById($_GET['id']); ?>
    
    <div class="site-content">
      <div class="container">
        <div class="row" style="text-align: left; margin-top: 2rem;">
          <div class="col-md-3" style="text-align: center;">
            <img src="assets/images/atletas/<?php echo $result['foto']; ?>" width="250">
          </div>
          <div class="col-md-9" style="margin-top: 0.7rem; ">
            <h2 class="product__title"><b>HISTÓRIA</b> - <?php echo $result['nome']; ?></h2>
            <?php if($result['apelido']) { ?> <h5>Apelido: <?php echo $result['apelido']; ?></h5> <?php } ?>
            
            <hr style="border: 1px #FFCF00 solid;">

            <p style="text-align: left;"><?php echo $result['historia']; ?></p>
          </div>
        </div>
      </div>
    </div>

            
    
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
