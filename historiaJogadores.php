<!DOCTYPE html>
<html lang="pt-br">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <title>Histórias - Liga Municipal de Futebol de Taubaté</title>
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

  <style>
    .alphabet {
      text-align: center;
      background: black;
      padding: 1em; 
      margin-top: 2em;
    }
    .alphabet-link {
      color: #FFCF00;
      text-decoration: none;
      font-size: 1.7em;
      margin: 0.5em;
    }
    .alphabet-link:hover {
      color: white;
      transition: color 0.3s linear;
    }
    .letter-container {
      margin-top: 2em;
      margin: 1em;
      border-top: 4px #1D96F0 solid;
    }
    .letter-container:hover {
      border-top: 4px black solid;
      transition: border 0.5s linear;
    }
    .image {
      margin: 0.7em;
    }
  </style>

</head>
<body class="template-soccer">

  <div class="site-wrapper clearfix">
    <div class="site-overlay"></div>
    <!-- Header
    ================================================== -->
    <?php include "menu.php";
    require "cms/core/model.php";
    require "cms/models/atletas.php";
    $atletas = new atletas();
    $alphabet = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", 
    "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
    ?>
    <!-- Content
    ================================================== -->
    <div class="site-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 alphabet">
            <?php for($a = 0; $a < sizeof($alphabet); $a++) { ?>
            <a href="<?php echo "#".$alphabet[$a]; ?>" class="alphabet-link"><?php echo $alphabet[$a]; ?></a>
            <?php } ?>
          </div>
        </div>

        <?php for($a = 0; $a < sizeof($alphabet); $a++) { 
        $results = $atletas->getWhoHasHistoryByLetter($alphabet[$a]);  
        $contador = 0;
        ?>
        <div id="<?php echo $alphabet[$a]; ?>" class="letter-container">
          <div class="row">
            <div class="col-md-12">
              <h3><?php echo $alphabet[$a]; ?></h3>
            </div>
          </div>
          <?php if(sizeof($results) == 0) { ?>
          <div class="row" style="text-align: center;">
            <div class="col-md-12">
              <h5>Não há atletas aqui ainda</h5>
            </div>  
          </div>
          <?php } ?>
          <div class="row">
          <?php foreach($results as $result) { ?>
              <div class="col-md-3">
                <img src="./assets/images/atletas/<?php echo $result['foto']; ?>" alt="Foto do jogador" width="200" class="image" />
                <h4><?php echo $result['nome']; ?></h4>
                <a href="historiaJogador.php?id=<?php echo $result['id_historia']; ?>">Ver história do atleta</a>
              </div>
            <?php 
            $contador++;
            if($contador == 4) {
              echo '</div> <div class="row">';
              $contador = 0;
            }
          } ?>
          </div>
        </div>
        <?php } ?>
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