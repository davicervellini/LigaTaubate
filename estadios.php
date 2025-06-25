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

    <!-- Page Heading
    ================================================== -->
    <div class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
      <img src="assets/images/label/estadios.png" alt="">
          </div>
        </div>
      </div>
    </div>   
   
    <!-- Content
    ================================================== -->
    <?php require "cms/core/model.php";?>
              <?php require "cms/models/estadios.php";?>
              <?php $not = new estadios(); ?>
    
<div class="site-content">
      <div class="container">
      
        <div class="row" 
        style="
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        ">
        <?php foreach ($not->get() as $estadio){
           $estadio['foto'] ? $foto = "cms/assets/images/estadios/".$estadio['foto'] : $foto = "assets/images/estadios/sem-foto.png";
        ?>
          <!-- COLUNA 1 -->
          <div class="col-md">
            <!-- 1º COLUNA DE CAMPOS -->
            <div class="card card--clean">
              <div class="card__content">
                <!-- Products -->
                <ul class="products products--list">
                  <!-- #1 -->
                    <li class="product__item product__item--color-1 card">
                      <!-- <div class="product__img">
                        <div class="product__img-holder">
                          <img src="<?php echo $foto;?>" width="420" alt="">
                        </div>
                      </div> -->

                      <div class="product__content card__content">

                        <header class="product__header">
                          <div class="product__header-inner">
                            <h5 style="font-size: 20px;"><?php echo $estadio['campo']; ?></h5>
                              <div class="product__category" style="font-size: 16px;"><b><?php echo $estadio['nome_fantasia']; ?></b></div>
                              <div class="product__category"><?php echo $estadio['endereco']; ?></div>
                              <div class="product__category"><?php echo $estadio['bairro']; ?></div>
                              <div class="product__category"><?php echo $estadio['cidade']; ?></div>
                            <!-- <h5 style="font-size: 10px;">Equipe Responsável</h5>
                              <div class="product__category"><?php echo $estadio['clube_nome']; ?></div>
                            <h5 style="font-size: 10px;">Equipes Mandantes</h5>
                            <?php foreach ($not->getMandanteById($estadio['estadio_id']) as $mandante){ ?>
                              <div class="product__category"><?php echo $mandante['nome']; ?></div>
                            <?php } ?> -->
                          <!-- <h5 style="font-size: 11px;">Como Chegar</h5> -->
                          </div>
                        </header>

                      </div>
                    </li>    
                    
                </ul>
                <!-- Products / End -->
              </div>
            </div>
          <!--  / End -->
          </div>
          <?php } ?>
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
